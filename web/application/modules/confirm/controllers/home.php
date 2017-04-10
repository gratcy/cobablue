<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('confirm_model');
		$this -> load -> helper('recaptchalib_helper');
	}

	function index() {
		$email = $this -> input -> get('email');
		$key = $this -> input -> get('key');
		
		if ($_GET) {
			if (!$email || !$key) {
				__set_error_msg(array('error' => 'Failed activation account !!!'));
				redirect(site_url('confirm'));
			}
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				__set_error_msg(array('error' => 'Invalid email format !!!'));
				redirect(site_url('confirm'));
			}
			else {
				if ($this -> confirm_model -> __check_email_exists($email) > 0) {
					$token = $this -> confirm_model -> __check_key_exists($email, $key);
					if ($token[0]) {
						$rfid = $this -> confirm_model -> __get_refid($email);
						if (isset($rfid[0] -> urefid)) {
							$expire = strtotime('+2 week', $rfid[0] -> uexpire);
							$this -> confirm_model -> __update_user($rfid[0] -> urefid, array('uexpire' => $expire),1);
						}
						
						$this -> confirm_model -> __update_user($email, array('ustatus' => 1),1);
						$this -> confirm_model -> __update_token($token[0] -> tid, array('tstatus' => 0));
							
						__set_error_msg(array('info' => 'Account succesfully activated, please login.'));
						redirect(site_url('confirm'));
					}
					else {
						__set_error_msg(array('error' => 'Failed activation account !!!'));
						redirect(site_url('confirm'));
					}
				}
				else {
					__set_error_msg(array('error' => 'Invalid email !!!'));
					redirect(site_url('confirm'));
				}
			}
		}
		else {
			$this->load->view('confirm', '');
		}
	}
	
	function reactive() {
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
					redirect(site_url('reactive'));
				}
				else {
					if (!$email) {
						__set_error_msg(array('error' => 'Email must be filled !!!'));
						redirect(site_url('reactive'));
					}
					else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						__set_error_msg(array('error' => 'Invalid email format !!!'));
						redirect(site_url('reactive'));
					}
					else {
						$ck = $this -> confirm_model -> __get_user($email);
						if (!$ck[0] -> uid) {
							__set_error_msg(array('error' => 'Email doesn\'t exist !!!'));
							redirect(site_url('reactive'));
						}
						else {
							if ($ck[0] -> ustatus == 0) {
								$this -> confirm_model -> __update_all_token($ck[0] -> uid, array('tstatus' => 0));
								$key = __get_salt();
								$this -> confirm_model -> __insert_token(array('tuid' => $ck[0] -> uid, 'ttype' => 1, 'tkey' => $key, 'tstatus' => 1));

								$to = $email;
								$subject = "Email Confirmation Activation Account Anti Block";
								$data = array();
								$data['link'] = site_url('confirm?email=' . $email . '&key=' . $key);
								$data['email'] = $email;
								__send_email($to,$subject,$data,FCPATH . 'application/views/front/email/reactive.html');
								
								__set_error_msg(array('info' => 'Your reactivation email has been sent !!!'));
								redirect(site_url('reactive'));
							}
							else {
								if ($ck[0] -> ustatus == 1) {
									__set_error_msg(array('info' => 'Your account has been activated !!!'));
									redirect(site_url('reactive'));
								}
								else {
									__set_error_msg(array('error' => 'Your account has been banned !!!'));
									redirect(site_url('reactive'));
								}
							}
						}
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Dissmiss input data !!!'));
				redirect(site_url('reactive'));
			}
		}
		else {
			$this->load->view('reactive', '');
		}
	}
}
