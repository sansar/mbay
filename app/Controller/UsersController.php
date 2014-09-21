<?php

App::uses ( 'Controller', 'Controller' );
App::uses( 'CakeEmail', 'Network/Email');

class UsersController extends AppController {
	
	public $uses = array (
			'User'
	);
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'register', 'opauth_complete', 'password_set', 'password_reset');
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
		$this->Auth->setUser2Session($user['User']);
		return $this->redirect ('/');
	}

	public function register() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->register($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->render('register_done');
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}
	
	public function password_set($code = null) {
		if ( ! $code ) {
			$this->redirect('/');
		}
		$this->set('code', $code);
		$user = $this->User->find ( 'first', array (
				'conditions' => array (
						'password_reset' => $code
				) 
		) );
		if ( ! $user) {
			$this->redirect('/');
		}
		
		if ($this->request->is ('post')) {
			$user['User']['password'] = $this->request->data['User']['password'];
			$user['User']['password_confirm'] = $this->request->data['User']['password_confirm'];
			$user['User']['password_reset'] = null;
			if ($this->User->save($user)) {
				$this->render('password_set_done');
				$this->Session->setFlash('Нууц үгийг амжилттай тохирууллаа.');
			} else {
				$this->Session->setFlash('Нууц үгийг тохируулж чадсангүй.');
			}
		}
	}
	
	public function login() {
		if ($this->request->is ( 'post' )) {
			if ($this->Auth->login ()) {
				echo 'Correct';
				exit;
				return $this->redirect ('/users/loggedIn');
			} else {
				$this->Session->setFlash ( __ ( 'Username or password is incorrect' ), 'default', array (), 'auth' );
			}
		} else {
			if ($this->Auth->loggedIn()) {
				return $this->redirect( $this->Auth->redirect () );
			}
		}
	}
	
	public function loggedIn() {
		$this->layout = false;
	}
	
	public function logout($id = null) {
		$this->redirect ( $this->Auth->logout () );
	}
	
	public function password_reset() {
		if ($this->request->is( 'post' )) {
			$email = $this->request->data['User']['email'];
			$result = $this->User->passwordReset($email);
			if ($result === true) {
				$this->render('password_reset_done');
				$this->Session->setFlash('Мэйл хаягаа шалган, нууц үгээ шинээр тохируулна уу.');
			} else {
				$this->Session->setFlash($result);
			}
		}
	}
	
	public function settings() {
		if ( ! $this->Auth->loggedIn()) {
			$this->redirect('/');
		}
	}
}