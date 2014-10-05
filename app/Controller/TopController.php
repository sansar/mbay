<?php
App::uses('Controller', 'Controller');

class TopController extends AppController {

	public $uses = array (
			'Good',
	);
	
	public $helpers = array('Image');

	public function index() {
		$pickup_goods = $this->Good->getPickups(10);
		$recent_goods = $this->Good->getRecents(10);
		$viewed_goods = $this->Good->getMostVieweds(10);
		$this->set('pickup_goods', $pickup_goods);
		$this->set('recent_goods', $recent_goods);
		$this->set('viewed_goods', $viewed_goods);
		$this->layout = false;
	}
}