<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class login extends controller {
	
	function __construct() {
		parent::controller();
		parent::database();
		parent::module('models', 'models_auth', 'culck');
		parent::module('models', 'models_login', 'culck');
		parent::module('helpers', 'functions_culck_helpers', 'culck');
		
		header('Content-type: application/json');
	}

	function logging() {
		$email = $this -> rg -> post('email');
		$passwd = $this -> rg -> post('passwd');
		
		$res = array('status' => -1, 'message' => 'failed');

		if ($email && $passwd) {
			parent::database('main', true);
			$r = $this -> models_login -> __check_user($email);
			if ($r['uid']) {
				if ($r['ustatus'] == 1) {
					if (__set_pass($passwd,$r['usalt']) == $r['upass']) {
						if (date('Y-m-d H:i:s', $r['uexpire']) >= date('Y-m-d H:i:s')) {
							$this -> models_login -> __update_user(array('ulastlogin' => ip2long($_SERVER['REMOTE_ADDR']) . '*' . time()), $r['uid'],1);
							$res = array('status' => -2, 'message' => 'success', 'key' => $r['ukey']);
						}
						else
							$res = array('status' => -4, 'message' => 'Your account has been expired !!!', 'key' => $r['ukey']);
					}
					else
						$res = array('status' => -1, 'message' => 'Invalid Password !!!');
				}
				else
					$res = array('status' => -1, 'message' => 'Please complete activation email !!!');
			}
			else
				$res = array('status' => -1, 'message' => 'Unknown user !!!');
		}
		echo json_encode($res);
	}
}
