<?php
function getIDServer($withV6 = true) {
	global $conf;
	if ($conf['domain'])
		return 'Domain: ' . $conf['domain'] . "\r\nPath: " . BASEPATH;
	else
		preg_match_all('/inet'.($withV6 ? '6?' : '').' addr: ?([^ ]+)/', `ifconfig`, $ips);
    return 'IP Address: ' . $ips[1][0] . "\r\nPath: " . BASEPATH;
}

function __check_new($cls, $file) {
	$fp = fopen($file, 'r');
	while(!feof($fp)) {
		$res = fgets($fp, 1024);
		$res = explode(" ", $res);
		if (count($res) > 2 && trim($res[2]) != 'success' && $res[2] == $cls) return true;
	}
	return false;
}

function sendError($subject, $message) {
	global $conf;
	if ($conf['administrator_email'])
		if (!mail($conf['administrator_email'], $subject, $message))
			write_log("--- " . time() . " Warning mail() function: SMTP Unavailable, Failed send email\r\n", 1);
	write_log(time() . " " . $subject ." ". $message, 1);
	print($subject ." ". $message);
}

function write_log($message, $tipe) {
	global $conf;
	if (!validate_log( $conf['logname'] )) $conf['logname'] = 'gcli.log';
	$size = $conf['logsize'] ? $conf['logsize'] : 0;
	if ($size == 0) $size = 1024*1024*10;
	else $size = 1024*1024*$size;
	
	if ( filesize( $conf['logdir'] . $conf['logname'] ) >= $size) {
		rename_log();
		write_log($message, 2);
	}
	else {
		if ($tipe == 1)
			$fh = fopen($conf['logdir'] . $conf['logname'], 'a');
		else
			$fh = fopen($conf['logdir'] . $conf['logname'], 'w');
		@fwrite($fh, $message);
	}
}

function rename_log() {
	global $conf;
	if (!validate_log( $conf['logname'] )) $conf['logname'] = 'gcli.log';
	
	$dh = @opendir( $conf['logdir'] );
	$res = array();
	
	while( false !== ( $file = readdir( $dh ) ) ) {
		if ($file != '.' && $file != '..' &&  substr($file, 0, 9) == $conf['logname']) {
			$ex = explode('.log.', $file);
			$id = isset( $ex[1] ) ? $ex[1] : 0;
			$res[] = $id;
		}
	}
	
	rename($conf['logdir'] . $conf['logname'], $conf['logdir'] . $conf['logname'].'.'.(max($res) + 1).'');
}

function validate_log($str) {
	if (preg_match('/^([a-z\.log]{5,})$/i', $str)) return true;
}
