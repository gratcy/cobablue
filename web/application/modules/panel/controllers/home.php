<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('panel_model');
	}

	function index() {
		$view['expire'] = $this -> panel_model -> __get_user_expire($this -> memcachedlib -> sesresult['uid']);
		$view['refferal'] = $this -> panel_model -> __get_recent_refferal($this -> memcachedlib -> sesresult['uid']);
		$view['transaction'] = $this -> panel_model -> __get_recent_transaction($this -> memcachedlib -> sesresult['uid']);
		$this->load->view('pages/home', $view);
	}
}
