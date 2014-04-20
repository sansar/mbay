<?php
App::uses('Controller', 'Controller');

class TopController extends AppController {

	public $uses = array (
			'Good',
			'Clothes',
			'ClothesClothes'
	);
	
	public $helpers = array('Image');

	public function index() {
		
		$clothes = $this->Good->getList(CATEGORY_CLOTHES, 0, 5);
		$this->set('clothes', $clothes);
		$this->layout = false;
	}
}