<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );
class globvar {
	function fetch_array(&$array, $index='') {
		if ( ! isset($array[$index])) return false;
		else return $array[$index];
	}

	function get($name) {
		return self::fetch_array($_GET, $name);
	}

	function post($name) {
		return self::fetch_array($_POST, $name);
	}
}
