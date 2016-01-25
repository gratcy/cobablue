<?php
class Register_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
   
	function __insert_user($data) {
		return $this -> db -> insert('users_tab', $data);
	}

	function __update_user($uid, $data, $type) {
		$this -> db -> where('uid', $uid);
		if ($type == 1) return $this -> db -> update('users_tab', $data);
		else return $this -> db -> update('users_profiles_tab', $data);
	}
	
	function __insert_token($data) {
		return $this -> db -> insert('token_tab', $data);
	}

	function __check_email_exists($email) {
		$this -> db -> select("* FROM users_tab WHERE uemail='".$email."'");
		return $this -> db -> get() -> num_rows();
	}
}
