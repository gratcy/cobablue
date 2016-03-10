<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('support_model');
		$this -> load -> library('pagination_lib');
	}

	function index($page) {
		$pager = $this -> pagination_lib -> pagination($this -> support_model -> __get_tickets($this -> memcachedlib -> sesresult['uid'],$this -> memcachedlib -> sesresult['ulevel'],1),3,10,site_url('panel/support'));
		$view['tickets'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$view['page'] = (!$page ? 1 : (int) $page);
		$this->load->view('pages/support', $view);
	}
	
	function ticket() {
		if ($_POST) {
			$tto = (int) $this -> input -> post('tto');
			$subject = $this -> input -> post('subject');
			$msg = $this -> input -> post('msg');
			
			if (!$tto || !$subject || !$msg) {
				__set_error_msg(array('error' => 'Data that you entered is incomplete !!!'));
				redirect(site_url('panel/support/ticket'));
			}
			else {
				if ($this -> support_model -> __insert_tickets(array('tto' => $tto, 'tuid' => $this -> memcachedlib -> sesresult['uid'], 'tdate' => time(), 'tsubject' => $subject, 'tmsg' => $msg, 'tparent' => 0, 'tstatus' => 1))) {
					__set_error_msg(array('info' => 'Ticket successfully sent !!!'));
					redirect(site_url('panel/support'));
				}
				else {
					__set_error_msg(array('error' => 'Dissmiss input data !!!'));
					redirect(site_url('panel/support/ticket'));
				}
			}
		}
		else {
			$this->load->view('pages/ticket', '');
		}
	}
	
	function reply($id) {
		if ($_POST) {
			$tto = (int) $this -> input -> post('tto');
			$id = (int) $this -> input -> post('id');
			$uid = (int) $this -> input -> post('uid');
			$parent = (int) ($this -> memcachedlib -> sesresult['ulevel'] != 4 ? $id : $this -> input -> post('parent'));
			$subject = $this -> input -> post('subject');
			$msg = $this -> input -> post('msg');
			
			if ($id) {
				if (!$tto || !$subject || !$msg || !$parent || !$uid) {
					__set_error_msg(array('error' => 'Data that you entered is incomplete !!!'));
					redirect(site_url('panel/support/reply/' . $id));
				}
				else {
					if ($this -> support_model -> __insert_tickets(array('tto' => $tto, 'tuid' => $uid, 'truid' => $this -> memcachedlib -> sesresult['uid'], 'tdate' => time(), 'tsubject' => $subject, 'tmsg' => $msg, 'tparent' => $parent, 'tstatus' => 1))) {
						__set_error_msg(array('info' => 'Ticket successfully sent !!!'));
						redirect(site_url('panel/support'));
					}
					else {
						__set_error_msg(array('error' => 'Dissmiss input data !!!'));
						redirect(site_url('panel/support/reply/' . $id));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Dissmiss input data !!!'));
				redirect(site_url('panel/support'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> support_model -> __get_tickets_detail($this -> memcachedlib -> sesresult['uid'],$this -> memcachedlib -> sesresult['ulevel'], $id);

			if (!$view['detail']) {
				__set_error_msg(array('error' => 'Dissmiss input data !!!'));
				redirect(site_url('panel/support'));
			}
			
			$this->load->view('pages/support_reply', $view);
		}
	}
	
	function delete($id) {
		$ck = $this -> support_model -> __check_is_parent($id);
		
		if ($ck[0] -> tparent == 0) $this -> support_model -> __update_tickets($id, array('tstatus' => 0),2);
		
		if ($this -> support_model -> __update_tickets($id, array('tstatus' => 0),1)) {
			__set_error_msg(array('info' => 'Tiket succesfully removed.'));
			redirect(site_url('panel/support'));
		}
		else {
			__set_error_msg(array('error' => 'Failed removed ticket !!!'));
			redirect(site_url('panel/support'));
		}
	}
}
