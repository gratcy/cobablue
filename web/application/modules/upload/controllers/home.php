<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('pagination_lib');
		$this -> load -> model('upload_model');
	}

	function index($page) {
		$keyword = $this -> input -> post('keyword');
		$limit = 10;
		
		$pager = $this -> pagination_lib -> pagination($this -> upload_model -> __get_files(),3,$limit,site_url('panel/upload'));
		$view['files'] = $this -> pagination_lib -> paginate();
		$view['pages'] = $this -> pagination_lib -> pages();
		$view['page'] = (!$page ? 1 : (int) $page);
		$view['limit'] = $limit;
		$this->load->view('pages/upload', $view);
	}
	
	function upload_add() {
		if ($_POST) {
			$fname = $this -> input -> post('fname');
			$url = $this -> input -> post('url');
			$version = $this -> input -> post('version');
			$utype = (int) $this -> input -> post('utype');
			$ftype = (int) $this -> input -> post('ftype');
			$status = (int) $this -> input -> post('status');
			
			if (!$fname || !$version || !$ftype) {
				__set_error_msg(array('error' => 'Filename and Version incomplete !!!'));
				redirect(site_url('panel/upload/add'));
			}
			else if ($utype == 0 && !$url) {
				__set_error_msg(array('error' => 'URL incomplete !!!'));
				redirect(site_url('panel/upload/add'));
			}
			else {
				$data = array('ftype' => $ftype, 'fname' => $fname, 'fstatus' => $status, 'fversion' => $version, 'fcreated' => json_encode(array('uid' => $this -> memcachedlib -> sesresult['uid'], 'udate' => date('Y-m-d H:i:s'))));

				$file_tmp = $_FILES['file']['tmp_name'];
				if ($utype == 1 && $file_tmp) {
					$file_name = $_FILES['file']['name'];
					$file = __rename_file_upload($file_name);
					$tfile = FCPATH . 'upload/files/'. $file;
					
					if (preg_match('/\.php/i', $file)) {
						__set_error_msg(array('error' => 'Failed upload file !!!'));
						redirect(site_url('panel/upload/add'));
					}
					
					if (move_uploaded_file($file_tmp, $tfile)) {
						$data += array('ffile' => $file, 'furl' => '');
					}
					else {
						__set_error_msg(array('error' => 'Failed upload file !!!'));
						redirect(site_url('panel/upload/add'));
					}
				}
				else {
					$data += array('furl' => $url, 'ffile' => '');
				}
				
				if ($this -> upload_model -> __insert_files($data)) {
					__set_error_msg(array('info' => 'File successfully updated !!!'));
					redirect(site_url('panel/upload'));
				}
				else {
					__set_error_msg(array('error' => 'Failed update file !!!'));
					redirect(site_url('panel/upload'));
				}
			}
		}
		else
			$this->load->view('pages/upload_add', '');
	}
	
	function upload_update($id) {
		if ($_POST) {
			$fname = $this -> input -> post('fname');
			$url = $this -> input -> post('url');
			$version = $this -> input -> post('version');
			$utype = (int) $this -> input -> post('utype');
			$ftype = (int) $this -> input -> post('ftype');
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$fname || !$version || !$ftype) {
					__set_error_msg(array('error' => 'Filename and Version incomplete !!!'));
					redirect(site_url('panel/upload/update/' . $id));
				}
				else if ($utype == 0 && !$url) {
					__set_error_msg(array('error' => 'URL incomplete !!!'));
					redirect(site_url('panel/upload/update/' . $id));
				}
				else {
					$data = array('ftype' => $ftype, 'fname' => $fname, 'fstatus' => $status, 'fversion' => $version, 'fupdated' => json_encode(array('uid' => $this -> memcachedlib -> sesresult['uid'], 'udate' => date('Y-m-d H:i:s'))));
					$file_tmp = $_FILES['file']['tmp_name'];
					if ($utype == 1 && $file_tmp) {
						$file_name = $_FILES['file']['name'];
						$file = __rename_file_upload($file_name);
						$tfile = FCPATH . 'upload/files/'. $file;
						
						if (preg_match('/\.php/i', $file)) {
							__set_error_msg(array('error' => 'Failed upload file !!!'));
							redirect(site_url('panel/upload/update/' . $id));
						}
						
						if (move_uploaded_file($file_tmp, $tfile)) {
							$data += array('ffile' => $file, 'furl' => '');
						}
						else {
							__set_error_msg(array('error' => 'Failed upload file !!!'));
							redirect(site_url('panel/upload/update/' . $id));
						}
					}
					else {
						$data += array('furl' => $url, 'ffile' => '');
					}
					
					if ($this -> upload_model -> __update_files($id, $data)) {
						__set_error_msg(array('info' => 'File successfully updated !!!'));
						redirect(site_url('panel/upload'));
					}
					else {
						__set_error_msg(array('error' => 'Failed update file !!!'));
						redirect(site_url('panel/upload'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Failed update file !!!'));
				redirect(site_url('panel/upload'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> upload_model -> __get_files_detail($id);
			$this->load->view('pages/upload_update', $view);
		}
	}
	
	function upload_delete($id) {
		if ($this -> upload_model -> __update_files($id, array('fstatus' => 2, 'fupdated' => json_encode(array('uid' => $this -> memcachedlib -> sesresult['uid'], 'udate' => date('Y-m-d H:i:s')))))) {
			__set_error_msg(array('info' => 'File succesfully removed.'));
			redirect(site_url('panel/upload'));
		}
		else {
			__set_error_msg(array('error' => 'Failed removed file !!!'));
			redirect(site_url('panel/upload'));
		}
	}
}
