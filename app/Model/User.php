<?php

App::uses('AppModel', 'Model');

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
				'required' => true,
				'rule' => array('minLength', '3')
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
		$this->data[$this->alias]['created'] = date("Y-m-d H:i:s");
		return true;
	}
}
