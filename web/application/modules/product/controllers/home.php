<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('product_model');
		$this -> load -> library('pagination_lib');
	}

	function index($page) {
		$pager = $this -> pagination_lib -> pagination($this -> product_model -> __get_product(),3,10,site_url('product'));
		$view['product'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$view['page'] = (!$page ? 1 : (int) $page);
		$this->load->view('pages/product', $view);
	}
}
