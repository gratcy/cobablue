<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function __set_error_msg($arr) {
	$CI =& get_instance();
	return $CI -> memcachedlib -> set('__msg', $arr, '60');
}

function __get_error_msg() {
	$CI =& get_instance();
	$css = (isset($CI -> memcachedlib -> get('__msg')['error']) == '' ? 'success' : 'danger');
	
	if (isset($CI -> memcachedlib -> get('__msg')['error']) || isset($CI -> memcachedlib -> get('__msg')['info'])) {
		$res = '<div class="alert alert-'.$css.' alert-dismissable" style="margin-top:10px;">';
		//~ $res = '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		$res .= (isset($CI -> memcachedlib -> get('__msg')['error']) ? $CI -> memcachedlib -> get('__msg')['error'] : $CI -> memcachedlib -> get('__msg')['info']);
		$res .= '</div>';
		$CI -> memcachedlib -> delete('__msg');
		return $res;
	}
}

function __get_status($status, $type, $type2=1) {
	$data = array('Inactive','Active','Expired','Banned');
	if ($type2 == 2) unset($data[2],$data[3]);
	$res = '';
	if ($type == 1) {
		$res = $data[$status];
	}
	else {
		foreach($data as $k => $v)
			$res .= $v . ' <input type="radio" '.($status == $k ? 'checked="checked"' : '').' name="status" value="'.$k.'" />';
	}
	return $res;
}

function __get_status_transaction($status, $type) {
	$data = array('Belum Dibayar','Sudah di Konfirmasi','Lunas');
	$res = '';
	if ($type == 1) {
		$res = $data[$status];
	}
	else {
		foreach($data as $k => $v)
			$res .= $v . ' <input type="radio" '.($status == $k ? 'checked="checked"' : '').' name="status" value="'.$k.'" />';
	}
	return $res;
}

function __get_rupiah($num,$type=1) {
	if ($type == 1) return "Rp. " . number_format($num,0,',','.');
	elseif ($type == 2) return number_format($num,0,',',',');
	elseif ($type == 3) return number_format($num,0,',','.');
	else return "Rp. " . number_format($num,2,',','.');
}

function __keyTMP($str) {
	return str_replace('/','PalMa',$str);
}

function __get_PTMP() {
    $arr = array();
    $CI =& get_instance();
    if (isset($CI -> memcachedlib -> get('__msg')['info']) || $CI -> memcachedlib -> get('__msg')['info']) {
		$CI -> memcachedlib -> delete(__keyTMP(str_replace(site_url(),'/',$_SERVER['HTTP_REFERER'])));
		$CI -> memcachedlib -> delete('__msg');
		return false;
	}
    $res = json_encode($CI -> memcachedlib -> get(__keyTMP($_SERVER['REQUEST_URI'])));
    $CI -> memcachedlib -> delete(__keyTMP($_SERVER['REQUEST_URI']));
    return $res;
}

function __set_pass($upass, $salt) {
	return sha1(md5(sha1($upass, true)) . md5($salt));
}

function __get_salt() {
	 $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	 $randStringLen = 64;
	 $randString = "";
	 for ($i = 0; $i < $randStringLen; $i++) $randString .= $charset[mt_rand(0, strlen($charset) - 1)];
	 return $randString;
}

function __get_avatar($avatar,$type) {
	if ($type == 1)
		return site_url('upload/avatar/' . $avatar);
	else
		return site_url('upload/avatar/small/' . $avatar);
}

function __imageresize($file, $dir, $fname) {
	$res = '';
	if (preg_match('/.jpeg|.jpg/i', substr($fname,-5))) $ext = 1;
	else if (preg_match('/.gif/i', substr($fname,-5))) $ext = 2;
	else if (preg_match('/.png/i', substr($fname,-5))) $ext = 3;
	else return false;
	
	if ($ext == 1)
		$im_src = imagecreatefromjpeg($file);
	elseif ($ext == 2)
		$im_src = imagecreatefromgif($file);
	else
		$im_src = imagecreatefrompng($file);
	
	$src_width = imageSX($im_src);
	$src_height = imageSY($im_src);
	
	$dst_width = 120;
	$dst_height = $src_height / ($src_width / $dst_width);
	
	$im = imagecreatetruecolor($dst_width,$dst_height);
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
	if ($ext == 1)
		imagejpeg($im,$dir.$res.$fname);
	elseif ($ext == 2)
		imagegif($im,$dir.$res.$fname);
	else
		imagepng($im,$dir.$res.$fname);
}

function __rename_file_upload($str) {
	$str = preg_replace('/[^\x20-\x7E]/','', $str);
	$str = str_replace(' ','-',$str);
	$badchar = array ('\'', '?', '!', ' ', ',', '#', '@', ';', '|', ')', '(', '}', '{', ']', '[', ':', '--', '\'', '%', '+', '\\', '&', '*', '/', '^', '`', '~');
	$str = strtolower($str);
	$res = uniqid() . time() . $str;
	$res = str_replace($badchar,'',$res);
	return trim($res);
}
	
function __get_user_level($id,$type) {
	$arr = array('Root', 'Support', 'Marketing', 'User');
	if ($type == 1) {
		return $arr[$id-1];
	}
	else {
		$res = '<option value="">-- Chose One --</option>';
		foreach($arr as $k => $v)
			if (($id-1) == $k) $res .= '<option value="'.($k+1).'" selected>'.$v.'</option>';
			else $res .= '<option value="'.($k+1).'">'.$v.'</option>';
		return $res;
	}
}

function __get_bank($id,$type,$type2) {
	if ($type2 == 1)
		$arr = array('BCA', 'Mandiri', 'BRI', 'CIMB');
	else
		$arr = array('BCA', 'Mandiri');
	if ($type == 1) {
		return $arr[$id-1];
	}
	else {
		$res = '<option value="">-- Chose Bank --</option>';
		foreach($arr as $k => $v)
			if ($id && ($id-1) == $k) $res .= '<option value="'.($k+1).'" selected>'.$v.'</option>';
			else $res .= '<option value="'.($k+1).'">'.$v.'</option>';
		return $res;
	}
}

function __send_email($to,$subject,$message) {
	$headers = 'From: noreply@indogamers.com' . "\r\n" .
		'Reply-To: noreply@indogamers.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	return @mail($to, $subject, $message, $headers);
}

function __get_from_support($name,$level,$clevel,$type) {
	if ($type == 1) {
		if ($level == 4) return 'You';
		else return $name;
	}
	else {
		if ($clevel == 1) return 'Root';
		else if ($clevel == 2) return 'Support';
		else if ($clevel == 3) return 'Marketing';
		else return $name;
	}
}
