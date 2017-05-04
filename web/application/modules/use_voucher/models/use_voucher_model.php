<?php
class Use_voucher_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
	function __check_voucher($code) {
		$this -> db -> select("* FROM voucher_tab WHERE vcode='".$code."' AND (vstatus=1 OR vstatus=3)");
		return $this -> db -> get() -> result();
	}

	function __update_voucher($vid, $data) {
		$this -> db -> where('vid', $vid);
		return $this -> db -> update('voucher_tab', $data);
	}
}
