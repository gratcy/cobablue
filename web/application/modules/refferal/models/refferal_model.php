<?php
class Refferal_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_refferal($uid) {
		return "SELECT uid,uemail,urefcode,ustatus FROM users_tab WHERE urefid=" . $uid;
	}
	
	function __get_transaction($uid) {
		$this -> db -> select("tno,ttotal,tstatus FROM transaction_tab WHERE tstatus=1 AND tuid=" . $uid);
		return $this -> db -> get() -> result();
	}
}
