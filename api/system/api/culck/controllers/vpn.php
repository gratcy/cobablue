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
		$token = $this -> rg -> post('token');
		
		$res = array(-1 => 'failed');
		
		if ($token) {
			$ck = $this -> models_auth -> __check_token($token,1);
			if (isset($ck[0])) {
				if (date('Y-m-d H:i:s', $ck['aexpire']) >= date('Y-m-d H:i:s')) {
					if ($this -> models_auth -> __update_auth(array('astatus' => 0), $ck['aid'])) {
						shuffle($conf['vpn']);
						
						$res = array(-2 => 'success', 't' => $conf['vpn'][0]);
					}
				}
			}
		}
		echo json_encode($res);
	}
}
