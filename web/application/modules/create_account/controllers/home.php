<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('create_account_model');
		$this -> load -> model('register/register_model');
	}

	function index() {
		if ($_POST) {
			$email = $this -> input -> post('email');
			$duration = $this -> input -> post('duration');
			$pass = $this -> input -> post('pass');
			$cpass = $this -> input -> post('cpass');
			$desc = $this -> input -> post('desc');
			$price = str_replace(',','',$this -> input -> post('price'));
			
			if (!$email || !$duration || !$pass || !$cpass) {
				__set_error_msg(array('error' => 'Data you input is incomplete !!!'));
			}
			else if (strlen($pass) < 6 && strlen($pass) > 20) {
				__set_error_msg(array('error' => 'Password min 6 character and max 20 character !!!'));
			}
			else if ($pass !== $cpass) {
				__set_error_msg(array('error' => 'Password and Confirm Password not match !!!'));
			}
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				__set_error_msg(array('error' => 'Invalid email format !!!'));
			}
			else {
				$salt = __get_salt();
				$pwd = __set_pass($cpass, $salt);
				
				if ($this -> register_model -> __check_email_exists($email) > 0) {
					__set_error_msg(array('error' => 'Email has been registered, please choose another email !!!'));
				}
				else {
					$ckPoint = $this -> create_account_model -> __get_user_point($this -> memcachedlib -> sesresult['uid']);
					$expire = strtotime(date('Y-m-d H:i:s', strtotime('+'.$duration.' months')));
					$base = 0.5;
					$min = 6;
					$dpoint = ($duration / $min) * $base;
					$cpoint = $ckPoint[0] -> upoint - $dpoint;

					if ($ckPoint[0] -> upoint > 0 && $dpoint > 0) {
						if ($this -> register_model -> __insert_user(array('ulevel' => 4, 'uemail' => $email, 'upass' => $pwd, 'uexpire' => $expire, 'usalt' => $salt, 'urefid' => $this -> memcachedlib -> sesresult['uid'], 'utype' => 2, 'ustatus' => 1))) {
							$this -> create_account_model -> __update_users($this -> memcachedlib -> sesresult['uid'], array('upoint' => $cpoint));
							$this -> create_account_model -> __insert_history(array('cuid' => $this -> memcachedlib -> sesresult['uid'], 'cdate' => time(), 'cemail' => $email, 'cduration' => $duration, 'cprice' => $price, 'cdesc' => $desc));
							
							__set_error_msg(array('info' => 'Account successfully created.'));
						}
						else
							__set_error_msg(array('error' => 'Failed create account, please contact our support !!!'));
					}
					else
						__set_error_msg(array('error' => 'You dont have enough point !!!'));
				}
			}
			redirect(site_url('panel/create_account'));
		}
		else
			$this->load->view('pages/create_account', array());
	}
}
