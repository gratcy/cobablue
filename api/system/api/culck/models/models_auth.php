<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class models_auth extends objectdb {
	function __check_auth($ckey) {
		return $this -> query_one("SELECT * FROM bluenexia_api_db.auth_tab WHERE astatus=1 AND ackey='".$ckey."'");
	}
	
	function __insert_auth($data) {
		return $this -> insert_array('bluenexia_api_db.auth_log_tab', $data);
	}
	
	function __update_auth($data, $id) {
		return $this -> update_array('bluenexia_api_db.auth_log_tab', $data, 'aid='.$id);
	}
	
	function __check_token($token,$type) {
		return $this -> query_one("SELECT * FROM bluenexia_api_db.auth_log_tab WHERE astatus=1 AND atoken='".$token."' AND atype=" . $type);
	}
}
