<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

if ( $db['config']['database'] ) {
	if ( $db['config']['database'] == true ) {
		if ( file_exists( BASEPATH . 'core/database/'.$db['default']['dbdriver'].'/class.connect' . EXT ) ) {
			include_once( BASEPATH . 'core/database/'.$db['default']['dbdriver'].'/class.connect' . EXT );
			if ($db['config']['multiple'] == true)
				include_once( BASEPATH . 'core/database/'.$db['default']['dbdriver'].'/class.objectdbmultiple' . EXT );
			else
				include_once( BASEPATH . 'core/database/'.$db['default']['dbdriver'].'/class.objectdb' . EXT );
		}
		else
			sendError("Warning", "CLI APPS Temporary Unavailable \r\n");
	}
}

class controller {
	protected function controller() {
		$this -> rg = new globvar();
	}

	protected function database($dbname='default', $reconnect=false) {
		global $db;
		if ( $db['config']['database'] ) $this -> db = new objectdb($dbname,$reconnect);
	}
	
	protected function view() {
		global $conf;
		$arr = func_get_args();
		if (!$arr) sendError("Warning", "Module view couldn't be empty. \r\n");
		
		foreach($arr as $k => $v)
		if (file_exists($conf['pathmodule']['views'] . '/' . $conf['pathview'] . '/' . $v . EXT)) include_once($conf['pathmodule']['views'] . '/' . $conf['pathview'] . '/' . $v . EXT);
		else sendError("Warning", "Module view doesn't exists. \r\n");
	}
	
	protected function config($file, $item) {
		global $conf, $autoload;
		if ( file_exists( BASEPATH . 'config/' . $file . EXT  ) ) {
			if (count($autoload['config']) > 0) {
				foreach($autoload['config'] as $k => $v) :
					if ( $k == $file ) 
						sendError("Warning", "Config already autoload.\r\n");
					else
						include_once( BASEPATH . 'config/' . $k . EXT );
				endforeach;
			}
			else
				include_once( BASEPATH . 'config/' . $file . EXT );
			return $$item;
		}
	}
	
	protected function module($module,$file) {
		global $conf;
		if ($conf['newmodule'] == true) {
			if ($file && $module) {
				if (file_exists($conf['pathmodule'][$module].'/'. $file . EXT)) {
					include_once( $conf['pathmodule'][$module].'/'. $file . EXT );
					if (class_exists($file)) {
						$this -> $file = new $file();
						if (method_exists($this -> $file, 'execute')) $this -> $file -> execute();
					}
				}
				else
					sendError("Warning", "Module view doesn't exists. \r\n");
			}
		}
		else {
			if ($file && $module && $module == 'helpers' || $module == 'models' || $module == 'libraries' || $module == 'errors' || $module == 'controllers') {
				if (file_exists($conf['pathmodule'][$module].'/'. $file . EXT)) {
					include_once( $conf['pathmodule'][$module].'/'. $file . EXT );
					if (class_exists($file)) {
						$this -> $file = new $file();
						if (method_exists($this -> $file, 'execute')) $this -> $file -> execute();
					}
				}
				else
					sendError("Warning", "Module view doesn't exists. \r\n");
			}
			else
				sendError("Warning", "Unsupported module. \r\n");
		}
	}
}
