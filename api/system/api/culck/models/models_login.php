<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class models_login extends objectdb {
	function __construct() {
		parent::__construct('main', true);
	}
	
	function __check_user($email) {
		return $this -> query_one("SELECT * FROM users_tab WHERE uemail='".$email."'");
	}

	function __check_key($key) {
		return $this -> query_one("SELECT * FROM users_tab WHERE ukey='".$key."'");
	}
	
	function __check_email_exists($email) {
		$sql = $this -> query("SELECT * FROM users_tab WHERE uemail='".$email."'");
		return $sql -> rowCount();
	}
	
	function __insert_user($data) {
		return $this -> insert_array('users_tab', $data);
	}
	
	function __insert_token($data) {
		return $this -> insert_array('token_tab', $data);
	}
	
	function __update_user($data, $id, $type) {
		if ($type == 1)
			return $this -> update_array('users_tab', $data, 'uid='.$id);
		elseif ($type == 2)
			return $this -> update_array('users_profiles_tab', $data, 'uid='.$id);
		else
			return $this -> update_array('users_online_tab', $data, 'uid='.$id);
	}
}
