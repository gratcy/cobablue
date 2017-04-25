<?php
sleep(1);

if ( defined( 'START' ) ) {
	if ( START == true ) {
		include_once( BASEPATH . 'config/config' . EXT);
		
		include_once( BASEPATH . 'config/autoload' . EXT);
		
		include_once( BASEPATH . 'config/schedule' . EXT);
		
		include_once( BASEPATH . 'config/database' . EXT);
		
		include_once( BASEPATH . 'core/class.dispatcher' . EXT );
		
		include_once( BASEPATH . 'core/helpers/CLI' . EXT );

		include_once( BASEPATH . 'core/helpers/DATE' . EXT );

		include_once( BASEPATH . 'core/helpers/ERROR' . EXT );

		include_once( BASEPATH . 'core/class.date' . EXT );

		include_once( BASEPATH . 'core/class.globvar' . EXT );
		
		include_once( BASEPATH . 'core/class.controller' . EXT );
		
		include_once( BASEPATH . 'core/class.autoload' . EXT );
		
		include_once( BASEPATH . 'core/class.cron' . EXT );
		
		include_once( BASEPATH . 'core/core' . EXT );
		
		dispatcher::getInitial(new autoload(), new core(new cron()));
	}
	else
		die("CLI APPS Temporary Unavailable \r\n");
}
else
	die("CLI APPS Temporary Unavailable \r\n");
