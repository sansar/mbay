<?php

App::uses('AppModel', 'Model');

class Clothes extends AppModel {
	
	public function beforeSave($options = array()) {
		return true;
	}
}
