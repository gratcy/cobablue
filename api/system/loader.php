<?php
if ( defined( 'START' ) ) {
	if ( START == true ) {
		include_once( BASEPATH . 'config/config' . EXT);
		
		include_once( BASEPATH . 'config/autoload' . EXT);
		
		include_once( BASEPATH . 'config/routes' . EXT);
		
		include_once( BASEPATH . 'config/database' . EXT);
		
		include_once( BASEPATH . 'core/class.dispatcher' . EXT );
		
		include_once( BASEPATH . 'core/class.globvar' . EXT );
		
		include_once( BASEPATH . 'core/class.controller' . EXT );
		
		include_once( BASEPATH . 'core/class.autoload' . EXT );
		
		include_once( BASEPATH . 'core/core' . EXT );
		
		dispatcher::getInitial(new autoload(), new core());
	}
	else
		include_once( $conf['pathmodule']['errors'] . '/503' . EXT );
}
else
	include_once( $conf['pathmodule']['errors'] . '/503' . EXT );
