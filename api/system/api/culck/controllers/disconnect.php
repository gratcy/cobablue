<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class disconnect extends controller {
	
	function __construct() {
		parent::controller();
		parent::module('models', 'models_login', 'culck');
		header('Content-type: application/json');
	}

	function execute() {
		global $conf;
		$key = $this -> rg -> post('key');
		$res = array('status' => -1, 'message' => 'failed');
		if ($key) {
			parent::database('main', true);
			$r = $this -> models_login -> __check_key($key);
			if ($r['uid']) {
				$this -> models_login -> __update_user(array('uonline' => 0, 'uolend' => time()), $r['uid'], 3);
				$res = array('status' => -2, 'message' => 'success');
			}
		}
		echo json_encode($res);
	}
}
