<?php
class Settings_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_profile($uid) {
		$this -> db -> select("* FROM users_profiles_tab WHERE uid=" . $uid);
		return $this -> db -> get() -> result();
	}
	
	function __update_users($uid, $data, $type) {
		$this -> db -> where('uid', $uid);
        if ($type == 1)
			return $this -> db -> update('users_tab', $data);
        else
			return $this -> db -> update('users_profiles_tab', $data);
	}
}
