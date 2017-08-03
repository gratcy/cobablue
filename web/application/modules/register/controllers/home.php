<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('register_model');
		$this -> load -> helper('recaptchalib_helper');
	}

	function index() {
		if ($_POST) {
			$name = $this -> input -> post('name');
			$phone = $this -> input -> post('phone');
			$email = $this -> input -> post('email');
			$cemail = $this -> input -> post('cemail');
			$pass = $this -> input -> post('pass');
			$cpass = $this -> input -> post('cpass');
			$ref = $this -> input -> post('ref');
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
					redirect(site_url('register?ref=' . $ref));
				}
				else {
					if (!$name || !$phone || !$email) {
						__set_error_msg(array('error' => 'Data that you entered is incomplete !!!'));
						redirect(site_url('register?ref=' . $ref));
					}
					else if (preg_match('/^[0-9\-\+]{8-20}$/', $phone)) {
						__set_error_msg(array('error' => 'Invalid format phone number !!!'));
						redirect(site_url('register?ref=' . $ref));
					}
					else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						__set_error_msg(array('error' => 'Invalid email format !!!'));
						redirect(site_url('register?ref=' . $ref));
					}
					else if (strlen($pass) < 6 && strlen($pass) > 20) {
						__set_error_msg(array('error' => 'Password min 6 character and max 20 character !!!'));
						redirect(site_url('register?ref=' . $ref));
					}
					else if ($cemail !== $email) {
						__set_error_msg(array('error' => 'Email and confirm email is not match !!!'));
						redirect(site_url('register?ref=' . $ref));
					}
					else if ($cpass !== $pass) {
						__set_error_msg(array('error' => 'Password and confirm password is not match !!!'));
						redirect(site_url('register?ref=' . $ref));
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
							$ckref = $this -> register_model -> __check_reff($ref);
							if ($this -> register_model -> __insert_user(array('ulevel' => 4, 'uemail' => $cemail, 'upass' => $pwd, 'usalt' => $salt, 'urefid' => (isset($ckref[0] -> uid) ? $ckref[0] -> uid : 0), 'ukey' => __api_key($email), 'uexpire' => strtotime('+14 days'), 'utype' => 1, 'uregdate' => time()))) {
								$uid = $this -> db -> insert_id();
								$this -> register_model -> __update_user($uid, array('urefcode' => $rcode[0] . $uid),1);
								$this -> register_model -> __update_user($uid, array('ufullname' => $name),2);
								
								$key = __get_salt();
								$this -> register_model -> __insert_token(array('tuid' => $uid, 'ttype' => 1, 'tkey' => $key, 'tstatus' => 1));
								
								$to = $email;
								$subject = "Email Confirmation Activation Account Neverblock";
								$data = array();
								$data['link'] = site_url('confirm?email=' . $cemail . '&key=' . $key);
								$data['email'] = $cemail;
								$data['password'] = $cpass;
								__send_email($to,$subject,$data,FCPATH . 'application/views/front/email/register.html');
								
								__set_error_msg(array('info' => 'Register complete, please check your email to activation account.'));
								redirect(site_url('register'));
							}
							else {
								__set_error_msg(array('error' => 'Dissmiss input data !!!'));
								redirect(site_url('register?ref=' . $ref));
							}
						}
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Dissmiss input data !!!'));
				redirect(site_url('register?ref=' . $ref));
			}
		}
		else {
			$view['ref'] = $this -> input -> get('ref');
			$this->load->view('register', $view);
		}
	}
}
