<?php

App::uses('AppModel', 'Model');

class Good extends AppModel {
	public $userTable  = 'goods';
	public $primaryKey = 'id';
	
	public static $category_table = array(
			CATEGORY_CLOTHES_CLOTHES   => 'clothes_clothes',
			CATEGORY_CLOTHES_BOOT      => 'clothes_boots',
			CATEGORY_CLOTHES_ACCESSORY => 'clothes_accessories',
			CATEGORY_CLOTHES_KID       => 'clothes_kids',
			CATEGORY_CLOTHES_OTHER     => 'clothes_others',
			CATEGORY_MONGOLIAN_ART     => 'clothes_arts',
	);
	
	public $validate = array(
		'category' => array(
			'notEmpty' => array(
				'required' => true,
				'rule' => 'notEmpty'
			),
		),
		'overview' => array(
			'notEmpty' => array(
				'required' => true,
				'rule' => 'notEmpty'
			),
			'maxLength' => array(
				'required' => true,
				'rule' => array('maxLength', 100)
			)
		),
		'detail' => array(
			'notEmpty' => array(
				'required' => true,
				'rule' => 'notEmpty'
			),
			'minLength' => array(
				'required' => true,
				'rule' => array('minLength', 10)
			)
		),
		'cond' => array(
			'inList' => array(
				'rule' => array('inList', array(
						CONDITION_1,
						CONDITION_2,
						CONDITION_3,
						CONDITION_4,
						CONDITION_5)),
				'allowEmpty' => false
			)
		),
		'price' => array(
			'number' => array(
				'rule' => array('range', 999, PHP_INT_MAX)
			),
		),
		'quantity' => array(
			'number' => array(
				'rule' => array('range', 0, PHP_INT_MAX)
			)
		),
	);
	
	/**
	 * get only CONFIRMED GOODS
	 * @param unknown $category
	 * @param unknown $start
	 * @param unknown $count
	 * @param unknown $options
	 */
	public function getList($category, $start = 0, $count = 20, $options = array(), $sort = SORT_DATE_DOWN) {
		$where = array("status = ?");
		$parameters = array(STATUS_PUBLISHED);
		$sql = "SELECT
					goods.id,
					overview,
					price,
					real_price,
					pickup_flag,
					token,
					status
				FROM
					goods ";
		
		if (isset(self::$category_table[$category])) {
			$sql .= "left join " . self::$category_table[$category] . " as op on goods.id = op.id ";
		}
		if ($category) {
			$where[] = "category like ?";
			$parameters[] = "$category%";
		}
		if (isset($options['keywords'])) {
			foreach ($options['keywords'] as $keyword) {
				// TODO keyword bolgoj oorchloh
				$where[] = "(overview like ? OR detail like ?)";
				$parameters[] = "%$keyword%";
				$parameters[] = "%$keyword%";
			}
			unset($options['keywords']);
		}
		foreach ($options as $key => $value) {
			$replacer = array();
			foreach ($value as $val) {
				$replacer[] = '?';
				$parameters[] = $val;
			}
			$where[] = "$key in (" . implode(',', $replacer) . ") ";
		}
		if (count($where) > 0) {
			$sql .= "WHERE " . implode(" AND ", $where);
		}
		switch ($sort) {
			case SORT_PRICE_DOWN:
				$sql .= " ORDER BY price DESC";
				break;
			case SORT_PRICE_UP:
				$sql .= " ORDER BY price ASC";
				break;
			case SORT_VIEW_DOWN:
				$sql .= " ORDER BY viewed DESC";
				break;
			case SORT_VIEW_UP:
				$sql .= " ORDER BY viewed ASC";
				break;
			case SORT_DATE_UP:
				$sql .= " ORDER BY created ASC";
				break;
			default:
				$sql .= " ORDER BY created DESC";
				break;
		}
		$sql .= " LIMIT {$start}, {$count}";
		return $this->getDataSource()->fetchAll($sql, $parameters);
	}
	
	public function getListByOwner($owner_id, $start = 0, $count = 20) {
		$sql = "SELECT
					id,
					overview,
					price,
					real_price,
					pickup_flag,
					token,
					status,
					viewed,
					created
				FROM
					goods
				WHERE
					owner = ?
				ORDER BY created DESC LIMIT {$start}, {$count}";
		return $this->getDataSource()->fetchAll($sql, array($owner_id));
	}
	
	public function getListByStatus($status, $start = 0, $count = 20) {
		$sql = "SELECT
					goods.id,
					goods.overview,
					goods.price,
					goods.real_price,
					goods.pickup_flag,
					goods.token,
					goods.status,
					goods.viewed,
					goods.created,
					users.id,
					users.first_name,
					users.last_name
				FROM
					goods left join users on goods.owner = users.id
				WHERE
					status = ?
				ORDER BY created DESC LIMIT {$start}, {$count}";
		return $this->getDataSource()->fetchAll($sql, array($status));
	}
	
	public function getItemCountByOwner($owner_id) {
		$sql = "SELECT COUNT(*) AS count FROM goods WHERE owner = ?";
		$result = $this->getDataSource()->fetchAll($sql, array($owner_id));
		return $result[0][0]['count'];
	}
	
	public function getItemCountByStatus($status = STATUS_CREATED) {
		$sql = "SELECT COUNT(*) AS count FROM goods WHERE status = ?";
		$result = $this->getDataSource()->fetchAll($sql, array($status));
		return $result[0][0]['count'];
	}
	
	public function getById($id) {
		$good = $this->find('first', array(
			'conditions' => array('id' => $id)
		));
		if (empty($good)) {
			return null;
		}
		$good = $good['Good'];
		if ( ! isset(Good::$category_table[$good['category']])) {
			return $good;
		}
		$option_table_name = Good::$category_table[$good['category']];
		$option = $this->getDataSource()->fetchAll(
				"SELECT * FROM
					{$option_table_name}
				WHERE
					id = ?",
				array($good['id'])
		);
		if (empty($option)) {
			// TODO error
			return $good;
		}
		return array_merge($good, $option[0][$option_table_name]);
	}
	
	public function addViewCount($good, $user) {
		$good = array('Good' => $good);
		// tavigdaagui bol nemehgui
		if ($good['Good']['status'] != STATUS_PUBLISHED) {
			return;
		}
		// admin uzvel nemehgui
		if ($user && $user['role'] == ROLE_ADMIN) {
			return;
		}
		if ( ! $user || $user['id'] != $good['Good']['owner']) {
			$this->updateAll(
				array('Good.viewed' => 'Good.viewed+1'),
				array('Good.id' => $good['Good']['id'])
			);
		}
	}

	public function getByIDs($item_ids = array(), $current_id = null, $limit = 5) {
		if ( ! $item_ids ) {
			return array();
		}
		$sql = "SELECT
					goods.id,
					overview,
					price,
					real_price,
					pickup_flag,
					token
				FROM
					goods
				WHERE id in (" . implode(',', array_fill(0, count($item_ids), '?')) . ")";
		$items = $this->getDataSource()->fetchAll($sql, $item_ids);
		$sorted_items = array();
		foreach ($item_ids as $item_id) {
			if (count($sorted_items) == $limit) {
				break;
			}
			if ($item_id == $current_id) {
				continue;
			}
			foreach ($items as $item) {
				if ($item['goods']['id'] == $item_id) {
					$sorted_items[] = $item;
					break;
				}
			}
		}
		return $sorted_items;
	}
	
	public function getPickups($count = 10) {
		$sql = "SELECT
					goods.id,
					overview,
					price,
					real_price,
					pickup_flag,
					token,
					status
				FROM
					goods
				WHERE
					status = ? AND pickup_flag = ? ORDER BY created DESC LIMIT $count";
		
		return $this->getDataSource()->fetchAll($sql, array(STATUS_PUBLISHED, PICKUP_ON));
	}
	
	public function getRecents($count = 10) {
		$sql = "SELECT
					goods.id,
					overview,
					price,
					real_price,
					pickup_flag,
					token,
					status
				FROM
					goods
				WHERE
					status = ? AND pickup_flag = ? ORDER BY created DESC LIMIT $count";
		
		return $this->getDataSource()->fetchAll($sql, array(STATUS_PUBLISHED, PICKUP_OFF));
	}
	
	public function getMostVieweds($count = 10) {
		$sql = "SELECT
					goods.id,
					overview,
					price,
					real_price,
					pickup_flag,
					token,
					status
				FROM
					goods
				WHERE
					status = ? ORDER BY viewed DESC LIMIT $count";
		
		return $this->getDataSource()->fetchAll($sql, array(STATUS_PUBLISHED));
	}
	
	public function publish($item_id, $start_date, $end_date) {
		if ($item_id == null) {
			return false;
		}
		$now = time();
		if ($start_date < strtotime('2014-01-01') || $end_date <= $start_date || $end_date <= $now) {
			return false;
		}
		$status = STATUS_COMFIRMED;
		if ($start_date <= $now) {
			$status = STATUS_PUBLISHED;
		}
		$this->updateAll(
				array('start_date' => $start_date, 'end_date' => $end_date, 'status' => $status),
				array('id' => $item_id)
		);
		return true;
	}
	
	public function beforeSave($options = array()) {
		$this->data[$this->alias]['created'] = date("Y-m-d H:i:s");
		return true;
	}
}
