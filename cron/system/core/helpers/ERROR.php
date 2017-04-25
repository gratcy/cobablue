<?php
error_reporting(0);
function userErrorHandler($errno, $errmsg, $filename, $linenum, $vars) {
	global $conf;
    $errortype = array (
                E_ERROR => 'Error',
                E_WARNING => 'Warning',
                E_PARSE => 'Parsing Error',
                E_NOTICE => 'Notice',
                E_CORE_ERROR => 'Core Error',
                E_CORE_WARNING => 'Core Warning',
                E_COMPILE_ERROR => 'Compile Error',
                E_COMPILE_WARNING => 'Compile Warning',
                E_USER_ERROR => 'User Error',
                E_USER_WARNING => 'User Warning',
                E_USER_NOTICE => 'User Notice',
                E_STRICT => 'Runtime Notice'
                );

    $user_errors = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE);


    if (in_array($errno, $user_errors))
		$err = "--- " . time() . " $errno $errortype[$errno] $errmsg $filename $linenum ".wddx_serialize_value($vars, 'Variables')."\r\n";
    else
		$err = "--- " . time() . " $errno $errortype[$errno] $errmsg $filename $linenum\r\n";

    error_log($err, 3, $conf['logdir'] . $conf['logname']);
	if ($errno == E_USER_ERROR) sendMail('Critical User Error', $err);
}
set_error_handler('userErrorHandler');
