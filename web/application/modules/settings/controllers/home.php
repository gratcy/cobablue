<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('settings_model');
	}

	function index() {
		$view['detail'] = $this -> settings_model -> __get_profile($this -> memcachedlib -> sesresult['uid']);
		$this->load->view('pages/settings', $view);
	}
}
