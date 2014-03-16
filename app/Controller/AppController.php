<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

define("CATEGORY_CLOTHES"        ,        '10');
define("CATEGORY_CLOTHES_CLOTHES",        '101');
define("CATEGORY_CLOTHES_BOOT",           '102');
define("CATEGORY_CLOTHES_ACCESSORY",      '103');
define("CATEGORY_CLOTHES_KID",            '104');
define("CATEGORY_CLOTHES_OTHER",          '105');
define("CATEGORY_FURNITURE"      ,        '20');
define("CATEGORY_FURNITURE_KITCHEN",      '201');
define("CATEGORY_FURNITURE_DINING",       '202');
define("CATEGORY_FURNITURE_BEDROOT",      '203');
define("CATEGORY_FURNITURE_WORK",         '204');
define("CATEGORY_FURNITURE_KID",          '205');
define("CATEGORY_FURNITURE_OFFICE",       '206');
define("CATEGORY_FURNITURE_OTHER",        '207');
define("CATEGORY_ELECTRONICS",            '30');
define("CATEGORY_ELECTRONICS_COMPUTER",   '301');
define("CATEGORY_ELECTRONICS_HOME",       '302');
define("CATEGORY_ELECTRONICS_PHONE",      '303');
define("CATEGORY_ELECTRONICS_CAMERA",     '304');
define("CATEGORY_ELECTRONICS_INSTRUMENT", '305');
define("CATEGORY_ELECTRONICS_OTHER",      '306');
define("CATEGORY_GIFT",                   '40');
define("CATEGORY_GIFT_MALE",              '401');
define("CATEGORY_GIFT_FEMALE",            '402');
define("CATEGORY_GIFT_KID",               '403');
define("CATEGORY_GIFT_BIRTHDAY",          '404');
define("CATEGORY_GIFT_WEDDING",           '405');
define("CATEGORY_GIFT_OTHER",             '406');
define("CATEGORY_COLLECTION",             '50');
define("CATEGORY_COLLECTION_BOOK",        '501');
define("CATEGORY_COLLECTION_DVD",         '502');
define("CATEGORY_COLLECTION_MARK",        '503');
define("CATEGORY_COLLECTION_OTHER",       '504');
define("CATEGORY_MONGOLIAN",              '60');
define("CATEGORY_MONGOLIAN_CLOTHES",      '601');
define("CATEGORY_MONGOLIAN_FURNITURE",    '602');
define("CATEGORY_MONGOLIAN_HOME",         '603');
define("CATEGORY_MONGOLIAN_ART",          '604');
define("CATEGORY_MONGOLIAN_OTHER",        '605');
define("CATEGORY_OTHER",                  '70');
define("CATEGORY_OTHER_MACHINE",          '701');
define("CATEGORY_OTHER_PRODUCTION",       '702');
define("CATEGORY_OTHER_OTHER",            '703');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array(
		'DebugKit.Toolbar',
		'Facebook.Connect',
		'Session',
		'Auth' => Array(
			'loginRedirect' => Array('controller'  => 'top', 'action' => 'index'),
			'logoutRedirect' => Array('controller' => 'top', 'action' => 'index'),
			'loginAction' => Array('controller' => 'top', 'action' => 'index'),
			'authenticate' => Array('Form' => Array('fields' => Array('username' => 'email', 'password' => 'password')))
		)
	);
	
	public $helpers = array('Facebook.Facebook');
	
	function beforeFilter() {
		$user = $this->Auth->user();
		$this->set('user', $user);
		Configure::write('Config.language', 'mn');
	}
}
