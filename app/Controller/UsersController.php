<?php

App::uses ( 'Controller', 'Controller' );

class UsersController extends AppController {
	
	public $uses = array (
			'User'
	);
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'add', 'opauth_complete');
	}
	
	public function opauth_complete() {
		if (isset ( $this->data ['error'] )) {
			debug ( "error" );
			return;
		}
		
		$facebook_id = $this->data ['auth'] ['uid'];
		$user = $this->User->find ( 'first', array (
				'conditions' => array (
						'facebook_id' => $facebook_id 
				) 
		) );
		if (empty ( $user )) {
			$user = $this->User->register_by_facebook ( $this->data ['auth'] );
		}
		// TODO set to session
		$this->Auth->setUser2Session($user['User']);
		return $this->redirect ( $this->Auth->redirect () );
	}
	
	public function login() {
		
		if ($this->request->is ( 'post' )) {
			if ($this->Auth->login ()) {
				return $this->redirect ( $this->Auth->redirect () );
			} else {
				$this->Session->setFlash ( __ ( 'Username or password is incorrect' ), 'default', array (), 'auth' );
			}
		} else {
			if ($this->Auth->loggedIn()) {
				return $this->redirect ( $this->Auth->redirect () );
			}
		}
	}
	
	public function logout($id = null) {
		$this->redirect ( $this->Auth->logout () );
	}
	
	public function add() {
		if($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('controller' => 'top', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}
}