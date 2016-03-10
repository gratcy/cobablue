<?php
class Support_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_tickets($uid,$level,$type) {
		if ($type == 1) {
			if ($level != 4)
				return "SELECT a.tid,a.tto,a.tdate,a.tsubject,a.tparent,b.uid,b.ufullname,c.ulevel FROM tickets_tab a LEFT JOIN users_profiles_tab b ON a.tuid=b.uid INNER JOIN users_tab c ON a.tuid=c.uid WHERE a.tparent=0 AND a.tstatus=1";
			else
				return "SELECT a.tid,a.tto,a.tdate,a.tsubject,a.tparent,b.uid,b.ufullname,c.ulevel FROM tickets_tab a LEFT JOIN users_profiles_tab b ON a.tuid=b.uid INNER JOIN users_tab c ON a.tuid=c.uid WHERE a.tparent=0 AND a.tstatus=1 AND a.tuid=" . $uid;
		}
		else {
			$this -> db -> select("a.tid,a.tto,a.truid,a.tdate,a.tsubject,a.tparent,b.uid,b.ufullname,c.ulevel FROM tickets_tab a LEFT JOIN users_profiles_tab b ON a.truid=b.uid INNER JOIN users_tab c ON a.truid=c.uid WHERE a.tstatus=1 AND a.tparent=" . $uid);
			return $this -> db -> get() -> result();
		}
	}
    
    function __get_tickets_detail($uid,$level,$tid) {
		if ($level != 4)
			$this -> db -> select("a.tto,a.tdate,a.tsubject,a.tmsg,a.tparent,b.uid,b.ufullname FROM tickets_tab a LEFT JOIN users_profiles_tab b ON a.tuid=b.uid WHERE a.tstatus=1 AND a.tid=" . $tid);
		else
			$this -> db -> select("a.tto,a.tdate,a.tsubject,a.tmsg,a.tparent,b.uid,b.ufullname FROM tickets_tab a LEFT JOIN users_profiles_tab b ON a.truid=b.uid WHERE a.tparent!=0 AND a.tstatus=1 AND a.tuid=".$uid." AND a.tid=" . $tid);
		return $this -> db -> get() -> result();
	}
	
	function __check_is_parent($id) {
		$this -> db -> select('tparent FROM tickets_tab WHERE tid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_tickets($data) {
		return $this -> db -> insert('tickets_tab', $data);
	}
	
	function __update_tickets($tid, $data, $type) {
		if ($type == 1)
			$this -> db -> where('tid', $tid);
        else
			$this -> db -> where('tparent', $tid);
		return $this -> db -> update('tickets_tab', $data);
	}
}
