<?php
class Voucher_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_voucher() {
		return 'SELECT a.*,b.uemail FROM voucher_tab a LEFT JOIN users_tab b ON a.vusedby=b.uid WHERE (a.vstatus=1 OR a.vstatus=3)';
	}

	function __search_voucher($email) {
		$this -> db -> select("a.*,b.uemail FROM voucher_tab a LEFT JOIN users_tab b ON a.vusedby=b.uid WHERE (a.vstatus=1 OR a.vstatus=3) AND b.uemail LIKE '%".$email."%'");
		return $this -> db -> get() -> result();
	}

	function __check_voucher($code) {
		$this -> db -> select("* FROM voucher_tab WHERE vcode='".$code."'");
		return $this -> db -> get() -> result();
	}

	function __insert_voucher($data) {
		return $this -> db -> insert('voucher_tab', $data);
	}

	function __update_voucher($vid, $data) {
		$this -> db -> where('vid', $vid);
		return $this -> db -> update('voucher_tab', $data);
	}
}
