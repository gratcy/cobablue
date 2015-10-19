<?php
ob_start();

//~ define('ENVIRONMENT', 'production');
define('ENVIRONMENT', 'development');
	
if ( defined( 'ENVIRONMENT' ) ) {
	switch ( ENVIRONMENT ) {
		case 'development':
			error_reporting(E_ALL ^ E_DEPRECATED);
		break;
	
		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}

$system_folder = 'system';

if (strpos($system_folder, '/') === FALSE) {
	if (function_exists('realpath') AND @realpath(dirname(__FILE__)) !== FALSE) {
		$system_folder = realpath(dirname(__FILE__)).'/'.$system_folder;
	}
}
else {
	$system_folder = str_replace("\\", "/", $system_folder); 
}

define('START', true);
define('EXT', '.php');
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('FPATH', str_replace(SELF, '', __FILE__));
define('BASEPATH', $system_folder . '/');

require_once( BASEPATH. '/loader' . EXT );
ob_end_flush();
