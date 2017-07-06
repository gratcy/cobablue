<?php
class Reporting_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_report($uid, $from, $to, $type) {
		if ($type == 1)
			$this -> db -> select("COUNT(*) as rtotal,from_unixtime(uregdate, '%Y-%m-%d') as rdate FROM users_tab WHERE FROM_UNIXTIME(uregdate, '%Y-%m-%d') >= '".$from."' AND FROM_UNIXTIME(uregdate, '%Y-%m-%d') <= '".$to."' GROUP BY from_unixtime(uregdate, '%Y-%m-%d')", FALSE);
		else if ($type == 2)
			$this -> db -> select("COUNT(*) as rtotal,uregdate as monthweek, WEEK(from_unixtime(uregdate, '%Y-%m-%d')) as rdate  FROM users_tab WHERE FROM_UNIXTIME(uregdate, '%Y-%m-%d') >= '".$from."' AND FROM_UNIXTIME(uregdate, '%Y-%m-%d') <= '".$to."' GROUP BY rdate", FALSE);
		else if ($type == 3)
			$this -> db -> select("COUNT(*) as rtotal,MONTH(from_unixtime(uregdate, '%Y-%m-%d')) as rdate FROM users_tab WHERE FROM_UNIXTIME(uregdate, '%Y-%m-%d') >= '".$from."' AND FROM_UNIXTIME(uregdate, '%Y-%m-%d') <= '".$to."' GROUP BY MONTH(from_unixtime(uregdate, '%Y-%m-%d'))", FALSE);
		else
			$this -> db -> select("COUNT(*) as rtotal,from_unixtime(uregdate, '%Y-%m-%d') as rdate FROM users_tab WHERE FROM_UNIXTIME(uregdate, '%Y-%m-%d') >= '".$from."' AND FROM_UNIXTIME(uregdate, '%Y-%m-%d') <= '".$to."' GROUP BY YEAR(from_unixtime(uregdate, '%Y-%m-%d'))", FALSE);
		return $this -> db -> get() -> result();
	}
}
