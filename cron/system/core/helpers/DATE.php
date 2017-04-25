<?php
function parse_minutes($str) {
	$min = date('i');
	if ($str == '*') {
		$res = 0;
	}
	else if (is_numeric($str)) {
		$res = $str;
	}
	else if (preg_match('/\,([0-9])/', $str)) {
		$res = array();
		$arr = explode(',', $str);
		if ($arr[0] == $arr[1]) {
			$res = parse_minutes($arr[0]);
		}
		else {
			foreach($arr as $v)
				if (($min-$v) < 0) $res[] = $min - $v;
			
			if (count($res) > 0) {
				$restu = array();
				arsort($res);
				foreach($res as $v)	$restu[] = $v;
				$res = str_replace('-','',$restu[0]);
			}
			else
				$res = str_replace('-','',$arr[0]);
		}
	}
	else {
		preg_match('/([0-9]{1,2})/', $str, $matches);
		$res = $min + (int) $matches[0];
	}
	return ((int) $res ? $res : '00');
}

function parse_hours($str) {
	$hour = date('H');
	if ($hour == '00') $hour = 24;
	
	if ($str == '*') {
		$res = 0;
	}
	else if (is_numeric($str)) {
		$res = $str;
	}
	else if (preg_match('/\,([0-9])/', $str)) {
		$restu = array();
		$arr = explode(',', $str);
		if ($arr[0] == $arr[1]) {
			$res = parse_hours($arr[0]);
		}
		else {
			foreach($arr as $v)
				if (($hour-$v) < 0)	$restu[] = $hour - $v;
			
			if (count($restu) > 0) {
				arsort($restu);
				foreach($restu as $v) $restu[] = $v;
				$res = str_replace('-','',$restu[0]);
			}
			else
				$res = str_replace('-','',$arr[0]);
		}
	}
	else if (preg_match('/\-([0-9])/', $str)) {
		$restu = array();
		$arr = explode('-', $str);
		asort($arr);
		if ($arr[0] >= $hour && $arr[1] <= $hour)
			$res = $hour;
		else
			$res = $arr[0];
	}
	return ((int) $res ? $res : '00');
}

function parse_dom($str) {
	$day = date('d');
	
	if ($str == '*') {
		$res = $day;
	}
	else if (is_numeric($str)) {
		$res = $str;
	}
	else if (preg_match('/\-([0-9])/', $str)) {
		$restu = array();
		$arr = explode('-', $str);
		if ($arr[0] == $arr[1]) {
			$res = parse_dom($arr[0]);
		}
		else {
			asort($arr);
			if ($arr[0] >= $day && $arr[1] <= $day)
				$res = $day;
			else
				$res = $arr[0];
		}
	}
	else {
		$hsl = false;
		$restu = array();
		$arr = explode(',', $str);
		asort($arr);
		for($i=1;$i<=31;++$i) {
			foreach($arr as $v) {
				if ($day >= $v) {
					$res = $i;
					$hsl = false;
					break;
				}				
			}
		}
		if ($hsl == false) {
			$i = 1;
			foreach($arr as $v) {
				if ($i == 1) {
					$res = $v;
					break;
				}
				++$i;
			}
		}
	}
	if (strlen($res) == 1) $res = "0$res";
	return $res;
}

function parse_mon($str) {
	$mon = date('m');
	if ($str == '*') {
		$res = $mon;
	}
	else if (is_numeric($str)) {
		$res = $str;
	}
	else if (preg_match('/\-([0-9])/', $str)) {
		$restu = array();
		$arr = explode('-', $str);
		if ($arr[0] == $arr[1]) {
			$res = parse_mon($arr[0]);
		}
		else {
			asort($arr);
			if ($arr[0] >= $mon && $arr[1] <= $mon)
				$res = $day;
			else
				$res = $arr[0];
		}
	}
	else {
		$hsl = false;
		$restu = array();
		$arr = explode(',', $str);
		asort($arr);
		for($i=1;$i<=12;++$i) {
			foreach($arr as $v) {
				if ($mon >= $v) {
					$res = $i;
					$hsl = false;
					break;
				}				
			}
		}
		if ($hsl == false) {
			$i = 1;
			foreach($arr as $v) {
				if ($i == 1) {
					$res = $v;
					break;
				}
				++$i;
			}
		}
	}
	if (strlen($res) == 1) $res = "0$res";
	return $res;
}

function __get_next_date($cls, $file) {
	$fp = fopen($file, 'r');
	while(!feof($fp)) {
		$res = fgets($fp, 1024);
		$res = explode(" ", $res);
		if (count($res) > 2 && trim($res[2]) != 'success' && $res[2] == $cls) $arr[] = array($res[1]);
	}
	
	fclose($fp);
	$total = count($arr);
	$i = 1;
	foreach($arr as $k => $v) {
		if ($i == $total) {
			$res = $v[0];
			break;
		}
		++$i;
	}
	return date('Y-m-d H:i:s', $res);
}
