<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('transaction_model');
		$this -> load -> library('pagination_lib');
		$this -> load -> library('product/product_lib');
	}

	function index($page) {
		$pager = $this -> pagination_lib -> pagination($this -> transaction_model -> __get_transaction($this -> memcachedlib -> sesresult['uid']),3,10,site_url('refferal'));
		$view['transaction'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$view['page'] = (!$page ? 1 : (int) $page);
		$this->load->view('pages/transaction', $view);
	}

	function topup() {
		$view['product'] = $this -> product_lib -> __get_product(0);
		$this->load->view('pages/topup', $view);
	}

	function confirm() {
		$this->load->view('pages/confirm', '');
	}
}
