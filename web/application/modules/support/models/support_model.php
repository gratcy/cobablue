<?php
class Support_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_tickets($uid,$type) {
		if ($type == 1) {
			return "SELECT a.tid,a.tto,a.tdate,a.tsubject,a.tparent,b.ufullname FROM tickets_tab a LEFT JOIN users_profiles_tab b ON a.truid=b.uid WHERE a.tparent=0 AND a.tstatus=1 AND a.tuid=" . $uid;
		}
		else {
			$this -> db -> select("a.tid,a.tto,a.tdate,a.tsubject,a.tparent,b.ufullname FROM tickets_tab a LEFT JOIN users_profiles_tab b ON a.truid=b.uid WHERE a.tstatus=1 AND a.tparent=" . $uid);
			return $this -> db -> get() -> result();
		}
	}
    
    function __get_tickets_detail($uid,$tid) {
		$this -> db -> select("a.tto,a.tdate,a.tsubject,a.tmsg,a.tparent,b.ufullname FROM tickets_tab a LEFT JOIN users_profiles_tab b ON a.truid=b.uid WHERE a.tparent!=0 AND a.tstatus=1 AND a.tuid=".$uid." AND a.tid=" . $tid);
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
