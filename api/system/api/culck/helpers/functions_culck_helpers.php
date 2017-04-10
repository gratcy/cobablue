<?php
function __get_salt($randStringLen=64) {
     $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
     $randString = "";
     for ($i = 0; $i < $randStringLen; $i++) $randString .= $charset[mt_rand(0, strlen($charset) - 1)];
     return $randString;
}

function __api_key($str) {
	return __get_salt(90) . md5($str . '__blu') . base64_encode(uniqid());
}

function __set_pass($upass, $salt) {
	return sha1(md5(sha1($upass, true)) . md5($salt));
}

function __send_email($to,$subject,$message) {
	$headers = 'From: noreply@indogamers.com' . "\r\n" .
		'Reply-To: noreply@indogamers.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	return @mail($to, $subject, $message, $headers);
}
