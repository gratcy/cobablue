<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class ckey extends controller {
	
	function __construct() {
		parent::controller();
		parent::module('models', 'models_login', 'culck');
		header('Content-type: application/json');
	}

	function execute() {
		global $conf;
		$email = $this -> rg -> post('email');
		
		$res = array('status' => -1, 'message' => 'failed');
		if ($email) {
			parent::database('main', true);
			$r = $this -> models_login -> __check_user($email);
			if ($r['uid']) {
				if (date('Y-m-d H:i:s', $r['uexpire']) >= date('Y-m-d H:i:s')) {
					$res = array('status' => -2, 'message' => 'success', 'key' => $r['ukey']);
				}
				else {
					$res = array('status' => -4, 'message' => 'Your account has been expired !!!');	
				}
			}
		}
		echo json_encode($res);
	}
}
