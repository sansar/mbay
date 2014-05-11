<?php

App::uses('AppModel', 'Model');
App::uses( 'CakeEmail', 'Network/Email');

define("ROLE_BASIC",   '0');
define("ROLE_ADMIN",   '1');

class User extends AppModel {
	public $userTable  = 'users';
	public $primaryKey = 'id';
	
	public $validate = array(
		'email' => array(
			'notEmpty' => array(
				'required' => true,
				'rule' => 'notEmpty'
			),
			'email' => array(
				'rule' => 'email',
			),
			'isUnique' => array(
				'rule' => 'isUnique'
			)
		),
		'first_name' => array(
			'notEmpty' => array(
				'required' => true,
				'rule' => 'notEmpty'
			)
		),
		'last_name' => array(
			'notEmpty' => array(
				'required' => true,
				'rule' => 'notEmpty'
			)
		),
		'gender' => array(
			'inList' => array(
				'rule' => array('inList', array('1', '2')),
				'allowEmpty' => true
			)
		),
		'password' => array(
			'minLength' => array(
				'rule' => array('minLength', '3')
			)
		),
		'password_confirm' => array(
			'confirm' => array(
				'rule' => array('validate_reenter')
			)
		),
		'birthday' => array(
			'date' => array(
				'rule' => array('date', 'ymd'),
				'required' => false,
				'allowEmpty' => true,
			)
		),
		'phone' => array(
			'phone' => array(
				'rule' => array('phone', '/^[1-9][0-9]{5,7}$/')
			)
		)
	);
	
	public function register_by_facebook($data) {
		if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $data['raw']['birthday'], $matches)) {
			$birthday = "{$matches[3]}-{$matches[1]}-{$matches[2]}";
		} else {
			$birthday = null;
		}
		if (isset($data['raw']['gender']) && $data['raw']['gender'] == 'male') {
			$gender = 1;
		} elseif (isset($data['raw']['gender']) && $data['raw']['gender'] == 'female') {
			$gender = 2;
		} else {
			$gender = null;
		}
		if (isset($data['raw']['email'])) {
			$email = $data['raw']['email'];
		} else {
			$email = null;
		}
		if (isset($data['raw']['first_name'])) {
			$first_name = $data['raw']['first_name'];
		} else {
			$first_name = null;
		}
		if (isset($data['raw']['last_name'])) {
			$last_name = $data['raw']['last_name'];
		} else {
			$last_name = null;
		}
		
		$user = array(
			'User' => array(
				'facebook_id' => $data['uid'],
				'birthday'    => $birthday,
				'gender'      => $gender,
				'email'       => $email,
				'first_name'  => $first_name,
				'last_name'   => $last_name,
			)
		);
		$existed_user = $this->find('first', array('conditions' => array('email' => $email)));
		if ( $existed_user ) {
			$user['User']['id'] = $existed_user['User']['id'];
		}
		if ($this->save($user, false)) {
			return $this->find('first', array('conditions' => array('facebook_id' => $data['uid'])));
		}
		return null;
	}
	
	public function register($data = null) {
		$password_reset = $data[$this->alias]['first_name'] . $data[$this->alias]['email'] . time() . rand(0, PHP_INT_MAX);
		$data[$this->alias]['password_reset'] = AuthComponent::password($password_reset);
		$data = $this->save($data);
		if ( ! $data ) {
			return false;
		}
		if ( ! $this->_send_activation_mail($data[$this->alias])) {
			return false;
		}
		return true;
	}
	
	public function passwordReset($email) {
		$user = $this->find('first', array(
				'conditions' => array('email' => $email),
				'fields' => array('id', 'facebook_id', 'twitter_id', 'first_name', 'last_name', 'email')));
		if ( ! $user ) {
			return 'Таны оруулсан Е-майл хаяг бүртгэгдээгүй байна.';
		}
		if ($user[$this->alias]['facebook_id'] != null) {
			return 'Та Facebook-ээр дамжуулж манай сайтад бүртгүүлсэн байна.';
		}
		if ($user[$this->alias]['twitter_id'] != null) {
			return 'Та Twitter-ээр дамжуулж манай сайтад бүртгүүлсэн байна.';
		}
		$password_reset = $user[$this->alias]['first_name'] . $user[$this->alias]['email'] . time() . rand(0, PHP_INT_MAX);
		$user[$this->alias]['password_reset'] = AuthComponent::password($password_reset);
		if ( ! $this->save($user, false)) {
			return 'Амжилтгүй боллоо. Та дахин оролдоно уу.';
		}
		if ( ! $this->_send_password_reset_mail($user[$this->alias])) {
			return 'E-майл илгээж чадсангүй. Та дахин оролдоно уу.';
		}
		return true;
	}
	
	public function beforeSave($options = array()) {
		$data = $this->data[$this->alias];
		if (isset($data['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($data['password']);
		}
		if (isset($data['id'])) {
			$this->data[$this->alias]['modified'] = date("Y-m-d H:i:s");
		} else {
			$this->data[$this->alias]['created'] = date("Y-m-d H:i:s");
		}
		return true;
	}
	
	private function _send_activation_mail($user) {
		$email = new CakeEmail('gmail');
		$email->from(array('sansarjpn@gmail.com' => 'Mbay'));
		$email->to($user['email']);
		$email->subject('Бүртгэл идэвхжүүлэх');
		$email->emailFormat('html');
		$email->template('activation_mail');
		$email->viewVars($user);
		return $email->send();
	}
	
	private function _send_password_reset_mail($user) {
		$email = new CakeEmail('gmail');
		$email->from(array('sansarjpn@gmail.com' => 'Mbay'));
		$email->to($user['email']);
		$email->subject('Нууц үг сэргээх');
		$email->emailFormat('html');
		$email->template('password_reset_mail');
		$email->viewVars($user);
		return $email->send();
	}
	
	function validate_reenter($data) {
		return $data['password_confirm'] == $_POST['data']['User']['password'];
	}
}
