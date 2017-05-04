<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('voucher_model');
		$this -> load -> library('pagination_lib');
		if ($this -> memcachedlib -> sesresult['ulevel'] != 1) redirect(site_url('panel'));
	}

	function index($page) {
		$keyword = $this -> input -> post('keyword');
		$limit = 10;
		if ($keyword) {
			$view['voucher'] = $this -> voucher_model -> __search_voucher($keyword);
			$view['pages'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> voucher_model -> __get_voucher(),3,$limit,site_url('panel/voucher/'));
			$view['voucher'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
		}
		$view['page'] = (!$page ? 1 : (int) $page);
		$view['limit'] = $limit;
		$this->load->view('pages/voucher', $view);
	}
	
	private function generator($day, $expired) {
		$code = strtoupper(__get_salt(10));
		$ck = $this -> voucher_model -> __check_voucher($code);
		if (!$ck[0]) {
			return $this -> voucher_model -> __insert_voucher(array('vcode' => $code, 'vday' => $day, 'vexpire' => strtotime($expired), 'vstatus' => 1));
		}
		else {
			return $this -> generator($code);
		}
	}
	
	function voucher_generate() {
		if ($_POST) {
			$day = (int) $this -> input -> post('day');
			$qty = (int) $this -> input -> post('qty');
			$expired = $this -> input -> post('expired');
			
			if (!$expired || !$day || !$qty) {
				__set_error_msg(array('error' => 'Day and expired is incomplete !!!'));
				redirect(site_url('panel/voucher/generate'));
			}
			else {
				for($i=0;$i<$qty;++$i) {
					$this -> generator($day, $expired);
				}
				
				__set_error_msg(array('info' => 'Voucher successfully generated.'));
				redirect(site_url('panel/voucher'));
			}
		}
		else
			$this->load->view('pages/voucher_generate', '');
	}
	
	function voucher_delete($id) {
		if ($this -> voucher_model -> __update_voucher($id, array('vstatus' => 2),1)) {
			__set_error_msg(array('info' => 'Voucher succesfully removed.'));
			redirect(site_url('panel/voucher'));
		}
		else {
			__set_error_msg(array('error' => 'Failed removed voucher !!!'));
			redirect(site_url('panel/voucher'));
		}
	}
}
