<?php

define("CONDITION_1",        '1');
define("CONDITION_2",        '2');
define("CONDITION_3",        '3');
define("CONDITION_4",        '4');
define("CONDITION_5",        '5');

App::uses('AppModel', 'Model');

class Good extends AppModel {
	public $userTable  = 'goods';
	public $primaryKey = 'id';
	
	public $validate = array(
		'category' => array(
			'notEmpty' => array(
				'required' => true,
				'rule' => 'notEmpty'
			),
		),
		'overview' => array(
			'notEmpty' => array(
				'required' => true,
				'rule' => 'notEmpty'
			),
			'maxLength' => array(
				'required' => true,
				'rule' => array('maxLength', 100)
			)
		),
		'detail' => array(
			'notEmpty' => array(
				'required' => true,
				'rule' => 'notEmpty'
			),
			'minLength' => array(
				'required' => true,
				'rule' => array('minLength', 10)
			)
		),
		'cond' => array(
			'inList' => array(
				'rule' => array('inList', array(
						CONDITION_1,
						CONDITION_2,
						CONDITION_3,
						CONDITION_4,
						CONDITION_5)),
				'allowEmpty' => false
			)
		),
		'price' => array(
			'number' => array(
				'rule' => array('range', 999, PHP_INT_MAX)
			),
		),
		'quantity' => array(
			'number' => array(
				'rule' => array('range', 0, PHP_INT_MAX)
			)
		),
	);

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['created'] = date("Y-m-d H:i:s");
		return true;
	}
}