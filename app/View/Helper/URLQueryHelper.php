<?php

App::uses('AppHelper', 'View/Helper');
class URLQueryHelper extends AppHelper {
 	
	public function change_parameter($name, $value) {
		$params = $_GET;
		$params[$name] = $value;
		$uri = '?';
		if (isset($_SERVER['REDIRECT_URL'])) {
			$uri = $_SERVER['REDIRECT_URL'] . '?';
		}
		return $uri . http_build_query($params);
	}
}