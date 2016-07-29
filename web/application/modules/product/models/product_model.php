<?php
class Product_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_product() {
		return 'SELECT * FROM product_tab WHERE (pstatus=1 OR pstatus=0) ORDER BY pid DESC';
	}
    
    function __get_product_select() {
		$this -> db -> select('pid,ptype,pname,pprice,pyear,ppoint FROM product_tab WHERE pstatus=1');
		return $this -> db -> get() -> result();
	}
    
    function __get_product_detail($id) {
		$this -> db -> select('ptype,pname,pyear,pprice,ppoint,pdesc,pstatus FROM product_tab WHERE (pstatus=1 OR pstatus=0) AND pid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_product($data) {
		return $this -> db -> insert('product_tab', $data);
	}
	
	function __update_product($pid, $data) {
		$this -> db -> where('pid', $pid);
		return $this -> db -> update('product_tab', $data);
	}
}
