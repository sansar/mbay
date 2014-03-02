<?php
App::uses ( 'Controller', 'Controller' );
class GoodsController extends AppController {
	
	public $uses = array (
			'Good',
			'Clothes',
			'ClothesClothes' 
	);
	
	public function mygoods() {
	}
	
	public function beforeFilter() {
		parent::beforeFilter ();
	}
	
	public function step1() {
	}
	
	public function step2($category = null) {
		
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
				$this->Session->write ( $good_token, $this->request->data );
				
				$this->set ( 'images', $this->_get_image_list ( '/server/php/files/' ) );
				$this->set ( 'data', $this->request->data );
				$this->set ( 'token', $good_token);
				$this->render ( 'confirm_' . $category );
				return;
			} else {
				$this->Session->setFlash ( __ ( 'Please, try again.' ) );
			}
		} else {
			$good_token = sha1(time() . rand(0, 10000));
		}
		$this->set ( 'token', $good_token );
		$this->render ( $view );
	}
	
	public function complete($category = null) {
		if ( ! isset($this->request->data['Good']['token']) ) {
			$this->redirect ( "/goods/step1" );
		}
		$good_token = $this->request->data['Good']['token'];
		$good_data = $this->Session->read ( $good_token );
		$good_data['Good']['secret_number'] = $good_token;
// 		$this->Session->delete ( $good_token );
		
		$user = $this->Auth->user();
		$good_data['Good']['owner'] = $user['id'];
		
		$this->Good->create();
		$this->Good->save($good_data['Good'], false);
		$saver = '_save_' . $good_data['Good']['category'];
		$this->$saver($this->Good->getID(), $good_data);
		debug ( $good_token );
		debug ( $good_data );
		exit ();
	}
	
	private function _get_image_list($basepath) {
		$dirpath = $this->request->data ['images'] ['dirpath'] . '/';
		$img_names = $this->request->data ['images'] ['img'];
		$image_list = array ();
		foreach ( $img_names as $img_name ) {
			$image_list [] = array (
					'big' => $basepath . $dirpath . $img_name,
					'medium' => $basepath . $dirpath . 'medium/' . $img_name,
					'tumb' => $basepath . $dirpath . 'thumbnail/' . $img_name 
			);
		}
		return $image_list;
	}
	
	private function _validate_101() {
		$this->ClothesClothes->set ( $this->request->data ['ClothesClothes'] );
		// debug($this->request->data['ClothesClothes']);
		return $this->ClothesClothes->validates ();
	}
	
	private function _save_101($id, $data) {
		$data ['ClothesClothes'] ['id'] = $id;
		$this->ClothesClothes->save ( $data ['ClothesClothes'], false );
	}
}