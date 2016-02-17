<?php
class dispatcher {
	private static $Initial;
	
	public static function getInitial() {
		if (self::$Initial === true)
			return self::$Initial = new dispatcher();
		return self::$Initial;
	}
	
	function & dispatcher($class) {
		return $class;
	}
}
