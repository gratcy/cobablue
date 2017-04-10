<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
	}

	function index($page) {
		$this->load->view($page, array());
	}
}
