<?php
App::uses ( 'Controller', 'Controller' );
class GoodsController extends AppController {
	
	var $uses = array (
			'Good',
			'Clothes',
			'ClothesClothes' 
	);
	
	var $helpers = array( 'Image' );
	
	public function mygoods() {
		// TODO
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('detail');
	}
	
	public function detail($id = null) {
		if ($id == null) {
			$this->redirect('/');
		}
		$good = $this->Good->getGood($id);
		if ($good == null) {
			$this->redirect('/');
		}
		App::import('View/Helper', 'Image');
		$this->set ( 'data', $good );
		$this->set ( 'token', $good['secret_number']);
		$this->render ( 'detail_' . $good['category'] );
		return;
	}
	
	public function step1() {
	}
	
	public function step2($category = null) {
// 		$this->layout = false;
		
		$view = "category_" . $category;
		$view_path = APP . 'View' . DS . 'Goods' . DS . $view . $this->ext;
		if (! file_exists ( $view_path )) {
			$this->redirect ( "/goods/step1" );
		}

		if ($this->request->is ( 'post' )) {
			$this->Good->set ( $this->request->data ['Good'] );
			$category_validator = '_validate_' . $category;
			$validate_good = $this->Good->validates ();
			$validate_category = $this->$category_validator ();
			$good_token = $this->request->data['images']['dirpath'];
			if ($validate_good && $validate_category && $good_token) {
				$this->Session->write ( 'good_info', $this->request->data );
				
				$this->set ( 'data', $this->request->data );
				$this->set ( 'token', $good_token);
				$this->render ( 'confirm_' . $category );
				return;
			} else {
				$this->Session->setFlash ( __ ( 'Please, try again.' ) );
			}
		} else {
			$good_data = $this->Session->read ( 'good_info' );
			if ($good_data) {
				$good_token = $good_data['images']['dirpath'];
			} else {
				$good_token = sha1(time() . rand(0, 10000));
			}
		}
		debug($good_token);
		$this->set ( 'token', $good_token );
		$this->render ( $view );
	}
	
	public function complete($category = null) {
		if ( ! isset($this->request->data['Good']['token']) ) {
			$this->redirect ( "/goods/step1" );
		}
		$good_data = $this->Session->read ( 'good_info' );
		$good_data['Good']['secret_number'] = $good_data['images']['dirpath'];
		$this->Session->delete ( 'good_info' );
		
		$user = $this->Auth->user();
		$good_data['Good']['owner'] = $user['id'];
		
		$this->Good->create();
		$this->Good->save($good_data['Good'], false);
		$saver = '_save_' . $good_data['Good']['category'];
		$this->$saver($this->Good->getID(), $good_data);
		debug ( $good_data );
		exit ();
	}
	
	private function _validate_101() {
		$this->ClothesClothes->set ( $this->request->data ['ClothesClothes'] );
		return $this->ClothesClothes->validates ();
	}
	
	private function _save_101($id, $data) {
		$data ['ClothesClothes'] ['id'] = $id;
		$this->ClothesClothes->save ( $data ['ClothesClothes'], false );
	}
}