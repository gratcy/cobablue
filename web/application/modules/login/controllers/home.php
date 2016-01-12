<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('login_model');
		$this -> load -> model('settings/settings_model');
	}

	function index() {
		$this->load->view('panel/login', '');
	}
	
	function logging() {
		if ($_POST) {
			$uemail = $this -> input -> post('uemail', true);
			$upass = $this -> input -> post('upass', true);
			$remember = (int) $this -> input -> post('remember');
			
			if (!$uemail || !$upass) {
				__set_error_msg(array('error' => 'Email and password must filled !!!'));
				redirect(site_url('panel/login'));
			}
			else {
				$login = $this -> login_model -> __get_login($uemail);
				if ($login) {
					if (__set_pass($upass,$login[0] -> usalt) == $login[0] -> upass) {
						$this -> settings_model -> __update_users($login[0] -> uid, array('ulastlogin' => ip2long($_SERVER['REMOTE_ADDR']) . '*' . time()),1);
						
						if ($remember == 1)
							$this -> memcachedlib -> add('__login', array('uid' => $login[0] -> uid, 'uemail' => $uemail, 'ulevel' => $login[0] -> ulevel,'urefcode' => $login[0] -> urefcode, 'uavatar' => $login[0] -> uavatar,'ulastlogin' => $login[0] -> ulastlogin, 'ldate' => time(), 'lip' => ip2long($_SERVER['REMOTE_ADDR']), 'skey' => md5(sha1($login[0] -> ulevel.$uemail) . 'hidden'), 'remember' => true), time()+60*60*24*100);
						else
							$this -> memcachedlib -> add('__login', array('uid' => $login[0] -> uid, 'uemail' => $uemail, 'ulevel' => $login[0] -> ulevel,'urefcode' => $login[0] -> urefcode, 'uavatar' => $login[0] -> uavatar,'ulastlogin' => $login[0] -> ulastlogin, 'ldate' => time(), 'lip' => ip2long($_SERVER['REMOTE_ADDR']), 'skey' => md5(sha1($login[0] -> ulevel.$uemail) . 'hidden'), 'remember' => false), 3600);

						redirect(site_url('panel'));
					}
					else {
						__set_error_msg(array('error' => 'Password wrong !!!'));
						redirect(site_url('panel/login'));
					}
				}
				else {
					__set_error_msg(array('error' => 'Email and password did not match !!!'));
					redirect(site_url('panel/login'));
				}
			}
		}
		else
			redirect(site_url('panel/login'));
	}
	
	function logout() {
		$this -> memcachedlib -> delete('__login');
		redirect(site_url());
	}
}
