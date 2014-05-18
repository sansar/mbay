<?php

App::uses('AppHelper', 'View/Helper');
class TruncateHelper extends AppHelper {
 	
	public function truncate($string, $length) {
		if (mb_strlen($string) > $length) {
			$string = mb_substr($string, 0, $length - 4, 'UTF-8') . ' ...';
		}
		return $string;
	}
}