<?php
class Report_reseller_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_report_reseller($from, $to, $reseller) {
		$rseller = "";
		if ($reseller) $rseller = " AND a.urefid=" . $reseller;
		$this -> db -> select("a.uemail,a.uexpire,a.uregdate,b.uemail as remail,c.ufullname FROM users_tab a JOIN users_tab b ON a.urefid=b.uid JOIN users_profiles_tab c ON b.uid=c.uid WHERE a.utype=2 AND FROM_UNIXTIME(a.uregdate, '%Y-%m-%d') >= '".$from."' AND FROM_UNIXTIME(a.uregdate, '%Y-%m-%d') <= '".$to."'".$rseller." ORDER BY a.uid DESC", FALSE);
		return $this -> db -> get() -> result();
	}

    function __get_reseller_select() {
		$this -> db -> select('a.uid, CONCAT_WS(\' - \',a.uemail,b.ufullname) as reseller FROM users_tab a JOIN users_profiles_tab b ON a.uid=b.uid JOIN users_tab c ON c.utype=2 AND c.urefid=b.uid WHERE a.utype=1 AND a.ustatus=1 GROUP BY a.uid', FALSE);
		return $this -> db -> get() -> result();
	}
}
