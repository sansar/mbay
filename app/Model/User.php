<?php

App::uses('AppModel', 'Model');
App::uses( 'CakeEmail', 'Network/Email');

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
		if ($this->save($user, false)) {
			return $this->find('first', array('conditions' => array('facebook_id' => $data['uid'])));
		}
		return null;
	}
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		if (isset($this->data[$this->alias]['id'])) {
			$this->data[$this->alias]['modified'] = date("Y-m-d H:i:s");
			return true;
		}
		if ( ! isset($this->data[$this->alias]['facebook_id']) && ! isset($this->data[$this->alias]['twitter_id'])) {
			$password_reset = $this->data[$this->alias]['first_name'] . $this->data[$this->alias]['email'] . time() . rand(0, PHP_INT_MAX);
			$this->data[$this->alias]['password_reset'] = AuthComponent::password($password_reset);
			if ( ! $this->_send_activation_mail($this->data[$this->alias])) {
				return false;
			}
		}
		$this->data[$this->alias]['created'] = date("Y-m-d H:i:s");
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
		// TODO
	}
	
	function validate_reenter($data) {
		return $data['password_confirm'] == $_POST['data']['User']['password'];
	}
}
