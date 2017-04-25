<?php
class Settings_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_profile($uid) {
		$this -> db -> select("a.uauto,b.* FROM users_tab a LEFT JOIN users_profiles_tab b ON a.uid=b.uid WHERE a.uid=" . $uid, FALSE);
		return $this -> db -> get() -> result();
	}
    
    function __get_pass($uid) {
		$this -> db -> select("upass,usalt FROM users_tab WHERE uid=" . $uid);
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
