<?php
class Upload_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_files() {
		return 'SELECT * FROM files_tab WHERE (fstatus=1 OR fstatus=0) ORDER BY fid DESC';
	}
    
    function __get_files_detail($id) {
		$this -> db -> select('* FROM files_tab WHERE (fstatus=1 OR fstatus=0) AND fid=' . $id);
		return $this -> db -> get() -> result();
	}

	function __insert_files($data) {
		return $this -> db -> insert('files_tab', $data);
	}

	function __update_files($vid, $data) {
		$this -> db -> where('fid', $vid);
		return $this -> db -> update('files_tab', $data);
	}
}
