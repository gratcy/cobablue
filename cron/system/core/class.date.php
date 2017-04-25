<?php
class date_cron {
	function __cron_conf_date($format) {
		$str = explode(' ', $format);
		if (count($str) == 5) {
			if (preg_match('/^(\*|[0-9]{1,2}|\*\/(\d+)|(\d+)+(\,)+(\d+)(.*))\\s\*\\s\*\\s\*\\s\*$/', $format))
				$res = self::get_next_minutes($str[0]);
			elseif (preg_match('/^(\*|[0-9]{1,2}|\*\/(\d+)|(\d+)+(\,)+(\d+)(.*))\\s((\d+)\-(\d+)|(\d+)|(\d+)+(\,)+(\d+)(.*))\\s\*\\s\*\\s\*$/', $format))
				$res = self::get_next_hours($str[1], $str[0]);
			elseif (preg_match('/^(\*|[0-9]{1,2}|\*\/(\d+)|(\d+)+(\,)+(\d+)(.*))\\s(\*|(\d+)\-(\d+)|(\d+)|(\d+)+(\,)+(\d+)(.*))\\s((\d+)\,(\d+)(.*)|(\d+)|(\d+)\-(\d+))\\s\*\\s\*$/', $format))
				$res = self::get_next_dom($str[2], $str[1], $str[0]);
			elseif (preg_match('/^^(\*|[0-9]{1,2}|\*\/(\d+)|(\d+)+(\,)+(\d+)(.*))\\s(\*|(\d+)\-(\d+)|(\d+)|(\d+)+(\,)+(\d+)(.*))\\s\*\\s((\d+)\,(\d+)(.*)|(\d+)|(\d+)\-(\d+))\\s\*$/', $format))
				$res = self::get_next_mon($str[3], $str[2], $str[1], $str[0]);
			elseif (preg_match('/^(\*|[0-9]{1,2}|\*\/(\d+)|(\d+)+(\,)+(\d+)(.*))\\s(\*|(\d+)\-(\d+)|(\d+)|(\d+)+(\,)+(\d+)(.*))\\s\*\\s(\*|(\d+)\,(\d+)(.*)|(\d+)|(\d+)\-(\d+))\\s((\d+)\,(\d+)(.*)|(\d+)|(\d+)\-(\d+))$/', $format))
				$res = self::get_next_dow($str[4], $str[3], $str[2], $str[1], $str[0]);
			else
				$res = false;
			return strtotime($res, time());
		}
	}

	function get_next_minutes($str) {
		$now = date('i');
		if ($str == '*') {
			$res = 5;
		}
		else if (preg_match('/\*\/([0-9])/', $str)) {
			preg_match('/([0-9]{1,2})/', $str, $matches);
			$res = (int) $matches[0];
		}
		elseif (preg_match('/^[0-9]{1,2}$/', $str)) {
			if ($now > $str)
				$res = 60 - $now + $str;
			else
				$res = $str - $now;
		}
		else {
			$res = array();
			$arr = explode(',', $str);
			foreach($arr as $v)
				if (($now-$v) < 0) $res[] = $now - $v;
				
			if (count($res) > 0) {
				$restu = array();
				arsort($res);
				foreach($res as $v)	$restu[] = $v;
				$res = str_replace('-','',$restu[0]);
			}
			else
				$res = 60 - $now + $arr[0];
		}
		return '+'.$res.' min';
	}

	function get_next_hours($str, $str2='00') {
		$str2 = parse_minutes($str2);
		$str = parse_hours($str);
		$before = date('Y-m-d H:i:s');
		$after = date('Y-m-d '.$str.':'.$str2.':00');

		$before = new DateTime($before);
		$after = new DateTime($after);

		$interval = $before -> diff($after);
		if ($interval -> invert) {
			$before = date('Y-m-d H:i:s');
			$after = date('Y-m-d '.$str.':'.$str2.':00', strtotime('+'.$interval -> invert.' day', time()));
			
			$before = new DateTime($before);
			$after = new DateTime($after);
			
			$interval = $before -> diff($after);
			$res = '+'.$interval -> h.' hour, +'.$interval -> i.' min';
		}
		else
			$res = '+'.$interval -> h.' hour, +'.$interval -> i.' min';
		return $res;
	}

	function get_next_dom($str, $str1, $str2) {
		$hour = parse_hours($str1);
		$min = parse_minutes($str2);
		$dom = parse_dom($str);

		$before = date('Y-m-d H:i:s');
		$after =  date('Y-m-'.$dom.' '.$hour.':'.$min.':s');

		$before = new DateTime($before);
		$after = new DateTime($after);
		
		$interval = $before -> diff($after);
		if ($interval -> invert)
			$res = '+1 month, -'.(date('d') - $dom).' day, +'.$interval -> h.' hour, +'.$interval -> i.' min';
		else
			$res = '+'.$interval -> days.' day, +'.$interval -> h.' hour, +'.$interval -> i.' min';
		return $res;
	}

	function get_next_mon($str, $str1, $str2, $str3) {
		$min = parse_minutes($str3);
		$hour = parse_hours($str2);
		$dom = parse_dom($str1);
		$mon = parse_mon($str);

		$before = date('Y-m-d H:i:s');
		$after =  date('Y-'.$mon.'-'.$dom.' '.$hour.':'.$min.':s');

		$before = new DateTime($before);
		$after = new DateTime($after);
		
		$interval = $before -> diff($after);
		if ($interval -> invert)
			$res = '+'.(365 - $interval -> days - date('d')).' day, +'.$interval -> h.' hour, +'.$interval -> i.' min';
		else
			$res = '+'.($interval -> days - date('d')).' day, +'.$interval -> h.' hour, +'.$interval -> i.' min';
		return $res;
	}

	function parse_dow($str) {
		$dow = 2;

		if ($str == '*') {
			$res = $dow;
		}
		else if (is_numeric($str)) {
			$res = $str;
		}
		else if (preg_match('/\-([0-9])/', $str)) {
			$restu = array();
			$arr = explode('-', $str);
			if ($arr[0] == $arr[1]) {
				$res = parse_dow($arr[0]);
			}
			else {
				sort($arr);
				$res = $arr[0];
			}
		}
		else {
			$hsl = false;
			$restu = array();
			$arr = explode(',', $str);
			asort($arr);
			for($i=0;$i<=6;++$i) {
				foreach($arr as $v) {
					if ($dow >= $v) {
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
		return $res;
	}

	function get_next_dow($str, $str1, $str2, $str3, $str4) {
		$min = parse_minutes($str4);
		$hour = parse_hours($str3);
		$dom = parse_dom($str2);
		$mon = parse_mon($str1);
		$dow = parse_dow($str);

		$before = date('Y-m-d H:i:s');
		$after =  date('Y-'.$mon.'-'.$dom.' '.$hour.':'.$min.':s');

		$before = new DateTime($before);
		$after = new DateTime($after);
		
		$interval = $before -> diff($after);

		if ($interval -> invert)
			$res = '+'.(7-date('N')+$dow).' day, +'.$interval -> h.' hour, +'.$interval -> i.' min';
		else
			$res = '+'.$dow.' day, +'.$interval -> h.' hour, +'.$interval -> i.' min';
		return $res;
	}
}
