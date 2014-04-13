<?php

define("CLOTHES_TYPE_hoslol",     0);
define("CLOTHES_TYPE_umd",        1);
define("CLOTHES_TYPE_tsamts",     2);
define("CLOTHES_TYPE_gaduur",     3);
define("CLOTHES_TYPE_daashinz",   4);
define("CLOTHES_TYPE_busad",      5);

define("CLOTHES_SEX_MALE",     0);
define("CLOTHES_SEX_FEMALE",   1);
define("CLOTHES_SEX_BOTH",     2);

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
	
	public function get_option($parameters) {
		$option = array();
		if ( isset($parameters['sex']) && is_array($parameters['sex'])) {
			$option['sex'] = array();
			foreach ($parameters['sex'] as $val) {
				switch ($val) {
					case CLOTHES_SEX_MALE:
						$option['sex'][] = CLOTHES_SEX_MALE;
						$option['sex'][] = CLOTHES_SEX_BOTH;
						break;
					case CLOTHES_SEX_FEMALE:
						$option['sex'][] = CLOTHES_SEX_FEMALE;
						$option['sex'][] = CLOTHES_SEX_BOTH;
				}
			}
			if (empty($option['sex'])) {
				unset($option['sex']);
			}
		}
		if ( isset($parameters['type']) && is_array($parameters['type'])) {
			$option['type'] = array();
			foreach ($parameters['type'] as $val) {
				switch ($val) {
					case CLOTHES_TYPE_hoslol:
						$option['type'][] = CLOTHES_TYPE_hoslol;
						break;
					case CLOTHES_TYPE_tsamts:
						$option['type'][] = CLOTHES_TYPE_tsamts;
						break;
					case CLOTHES_TYPE_umd:
						$option['type'][] = CLOTHES_TYPE_umd;
						break;
					case CLOTHES_TYPE_gaduur:
						$option['type'][] = CLOTHES_TYPE_gaduur;
						break;
					case CLOTHES_TYPE_daashinz:
						$option['type'][] = CLOTHES_TYPE_daashinz;
						break;
					case CLOTHES_TYPE_busad:
						$option['type'][] = CLOTHES_TYPE_busad;
				}
			}
			if (empty($option['type'])) {
				unset($option['type']);
			}
		}
		return $option;
	}
	
	public function beforeSave($options = array()) {
		return true;
	}
}
