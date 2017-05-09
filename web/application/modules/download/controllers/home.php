<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('download_model');
	}

	function index() {
		$view['data'] = $this -> download_model -> __get_download();
		$this->load->view('pages/download', $view);
	}
}
