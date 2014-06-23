<?php

define("ACCESSORY_TYPE_shil",         '0');
define("ACCESSORY_TYPE_malgai",       '1');
define("ACCESSORY_TYPE_tsunh",        '2');
define("ACCESSORY_TYPE_bus",          '3');
define("ACCESSORY_TYPE_turiivch",     '4');
define("ACCESSORY_TYPE_zangia",       '5');
define("ACCESSORY_TYPE_beelii",       '6');
define("ACCESSORY_TYPE_tsag",         '7');
define("ACCESSORY_TYPE_busad",        '8');

define("ACCESSORY_SEX_MALE",     '0');
define("ACCESSORY_SEX_FEMALE",   '1');
define("ACCESSORY_SEX_BOTH",     '2');

App::uses('AppModel', 'Model');

class ClothesAccessory extends AppModel {
	
	public $userTable  = 'clothes_accessories';
	public $primaryKey = 'id';

	public $validate = array(
		'sex' => array(
			'inList' => array(
				'rule' => array('inList', array(
						ACCESSORY_SEX_MALE,
						ACCESSORY_SEX_FEMALE,
						ACCESSORY_SEX_BOTH)),
			)
		),
		'type' => array(
			'inList' => array(
				'rule' => array('inList', array(
						ACCESSORY_TYPE_shil,
						ACCESSORY_TYPE_malgai,
						ACCESSORY_TYPE_tsunh,
						ACCESSORY_TYPE_bus,
						ACCESSORY_TYPE_turiivch,
						ACCESSORY_TYPE_zangia,
						ACCESSORY_TYPE_beelii,
						ACCESSORY_TYPE_tsag,
						ACCESSORY_TYPE_busad,
				)),
			)
		),
	);
	
	public function get_option($parameters) {
		$option = array();
		if ( isset($parameters['sex']) && is_array($parameters['sex'])) {
			$option['sex'] = array();
			foreach ($parameters['sex'] as $val) {
				switch ($val) {
					case BOOT_SEX_MALE:
						$option['sex'][] = BOOT_SEX_MALE;
						$option['sex'][] = BOOT_SEX_BOTH;
						break;
					case BOOT_SEX_FEMALE:
						$option['sex'][] = BOOT_SEX_FEMALE;
						$option['sex'][] = BOOT_SEX_BOTH;
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
					case ACCESSORY_TYPE_shil:
						$option['type'][] = ACCESSORY_TYPE_shil;
						break;
					case ACCESSORY_TYPE_malgai:
						$option['type'][] = ACCESSORY_TYPE_malgai;
						break;
					case ACCESSORY_TYPE_tsunh:
						$option['type'][] = ACCESSORY_TYPE_tsunh;
						break;
					case ACCESSORY_TYPE_bus:
						$option['type'][] = ACCESSORY_TYPE_bus;
						break;
					case ACCESSORY_TYPE_turiivch:
						$option['type'][] = ACCESSORY_TYPE_turiivch;
						break;
					case ACCESSORY_TYPE_zangia:
						$option['type'][] = ACCESSORY_TYPE_zangia;
						break;
					case ACCESSORY_TYPE_beelii:
						$option['type'][] = ACCESSORY_TYPE_beelii;
						break;
					case ACCESSORY_TYPE_tsag:
						$option['type'][] = ACCESSORY_TYPE_tsag;
						break;
					case ACCESSORY_TYPE_busad:
						$option['type'][] = ACCESSORY_TYPE_busad;
						break;
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
