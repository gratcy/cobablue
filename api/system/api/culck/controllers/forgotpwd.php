<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class forgotpwd extends controller {
	
	function __construct() {
		parent::controller();
		parent::module('models', 'models_login', 'culck');
		parent::module('helpers', 'functions_culck_helpers', 'culck');
		
		header('Content-type: application/json');
	}
	
	function execute() {
		$email = $this -> rg -> post('email');
		
		if (!$email) {
			$res = array('status' => -1, 'message' => 'Invalid input data !!!');
		}
		else {
			if ($this -> models_login -> __check_email_exists($email) > 0) {
				$uid = $this -> models_login -> __check_user($email);
				$key = __get_salt();
				if ($this -> models_login -> __insert_token(array('tuid' => $uid['uid'], 'ttype' => 2, 'tkey' => $key, 'tstatus' => 1))) {
					$to = $email;
					$subject = "Email Reset Password Anti Block";
					$message = "Email Reset Password Anti Block \r\n";
					$message .= "Please click this link below to reset your password \r\n";
					$message .= 'https://neverblock.me/lostpwd/setpwd?email=' . $email . '&key=' . $key . " \r\n \r\n \r\n \r\n";
					$message .= "Regards, \r\n";
					$message .= " \r\n";
					$message .= "Admin \r\n";
					
					if (__send_email($to,$subject,$message)) {
						$res = array('status' => -2, 'message' => 'Please check your email to reset password.');
					}
					else {
						$res = array('status' => -1, 'message' => 'Failed sent email, please try again later !!!');
					}
				}
				else {
					$res = array('status' => -1, 'message' => 'Failed generate token, please try again later !!!');
				}
			}
			else {
				$res = array('status' => -1, 'message' => 'Email not yet register !!!');
			}
		}
		echo json_encode($res);
	}
}
