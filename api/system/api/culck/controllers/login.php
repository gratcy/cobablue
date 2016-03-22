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
		$token = $this -> rg -> post('token');
		$email = $this -> rg -> post('email');
		$passwd = $this -> rg -> post('passwd');
		
		$res = array(-1 => 'failed');

		if ($token && $email && $passwd) {
			$ck = $this -> models_auth -> __check_token($token,2);
			if (isset($ck[0])) {
				if ($this -> models_auth -> __update_auth(array('astatus' => 0), $ck['aid'])) {
					if (date('Y-m-d H:i:s', $ck['aexpire']) >= date('Y-m-d H:i:s')) {
						parent::database('main', true);
						$r = $this -> models_login -> __check_user($email);
						if ($r[0]) {
							if ($r['ustatus'] == 1) {
								if (__set_pass($passwd,$r['usalt']) == $r['upass']) {
									if (date('Y-m-d H:i:s', $r['uexpire']) >= date('Y-m-d H:i:s')) {
										$this -> models_login -> __update_user(array('ulastlogin' => ip2long($_SERVER['REMOTE_ADDR']) . '*' . time()), $r['uid'],1);
										$res = array(-2 => 'success');
									}
									else
										$res = array(-1 => 'Your account has been expired !!!');
								}
								else
									$res = array(-1 => 'Invalid Password !!!');
							}
							else
								$res = array(-1 => 'Please complete activation email !!!');
						}
						else
							$res = array(-1 => 'Unknown user !!!');
					}
				}
			}
		}
		echo json_encode($res);
	}
}
