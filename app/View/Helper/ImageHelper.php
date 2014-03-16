<?php

App::uses('AppHelper', 'View/Helper');
class ImageHelper extends AppHelper {
 	
	public function get_images($dirpath) {
		$images = array();
		$dir = 'server/php/files/' . $dirpath . '/';
		if ( ! is_dir($dir) ) {
			$images[] = array(
				'big'    => '/img/noimage.gif',
				'medium' => '/img/noimage.gif',
				'tumb'   => '/img/noimage.gif' 
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
				'big'    => '/img/noimage.gif',
				'medium' => '/img/noimage.gif',
				'tumb'   => '/img/noimage.gif' 
			);
		}
		return $images;
	}
}