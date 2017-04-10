<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class auth extends controller {
	
	function __construct() {
		parent::controller();
		parent::database();
		parent::module('models', 'models_auth', 'culck');
		parent::module('helpers', 'functions_culck_helpers', 'culck');
		
		header('Content-type: application/json');
	}

	function request_token() {
		$ckey = $this -> rg -> post('ckey');
		$key = $this -> rg -> post('key');
		$skey = $this -> rg -> post('skey');
		$type = (int) $this -> rg -> post('type');
		
		$res = array(-1 => 'failed');
		
		if ($ckey) {
			$ck = $this -> models_auth -> __check_auth($ckey);
			if (isset($ck['aid'])) {
				if ($key == $ck['akey'] && $skey == $ck['askey']) {
					$identity = array($_SERVER['HTTP_USER_AGENT'],$_SERVER['HTTP_ACCEPT_ENCODING'],$_SERVER['HTTP_ACCEPT_LANGUAGE']);
					$expire = time()+600;
					$token = __get_salt();
					
					if ($this -> models_auth -> __insert_auth(array('atype' => $type, 'aidid' => $ck['aid'], 'adate' => time(), 'aip' => long2ip($_SERVER['REMOTE_ADDR']), 'aidentity' => json_encode($identity), 'atoken' => $token, 'aexpire' => $expire, 'astatus' => 1))) $res = array(-2 => 'success', 't' => $token);
				}
			}
		}
		echo json_encode($res);
	}
}
