<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class culck extends controller {
	private $jsn = array();
	function __construct() {
		parent::controller();
		parent::database();
		parent::module('models', 'models_login', 'mobile');
	}

	function __get_login() {
		header('Content-type: application/json');
		$email = $this -> rg -> post('email');
		$pwd = $this -> rg -> post('pwd');
	}
}
