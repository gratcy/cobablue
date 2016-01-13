<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('settings_model');
	}

	function index() {
		if ($_POST) {
			$type = (int) $this -> input -> post('type');
			$email = $this -> input -> post('email');
			$oldpass = $this -> input -> post('oldpass');
			$newpass = $this -> input -> post('newpass');
			$repass = $this -> input -> post('repass');
			
			$fname = $this -> input -> post('fname');
			$place = $this -> input -> post('place');
			$dt = $this -> input -> post('dt');
			$country = $this -> input -> post('country');
			$city = $this -> input -> post('city');
			$postal = $this -> input -> post('postal');
			$oldavatar = $this -> input -> post('oldavatar');
			$phone = $this -> input -> post('phone');
			$addr = $this -> input -> post('addr');
			
			if ($type == 1) {
				header('Content: application/json');
				if (!$email || !$oldpass || !$newpass || !$repass) {
					$res = array('status' => 0, 'msg' => 'Data that you entered is incomplete !!!');
				}
				else if ($newpass !== $repass) {
					$res = array('status' => 0, 'msg' => 'New Password and retype is not match !!!');
				}
				else {
					$ck = $this -> settings_model -> __get_pass($this -> memcachedlib -> sesresult['uid']);
					if (__set_pass($oldpass,$ck[0] -> usalt) == $ck[0] -> upass) {
						$salt = addslashes(__get_salt());
						$npass = __set_pass($repass,$salt);
						
						if ($this -> settings_model -> __update_users($this -> memcachedlib -> sesresult['uid'],array('upass' => $npass, 'usalt' => $salt), 1))
							$res = array('status' => -1, 'msg' => 'Password successfully changed.');
						else
							$res = array('status' => 0, 'msg' => 'Failed change password !!!');
					}
					else
						$res = array('status' => 0, 'msg' => 'Old Password wrong !!!');
				}
				echo json_encode($res);
			}
			else {
				if (!$fname || !$place || !$dt || !$country || !$city || !$postal || !$phone || !$addr) {
					__set_error_msg(array('error' => 'Data that you entered is incomplete !!!'));
					redirect(site_url('panel/settings'));
				}
				else if (preg_match('/^[0-9\-\+]{8-20}$/', $phone)) {
					__set_error_msg(array('error' => 'Invalid format phone number !!!'));
					redirect(site_url('panel/settings'));
				}
				else if (!is_numeric($postal)) {
					__set_error_msg(array('error' => 'Invalid format postal code !!!'));
					redirect(site_url('panel/settings'));
				}
				else {
					$wew = explode('-',$dt);
					$dt = strtotime($wew[2].'-'.$wew[1].'-'.$wew[0]);

					$data = array('ufullname' => $fname, 'ucountry' => $country, 'ucity' => $city, 'upostal' => $postal, 'uaddr' => $addr, 'uphone' => $phone, 'uttl' => $place . '*' . $dt);
					$avatar_tmp = $_FILES['avatar']['tmp_name'];

					if ($avatar_tmp) {
						$avatar = $_FILES['avatar']['name'];
						$avatar = __rename_file_upload($avatar);
						$tavatar = FCPATH .'upload/avatar/'. $avatar;
						
						if (!preg_match('/.jpeg|.jpg|.png|.gif/i', substr($avatar,-5))) {
							__set_error_msg('Invalid file type of Avatar !!!');
							redirect(site_url('panel/settings'));
						}
						
						if (move_uploaded_file($avatar_tmp, $tavatar)) {
							$data += array('uavatar' => $avatar);
							__imageresize(FCPATH .'upload/avatar/' . $avatar, FCPATH .'upload/avatar/small/', $avatar);
							
							$rses = $this -> memcachedlib -> sesresult;
							$rses['uavatar'] = $avatar;
							
							if ($this -> memcachedlib -> sesresult['remember'] == true)
								$this -> memcachedlib -> add('__login', $rses, time()+60*60*24*100);
							else
								$this -> memcachedlib -> add('__login', $rses, 3600);
								
							if ($oldavatar && file_exists(FCPATH .'upload/avatar/'. $oldavatar)) {
								@unlink(FCPATH .'upload/avatar/'. $oldavatar);
								@unlink(FCPATH .'upload/avatar/small/'. $oldavatar);
							}
						}
					}
					
					if ($this -> settings_model -> __update_users($this -> memcachedlib -> sesresult['uid'], $data,2)) {
						__set_error_msg(array('info' => 'Profile successfully updated.'));
						redirect(site_url('panel/settings'));
					}
					else {
						__set_error_msg(array('error' => 'Failed update profile !!!'));
						redirect(site_url('panel/settings'));
					}
				}
			}
		}
		else {
			$view['detail'] = $this -> settings_model -> __get_profile($this -> memcachedlib -> sesresult['uid']);
			$this->load->view('pages/settings', $view);
		}
	}
}
