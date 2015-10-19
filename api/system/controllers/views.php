<?php
class views extends controller {
	function __construct() {
		parent::controller();
		parent::module('helpers', 'functions_validate_helpers');
	}

	function execute() {
		ob_start();
		$act = get_var($this -> rg -> get('act'));
		$det = get_var($this -> rg -> get('det'));
		$api = $this -> rg -> get('api');
		$pname = $this -> rg -> get('pname');
		
		if ( $api ) {
			$action = BASEPATH . 'api/' . $api . '/controllers/' . $act. EXT;
			if ( file_exists( $action ) ) {
				include_once( $action );
				if ( class_exists( $act ) ) {
					$exec = new $act;
					if ($det) {
						if (method_exists($exec, $det))
							$exec -> $det();
					}
					else {
						if (method_exists($exec, 'execute'))
							$exec -> execute();
					}
				}
				else
					include( BASEPATH . 'errors/503' . EXT );
			}
			else
				include( BASEPATH . 'errors/503' . EXT );
		}
		ob_end_flush();
	}
}
