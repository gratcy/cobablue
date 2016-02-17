<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class login extends controller {
	
	function __construct() {
		parent::controller();
		parent::database();
		parent::module('models', 'models_auth', 'culck');
		
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
				if (date('Y-m-d H:i:s', $ck['aexpire']) >= date('Y-m-d H:i:s')) {
					if ($this -> models_auth -> __update_auth(array('astatus' => 0), $ck['aid'])) {
						$res = array(-2 => 'success');
					}
				}
			}
		}
		echo json_encode($res);
	}
}
