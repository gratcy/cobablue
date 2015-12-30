<?php
class Panel_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_recent_refferal($uid) {
		$this -> db -> select("uid,uemail,urefcode,ustatus FROM users_tab WHERE urefid=" . $uid . " ORDER BY uid DESC LIMIT 5");
		return $this -> db -> get() -> result();
	}
	
	function __get_transaction($uid) {
		$this -> db -> select("tno,ttotal FROM transaction_tab WHERE tstatus=1 AND tuid=" . $uid);
		return $this -> db -> get() -> result();
	}
    
    function __get_recent_transaction($uid) {
		$this -> db -> select("a.tno,a.tdate,a.tfrom,a.tto,a.ttotal,a.tstatus,b.pname FROM transaction_tab a LEFT JOIN product_tab b ON a.tpid=b.pid WHERE a.tuid=" . $uid . " ORDER BY a.tid DESC LIMIT 5");
		return $this -> db -> get() -> result();
	}
}
