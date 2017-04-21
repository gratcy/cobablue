<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."../application/libraries/Facebook/autoload.php";
include_once APPPATH."../application/libraries/Google/autoload.php";

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

class Home extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('login_model');
		$this -> load -> model('settings/settings_model');
		$this -> load -> model('register/register_model');
	}

	function index() {
		$CAuth = $this -> config -> load('neverblock', true);
		$fb = new Facebook\Facebook([
			'app_id' => $CAuth['facebook']['app_id'],
			'app_secret' => $CAuth['facebook']['app_secret'],
			'default_graph_version' => 'v2.2',
		]);

		$helper = $fb -> getRedirectLoginHelper();
		$data['fb_url'] = $helper->getLoginUrl(site_url('panel/login/logging_social?fb'),array('email','public_profile','publish_actions','user_posts'));
		
		$clientId = $CAuth['google']['app_id'];
		$clientSecret = $CAuth['google']['app_secret'];
		$redirectURL = site_url('panel/login/logging_social?gl');

		$gClient = new Google_Client();
		$gClient->setApplicationName('Login to NeverBlock.me');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectURL);
		$gClient->addScope('https://www.googleapis.com/auth/userinfo.email');

		$data['google_url'] = $gClient->createAuthUrl();
		$this->load->view('panel/login', $data);
	}
	
	function logging_social() {
		$CAuth = $this -> config -> load('neverblock', true);
		$code = $this -> input -> get('code');
		if (preg_match('/\?fb\&code/', $_SERVER['REQUEST_URI'])) {
			$fb = new Facebook\Facebook([
				'app_id' => $CAuth['facebook']['app_id'],
				'app_secret' => $CAuth['facebook']['app_secret'],
				'default_graph_version' => 'v2.2',
			]);

			$my_url = site_url('panel/login/logging_social?fb');
			$token_url = "https://graph.facebook.com/oauth/access_token?"
			. "client_id=" . $CAuth['facebook']['app_id'] . "&redirect_uri=" . urlencode($my_url)
			. "&client_secret=" . $CAuth['facebook']['app_secret'] . "&code=" . $code;

			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_URL, $token_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			$output = curl_exec($ch); 
			curl_close($ch);   
			$response = json_decode($output);

			try {
			  // Get the \Facebook\GraphNodes\GraphUser object for the current user.
			  // If you provided a 'default_access_token', the '{access-token}' is optional.
			  $response = $fb->get('/me?fields=email,first_name,last_name,name,gender', $response -> access_token);
			} catch(\Facebook\Exceptions\FacebookResponseException $e) {
			  // When Graph returns an error
			  echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(\Facebook\Exceptions\FacebookSDKException $e) {
			  // When validation fails or other local issues
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  exit;
			}

			$me = $response->getGraphUser();
			$name = $me -> getName();
			$email = $me -> getEmail();
			$gender = $me -> getGender();
			$gender = (strtolower($gender) == 'male' ? 1 : 2);
			$id = $me -> getId();
			$avatar = $avatar;
			$uopenidtype = 1;
		}
		else {
			$clientId = $CAuth['google']['app_id'];
			$clientSecret = $CAuth['google']['app_secret'];
			$redirectURL = site_url('panel/login/logging_social?gl');

			$gClient = new Google_Client();
			$gClient->setApplicationName('Login to NeverBlock.me');
			$gClient->setClientId($clientId);
			$gClient->setClientSecret($clientSecret);
			$gClient->setRedirectUri($redirectURL);
			$gClient->addScope('https://www.googleapis.com/auth/userinfo.email');
			$gClient->authenticate($code);
			$access_token = $gClient->getAccessToken();
			if ($gClient->getAccessToken()) {
				$gClient->setAccessToken($access_token);
				$google_oauthV2 = new Google_Service_Oauth2($gClient);
				$userData = $google_oauthV2 -> userinfo -> get();
				
				$name = $userData -> name;
				$email = $userData -> email;
				$gender = $userData -> gender;
				$avatar = $userData -> picture;
				$gender = (strtolower($gender) == 'male' ? 1 : 2);
				$id = $userData -> id;
				$uopenidtype = 2;
			}
		}
			
		if ($id && $email) {
			$r = $this -> login_model -> __get_openid($id);
			if ($r[0]) {
				$this -> settings_model -> __update_users($r[0] -> uid, array('ulastlogin' => ip2long($_SERVER['HTTP_X_REAL_IP']) . '*' . time()), 1);
				$this -> memcachedlib -> add('__login', array('uid' => $r[0] -> uid, 'uemail' => $email, 'ulevel' => 4,'urefcode' => $r[0] -> urefcode, 'uavatar' => $avatar, 'uexpire' => $r[0] -> uexpire, 'upoint' => 0, 'ulastlogin' => ip2long($_SERVER['HTTP_X_REAL_IP']) . '*' . time(), 'ldate' => time(), 'lip' => ip2long($_SERVER['HTTP_X_REAL_IP']), 'skey' => md5(sha1('4'.$email) . 'hidden'), 'remember' => true), time()+60*60*24*100);
			}
			else {
				$login = $this -> login_model -> __get_login($email);
				if ($login[0]) {
					$arr = array('uopenid' => $id, 'uopenidtype' => $uopenidtype, 'ulastlogin' => ip2long($_SERVER['HTTP_X_REAL_IP']) . '*' . time());
					if ($login[0] -> ustatus == 0) $arr = array_merge(array('ustatus' => 1), $arr);
					$this -> settings_model -> __update_users($login[0] -> uid, $arr, 1);
					$this -> settings_model -> __update_users($login[0] -> uid, array('uavatar' => $avatar), 2);
					$this -> memcachedlib -> add('__login', array('uid' => $login[0] -> uid, 'uemail' => $email, 'ulevel' => $login[0] -> ulevel,'urefcode' => $login[0] -> urefcode, 'uavatar' => $avatar, 'uexpire' => $login[0] -> uexpire, 'upoint' => $login[0] -> upoint, 'ulastlogin' => $login[0] -> ulastlogin, 'ldate' => time(), 'lip' => ip2long($_SERVER['HTTP_X_REAL_IP']), 'skey' => md5(sha1($login[0] -> ulevel.$email) . 'hidden'), 'remember' => true), time()+60*60*24*100);
				}
				else {
					$rcode = explode('@',$email);
					$this -> register_model -> __insert_user(array('ulevel' => 4, 'uemail' => $email, 'uexpire' => strtotime('+7 days'), 'ukey' => __api_key($email), 'uopenid' => $id, 'uopenidtype' => $uopenidtype, 'ulastlogin' => ip2long($_SERVER['HTTP_X_REAL_IP']) . '*' . time(), 'ustatus' => 1));
					$uid = $this -> db -> insert_id();
					$this -> register_model -> __update_user($uid, array('urefcode' => $rcode[0] . $uid),1);
					$this -> register_model -> __update_user($uid, array('ufullname' => $name,'uavatar' => $avatar, 'ugender' => $gender),2);
					$this -> memcachedlib -> add('__login', array('uid' => $uid, 'uemail' => $email, 'ulevel' => 4,'urefcode' => $rcode[0].$uid, 'uavatar' => $avatar, 'uexpire' => strtotime('+7 days'), 'upoint' => 0, 'ulastlogin' => ip2long($_SERVER['HTTP_X_REAL_IP']) . '*' . time(), 'ldate' => time(), 'lip' => ip2long($_SERVER['HTTP_X_REAL_IP']), 'skey' => md5(sha1('4'.$email) . 'hidden'), 'remember' => true), time()+60*60*24*100);
				}
			}
			redirect(site_url('panel'));
		}
		else {
			__set_error_msg(array('error' => 'Failed connect with your account !!!'));
			redirect(site_url('panel/login'));
		}
		
	}
	
	function logging() {
		if ($_POST) {
			$uemail = $this -> input -> post('uemail', true);
			$upass = $this -> input -> post('upass', true);
			$remember = (int) $this -> input -> post('remember');
			
			if (!$uemail || !$upass) {
				__set_error_msg(array('error' => 'Email and password must filled !!!'));
				redirect(site_url('panel/login'));
			}
			else {
				$login = $this -> login_model -> __get_login($uemail);
				if ($login) {
					if ($login[0] -> ustatus == 1) {
						if (__set_pass($upass,$login[0] -> usalt) == $login[0] -> upass) {
							$this -> settings_model -> __update_users($login[0] -> uid, array('ulastlogin' => ip2long($_SERVER['HTTP_X_REAL_IP']) . '*' . time()),1);
							
							if ($remember == 1)
								$this -> memcachedlib -> add('__login', array('uid' => $login[0] -> uid, 'uemail' => $uemail, 'ulevel' => $login[0] -> ulevel,'urefcode' => $login[0] -> urefcode, 'uavatar' => $login[0] -> uavatar, 'uexpire' => $login[0] -> uexpire, 'upoint' => $login[0] -> upoint, 'ulastlogin' => $login[0] -> ulastlogin, 'ldate' => time(), 'lip' => ip2long($_SERVER['HTTP_X_REAL_IP']), 'skey' => md5(sha1($login[0] -> ulevel.$uemail) . 'hidden'), 'remember' => true), time()+60*60*24*100);
							else
								$this -> memcachedlib -> add('__login', array('uid' => $login[0] -> uid, 'uemail' => $uemail, 'ulevel' => $login[0] -> ulevel,'urefcode' => $login[0] -> urefcode, 'uavatar' => $login[0] -> uavatar, 'uexpire' => $login[0] -> uexpire, 'upoint' => $login[0] -> upoint, 'ulastlogin' => $login[0] -> ulastlogin, 'ldate' => time(), 'lip' => ip2long($_SERVER['HTTP_X_REAL_IP']), 'skey' => md5(sha1($login[0] -> ulevel.$uemail) . 'hidden'), 'remember' => false), 3600);

							redirect(site_url('panel'));
						}
						else {
							__set_error_msg(array('error' => 'Password wrong !!!'));
							redirect(site_url('panel/login'));
						}
					}
					else {
						__set_error_msg(array('error' => 'Please complete activation email <a href="'.site_url('reactive').'"><b>here</b></a>...'));
						redirect(site_url('panel/login'));
					}
				}
				else {
					__set_error_msg(array('error' => 'Email and password did not match !!!'));
					redirect(site_url('panel/login'));
				}
			}
		}
		else
			redirect(site_url('panel/login'));
	}
	
	function logout() {
		$this -> memcachedlib -> delete('__login');
		redirect(site_url());
	}
}
