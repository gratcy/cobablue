<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('users_model');
		$this -> load -> model('register/register_model');
		$this -> load -> library('pagination_lib');
		if ($this -> memcachedlib -> sesresult['ulevel'] != 1) redirect(site_url('panel'));
	}

	function index($page) {
		$keyword = $this -> input -> post('keyword');
		$limit = 10;
		
		if ($keyword) {
			$view['users'] = $this -> users_model -> __search_users($keyword);
			$view['pages'] = '';
		}
		else {
			$pager = $this -> pagination_lib -> pagination($this -> users_model -> __get_users(),3,$limit,site_url('panel/users'));
			$view['users'] = $this -> pagination_lib -> paginate();
			$view['pages'] = $this -> pagination_lib -> pages();
		}
		
		$view['page'] = (!$page ? 1 : (int) $page);
		$view['limit'] = $limit;
		$this->load->view('pages/users', $view);
	}
	
	function users_add() {
		if ($_POST) {
			$email = $this -> input -> post('email');
			$country = $this -> input -> post('country');
			$city = $this -> input -> post('city');
			$postal = $this -> input -> post('postal');
			$phone = $this -> input -> post('phone');
			$tmpt = $this -> input -> post('tmpt');
			$tgl = $this -> input -> post('tgl');
			$name = $this -> input -> post('name');
			$addr = $this -> input -> post('addr');
			$pass = $this -> input -> post('pass');
			$cpass = $this -> input -> post('cpass');
			$level = (int) $this -> input -> post('level');
			$status = (int) $this -> input -> post('status');
			
			if (!$email || !$level || !$pass) {
				__set_error_msg(array('error' => 'Email, level and password incomplete !!!'));
				redirect(site_url('panel/users/add'));
			}
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				__set_error_msg(array('error' => 'Invalid email format !!!'));
				redirect(site_url('panel/users/add'));
			}
			else if (strlen($pass) < 6 && strlen($pass) > 20) {
				__set_error_msg(array('error' => 'Password min 6 character and max 20 character !!!'));
				redirect(site_url('panel/users/add'));
			}
			else if ($pass !== $cpass) {
				__set_error_msg(array('error' => 'Password and confirm password not match !!!'));
				redirect(site_url('panel/users/add'));
			}
			else {
				$salt = __get_salt();
				$pwd = __set_pass($cpass, $salt);
				$rcode = explode('@',$email);
				
				if ($this -> register_model -> __check_email_exists($email) > 0) {
					__set_error_msg(array('error' => 'Email has been registered, please choose another email !!!'));
					redirect(site_url('panel/users/add'));
				}
				else {
					if ($this -> users_model -> __insert_users(array('ulevel' => $level, 'uemail' => $email, 'upass' => $pwd, 'usalt' => $salt, 'utype' => 1, 'ukey' => __api_key($email), 'uexpire' => strtotime('+7 days'), 'uregdate' => time(), 'ustatus' => $status))) {
						$uid = $this -> db -> insert_id();
						$this -> users_model -> __update_users($uid,array('urefcode' => $rcode[0] . $uid),1);
						$this -> users_model -> __update_users($uid,array('ufullname' => $name, 'ucountry' => $country, 'ucity' => $city, 'upostal' => $postal, 'uaddr' => $addr, 'uphone' => $phone, 'uttl' => $tmpt.'*'.strtotime($tgl)),2);
						
						$key = __get_salt();
						$this -> register_model -> __insert_token(array('tuid' => $uid, 'ttype' => 1, 'tkey' => $key, 'tstatus' => 1));
						__set_error_msg(array('info' => 'User successfully added !!!'));
						redirect(site_url('panel/users'));
					}
					else {
						__set_error_msg(array('error' => 'Dissmiss input data !!!'));
						redirect(site_url('panel/users/add'));
					}
				}
			}
		}
		else
			$this->load->view('pages/users_add', '');
	}
	
	function users_update($id) {
		if ($_POST) {
			$email = $this -> input -> post('email');
			$country = $this -> input -> post('country');
			$city = $this -> input -> post('city');
			$postal = $this -> input -> post('postal');
			$phone = $this -> input -> post('phone');
			$tmpt = $this -> input -> post('tmpt');
			$tgl = $this -> input -> post('tgl');
			$expire = $this -> input -> post('expire');
			$name = $this -> input -> post('name');
			$addr = $this -> input -> post('addr');
			$pass = $this -> input -> post('pass');
			$cpass = $this -> input -> post('cpass');
			$level = (int) $this -> input -> post('level');
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$email || !$level) {
					__set_error_msg(array('error' => 'Email, level and password incomplete !!!'));
					redirect(site_url('panel/users/update/' . $id));
				}
				else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					__set_error_msg(array('error' => 'Invalid email format !!!'));
					redirect(site_url('panel/users/update/' . $id));
				}
				else {
					$arr = array();
					if ($pass) {
						if ($pass !== $cpass) {
							__set_error_msg(array('error' => 'Password and confirm password not match !!!'));
							redirect(site_url('panel/users/update/' . $id));
						}
						else {
							$salt = __get_salt();
							$pwd = __set_pass($cpass, $salt);
							$arr += array('upass' => $pwd, 'usalt' => $salt);
						}
					}
					$arr += array('ulevel' => $level, 'ustatus' => $status, 'uexpire' => strtotime($expire));
					if ($this -> users_model -> __update_users($id, $arr,1)) {
						$this -> users_model -> __update_users($id,array('ufullname' => $name, 'ucountry' => $country, 'ucity' => $city, 'upostal' => $postal, 'uaddr' => $addr, 'uphone' => $phone, 'uttl' => $tmpt.'*'.strtotime($tgl)),2);
						__set_error_msg(array('info' => 'User successfully updated !!!'));
						redirect(site_url('panel/users'));
					}
					else {
						__set_error_msg(array('error' => 'Dissmiss input data !!!'));
						redirect(site_url('panel/users/update/' . $id));
					}
				}
			} 
			else {
				__set_error_msg(array('error' => 'Dissmiss input data !!!'));
				redirect(site_url('panel/product'));
			}
		}
		else {
			$view['detail'] = $this -> users_model -> __get_users_detail($id);
			$view['id'] = $id;
			$this->load->view('pages/users_update', $view);
		}
	}
	
	function users_delete($id) {
		if ($this -> users_model -> __update_users($id, array('ustatus' => 2),1)) {
			__set_error_msg(array('info' => 'User succesfully removed.'));
			redirect(site_url('panel/users'));
		}
		else {
			__set_error_msg(array('error' => 'Failed removed user !!!'));
			redirect(site_url('panel/users'));
		}
	}
}
