<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class models_order extends objectdb {
	function __construct() {
		parent::__construct('whmcs', true);
	}
	
	function __insert_order($data, $type) {
		if ($type == 1)
			return $this -> insert_array('tblorders', $data);
		else
			return $this -> insert_array('tblhosting', $data);
	}
}
