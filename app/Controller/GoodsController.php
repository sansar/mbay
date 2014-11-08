<?php

define('PER_ITEM_COUNT', 5);

App::uses ( 'Controller', 'Controller' );
class GoodsController extends AppController {
	
	var $uses = array (
			'Favorite',
			'Good',
			'Goodedit',
			'Clothes',
			'ClothesClothes',
			'ClothesBoot',
			'ClothesAccessory'
	);
	
	var $helpers = array( 'Image', 'URLQuery' );
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('detail', 'search', 'category');
	}

	public function mygoods() {
		$user = $this->Auth->user();
		if ( ! $user ) {
			$this->redirect('/');
		}
		$item_count = $this->Good->getItemCountByOwner($user['id']);
		$page_count = ceil($item_count / PER_ITEM_COUNT);
		$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
		if ($current_page < 1 || $current_page > $page_count) {
			$current_page = 1;
		}
		$items = $this->Good->getListByOwner($user['id'], ($current_page - 1) * PER_ITEM_COUNT, PER_ITEM_COUNT);
		$this->set('items', $items);
		$this->set('item_count', $item_count);
		$this->set('page_count', $page_count);
		$this->set('item_per_page', PER_ITEM_COUNT);
		$this->set('current_page', $current_page);
		$this->set('page_url', '/goods/mygoods');
		$this->layout = false;
	}
	
	public function favorites() {
		$user = $this->Auth->user();
		if ( ! $user ) {
			$this->redirect('/');
		}
		$item_count = $this->Favorite->getFavoriteCount($user['id']);
		$page_count = ceil($item_count / PER_ITEM_COUNT);
		$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
		if ($current_page < 1 || $current_page > $page_count) {
			$current_page = 1;
		}
		$items = $this->Favorite->getList($user['id'], ($current_page - 1) * PER_ITEM_COUNT, PER_ITEM_COUNT);
		// TODO
		debug($items);exit;
		$this->set('items', $items);
		$this->set('item_count', $item_count);
		$this->set('item_per_page', PER_ITEM_COUNT);
		$this->set('current_page', $current_page);
		$this->set('page_url', '/goods/favorites');
		$this->layout = false;
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
		$sort = isset($_GET['sort']) ? $_GET['sort'] : SORT_DATE_DOWN;
		$items = $this->Good->getList(null, $start, PER_ITEM_COUNT, $options, $sort);
		$item_start = null;
		if (count($items) == PER_ITEM_COUNT) {
			$item_start = $start;
		}
		if ($start > 0) {
			$view = new View($this, false);
			echo $view->element('items', array('items' => $items, 'item_start' => $item_start));
			exit;
		}
		$this->set('items', $items);
		$this->set('item_start', $item_start);
		$this->layout = false;
	}
	
	public function category($category = null) {
		$template = "search_" . $category;
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
		$sort = isset($_GET['sort']) ? $_GET['sort'] : SORT_DATE_DOWN;
		$items = $this->Good->getList($category, $start, PER_ITEM_COUNT, $options, $sort);
		$item_start = null;
		if (count($items) == PER_ITEM_COUNT) {
			$item_start = $start;
		}
		if ($start > 0) {
			$view = new View($this, false);
			echo $view->element('items', array('items' => $items, 'item_start' => $item_start));
			exit;
		}
		
		$this->set('category', $category);
		$this->set('items', $items);
		$this->set('item_start', $item_start);
		if (isset($options['keywords'])) {
			$options['keywords'] = implode(' ', $options['keywords']);
		}
		$this->set('options', $options);
		$this->layout = false;
		$this->render($template);
	}
	
	public function detail($id = null) {
		if ( ! $id ) {
			$this->redirect('/');
		}
		$good = $this->Good->getById($id);
		if ( ! $good ) {
			$this->redirect('/');
		}
		$this->Good->addViewCount($good, $this->Auth->user());
		$seen_item_ids = $this->Session->read('seen');
		if ( null == $seen_item_ids ) {
			$seen_item_ids = array();
		}
		$seen_items = $this->Good->getByIDs($seen_item_ids, $id, 5);
		$user = $this->Auth->user();
		if ( ! $user || $user['id'] != $good['owner'] ) {
			foreach ($seen_item_ids as $key => $val) {
				if ($val == $id) {
					unset($seen_item_ids[$key]);
					break;
				}
			}
			array_unshift($seen_item_ids, $id);
			$this->Session->write('seen', $seen_item_ids);
		}
		$this->set ( 'data', $good );
		$this->set ( 'token', $good['token'] );
		$this->set ( 'seen_items', $seen_items );
		$this->layout = false;
		$this->render ( 'detail_' . $good['category'] );
	}
	
	public function edit($item_id = null) {
		if ($item_id == null) {
			$this->redirect('/');
		}
		$good = $this->Good->getById($item_id);
		$user = $this->Auth->user();
		if ($good['owner'] != $user['id']) {
			$this->redirect('/');
		}
		
		if ($this->request->is('post')) {
			$this->request->data['Good']['category'] = $good['category'];
			$this->Good->set ( $this->request->data ['Good'] );
			$validate_good = $this->Good->validates ();
			$validate_category = $this->_validate_option ($good['category']);
			$good_token = $this->request->data['images']['dirpath'];
			if ($validate_good && $validate_category && $good_token) {
				$this->layout = false;
				$this->request->data['Good']['good_id'] = $good['id'];
				$this->Session->write ( 'good_info', $this->request->data );
				$this->set ( 'data', $this->request->data );
				$this->set ( 'token', $good_token);
				$this->render ( 'confirm_' . $good['category'] );
			} else {
				$this->set('good', $good);
				$this->set('token', $good_token);
				$this->render('edit_' . $good['category']);
				$this->Session->setFlash ( __ ( 'Please, try again.' ) );
			}
			return;
		}
		
		$goodedit = $this->Goodedit->find('first', array('conditions' => array('id' => $item_id)));
		if (empty($goodedit)) {
			$good_token = sha1(time() . rand(0, 10000));
			$image_dir = getcwd () . '/server/php/files/';
			$this->_recurse_copy($image_dir . $good['token'], $image_dir . $good_token);
		} else {
			$good_token = $goodedit['Goodedit']['token'];
		}
		$this->set('good', $good);
		$this->set('token', $good_token);
		$this->render('edit_' . $good['category']);
	}
	
	public function step1() {
	}
	
	public function step2($category = null) {
		$view = "create_" . $category;
		if ( ! $this->_isExistingView( $view )) {
			$this->redirect ( "/goods/step1" );
		}

		if ($this->request->is ( 'post' )) {
			$this->request->data['Good']['category'] = $category;
			$this->Good->set ( $this->request->data ['Good'] );
			$validate_good = $this->Good->validates ();
			$validate_category = $this->_validate_option ($category);
			$good_token = $this->request->data['images']['dirpath'];
			if ($validate_good && $validate_category && $good_token) {
				$this->layout = false;
				$this->Session->write ( 'good_info', $this->request->data );
				debug($this->request->data);
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
	
	public function complete() {
		if ( ! isset($this->request->data['Good']['token']) ) {
			$this->redirect ( "/goods/step1" );
		}
		$good_data = $this->Session->read ( 'good_info' );
		$good_data['Good']['token'] = $good_data['images']['dirpath'];
		if ( ! isset($good_data['Good']['real_price']) ) {
			$good_data['Good']['real_price'] = $good_data['Good']['price'];
		}
		if ( is_array($good_data['Good']['pickup_flag'])) {
			$good_data['Good']['pickup_flag'] = PICKUP_ON;
		} else {
			unset($good_data['Good']['pickup_flag']);
		}
		
		$user = $this->Auth->user();
		$good_data['Good']['owner'] = $user['id'];
		
		if (isset($good_data['Good']['good_id'])) {
			$good = $this->Good->find('first', array('conditions' => array('id' => $good_data['Good']['good_id'])));
			if ($good['Good']['status'] == STATUS_CREATED) {
				$good_data['Good']['id'] = $good_data['Good']['good_id'];
				$this->Good->save($good_data['Good'], false);
				$this->_save_option($good_data['Good']['category'], $good_data['Good']['id'], $good_data);
			} else {
				$this->Goodedit->create();
				$good_data['Good']['id'] = $good_data['Good']['good_id'];
				$good_data['Good']['options'] = json_encode($this->_detect_option($good_data['Good']['category'], $good_data));
				$this->Goodedit->save($good_data['Good'], false);
			}
		} else {
			$this->Good->create();
			$this->Good->save($good_data['Good'], false);
			$this->_save_option($good_data['Good']['category'], $this->Good->getID(), $good_data);
		}
		
		$this->Session->delete ( 'good_info' );
		
		debug ( $good_data );
		exit;
	}
	
	public function createdlist() {
		$user = $this->Auth->user();
		if ($user['role'] != ROLE_ADMIN) {
			$this->redirect('/');
		}
		$item_count = $this->Good->getItemCountByStatus(STATUS_CREATED);
		$page_count = ceil($item_count / PER_ITEM_COUNT);
		$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
		if ($current_page < 1 || $current_page > $page_count) {
			$current_page = 1;
		}
		$items = $this->Good->getListByStatus(STATUS_CREATED, ($current_page - 1) * PER_ITEM_COUNT, PER_ITEM_COUNT);
		$this->set('items', $items);
		$this->set('item_count', $item_count);
		$this->set('page_count', $page_count);
		$this->set('item_per_page', PER_ITEM_COUNT);
		$this->set('current_page', $current_page);
		$this->set('page_url', '/goods/newCreated');
		$this->layout = false;
	}
	
	public function publish($item_id = null) {
		$start_date = strtotime($_POST['publish_from']);
		$end_date = strtotime($_POST['publish_to']);
		if ( ! $start_date || ! $end_date ) {
			$this->redirect('/');
		}
		if ($this->Good->publish($item_id, $start_date, $end_date)) {
			$this->redirect('/goods/detail/' . $item_id);
		} else {
			$this->redirect('/');
		}
	}
	
	private function _validate_option ($category) {
		switch ($category) {
			case CATEGORY_CLOTHES_CLOTHES:
				$option = $this->request->data ['ClothesClothes'];
				$this->ClothesClothes->set ( $option );
				if ( ! isset($option['sex']) || ! $option['sex'] || count($option['sex'] > 1)) {
					$option['sex'] = CLOTHES_SEX_BOTH;
				} else {
					$option['sex'] = $option['sex'][0];
				}
				$this->ClothesClothes->set ( $option );
				$this->request->data ['ClothesClothes'] = $option;
				return $this->ClothesClothes->validates ();
			case CATEGORY_CLOTHES_BOOT:
				$option = $this->request->data ['ClothesBoot'];
				$this->ClothesBoot->set ( $option );
				if ( ! isset($option['sex']) || ! $option['sex'] || count($option['sex'] > 1)) {
					$option['sex'] = BOOT_SEX_BOTH;
				} else {
					$option['sex'] = $option['sex'][0];
				}
				$this->ClothesBoot->set ( $option );
				$this->request->data ['ClothesBoot'] = $option;
				return $this->ClothesBoot->validates ();
			case CATEGORY_CLOTHES_ACCESSORY:
				$option = $this->request->data['ClothesAccessory'];
				$this->ClothesAccessory->set( $option );
				if ( ! isset($option['sex']) || ! $option['sex'] || count($option['sex'] > 1)) {
					$option['sex'] = ACCESSORY_SEX_BOTH;
				} else {
					$option['sex'] = $option['sex'][0];
				}
				$this->ClothesAccessory->set($option);
				return $this->ClothesAccessory->validates();
			default:
				return false;
		}
	}
	
	private function _save_option($category, $id, $data) {
		switch ($category) {
		case CATEGORY_CLOTHES_CLOTHES:
			$data ['ClothesClothes'] ['id'] = $id;
			$this->ClothesClothes->save ( $data ['ClothesClothes'], false );
			break;
		case CATEGORY_CLOTHES_BOOT:
			$data ['ClothesBoot'] ['id'] = $id;
			$this->ClothesBoot->save ( $data ['ClothesBoot'], false );
			break;
		}
	}
	
	private function _detect_option($category, $data) {
		switch ($category) {
		case CATEGORY_CLOTHES_CLOTHES:
			return array('ClothesClothes' => $data['ClothesClothes']);
		case CATEGORY_CLOTHES_BOOT:
			return array('ClothesBoot' => $data['ClothesBoot']);
		}
	}
	
	private function _get_option($category) {
		$option = array();
		switch ($category) {
			case CATEGORY_CLOTHES:
				return $option;
			case CATEGORY_CLOTHES_CLOTHES:
				return $this->ClothesClothes->get_option($_GET);
			case CATEGORY_CLOTHES_BOOT:
				return $this->ClothesBoot->get_option($_GET);
			case CATEGORY_CLOTHES_ACCESSORY:
				return $this->ClothesAccessory->get_option($_GET);
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
	
	private function _recurse_copy ($src, $dst) {
		if ( ! is_dir($src) ) {
			return;
		}
		$dir = opendir($src);
		@mkdir($dst);
		while(false !== ( $file = readdir($dir)) ) {
			if (( $file != '.' ) && ( $file != '..' )) {
				if ( is_dir($src . '/' . $file) ) {
					$this->_recurse_copy($src . '/' . $file,$dst . '/' . $file);
				} else {
					copy($src . '/' . $file,$dst . '/' . $file);
				}
			}
		}
		closedir($dir);
	}
}