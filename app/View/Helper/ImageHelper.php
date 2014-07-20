<?php

define('IMAGE_DIR', 'server/php/files/');
define('NO_IMAGE_PATH', '/img/noimage.gif');

App::uses('AppHelper', 'View/Helper');
class ImageHelper extends AppHelper {
 	
	public function get_images($dirpath) {
		$images = array();
		$dir = IMAGE_DIR . $dirpath . '/';
		if ( ! is_dir($dir) ) {
			$images[] = array(
				'big'    => NO_IMAGE_PATH,
				'medium' => NO_IMAGE_PATH,
				'tumb'   => NO_IMAGE_PATH 
			);
			return $images;
		}
		$res_dir = opendir( $dir );
		while( $file_name = readdir( $res_dir ) ){
			if ( is_dir($dir . $file_name) ) {
				continue;
			}
			$images[] = array (
					'big' =>  '/'. $dir . $file_name,
					'medium' => '/'. $dir . 'medium/' . $file_name,
					'tumb' => '/'. $dir . 'thumbnail/' . $file_name 
			);
		}
		if ( empty($images) ) {
			$images[] = array(
				'big'    => NO_IMAGE_PATH,
				'medium' => NO_IMAGE_PATH,
				'tumb'   => NO_IMAGE_PATH 
			);
		}
		return $images;
	}
}