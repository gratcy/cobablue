<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('transaction_model');
		$this -> load -> library('pagination_lib');
		$this -> load -> library('product/product_lib');
	}

	function index($page) {
		$pager = $this -> pagination_lib -> pagination($this -> transaction_model -> __get_transaction($this -> memcachedlib -> sesresult['uid']),3,10,site_url('panel/transaction'));
		$view['transaction'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$view['page'] = (!$page ? 1 : (int) $page);
		$this->load->view('pages/transaction', $view);
	}

	function topup() {
		if ($_POST) {
			$product = (int) $this -> input -> post('product');
			$total = (int) $this -> input -> post('total');
			$year = (int) $this -> input -> post('year');
			$desc = $this -> input -> post('desc');
			
			if (!$product || !$total || !$year) {
				__set_error_msg(array('error' => 'Product must be choose !!!'));
				redirect(site_url('panel/transaction/topup'));
			}
			else {
				$ttrans = $this -> transaction_model -> __get_total_transaction() + 1;
				$tno = 'TR' . str_pad($ttrans, 5, "0", STR_PAD_LEFT).str_pad($year, 2, "0", STR_PAD_LEFT).date('dmy');
				$exp = $this -> transaction_model -> __get_user_expire($this -> memcachedlib -> sesresult['uid']);
				
				if ($exp[0] -> uexpire) {
					if ($exp[0] -> uexpire >= time())
					$tfrom = $exp[0] -> uexpire;
					else
					$tfrom = time();
				}
				else {
					$tfrom = time();
				}
				$tto = strtotime('+1 year', $tfrom);

				if ($this -> transaction_model -> __insert_transaction(array('tuid' => $this -> memcachedlib -> sesresult['uid'], 'tno' => $tno, 'tdate' => time(), 'tpid' => $product, 'tfrom' => $tfrom, 'tto' => $tto, 'ttotal' => $total, 'tstatus' => 1))) {
					__set_error_msg(array('info' => 'Transaction succesfully added.'));
					redirect(site_url('panel/transaction'));
				}
				else {
					__set_error_msg(array('error' => 'Invalid input data !!!'));
					redirect(site_url('panel/transaction'));
				}
			}
		}
		else {
			$view['product'] = $this -> product_lib -> __get_product(0);
			$this->load->view('pages/topup', $view);
		}
	}

	function confirm() {
		if ($_POST) {
			$total = str_replace(',','',$this -> input -> post('total'));
			$aname = $this -> input -> post('aname');
			$desc = $this -> input -> post('desc');
			$ano = $this -> input -> post('ano');
			$bank = (int) $this -> input -> post('bank');
			$mbank = (int) $this -> input -> post('mbank');
			$tno = str_replace('#','',$this -> input -> post('tno'));
			
			if (!$total || !$aname || !$ano || !$bank || !$mbank || !$tno) {
				__set_error_msg(array('error' => 'Data that you entered is incomplete !!!'));
				redirect(site_url('panel/transaction/confirm'));
			}
			else if (!is_numeric($total)) {
				__set_error_msg(array('error' => 'Invalid total format !!!'));
				redirect(site_url('panel/transaction/confirm'));
			}
			else {
				$detail = $this -> transaction_model -> __get_transaction_by_tno($tno);
				if ($detail[0]) {
					if ($this -> transaction_model -> __insert_confirm(array('ttid' => $detail[0] -> tid, 'tdate' => time(), 'tabank' => $bank, 'tano' => $ano, 'taname' => $aname, 'tmbank' => $mbank, 'ttotal' => $total, 'tdesc' => $desc, 'tstatus' => 0))) {
						
						$this -> transaction_model -> __update_transaction($detail[0] -> tid, array('tstatus' => 1));
						
						__set_error_msg(array('info' => 'Transaction succesfully confirm.'));
						redirect(site_url('panel/transaction'));
					}
					else {
						__set_error_msg(array('error' => 'Invalid input data !!!'));
						redirect(site_url('panel/transaction/confirm'));
					}
				}
				else {
					__set_error_msg(array('error' => 'Ivalid Transaction No. !!!'));
					redirect(site_url('panel/transaction/confirm'));
				}
			}
		}
		else {
			$this->load->view('pages/confirm', '');
		}
	}
	
	function delete($id) {
		if ($this -> transaction_model -> __update_transaction($id, array('tstatus' => 3),1)) {
			__set_error_msg(array('info' => 'Transaction succesfully canceled.'));
			redirect(site_url('panel/transaction'));
		}
		else {
			__set_error_msg(array('error' => 'Failed cancel transaction !!!'));
			redirect(site_url('panel/transaction'));
		}
	}
}
