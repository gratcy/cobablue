<?php
class Report_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_report($uid, $from, $to) {
		$this -> db -> select("* FROM create_account WHERE cuid=".$uid." AND FROM_UNIXTIME(cdate, '%Y-%m-%d') >= '".$from."' AND FROM_UNIXTIME(cdate, '%Y-%m-%d') <= '".$to."'ORDER BY cid DESC", FALSE);
		return $this -> db -> get() -> result();
	}
}
