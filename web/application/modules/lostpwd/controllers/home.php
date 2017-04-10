<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('lostpwd_model');
		$this -> load -> helper('recaptchalib_helper');
	}

	function index() {
		if ($_POST) {
			$email = $this -> input -> post('email');
			$captchar = $this -> input -> post('g-recaptcha-response');
			
			$params = array();
			$params['secret'] = '6Le2UxkTAAAAAAL8lB-vqqipfbfTjk4v_k4w4Ewx';
			$params['response'] = urlencode($captchar);
			$params['remoteip'] = $_SERVER['REMOTE_ADDR'];
			$params_string = http_build_query($params);
			$requestURL = 'https://www.google.com/recaptcha/api/siteverify?' . $params_string;

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => $requestURL,
			));

			$response = curl_exec($curl);
			curl_close($curl);

			$response = @json_decode($response, true);
			if ($response) {
				if ($response["success"] == false) {
					__set_error_msg(array('error' => 'Invalid security code !!!'));
					redirect(site_url('lostpwd'));
				}
				else {
					if (!$email) {
						__set_error_msg(array('error' => 'Email must be filled !!!'));
						redirect(site_url('lostpwd'));
					}
					else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						__set_error_msg(array('error' => 'Invalid email format !!!'));
						redirect(site_url('lostpwd'));
					}
					else {
						if ($this -> lostpwd_model -> __check_email_exists($email) > 0) {
							$uid = $this -> lostpwd_model -> __get_userid($email);
							$key = __get_salt();
							
							if ($this -> lostpwd_model -> __insert_token(array('tuid' => $uid[0] -> uid, 'ttype' => 2, 'tkey' => $key, 'tstatus' => 1))) {
								$to = $email;
								$subject = "Email Reset Password Anti Block";
								$data = array();
								$data['link'] = site_url('lostpwd/setpwd?email=' . $email . '&key=' . $key);
								if (__send_email($to,$subject,$data,FCPATH . 'application/views/front/email/reset-pass.html')) {
									__set_error_msg(array('info' => 'Please check your email to reset password.'));
									redirect(site_url('lostpwd'));
								}
								else {
									__set_error_msg(array('error' => 'Failed sent email !!!'));
									redirect(site_url('lostpwd'));
								}
							}
							else {
								__set_error_msg(array('error' => 'Failed update data !!!'));
								redirect(site_url('lostpwd'));
							}
						}
						else {
							__set_error_msg(array('error' => 'Email not yet register !!!'));
							redirect(site_url('lostpwd'));
						}
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Dissmiss input data !!!'));
				redirect(site_url('lostpwd'));
			}
		}
		else
			$this->load->view('lostpwd', '');
	}

	function setpwd() {
		if ($_POST) {
			$email = $this -> input -> post('email');
			$pass = $this -> input -> post('pass');
			$cpass = $this -> input -> post('cpass');
			$key = $this -> input -> post('key');
			
			if (!$email || !$key) {
				__set_error_msg(array('error' => 'Failed set password !!!'));
				redirect(site_url('lostpwd/setpwd?email=' . $email . '&key=' . $key));
			}
			else if (!$cpass || !$pass) {
				__set_error_msg(array('error' => 'Pass and confirm password must filled !!!'));
				redirect(site_url('lostpwd/setpwd?email=' . $email . '&key=' . $key));
			}
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				__set_error_msg(array('error' => 'Invalid email format !!!'));
				redirect(site_url('lostpwd/setpwd?email=' . $email . '&key=' . $key));
			}
			else if ($cpass !== $pass) {
				__set_error_msg(array('error' => 'Password and confirm password is not match !!!'));
				redirect(site_url('lostpwd/setpwd?email=' . $email . '&key=' . $key));
			}
			else {
				if ($this -> lostpwd_model -> __check_email_exists($email) > 0) {
					$token = $this -> lostpwd_model -> __check_key_exists($email, $key);
					if ($token[0]) {
						$salt = __get_salt();
						$pwd = __set_pass($cpass, $salt);
						
						if ($this -> lostpwd_model -> __update_user($email, array('upass' => $pwd, 'usalt' => $salt))) {
							$this -> lostpwd_model -> __update_token($token[0] -> tid, array('tstatus' => 0));
							
							__set_error_msg(array('info' => 'Password successfully reset !!!'));
							redirect(site_url('lostpwd/setpwd?email=' . $email . '&key=' . $key));
						}
						else {
							__set_error_msg(array('error' => 'Failed reset password !!!'));
							redirect(site_url('lostpwd/setpwd?email=' . $email . '&key=' . $key));
						}
					}
					else {
						__set_error_msg(array('error' => 'Invalid token auth !!!'));
						redirect(site_url('lostpwd/setpwd?email=' . $email . '&key=' . $key));
					}
				}
				else {
					__set_error_msg(array('error' => 'Email not yet register !!!'));
					redirect(site_url('lostpwd/setpwd?email=' . $email . '&key=' . $key));
				}
			}
		}
		else {
			$view['email'] = $this -> input -> get('email');
			$view['key'] = $this -> input -> get('key');
			if (!$view['email'] || !$view['key']) redirect(site_url());
			$this->load->view('setpwd', $view);
		}
	}
}
