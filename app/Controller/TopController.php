<?php
App::uses('Controller', 'Controller');

class TopController extends AppController {
	
	public function index() {
		$user = $this->Auth->user();
		debug($user);
		$this->set('user', $user);
	}
}