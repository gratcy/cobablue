<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class chpass extends controller {
	
	function __construct() {
		parent::controller();
		parent::module('models', 'models_login', 'culck');
		parent::module('helpers', 'functions_culck_helpers', 'culck');
		
		header('Content-type: application/json');
	}

	function execute() {
		$key = $this -> rg -> post('key');
		$oldpass = $this -> rg -> post('oldpass');
		$pass = $this -> rg -> post('pass');
		$cpass = $this -> rg -> post('cpass');

		$res = array('status' => -1, 'message' => 'failed');

		if (!$key || !$oldpass || !$pass || !$cpass) {
			$res = array('status' => -1, 'message' => 'Data you entered is incomplete !!!');
		}
		else if ($pass !== $cpass) {
			$res = array('status' => -1, 'message' => 'Password and confirm password is not match !!!');
		}
		else {
			parent::database('main', true);
			$r = $this -> models_login -> __check_key($key);
			if ($r['uid']) {
				if ($r['ustatus'] == 1) {
					if (__set_pass($oldpass, $r['usalt']) == $r['upass']) {
						$salt = __get_salt();
						$pwd = __set_pass($cpass, $salt);
						$this -> models_login -> __update_user(array('upass' => $pwd, 'usalt' => $salt), $r['uid'], 1);

						$res = array('status' => -2, 'message' => 'Password successfully changed.');
					}
					else {
						$res = array('status' => -1, 'message' => 'Invalid old password !!!');
					}
				}
			}
		}
		
		echo json_encode($res);
	}
}
