<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );
class autoload {
	function autoload() {
		global $conf,$autoload;
		foreach($autoload as $k => $file) :
			if ($k != 'config') {
				if (count($file) > 0) {
					foreach($file as $key => $val) {
						if (file_exists($conf['pathmodule'][$k].'/'. $val . EXT)) {
							include_once( $conf['pathmodule'][$k].'/'. $val . EXT );
							if (class_exists($val)) {
								$this -> $val = new $val();
								if (method_exists($this -> $val, 'execute')) $this -> $val -> execute();
							}
						}
						else
							die('<h1>File '.$file.' not found</h1>');
					}
				}
			}
		endforeach;
	}
}

if (count($autoload['config']) > 0) {
	foreach($autoload['config'] as $k => $v) :
		if ( file_exists( BASEPATH . 'config/' . $v . EXT ) ) {
			include_once( BASEPATH . 'config/' . $v . EXT );
		}
		else
			die('<h1>File config '.$file.' not found</h1>');
	endforeach;
}
