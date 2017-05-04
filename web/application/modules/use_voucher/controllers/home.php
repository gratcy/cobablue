<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('use_voucher_model');
		$this -> load -> model('users/users_model');
	}

	function index() {
		$code = $this -> input -> post('code');
		if ($_POST) {
			if ($code) {
				$ck = $this -> use_voucher_model -> __check_voucher($code);
				if ($ck) {
					if ($ck[0] -> vstatus == 3) {
						__set_error_msg(array('error' => 'Voucher has been used !!!'));
						redirect(site_url('panel/use-voucher'));
					}
					else if ($ck[0] -> vexpire < time()) {
						__set_error_msg(array('error' => 'Voucher is expired !!!'));
						redirect(site_url('panel/use-voucher'));
					}
					else {
						$ex = $this -> users_model -> __get_users_detail($this -> memcachedlib -> sesresult['uid']);
						if ($ex[0] -> uexpire < time()) $expire = strtotime('+'.$ck[0] -> vday.' day');
						else $expire = strtotime('+'.$ck[0] -> vday.' day', $ex[0] -> uexpire);

						$this -> users_model -> __update_users($this -> memcachedlib -> sesresult['uid'], array('uexpire' => $expire), 1);
						
						$this -> use_voucher_model -> __update_voucher($ck[0] -> vid, array('vusedby' => $this -> memcachedlib -> sesresult['uid'], 'vdateused' => time(), 'vstatus' => 3));
						__set_error_msg(array('info' => 'Congratulation voucher successfully used. Your expired added '.$ck[0] -> vday.' day and become '.date('d-m-Y', $expire).'.'));
						redirect(site_url('panel/use-voucher'));
					}
				}
				else {
					__set_error_msg(array('error' => 'Invalid Voucher Code !!!'));
					redirect(site_url('panel/use-voucher'));
				}
			}
			else {
				__set_error_msg(array('error' => 'Invalid input data !!!'));
				redirect(site_url('panel/use-voucher'));
			}
		}
		else
			$this->load->view('pages/use_voucher', '');
	}
}
