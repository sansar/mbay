<?php
App::uses('Controller', 'Controller');

class TopController extends AppController {

	public $uses = array (
			'Good',
			'Clothes',
			'ClothesClothes'
	);

	public function index() {
		$user = $this->Auth->user();
		
		$clothes = $this->Good->get(CATEGORY_CLOTHES_CLOTHES, 0, 5);
		foreach ($clothes as $key => $cloth) {
			$dir = 'server/php/files/' . $cloth['goods']['secret_number'] . '/medium/';
			if ( ! is_dir($dir) ) {
				$clothes[$key]['image'][] = '/img/noimage.gif';
				continue;
			}
			$res_dir = opendir( $dir );
			while( $file_name = readdir( $res_dir ) ){
				$file_name = $dir . $file_name;
				if ( is_dir($file_name) ) {
					continue;
				}
				$clothes[$key]['image'][] = $file_name;
			}
			if ( ! isset($clothes[$key]['image']) ) {
				$clothes[$key]['image'][] = '/img/noimage.gif';
			}
		}
		$this->set('clothes', $clothes);
		$this->set('user', $user);
		$this->layout = false;
		$this->render('top1');
	}
}