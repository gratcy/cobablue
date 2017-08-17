<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class models_log extends objectdb {
	function __construct() {
		parent::__construct('whmcs', true);
	}
	
	function __insert_log($data) {
		return $this -> insert_array('tblactivitylog', $data);
	}
}
