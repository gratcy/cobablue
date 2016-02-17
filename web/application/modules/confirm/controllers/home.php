<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('confirm_model');
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
						$this -> confirm_model -> __update_user($email, array('ustatus' => 1));
						$this -> confirm_model -> __update_token($token[0] -> tid, array('tstatus' => 0));
							
						__set_error_msg(array('info' => 'Account succesfully active, please login.'));
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
}
