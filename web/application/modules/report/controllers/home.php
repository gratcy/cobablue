<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('report_model');
	}

	function index() {
		if ($_POST) {
			$sort = explode(' - ', $this -> input -> post('datesort'));
			$from = str_replace('/', '-', $sort[0]);
			$to = str_replace('/', '-', $sort[1]);
			$view['from'] = date('Y-m-d', strtotime($from));
			$view['to'] = date('Y-m-d', strtotime($to));
		}
		else {
			$view['from'] = date('Y-m-d');
			$view['to'] = date('Y-m-d', strtotime('-1 month'));
		}
		$view['report'] = $this -> report_model -> __get_report($this -> memcachedlib -> sesresult['uid'],$view['from'],$view['to']);
		$this->load->view('pages/report', $view);
	}
}
