<?php

define("CONDITION_1",        '1');
define("CONDITION_2",        '2');
define("CONDITION_3",        '3');
define("CONDITION_4",        '4');
define("CONDITION_5",        '5');

define("STATUS_CREATED",     '0');
define("STATUS_CONFIRMED",   '1');
define("STATUS_SOLD",        '2');

App::uses('AppModel', 'Model');

class Good extends AppModel {
	public $userTable  = 'goods';
	public $primaryKey = 'id';
	
	public static $category_table = array(
			CATEGORY_CLOTHES_CLOTHES   => 'clothes_clothes',
			CATEGORY_CLOTHES_BOOT      => 'clothes_boots',
			CATEGORY_CLOTHES_ACCESSORY => 'clothes_accesorries',
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
	public function getList($category, $start = 0, $count = 20, $options = array()) {
		$where = array("status = ?");
		$parameters = array(STATUS_CONFIRMED);
		$sql = "SELECT
					goods.id,
					overview,
					price,
					pickup_flag,
					sale,
					sale_price,
					secret_number
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
		$sql .= " ORDER BY created DESC LIMIT {$start}, {$count}";
		return $this->getDataSource()->fetchAll($sql, $parameters);
	}
	
	public function getListByOwner($owner_id, $start = 0, $count = 20) {
		$sql = "SELECT
					id,
					overview,
					price,
					pickup_flag,
					sale,
					sale_price,
					secret_number,
					status,
					view_count,
					created
				FROM
					goods
				WHERE
					owner = ?
				ORDER BY created DESC LIMIT {$start}, {$count}";
		return $this->getDataSource()->fetchAll($sql, array($owner_id));
	}
	
	public function getItemCountByOwner($owner_id) {
		$sql = "SELECT COUNT(*) AS count FROM goods WHERE owner = ?";
		$result = $this->getDataSource()->fetchAll($sql, array($owner_id));
		return $result[0][0]['count'];
	}
	
	public function getById($id, $user = null) {
		$good = $this->find('first', array(
			'conditions' => array('id' => $id)
		));
		if (empty($good)) {
			return null;
		}
		if ( ! $user || $user['id'] != $good['Good']['owner']) {
			if ($good['Good']['status'] == STATUS_CREATED) {
				return null;
			}
			$good['Good']['view_count']++;
			$this->save($good, false);
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

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['created'] = date("Y-m-d H:i:s");
		return true;
	}
}
