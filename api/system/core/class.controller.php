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
			include_once( $conf['pathmodule']['errors'] . '/503' . EXT );
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
	
	protected function config($file, $item, $dir='') {
		global $conf, $autoload;
		if ($dir) {
			if ( file_exists( $conf['pathmodule']['api'] .'/'. $dir .'/'. 'config/' . $file . EXT  ) ) {
				if (count($autoload['config']) > 0) {
					foreach($autoload['config'] as $k => $v) :
						if ( $k == $file ) 
							die('<h1>Config already autoload</h1>');
						else
							include_once( $conf['pathmodule']['api'] .'/'. $dir .'/'. 'config/' . $k . EXT );
					endforeach;
				}
				else
					include_once( $conf['pathmodule']['api'] .'/'. $dir .'/'. 'config/' . $file . EXT );
				return $item;
			}
		}
		else {
			if ( file_exists( BASEPATH . 'config/' . $file . EXT  ) ) {
				if (count($autoload['config']) > 0) {
					foreach($autoload['config'] as $k => $v) :
						if ( $k == $file ) 
							die('<h1>Config already autoload</h1>');
						else
							include_once( BASEPATH . 'config/' . $k . EXT );
					endforeach;
				}
				else
					include_once( BASEPATH . 'config/' . $file . EXT );
				return $item;
			}
		}
	}
	
	protected function module($module,$file,$dir='') {
		global $conf;
		if ($conf['newmodule'] == true) {
			if ($file && $module) {
				if ($dir) {
					if ( file_exists( $conf['pathmodule']['api'] .'/'. $dir .'/'. $module .'/'. $file . EXT ) ) {
						include_once( BASEPATH . 'api/'. $dir .'/'. $module .'/'. $file . EXT );
						if (class_exists($file)) {
							$this -> $file = new $file();
							if (method_exists($this -> $file, 'execute')) $this -> $file -> execute();
						}
					}
					else
						die('<h1>Module doesn\'t exists</h1>');
				}
				else {
					if (file_exists($conf['pathmodule'][$module].'/'. $file . EXT)) {
						include_once( $conf['pathmodule'][$module].'/'. $file . EXT );
						if (class_exists($file)) {
							$this -> $file = new $file();
							if (method_exists($this -> $file, 'execute')) $this -> $file -> execute();
						}
					}
					else
						die('<h1>Module doesn\'t exists</h1>');
				}
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
					die('<h1>Module doesn\'t exists</h1>');
			}
			else
				die('<h1>Unsupported module</h1>');
		}
	}
}
