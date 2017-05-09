<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_files() {
		$this -> db -> select('* FROM files_tab WHERE fstatus=1');
		return $this -> db -> get() -> result();
	}
}
