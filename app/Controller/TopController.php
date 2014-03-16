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
		$user = $this->Auth->user();
		
		$clothes = $this->Good->get(CATEGORY_CLOTHES, 0, 5);
		$this->set('clothes', $clothes);
		$this->set('user', $user);
		$this->layout = false;
		$this->render('top1');
	}
}