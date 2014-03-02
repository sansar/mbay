<?php

define("CLOTHES_TYPE_hoslol",     '0');
define("CLOTHES_TYPE_umd",        '1');
define("CLOTHES_TYPE_tsamts",     '2');
define("CLOTHES_TYPE_gaduur",     '3');
define("CLOTHES_TYPE_daashinz",   '4');
define("CLOTHES_TYPE_busad",      '5');

define("CLOTHES_SEX_MALE",     '0');
define("CLOTHES_SEX_FEMALE",   '1');
define("CLOTHES_SEX_BOTH",     '2');

App::uses('AppModel', 'Model');

class ClothesClothes extends AppModel {
	
	public $userTable  = 'clothes_clothes';
	public $primaryKey = 'id';
	public static $types = array(
			CLOTHES_TYPE_hoslol,
			CLOTHES_TYPE_umd,
			CLOTHES_TYPE_tsamts,
			CLOTHES_TYPE_gaduur,
			CLOTHES_TYPE_daashinz,
			CLOTHES_TYPE_busad
	);
	
	public $validate = array(
		'sex' => array(
			'inList' => array(
				'rule' => array('inList', array(
						CLOTHES_SEX_MALE,
						CLOTHES_SEX_FEMALE,
						CLOTHES_SEX_BOTH)),
			)
		),
		'type' => array(
			'inList' => array(
				'rule' => array('inList', array(
						CLOTHES_TYPE_hoslol,
						CLOTHES_TYPE_umd,
						CLOTHES_TYPE_tsamts,
						CLOTHES_TYPE_gaduur,
						CLOTHES_TYPE_daashinz,
						CLOTHES_TYPE_busad)),
			)
		),
	);
	
	public function beforeSave($options = array()) {
		return true;
	}
}
