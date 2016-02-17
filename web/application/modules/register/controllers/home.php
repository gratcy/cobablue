<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('register_model');
	}

	function index() {
		if ($_POST) {
			$name = $this -> input -> post('name');
			$phone = $this -> input -> post('phone');
			$email = $this -> input -> post('email');
			$cemail = $this -> input -> post('cemail');
			$pass = $this -> input -> post('pass');
			$cpass = $this -> input -> post('cpass');
			
			if (!$name || !$phone || !$email) {
				__set_error_msg(array('error' => 'Data that you entered is incomplete !!!'));
				redirect(site_url('register'));
			}
			else if (preg_match('/^[0-9\-\+]{8-20}$/', $phone)) {
				__set_error_msg(array('error' => 'Invalid format phone number !!!'));
				redirect(site_url('register'));
			}
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				__set_error_msg(array('error' => 'Invalid email format !!!'));
				redirect(site_url('register'));
			}
			else if ($cemail !== $email) {
				__set_error_msg(array('error' => 'Email and confirm email is not match !!!'));
				redirect(site_url('register'));
			}
			else if ($cpass !== $pass) {
				__set_error_msg(array('error' => 'Password and confirm password is not match !!!'));
				redirect(site_url('register'));
			}
			else {
				$salt = __get_salt();
				$pwd = __set_pass($cpass, $salt);
				$rcode = explode('@',$cemail);
				
				if ($this -> register_model -> __check_email_exists($cemail) > 0) {
					__set_error_msg(array('error' => 'Email has been registered, please choose another email !!!'));
					redirect(site_url('register'));
				}
				else {
					if ($this -> register_model -> __insert_user(array('ulevel' => 2, 'uemail' => $cemail, 'upass' => $pwd, 'usalt' => $salt))) {
						$uid = $this -> db -> insert_id();
						$this -> register_model -> __update_user($uid, array('urefcode' => $rcode[0] . $uid),1);
						$this -> register_model -> __update_user($uid, array('ufullname' => $name),2);
						
						$key = __get_salt();
						$this -> register_model -> __insert_token(array('tuid' => $uid, 'ttype' => 1, 'tkey' => $key, 'tstatus' => 1));
						
						$to = $email;
						$subject = "Email Confirmation Activation Account Anti Block";
						$message = "Email Confirmation Activation Account Anti Block \r\n";
						$message = "Please click this link below to activation your account anti block \r\n";
						$message = site_url('confirm?email=' . $cemail . '&key=' . $key) . " \r\n \r\n \r\n \r\n";
						$message = "Regards, \r\n";
						$message = " \r\n";
						$message = "Admin \r\n";
						
						__send_email($to,$subject,$message);
						
						__set_error_msg(array('info' => 'Register complete, please check your email to activation account.'));
						redirect(site_url('register'));
					}
					else {
						__set_error_msg(array('error' => 'Dissmiss input data !!!'));
						redirect(site_url('register'));
					}
				}
			}
		}
		else
			$this->load->view('register', '');
	}
}
