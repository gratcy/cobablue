<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );
class db_driver {
	function __construct($dbname, $reconnect) {
		global $db;
		$dbname = $dbname ? $dbname : 'default';
		include_once( BASEPATH . 'core/database/'.$db['default']['dbdriver'].'/class.connect' . EXT );
		include_once( BASEPATH . 'core/database/'.$db['default']['dbdriver'].'/class.objectdb' . EXT );
	}
}
