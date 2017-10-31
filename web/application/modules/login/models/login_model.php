<?php
class Login_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_login($uemail) {
		$this -> db -> select("a.*,b.uavatar FROM users_tab a LEFT JOIN users_profiles_tab b ON a.uid=b.uid WHERE a.uemail='".$uemail."' AND (a.ustatus=1 OR a.ustatus=0)", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_openid($id) {
		$this -> db -> select("* FROM users_tab WHERE ustatus=1 AND uopenid=" . $id);
		return $this -> db -> get() -> result();
	}
}
