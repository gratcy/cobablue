<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class core {
	private $loaddefaultview;
	
	function __construct() {
		global $routes;
		if (isset($_REQUEST[$routes['action_controller']]))	self::action_controllers();
		else self::defaultview();
	}

	private function action_controllers() {
		global $routes, $conf;
		if (isset($_REQUEST[$routes['action_controller']])) {
			if (file_exists($conf['pathmodule']['controllers'] . '/' . $_REQUEST[$routes['action_controller']] . EXT)) {
				include_once($conf['pathmodule']['controllers'] . '/' . $_REQUEST[$routes['action_controller']] . EXT);
				if (class_exists($_REQUEST[$routes['action_controller']])) {
					$this -> $_REQUEST[$routes['action_controller']] = new $_REQUEST[$routes['action_controller']];
					if (method_exists($_REQUEST[$routes['action_controller']], 'execute')) $this -> $_REQUEST[$routes['action_controller']] -> execute();
				}
				else
					include_once( $conf['pathmodule']['errors'] . '/503' . EXT );
			}
			else
				include_once( $conf['pathmodule']['errors'] . '/503' . EXT );
		}
	}

	private function defaultview() {
		global $routes, $conf;
		if (file_exists( $conf['pathmodule']['controllers'] . '/' . $routes['main_controller'] . EXT )) {
			include_once( $conf['pathmodule']['controllers'] . '/' . $routes['main_controller'] . EXT );
			if (class_exists($routes['main_controller'])) {
				$this -> loaddefaultview = new $routes['main_controller'];
				if (method_exists($this -> loaddefaultview,  'execute')) $this -> loaddefaultview -> execute();
			}
			else
				include_once( $conf['pathmodule']['errors'] . '/503' . EXT );
		}
		else
			include_once( $conf['pathmodule']['errors'] . '/503' . EXT );
	}
}
