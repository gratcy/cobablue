<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('confirmation_model');
		$this -> load -> model('transaction/transaction_model');
		$this -> load -> model('users/users_model');
		$this -> load -> model('product/product_model');
		$this -> load -> library('pagination_lib');
		$this -> load -> library('product/product_lib');
	}

	function index($page) {
		$pager = $this -> pagination_lib -> pagination($this -> confirmation_model -> __get_confirmation(),3,10,site_url('panel/confirmation'));
		$view['confirmation'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$view['page'] = (!$page ? 1 : (int) $page);
		$this->load->view('pages/confirmation', $view);
	}

	function update($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$tcid = (int) $this -> input -> post('tcid');
			$product = (int) $this -> input -> post('product');
			$uid = (int) $this -> input -> post('uid');
			$ptype = (int) $this -> input -> post('ptype');
			$status = (int) $this -> input -> post('status');
			$desc = $this -> input -> post('desc');
			$to = $this -> input -> post('to');
			$expire = str_replace('/','-',$to);
			
			if ($id && $tcid && $uid) {
				if (strtotime($expire) < time() && $ptype == 0) {
					__set_error_msg(array('info' => 'Invalid expire !!!'));
					redirect(site_url('panel/confirmation'));
				}
				else {
					if ($status == 1) {
						if (strtotime($expire) > time() && $ptype == 0) {
							$this -> users_model -> __update_users($uid, array('uexpire' => strtotime($expire)),1);	
						}
						if ($ptype == 1 && $product > 0) {
							$pp = $this -> product_model -> __get_product_detail($product);
							$up = $this -> users_model -> __get_point($uid);
							$this -> users_model -> __update_users($uid, array('upoint' => $up[0] -> upoint+$pp[0] -> ppoint),1);	
						}
						
						$this -> confirmation_model -> __insert_confirmation(array('cuid' => $this -> memcachedlib -> sesresult['uid'], 'ctid' => $id, 'cdate' => time(), 'cdesc' => $desc, 'cstatus' => 1));
						$this -> transaction_model -> __update_transaction($id, array('tstatus' => 2),1);
						$this -> transaction_model -> __update_transaction($tcid, array('tstatus' => 1),2);
						
						__set_error_msg(array('info' => 'Transaction successfully confirmed.'));
						redirect(site_url('panel/confirmation'));
					}
					else {
						__set_error_msg(array('info' => 'There is no data changes !!!'));
						redirect(site_url('panel/confirmation'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Invalid input data !!!'));
				redirect(site_url('panel/confirmation'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> confirmation_model -> __get_confirmation_detail($id);
			$view['product'] = $this -> product_lib -> __get_product($view['detail'][0] -> tpid);
			$this->load->view('pages/confirmation_update', $view);
		}
	}
	
	function delete($id) {
		if ($this -> transaction_model -> __update_transaction($id, array('tstatus' => 3),1)) {
			$this -> transaction_model -> __update_transaction($id, array('tstatus' => 2),2);
			$this -> confirmation_model -> __update_confirmation($id, array('cstatus' => 0));
			__set_error_msg(array('info' => 'Confirmation succesfully canceled.'));
			redirect(site_url('panel/confirmation'));
		}
		else {
			__set_error_msg(array('error' => 'Failed cancel confirmation !!!'));
			redirect(site_url('panel/confirmation'));
		}
	}
}
