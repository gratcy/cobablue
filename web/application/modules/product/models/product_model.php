<?php
class Product_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_product() {
		return 'SELECT * FROM product_tab WHERE (pstatus=1 OR pstatus=0) ORDER BY pid DESC';
	}
    
    function __get_product_select() {
		$this -> db -> select('pid,pname,pprice FROM product_tab WHERE pstatus=1');
		return $this -> db -> get() -> result();
	}
}
