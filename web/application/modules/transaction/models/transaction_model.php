<?php
class Transaction_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_transaction($uid) {
		return "SELECT a.tid,a.tno,a.tdate,a.tfrom,a.tto,a.ttotal,a.ttotalhash,a.tapiinv,a.tstatus,a.tpoint,b.ptype,b.pname FROM transaction_tab a LEFT JOIN product_tab b ON a.tpid=b.pid WHERE a.tstatus!=3 AND a.tuid=" . $uid . " ORDER BY a.tid DESC";
	}
	
	function __insert_transaction($data) {
		return $this -> db -> insert('transaction_tab', $data);
	}
	
	function __update_transaction($tid,$data,$type=1) {
		if ($type == 3)
			$this -> db -> where('ttid', $tid);
		else
			$this -> db -> where('tid', $tid);
		if ($type == 1)
			return $this -> db -> update('transaction_tab', $data);
		else
			return $this -> db -> update('transaction_confirm_tab', $data);
	}
	
	function __insert_confirm($data) {
		return $this -> db -> insert('transaction_confirm_tab', $data);
	}
	
	function __get_transaction_detail($tid) {
		$this -> db -> select("* FROM transaction_tab WHERE tid=".$tid);
		return $this -> db -> get() -> result();
	}
	
	function __get_transaction_by_tno($tno) {
		$this -> db -> select("* FROM transaction_tab WHERE tno='".$tno."'");
		return $this -> db -> get() -> result();
	}
	
	function __get_user_expire($uid) {
		$this -> db -> select('uexpire FROM users_tab WHERE uid=' . $uid);
		return $this -> db -> get() -> result();
	}
	
	function __get_total_transaction() {
		$this -> db -> select('* FROM transaction_tab');
		return $this -> db -> get() -> num_rows();
	}
}
