<?php
function __randomNumber($digits)
{
	$temp = '';
	for ($i = 0; $i < $digits; $i++) {
		$temp .= rand(0, 9);
	}
	return (int) $temp;
}
