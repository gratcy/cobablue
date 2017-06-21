<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('invite_model');
	}

	function index() {
		$invite = $this -> input -> post('invite');
		if ($_POST) {
			if (!$invite) {
				__set_error_msg(array('error' => 'Data email invitation is incomplete !!!'));
				redirect(site_url('panel/invite'));
			}
			else {
				$this -> memcachedlib -> delete('__invite');
				$invites = explode("\n", $invite);
				foreach($invites as $k => $v) {
					if($v && !filter_var($v, FILTER_VALIDATE_EMAIL)) {
						$this -> memcachedlib -> add('__invite', array('invitation' => $invite), 300);
						__set_error_msg(array('error' => 'Invalid email format !!!'));
						redirect(site_url('panel/invite'));
					}
					$this -> invite_model -> __insert_invite(array('iuid' => $this -> memcachedlib -> sesresult['uid'], 'iemail' => $v, 'icreate' => time()));
				}
				
				__set_error_msg(array('info' => 'Successfully Invite.'));
				redirect(site_url('panel/invite'));
			}
		}
		else {
			$invitation = $this -> memcachedlib -> get('__invite');
			$data['invitation'] = isset($invitation) ? $invitation['invitation'] : '';
			$this->load->view('pages/invite', $data);
		}
	}
}
