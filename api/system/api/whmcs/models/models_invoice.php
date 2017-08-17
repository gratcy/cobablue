<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class models_invoice extends objectdb {
	function __construct() {
		parent::__construct('whmcs', true);
	}
	
	function __insert_invoice($data, $type) {
		if ($type == 1)
			return $this -> insert_array('tblinvoices', $data);
		else if ($type == 2)
			return $this -> insert_array('tblinvoiceitems', $data);
		else
			return $this -> insert_array('bilo_gateway_unik', $data);
	}
	
	function __get_closest($num) {
		return $this -> query_one('SELECT jumlah, abs((jumlah * 100) - ('.$num.' * 100)) AS distance  FROM bilo_gateway_unik ORDER BY distance DESC');
	}
	
	function __update_invoice($data, $id) {
		return $this -> update_array('tblinvoices', $data, 'id='.$id);
	}
}
