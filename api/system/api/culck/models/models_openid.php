<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class models_openid extends objectdb {
	function __construct() {
		parent::__construct('main', true);
	}
	
	function __check_openid($openid, $uopenidtype) {
		return $this -> query_one("SELECT * FROM users_tab WHERE ustatus=1 AND uopenidtype='".$uopenidtype."' AND uopenid='".$openid."'");
	}
}
