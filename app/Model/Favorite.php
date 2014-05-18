<?php

App::uses('AppModel', 'Model');

class Favorite extends AppModel {

	public $userTable  = 'favorites';
	public $primaryKey = 'id';

	public function getFavoriteCount($user_id) {
		$sql = "SELECT COUNT(*) AS count FROM favorites WHERE user = ?";
		$result = $this->getDataSource()->fetchAll($sql, array($user_id));
		return $result[0][0]['count'];
	}

	public function getList($owner_id, $start = 0, $count = 20) {
		$sql = "SELECT
					goods.id,
					goods.overview,
					goods.price,
					goods.pickup_flag,
					goods.sale,
					goods.sale_price,
					goods.secret_number,
					goods.status,
					goods.view_count,
					goods.created
				FROM
					favorites left join goods on favorites.good = goods.id
				WHERE
					favorites.user = ?
				ORDER BY created DESC LIMIT {$start}, {$count}";
		return $this->getDataSource()->fetchAll($sql, array($owner_id));
	}

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['created'] = date("Y-m-d H:i:s");
		return true;
	}
}