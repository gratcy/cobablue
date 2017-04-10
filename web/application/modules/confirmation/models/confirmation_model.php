<?php
class Confirmation_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_confirmation() {
		return "SELECT a.*,b.tno,b.tfrom,b.tto,b.tpoint,b.tstatus as ttstatus,c.pname,c.ptype,d.uemail FROM transaction_confirm_tab a INNER JOIN transaction_tab b ON a.ttid=b.tid LEFT JOIN product_tab c ON b.tpid=c.pid LEFT JOIN users_tab d ON d.uid=b.tuid WHERE (b.tstatus=1 OR b.tstatus=2) AND a.tstatus!=2 ORDER BY a.tid DESC";
	}
	
    function __get_confirmation_detail($id) {
		$this -> db -> select('a.*,b.tid as tcid,b.tabank,b.tano,b.taname,b.tmbank,b.ttotal,c.ptype FROM transaction_tab a INNER JOIN transaction_confirm_tab b ON a.tid=b.ttid LEFT JOIN product_tab c ON a.tpid=c.pid WHERE a.tid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_confirmation($data) {
		return $this -> db -> insert('confirmation_tab', $data);
	}
	
	function __update_confirmation($tid,$data) {
		$this -> db -> where('ctid', $tid);
		return $this -> db -> update('confirmation_tab', $data);
	}
	
	function __update_users($uid,$data) {
		$this -> db -> where('uid', $uid);
		return $this -> db -> update('users_tab', $data);
	}
}
