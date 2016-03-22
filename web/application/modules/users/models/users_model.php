<?php
class Users_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_users() {
		return 'SELECT a.uid,a.ulevel,a.uemail,a.urefcode,a.urefid,a.ulastlogin,a.uexpire,a.ustatus,b.ufullname FROM users_tab a INNER JOIN users_profiles_tab b ON a.uid=b.uid WHERE (a.ustatus=1 OR a.ustatus=0) ORDER BY a.uid DESC';
	}

    function __get_users_detail($id) {
		$this -> db -> select('a.ulevel,a.uemail,a.ustatus,b.* FROM users_tab a INNER JOIN users_profiles_tab b ON a.uid=b.uid WHERE (a.ustatus=1 OR a.ustatus=0) AND a.uid=' . $id);
		return $this -> db -> get() -> result();
	}

	function __insert_users($data) {
		return $this -> db -> insert('users_tab', $data);
	}

	function __update_users($pid, $data, $type) {
		$this -> db -> where('uid', $pid);
		if ($type == 1)
			return $this -> db -> update('users_tab', $data);
		else
			return $this -> db -> update('users_profiles_tab', $data);
	}
}
