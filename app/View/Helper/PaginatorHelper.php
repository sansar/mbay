<?php

App::uses('AppHelper', 'View/Helper');
class PaginatorHelper extends AppHelper {
 	
	public function build_page($page_num, $current_page, $page_count, $page_url) {
		$page_string = $page_num;
		if ($page_num == 1) {
			$page_string = 'Эхлэл';
		} else if ($page_num == $page_count) {
			$page_string = 'Төгсгөл';
		}
		if ($page_num == $current_page) {
			echo "<span class='page active'>$page_string</span>";
		} else {
			echo "<a href='{$page_url}?page=$page_num' class='page'>$page_string</a>";
		}
	}
}