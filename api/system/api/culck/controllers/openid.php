<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class openid extends controller {
	
	function __construct() {
		parent::controller();
		parent::database();
		parent::module('models', 'models_openid', 'culck');
		parent::module('models', 'models_login', 'culck');
		parent::module('helpers', 'functions_culck_helpers', 'culck');
		
		header('Content-type: application/json');
	}

	function execute() {
		$type = $this -> rg -> get('type');
		$email = $this -> rg -> post('email');
		$openid = $this -> rg -> post('openid');
		$fullname = $this -> rg -> post('fullname');
		
		$res = array('status' => -1, 'message' => 'failed');
		$uopenidtype = ($type == 'fb' ? 1 : 2);
		
		if ($type == 'fb' || $type == 'google') {
			if ($openid) {
				$r = $this -> models_openid -> __check_openid($openid, $uopenidtype);
				
				if ($r['uid']) {
					if (date('Y-m-d H:i:s', $r['uexpire']) >= date('Y-m-d H:i:s')) {
						$this -> models_login -> __update_user(array('ulastlogin' => ip2long($_SERVER['REMOTE_ADDR']) . '*' . time()), $r['uid'],1);
						$res = array('status' => -2, 'message' => 'success', 'key' => $r['ukey']);
					}
					else {
						$res = array('status' => -4, 'message' => 'Your account has been expired !!!');
					}
				}
				else {
					$ckE = $this -> models_login -> __check_user($email);
					if ($ckE['uid']) {
						if (date('Y-m-d H:i:s', $ckE['uexpire']) >= date('Y-m-d H:i:s')) {
							$this -> models_login -> __update_user(array('ulastlogin' => ip2long($_SERVER['REMOTE_ADDR']) . '*' . time(), 'uopenid' => $openid, 'uopenidtype' => $uopenidtype), $ckE['uid'],1);
							$res = array('status' => -2, 'message' => 'success', 'key' => $ckE['ukey']);
						}
						else {
							$res = array('status' => -4, 'message' => 'Your account has been expired !!!');
						}
					}
					else {
						$salt = __get_salt();
						$rcode = explode('@',$email);
						if($this -> models_login -> __insert_user(array('ulevel' => 4, 'uemail' => $email, 'urefcode' => $rcode[0], 'uexpire' => strtotime('+7 days'), 'ukey' => __api_key($email), 'uopenid' => $openid, 'uopenidtype' => $uopenidtype, 'ustatus' => 1))) {
							$lID = $this -> models_login -> last_id();
							$this -> models_login -> __update_user(array('ufullname' => $fullname), $lID, 2);
							$key = __get_salt();
							$this -> models_login -> __insert_token(array('tuid' => $lID, 'ttype' => 1, 'tkey' => $key, 'tstatus' => 1));
							$ck = $this -> models_openid -> __check_openid($openid, $uopenidtype);
							$res = array('status' => -2, 'message' => 'success', 'key' => $ck['ukey']);
						}
						else {
							$res = array('status' => -1, 'message' => 'Failed, please contact admin@neverblock.me !!!');
						}
					}
				}
			}
		}
		echo json_encode($res);
	}
}
