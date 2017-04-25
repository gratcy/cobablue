<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class cron {
	function __construct() {
		global $sch, $conf;
		$dt = new date_cron();
		if (is_dir( $conf['logdir'] )) {
			if (file_exists( $conf['logdir'] . $conf['logname'] )) {
				if (is_writable( $conf['logdir'] . $conf['logname'] )) {
					write_log("-- " . time() . " success\r\n", 1);
					foreach($sch['taks'] as $k => $v) {
						if ($dt -> __cron_conf_date($v[0])) {
							if($v[1] == true) {
								if (__check_new($k, $conf['logdir'] . $conf['logname'])) {
									if (__get_next_date($k, $conf['logdir'] . $conf['logname']) <= date('Y-m-d H:i:s')) {
										if (self::__execute($k))
											write_log(time() . " " . $dt -> __cron_conf_date($v[0]) . " " . $k . " success\r\n", 1);
										else
											sendError("Fatal error", "Fatal error File Not Found !!! \r\n".getIDServer()."\r\n");
									}
								}
								else
									write_log(time() . " " . $dt -> __cron_conf_date($v[0]) . " " . $k . " success\r\n", 1);
							}
						}
						else
							sendError("Fatal error", "Fatal error, invalid schedule format \r\n".getIDServer()."\r\n");
					}
				}
				else
					sendError("Fatal error", "Failed, file is not writable \r\n".getIDServer()."\r\n");
			}
			else {
				if ( is_writable( $conf['logdir'] ) ) {
					write_log("-- " . time() . " success\r\n", 2);
					foreach($sch['taks'] as $k => $v) {
						if ($dt -> __cron_conf_date($v[0])) {
							if($v[1] == true) {
								if (__check_new($k, $conf['logdir'] . $conf['logname'])) {
									if (__get_next_date($k, $conf['logdir'] . $conf['logname']) <= date('Y-m-d H:i:s')) {
										if (self::__execute($k))
											write_log(time() . " " . $dt -> __cron_conf_date($v[0]) . " " . $k . " success\r\n", 2);
										else
											sendError("Fatal error", "Fatal error, File Not Found !!! \r\n".getIDServer()."\r\n");
									}
								}
								else
									write_log(time() . " " . $dt -> __cron_conf_date($v[0]) . " " . $k . " success\r\n", 2);
							}
						}
						else
							sendError("Fatal error", "Fatal error, invalid schedule format \r\n".getIDServer()."\r\n");
					}
				}
				else
					sendError("Fatal error", "Failed, directory is not writable \r\n".getIDServer()."\r\n");
			}
		}
		else
			sendError("Fatal error", "Failed, directory doesn't exists. \r\n".getIDServer()."\r\n");
	}
	
	function __execute($file) {
		if ( file_exists( BASEPATH . 'cron/' .  $file . EXT ) ) {
			include_once( BASEPATH . 'cron/' .  $file . EXT );
			if ( class_exists( $file ) ) {
				$exe = new $file();
				if ( method_exists( $file, 'execute' ) ) $exe -> execute();
				return true;
			}
		}
		return false;
	}
}
