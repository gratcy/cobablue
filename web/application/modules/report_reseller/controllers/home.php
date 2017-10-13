<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('report_reseller_model');
		$this -> load -> library('report_reseller/report_reseller_lib');
		$this -> load -> library('pagination_lib');
	}

	function index() {
		$reseller = 0;
		if ($_POST) {
			$reseller = (int) $this -> input -> post('reseller');
			$sort = explode(' - ', $this -> input -> post('datesort'));
			$from = str_replace('/', '-', $sort[0]);
			$to = str_replace('/', '-', $sort[1]);
			$view['from'] = date('Y-m-d', strtotime($from));
			$view['to'] = date('Y-m-d', strtotime($to));
			$view['reseller_detail'] = $this -> report_reseller_model -> __get_reseller_detail($reseller);
		}
		else {
			$view['from'] = date('Y-m-d', strtotime('-1 month'));
			$view['to'] = date('Y-m-d');
		}
		
		$view['reports'] = $this -> report_reseller_model -> __get_report_reseller($view['from'], $view['to'], $reseller);
		$view['reseller'] = $this -> report_reseller_lib -> __get_reseller($reseller);
		$this->load->view('pages/report_reseller', $view);
	}
}
