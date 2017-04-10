<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class vpn extends controller {
	
	function __construct() {
		parent::controller();
		parent::database();
		parent::module('models', 'models_auth', 'culck');
		
		header('Content-type: application/json');
	}

	function get_vpn() {
		global $conf;
		parent::config('config','confs','culck');
		
		shuffle($conf['vpn']);
		$res = array('status' => -2, 'message' => 'success', 't' => $conf['vpn'][0]);
		echo json_encode($res);
	}
}
