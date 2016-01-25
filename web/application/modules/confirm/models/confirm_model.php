<?php
class Confirm_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

	function __update_user($email, $data) {
		$this -> db -> where('uemail', $email);
		return $this -> db -> update('users_tab', $data);
	}

	function __check_email_exists($email) {
		$this -> db -> select("* FROM users_tab WHERE uemail='".$email."'");
		return $this -> db -> get() -> num_rows();
	}
	
	function __update_token($tid, $data) {
		$this -> db -> where('tid', $tid);
		return $this -> db -> update('token_tab', $data);
	}

	function __check_key_exists($email,$key) {
		$this -> db -> select("b.tid FROM users_tab a INNER JOIN token_tab b ON a.uid=b.tuid WHERE b.ttype=1 AND a.uemail='".$email."' AND b.tkey='".$key."' AND b.tstatus=1");
		return $this -> db -> get() -> result();
	}
}
