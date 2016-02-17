<?php
class Transaction_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_transaction($uid) {
		return "SELECT a.tno,a.tdate,a.tfrom,a.tto,a.ttotal,a.tstatus,b.pname FROM transaction_tab a LEFT JOIN product_tab b ON a.tpid=b.pid WHERE a.tuid=" . $uid;
	}
}
