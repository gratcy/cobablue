<?php
$db['main']['dbhost'] = 'localhost';
$db['main']['dbuser'] = 'dapur02_neverapi';
$db['main']['dbpassword'] = 'neverblock2017!@!';
$db['main']['dbdatabase'] = 'dapur02_main';

$db['whmcs']['dbhost'] = 'localhost';
$db['whmcs']['dbuser'] = 'dapur01_whmc371';
$db['whmcs']['dbpassword'] = '!5G1ApS4]U';
$db['whmcs']['dbdatabase'] = 'dapur01_whmc371';

$mainLink = new mysqli($db['main']['dbhost'],$db['main']['dbuser'],$db['main']['dbpassword'],$db['main']['dbdatabase']);

function __check_billing($invId) {
	global $db;
	$whmcsLink = new mysqli($db['whmcs']['dbhost'],$db['whmcs']['dbuser'],$db['whmcs']['dbpassword'],$db['whmcs']['dbdatabase']);
	$whmcs = $whmcsLink -> query('SELECT status FROM tblinvoices WHERE id=' . $invId);
	$arr = array();
	while($obj = $whmcs->fetch_object()) $arr[] = $obj->status;
	$whmcsLink -> close();
	return strtolower($arr[0]);
}

function __check_transaction_confirm($id) {
	global $mainLink;
	$data = $mainLink -> query('SELECT ttid FROM transaction_confirm_tab WHERE ttid=' . $id);
	$arr = array();
	while($obj = $data->fetch_object()) $arr[] = $obj->ttid;
	return (count($arr) > 0 ? true : false);
}

function __check_confirmation($id) {
	global $mainLink;
	$data = $mainLink -> query('SELECT ctid FROM confirmation_tab WHERE ctid=' . $id);
	$arr = array();
	while($obj = $data->fetch_object()) $arr[] = $obj->ctid;
	return (count($arr) > 0 ? true : false);
}

$order = $mainLink -> query('SELECT tid,tuid,tfrom,tto,ttotal,tapiinv FROM transaction_tab WHERE tstatus=0 AND twhmcs=0 AND tapiinv>0 AND ttotalhash > 0');
while ($row = $order->fetch_object()) {
	if (__check_billing($row -> tapiinv) == 'paid') {
		var_dump($row);
		if (!__check_transaction_confirm($row -> tid))
			$mainLink -> query('INSERT INTO transaction_confirm_tab (ttid,tdate,tabank,tano,taname,tmbank,ttotal,tstatus) VALUES ('.$row -> tid.', '.time().', 1, "", "", 1, '.$row -> ttotal.', 1)');
		else
			$mainLink -> query('UPDATE transaction_confirm_tab SET tstatus=1 WHERE ttid=' . $row -> tid);
		
		if (!__check_confirmation($row -> tid)) $mainLink -> query('INSERT INTO confirmation_tab (cuid,ctid,cdate,cstatus) VALUES ('.$row -> tuid.', '.$row -> tid.', '.time().', 1)');
		
		$mainLink -> query('UPDATE transaction_tab SET twhmcs=1,tstatus=2 WHERE tid=' . $row -> tid);
		$mainLink -> query('UPDATE users_tab SET uexpire="'.$row -> tto.'" WHERE uid=' . $row -> tuid);
	}
}

$mainLink -> close();
