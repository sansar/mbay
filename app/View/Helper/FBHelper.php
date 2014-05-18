<?php

App::uses('AppHelper', 'View/Helper');
class FBHelper extends AppHelper {
 	
	public function createItemLike($item_id) {
		$url = "http://{$_SERVER['HTTP_HOST']}/goods/detail/{$item_id}";
		$url = urlencode($url);
		$code = '<iframe src="//www.facebook.com/plugins/like.php?href=' . $url . '%2F&amp;width=200&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=35&amp;appId=772387386121258" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:400px; height:35px;" allowTransparency="true"></iframe>';
		return $code;
	}
	
	public function createCommentBox($item_id) {
		$url = "http://{$_SERVER['HTTP_HOST']}/goods/detail/{$item_id}";
		$code = '<div class="fb-comments" data-href="' . $url . '" data-width="800" data-numposts="5" data-colorscheme="light"></div>';
		return $code;
	}
}