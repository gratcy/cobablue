<?php
class Download_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_download() {
		$this -> db -> select('* FROM files_tab WHERE fstatus=1');
		return $this -> db -> get() -> result();
	}
}
