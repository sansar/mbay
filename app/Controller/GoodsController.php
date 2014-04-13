<?php

define('PER_ITEM_COUNT', 6);
App::uses ( 'Controller', 'Controller' );
class GoodsController extends AppController {
	
	var $uses = array (
			'Good',
			'Clothes',
			'ClothesClothes' 
	);
	
	var $helpers = array( 'Image' );
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('detail', 'search', 'category');
	}

	public function mygoods() {
		// TODO
	}
	
	public function search() {
		$category = isset($_GET['category']) ? $_GET['category'] : '';
		$view = "search_" . $category;
		if ( $this->_isExistingView($view)) {
			$query_string = isset($_SERVER['REDIRECT_QUERY_STRING']) ? $_SERVER['REDIRECT_QUERY_STRING'] : '';
			$this->redirect("/goods/category/$category?$query_string");
		}
		
		$options = array();
		$keywords = isset($_GET['keywords']) ? $_GET['keywords'] : '';
		if ($keywords) {
			$options['keywords'] = explode(" ", $keywords);
		}
		
		$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
		$items = $this->Good->getList(null, $start, PER_ITEM_COUNT, $options);
		$next_link = null;
		if (count($items) == PER_ITEM_COUNT) {
			$query_string = $this->_change_start($start + PER_ITEM_COUNT);
			$next_link = "/goods/search?$query_string";
		}
		if ($start > 0) {
			$view = new View($this, false);
			echo $view->element('items', array('items' => $items, 'next_link' => $next_link));
			exit;
		}
		$this->set('items', $items);
		$this->set('next_link', $next_link);
		$this->layout = false;
	}
	
	public function category($category = null) {
		$template = "search_$category";
		if ( ! $this->_isExistingView($template) ) {
			$query_string = isset($_SERVER['REDIRECT_QUERY_STRING']) ? $_SERVER['REDIRECT_QUERY_STRING'] : '';
			$this->redirect("/goods/search?$query_string");
		}
		$options = $this->_get_option($category);
		$keywords = isset($_GET['keywords']) ? $_GET['keywords'] : '';
		if ($keywords) {
			$options['keywords'] = explode(" ", $keywords);
		}
		$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
		$items = $this->Good->getList($category, $start, PER_ITEM_COUNT, $options);
		$next_link = null;
		if (count($items) == PER_ITEM_COUNT) {
			$next_link = "/goods/category/$category?" . $this->_change_start($start + PER_ITEM_COUNT);
		}
		if ($start > 0) {
			$view = new View($this, false);
			echo $view->element('items', array('items' => $items, 'next_link' => $next_link));
			exit;
		}
		
		$this->set('items', $items);
		$this->set('next_link', $next_link);
		if (isset($options['keywords'])) {
			$options['keywords'] = implode(' ', $options['keywords']);
		}
		$this->set('options', $options);
		$this->layout = false;
		$this->render($template);
	}
	
	public function detail($id = null) {
		if ($id == null) {
			$this->redirect('/');
		}
		$good = $this->Good->getById($id);
		if ($good == null) {
			$this->redirect('/');
		}
		App::import('View/Helper', 'Image');
		$this->set ( 'data', $good );
		$this->set ( 'token', $good['secret_number']);
		$this->render ( 'detail_' . $good['category'] );
	}
	
	public function step1() {
	}
	
	public function step2($category = null) {
// 		$this->layout = false;
		
		$view = "category_" . $category;
		if ( ! $this->_isExistingView( $view )) {
			$this->redirect ( "/goods/step1" );
		}

		if ($this->request->is ( 'post' )) {
			$this->Good->set ( $this->request->data ['Good'] );
			$category_validator = '_validate_' . $category;
			$validate_good = $this->Good->validates ();
			$validate_category = $this->_validate_option ($category);
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
	
	private function _validate_option ($category) {
		debug($this->request->data ['ClothesClothes']);
		switch ($category) {
			case CATEGORY_CLOTHES_CLOTHES:
				$option = $this->request->data ['ClothesClothes'];
				if ( ! isset($option['sex']) || ! $option['sex'] ) {
					$option['sex'] = '2';
				} else {
					$option['sex'] = $option['sex'][0];
				}
				$this->ClothesClothes->set ( $option );
				$this->request->data ['ClothesClothes'] = $option;
				return $this->ClothesClothes->validates ();
			case CATEGORY_CLOTHES_BOOT:
				$this->ClothesBoot->set ($this->request->data ['ClothesBoot']);
				return $this->ClothesBoot->validates();
			default:
				return false;
		}
	}
	
	private function _save_101($id, $data) {
		$data ['ClothesClothes'] ['id'] = $id;
		$this->ClothesClothes->save ( $data ['ClothesClothes'], false );
	}
	
	private function _get_option($category) {
		$option = array();
		switch ($category) {
			case CATEGORY_CLOTHES:
				return $option;
			case CATEGORY_CLOTHES_CLOTHES:
				return $this->ClothesClothes->get_option($_GET);
			case CATEGORY_CLOTHES_BOOT:
				return $option;
			case CATEGORY_CLOTHES_ACCESSORY:
				return $option;
			case CATEGORY_CLOTHES_KID:
				return $option;
			case CATEGORY_CLOTHES_OTHER:
				return $option;
			default:
				return $option;
		}
	}
	
	private function _isExistingView($view_name) {
		$view_path = APP . 'View' . DS . 'Goods' . DS . $view_name . $this->ext;
		return file_exists($view_path);
	}
	
	private function _change_start($start_value) {
		$query_string = isset($_SERVER['REDIRECT_QUERY_STRING']) ? $_SERVER['REDIRECT_QUERY_STRING'] : '';
		if ( ! isset($_GET['start']) ) {
			return $query_string . "&start=$start_value";
		}
		return preg_replace("/(.*)(start=[^&]*)(.*)/i", '${1}start=' . $start_value . '${3}', $query_string);
	}
}