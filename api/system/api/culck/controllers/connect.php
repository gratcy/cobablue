<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class connect extends controller {
	
	function __construct() {
		parent::controller();
		parent::module('models', 'models_login', 'culck');
		header('Content-type: application/json');
	}

	function execute() {
		global $conf;
		$key = $this -> rg -> post('key');
		$res = array('status' => -1, 'message' => 'failed');
		if ($key) {
			parent::database('main', true);
			$r = $this -> models_login -> __check_key($key);
			if ($r['uid']) {
				if (date('Y-m-d H:i:s', $r['uexpire']) >= date('Y-m-d H:i:s')) {
					$this -> models_login -> __update_user(array('uonline' => 1, 'uolstart' => time()), $r['uid'], 3);
					$res = array('status' => -2, 'message' => 'success');
				}
				else {
					$res = array('status' => -1, 'message' => 'Your account has been expired !!!');	
				}
			}
		}
		echo json_encode($res);
	}
}
