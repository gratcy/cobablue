<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class register extends controller {
	
	function __construct() {
		parent::controller();
		parent::database();
		parent::module('models', 'models_auth', 'culck');
		parent::module('models', 'models_login', 'culck');
		parent::module('helpers', 'functions_culck_helpers', 'culck');
		
		header('Content-type: application/json');
	}

	function execute() {
		$token = $this -> rg -> post('token');
		$name = $this -> rg -> post('name');
		$phone = $this -> rg -> post('phone');
		$email = $this -> rg -> post('email');
		$pass = $this -> rg -> post('pass');
		$cpass = $this -> rg -> post('cpass');

		$res = array(-1 => 'failed');

		if ($token) {
			if (!$name || !$phone || !$email || !$pass || !$cpass) {
				$res = array(-1 => 'Data you entered is incomplete !!!');
			}
			else if (preg_match('/^[0-9\-\+]{8-20}$/', $phone)) {
				$res = array(-1 => 'Invalid phone format !!!');
			}
			else if ($pass !== $cpass) {
				$res = array(-1 => 'Password and confirm password is not match !!!');
			}
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$res = array(-1 => 'Invalid email format !!!');
			}
			else {
				$ck = $this -> models_auth -> __check_token($token,3);
				if (isset($ck[0])) {
					if (date('Y-m-d H:i:s', $ck['aexpire']) >= date('Y-m-d H:i:s')) {
						if ($this -> models_auth -> __update_auth(array('astatus' => 0), $ck['aid'])) {
							parent::database('main', true);
							if ($this -> models_login -> __check_email_exists($email) > 0) {
								$res = array(-1 => 'Email has been registered !!!');
							}
							else {
								$salt = __get_salt();
								$pwd = __set_pass($cpass, $salt);
								$rcode = explode('@',$email);
								if($this -> models_login -> __insert_user(array('ulevel' => 2, 'uemail' => $email, 'urefcode' => $rcode[0], 'upass' => $pwd, 'usalt' => $salt))) {
									$lID = $this -> db -> last_id();
									$this -> models_login -> __update_user(array('ufullname' => $name), $lID, 2);
									$key = __get_salt();
									$this -> models_login -> __insert_token(array('tuid' => $lID, 'ttype' => 1, 'tkey' => $key, 'tstatus' => 1));
									
									$to = $email;
									$subject = "Email Confirmation Activation Account Anti Block";
									$message = "Email Confirmation Activation Account Anti Block \r\n";
									$message = "Please click this link below to activation your account anti block \r\n";
									$message = 'http://neverblock.me/confirm?email=' . $email . '&key=' . $key . " \r\n \r\n \r\n \r\n";
									$message = "Regards, \r\n";
									$message = " \r\n";
									$message = "Admin \r\n";
									
									__send_email($to,$subject,$message);
									
									$res = array(-2 => 'Register complete, please check your email to activation account.');
								}
								else
									$res = array(-1 => 'Invalid input data !!!');
							}
						}
					}
				}
			}
		}
		
		echo json_encode($res);
	}
}
