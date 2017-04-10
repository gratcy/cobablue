<?php
class Confirm_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

	function __update_user($email, $data, $type=1) {
		if ($type == 1)
			$this -> db -> where('uemail', $email);
		else
			$this -> db -> where('uid', $email);
		return $this -> db -> update('users_tab', $data);
	}
	
	function __get_refid($email) {
		$this -> db -> select("urefid,uexpire FROM users_tab WHERE uemail='".$email."'");
		return $this -> db -> get() -> result();
	}

	function __check_email_exists($email) {
		$this -> db -> select("* FROM users_tab WHERE uemail='".$email."'");
		return $this -> db -> get() -> num_rows();
	}

	function __get_user($email) {
		$this -> db -> select("* FROM users_tab WHERE uemail='".$email."'");
		return $this -> db -> get() -> result();
	}
	
	function __update_token($tid, $data) {
		$this -> db -> where('tid', $tid);
		return $this -> db -> update('token_tab', $data);
	}
	
	function __insert_token($data) {
		return $this -> db -> insert('token_tab', $data);
	}
	
	function __update_all_token($uid, $data) {
		$this -> db -> where('tuid', $uid);
		$this -> db -> where('ttype', 1);
		return $this -> db -> update('token_tab', $data);
	}

	function __check_key_exists($email,$key) {
		$this -> db -> select("b.tid FROM users_tab a INNER JOIN token_tab b ON a.uid=b.tuid WHERE b.ttype=1 AND a.uemail='".$email."' AND b.tkey='".$key."' AND b.tstatus=1");
		return $this -> db -> get() -> result();
	}
}
