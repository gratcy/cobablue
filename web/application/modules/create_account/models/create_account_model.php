<?php
class Create_account_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_user_point($uid) {
		$this -> db -> select("upoint FROM users_tab WHERE uid=" . $uid);
		return $this -> db -> get() -> result();
	}
    
    function __get_user($email) {
		$this -> db -> select("uid,uexpire FROM users_tab WHERE uemail='" . $email."'");
		return $this -> db -> get() -> result();
	}

	function __update_users($uid, $data) {
		$this -> db -> where('uid', $uid);
		return $this -> db -> update('users_tab', $data);
	}

	function __insert_history($data) {
		return $this -> db -> insert('create_account', $data);
	}
}
