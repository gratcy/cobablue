<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('home_model');
	}

	function index() {
		$rdata = $this -> home_model -> __get_files();
		$data = array();
		foreach($rdata as $k => $v)	{
			$v -> file = ($v -> ffile ? __get_url_file($v -> ffile) : $v -> furl);
			$data[$v -> ftype] = $v;
		}
		
		$view['file'] = $data;
		$this->load->view('index', $view);
	}
}
