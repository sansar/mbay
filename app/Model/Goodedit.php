<?php

App::uses('AppModel', 'Model');

class Goodedit extends AppModel {
	public $userTable  = 'goodedits';
	public $primaryKey = 'id';
	
	public function getByGoodId($good_id) {
		$good = $this->find('first', array(
			'conditions' => array('good_id' => $good_id)
		));
		if (empty($good)) {
			return null;
		}
		return $good['Goodedit'];
	}
	
	public function clearEditByGoodID($good_id) {
		$this->deleteAll(array('good_id' => $good_id));
	}
	
	public function beforeSave($options = array()) {
		$this->data[$this->alias]['created'] = date("Y-m-d H:i:s");
		return true;
	}
}
