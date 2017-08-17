<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class payment extends controller {
	function __construct() {
		parent::controller();
		parent::module('helpers', 'functions_culck_helpers', 'culck');
		
		header('Content-type: application/json');
	}

	function execute() {
		$email = $this -> rg -> post('email');
		$productid = $this -> rg -> post('productid');
		
		$res = array('status' => -2, 'message' => 'Payment success.');
		echo json_encode($res);
	}
}
