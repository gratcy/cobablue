<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class models_auth extends objectdb {
	function __construct() {
		parent::__construct('default', true);
	}
	
	function __check_auth($ckey) {
		return $this -> query_one("SELECT * FROM auth_tab WHERE astatus=1 AND ackey='".$ckey."'");
	}
	
	function __insert_auth($data) {
		return $this -> insert_array('auth_log_tab', $data);
	}
	
	function __update_auth($data, $id) {
		return $this -> update_array('auth_log_tab', $data, 'aid='.$id);
	}
	
	function __check_token($token,$type) {
		return $this -> query_one("SELECT * FROM auth_log_tab WHERE astatus=1 AND atoken='".$token."' AND atype=" . $type);
	}
}
