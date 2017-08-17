<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class models_product extends objectdb {
	function __construct() {
		parent::__construct('main', true);
	}
	
	function __get_product_detail($pid) {
		return $this -> query_one("SELECT * FROM product_tab WHERE pstatus=1 AND pid=".$pid);
	}
}
