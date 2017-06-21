<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('product_model');
		$this -> load -> library('pagination_lib');
	}

	function index($page) {
		$pager = $this -> pagination_lib -> pagination($this -> product_model -> __get_product(),3,10,site_url('panel/product'));
		$view['product'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$view['page'] = (!$page ? 1 : (int) $page);
		$this->load->view('pages/product', $view);
	}
	
	function product_add() {
		if ($_POST) {
			$name = $this -> input -> post('name');
			$ptype = (int) $this -> input -> post('ptype');
			$point = (int) $this -> input -> post('point');
			$price = str_replace(',','',$this -> input -> post('price'));
			$desc = $this -> input -> post('desc');
			$status = (int) $this -> input -> post('status');
			$year = (int) $this -> input -> post('year');
			
			if (!$name || !$price) {
				__set_error_msg(array('error' => 'Product name and price must filled !!!'));
				redirect(site_url('panel/product/add'));
			}
			else if (!is_numeric($price)) {
				__set_error_msg(array('error' => 'Invalid price format !!!'));
				redirect(site_url('panel/product/add'));
			}
			else {
				if ($this -> product_model -> __insert_product(array('ptype' => $ptype, 'pname' => $name, 'pprice' => $price, 'pyear' => $year, 'pdesc' => $desc, 'ppoint' => $point, 'pstatus' => $status))) {
					__set_error_msg(array('info' => 'Product successfully added !!!'));
					redirect(site_url('panel/product'));
				}
				else {
					__set_error_msg(array('error' => 'Dissmiss input data !!!'));
					redirect(site_url('panel/product/add'));
				}
			}
		}
		else
			$this->load->view('pages/product_add', '');
	}
	
	function product_update($id) {
		if ($_POST) {
			$name = $this -> input -> post('name');
			$price = str_replace(',','',$this -> input -> post('price'));
			$desc = $this -> input -> post('desc');
			$status = (int) $this -> input -> post('status');
			$year = (int) $this -> input -> post('year');
			$ptype = (int) $this -> input -> post('ptype');
			$point = (int) $this -> input -> post('point');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$name || !$price) {
					__set_error_msg(array('error' => 'Product name and price must filled !!!'));
					redirect(site_url('panel/product/update/' . $id));
				}
				else if (!is_numeric($price)) {
					__set_error_msg(array('error' => 'Invalid price format !!!'));
					redirect(site_url('panel/product/update/' . $id));
				}
				else {
					if ($this -> product_model -> __update_product($id, array('ptype' => $ptype, 'pname' => $name, 'pprice' => $price, 'pyear' => $year, 'pdesc' => $desc, 'ppoint' => $point, 'pstatus' => $status))) {
						__set_error_msg(array('info' => 'Product successfully updated !!!'));
						redirect(site_url('panel/product'));
					}
					else {
						__set_error_msg(array('error' => 'Dissmiss input data !!!'));
						redirect(site_url('panel/product/update/' . $id));
					}
				}
			} 
			else {
				__set_error_msg(array('error' => 'Dissmiss input data !!!'));
				redirect(site_url('panel/product'));
			}
		}
		else {
			$view['detail'] = $this -> product_model -> __get_product_detail($id);
			$view['id'] = $id;
			$this->load->view('pages/product_update', $view);
		}
	}
	
	function product_delete($id) {
		if ($this -> product_model -> __update_product($id, array('pstatus' => 2),1)) {
			__set_error_msg(array('info' => 'Product succesfully removed.'));
			redirect(site_url('panel/product'));
		}
		else {
			__set_error_msg(array('error' => 'Failed removed product !!!'));
			redirect(site_url('panel/product'));
		}
	}
}
