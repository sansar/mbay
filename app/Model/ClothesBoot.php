<?php

define("BOOT_TYPE_puuz",          '0');
define("BOOT_TYPE_uvliin",        '1');
define("BOOT_TYPE_sandal",        '2');
define("BOOT_TYPE_botink",        '3');
define("BOOT_TYPE_tufli",         '4');
define("BOOT_TYPE_turiitei",      '5');
define("BOOT_TYPE_usgiigui",      '6');
define("BOOT_TYPE_busad",         '7');

define("BOOT_SEX_MALE",     '0');
define("BOOT_SEX_FEMALE",   '1');
define("BOOT_SEX_BOTH",     '2');

App::uses('AppModel', 'Model');

class ClothesBoot extends AppModel {
	
	public $userTable  = 'clothes_boots';
	public $primaryKey = 'id';

	public $validate = array(
		'sex' => array(
			'inList' => array(
				'rule' => array('inList', array(
						BOOT_SEX_MALE,
						BOOT_SEX_FEMALE,
						BOOT_SEX_BOTH)),
			)
		),
		'type' => array(
			'inList' => array(
				'rule' => array('inList', array(
						BOOT_TYPE_puuz,
						BOOT_TYPE_uvliin,
						BOOT_TYPE_sandal,
						BOOT_TYPE_botink,
						BOOT_TYPE_tufli,
						BOOT_TYPE_turiitei,
						BOOT_TYPE_usgiigui,
						BOOT_TYPE_busad,
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
					case BOOT_TYPE_puuz:
						$option['type'][] = BOOT_TYPE_puuz;
						break;
					case BOOT_TYPE_uvliin:
						$option['type'][] = BOOT_TYPE_uvliin;
						break;
					case BOOT_TYPE_sandal:
						$option['type'][] = BOOT_TYPE_sandal;
						break;
					case BOOT_TYPE_botink:
						$option['type'][] = BOOT_TYPE_botink;
						break;
					case BOOT_TYPE_tufli:
						$option['type'][] = BOOT_TYPE_tufli;
						break;
					case BOOT_TYPE_turiitei:
						$option['type'][] = BOOT_TYPE_turiitei;
						break;
					case BOOT_TYPE_usgiigui:
						$option['type'][] = BOOT_TYPE_usgiigui;
						break;
					case BOOT_TYPE_busad:
						$option['type'][] = BOOT_TYPE_busad;
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
