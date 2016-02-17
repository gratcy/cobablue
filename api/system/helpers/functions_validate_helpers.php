<?php
function get_var($get) {
	$banwords = array ("'", ",", ";", "--", "\"", "%", "+", "\\", "&");
	$get = strip_tags($get);
	if (!preg_match("/^[-a-zA-Z0-9_=\?]{0,50}$/", $get)) $get = str_replace ( $banwords, '', $get);
	return addslashes($get);
}

function filterstring($str) {
	$str = preg_replace('/[^(\x20-\x7F)]*/','', $str);
	return stripslashes(strip_tags(trim(utf8_encode($str))));
}

function strip_quots($str) {
	$str = trim($str);
	$data = array('\'');
	$rep = array('\'\'');
	return str_replace($data, $rep, $str);
}

function custvalidation($pat,$str) {
	if (preg_match($pat, $str))
		return $str;
	else
		return false;
}

function grep_image($str, $type=1) {
	$pattern = '/<img[^>]+src[\\s=\'"]';
	$pattern .= '+([^"\'>\\s]+)/is';
	$res = '';
	if ($type == 1) {
		if (preg_match('/\/medium\/medium_/i', $str)) {
			if(preg_match($pattern,	$str, $match))
				$res = str_replace('/system/upload/media/pictures/medium/medium_','/system/upload/media/pictures/small/small_', $match[1]);
		}
		else
			if(preg_match($pattern,	$str, $match))	$res = str_replace('/system/upload/media/pictures/','/system/upload/media/pictures/small/small_', $match[1]);
			return $res;
	}
	elseif ($type == 2) {
		if(preg_match($pattern,	$str, $match)) return $match[1];
	}
	else {
		if(preg_match($pattern,	$str, $match))	$res = str_replace('/system/upload/media/pictures/','/system/upload/media/pictures/medium/medium_', $match[1]);
		return $res;
	}
}

function shortcontent($content,$lenght) {
	$content = trim($content);
	$content = strip_tags($content);
	$content = str_replace('&nbsp;','',$content);
	$content = substr($content,0,$lenght);
	return $content;
}

function replace_link($str,$type=1) {
	$badchar = array ('\'', '"', '$', '?', '!', ' ', ',', '#', '@', ';', '|', ')', '(', '}', '{', ']', '[', ':', '--', '\'', '%', '+', '\\', '&', '*', '/', '^', '`', '~');
	$str = strtolower($str);
	if ($type == 1) {
		$str = str_replace($badchar,'-',$str);
		$str = str_replace('--','-',$str);
	}
	else
		$str = str_replace(' ', '_', $str);
	return rtrim($str,'-');
}

function secure_phpfunc($str) {
	$arr = array('(',')');
	$result = str_replace($arr,'',$str);
	return $result;
}

function get_requesturi($int) {
	$res = explode('/', $_SERVER['REQUEST_URI']);
	$res = array_filter($res);
	for($i=1;$i<=count($res);++$i) $result[] = $res[$i];
	return $result[$int];
}

function check_img_tag($str) {
	preg_match('/src="([^"]*)"/', $str, $matches);
	if ($matches) return true;
}
