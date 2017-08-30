<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class order extends controller {
	
	function __construct() {
		parent::controller();
		parent::database('whmcs', true);
		parent::module('models', 'models_order', 'whmcs');
		parent::module('models', 'models_invoice', 'whmcs');
		parent::module('models', 'models_log', 'whmcs');
		parent::module('models', 'models_product', 'whmcs');
		parent::module('helpers', 'functions_helpers', 'whmcs');
		
		header('Content-type: application/json');
	}
	
	function cancel_order() {
		$invoiceid = (int) $this -> rg -> post('invoiceid');
		if ($invoiceid) {
			$dateL = date('Y-m-d H:i:s');
			$this -> models_invoice -> __update_invoice(array('status' => 'Cancelled', 'last_capture_attempt' => $dateL),$invoiceid);
		}
	}

	function execute() {
		global $conf;
		parent::config('config','confs','whmcs');
		$pid = $this -> rg -> post('pid');
		$email = $this -> rg -> post('email');
		$norderid = $this -> rg -> post('norderid');
		$tno = $this -> rg -> post('tno');
		$ipaddr = $this -> rg -> post('ipaddr');
		$apiUID = (int) $conf['whmcs']['user']['id'];
		$apiName = $conf['whmcs']['user']['name'];
		$date = date('Y-m-d');
		$dateL = date('Y-m-d H:i:s');
		$totalhash = 0;
		
		if ($pid && $norderid && $ipaddr && $tno) {
			parent::database('main', true);
			$r = $this -> models_product -> __get_product_detail($pid);

			if ($r) {
				parent::database('whmcs', true);
				$total = $r['pprice'];
				$this -> models_invoice -> __insert_invoice(array('userid' => $apiUID, 'date' => $date, 'duedate' => $date, 'subtotal' => $total, 'total' => $total, 'status' => 'Unpaid', 'paymentmethod' => 'bankbca', 'notes' => 'Di order oleh '.$email.' dengan transaksi ID #' . $tno),1);
				$invoiceid = $this -> models_invoice -> last_id();
				
				$this -> models_order -> __insert_order(array('userid' => $apiUID, 'ordernum' => __randomNumber(10), 'date' => $date, 'orderdata' => 'a:0:{}', 'amount' => $total, 'status' => 'Pending', 'paymentmethod' => 'bankbca', 'invoiceid' => $invoiceid, 'ipaddress' => $ipaddr, 'norderid' => $norderid),1);
				$oid = $this -> models_order -> last_id();
				$this -> models_log -> __insert_log(array('date' => $dateL, 'description' => 'New Order Placed - Order ID: '.$oid.' - User ID: ' . $apiUID, 'user' => 'client', 'userid' => $apiUID, 'ipaddr' => $ipaddr));
				
				$this -> models_order -> __insert_order(array('userid' => $apiUID, 'orderid' => $oid, 'packageid' => $pid, 'regdate' => $date, 'paymentmethod' => 'bankbca', 'firstpaymentamount' => $total, 'amount' => $total, 'billingcycle' => 'Annually', 'nextduedate' => $date, 'nextinvoicedate' => $date, 'domainstatus' => 'Pending'),2);
				
				//~ $closest = $this -> models_invoice -> __get_closest($total);
				$totalhash = $total + $invoiceid;
				
				$desc = $pid.' - '.$r['pname'] . ' - ' . $r['pdesc'];
				$this -> models_invoice -> __insert_invoice(array('userid' => $apiUID, 'type' => 'Hosting', 'relid' => $invoiceid, 'description' => $desc, 'invoiceid' => $invoiceid, 'amount' => $total, 'duedate' => $date, 'paymentmethod' => 'bankbca', 'notes' => 'Di order oleh '.$email.' dengan transaksi ID #' . $tno),2);
				$this -> models_invoice -> __insert_invoice(array('invoice' => $invoiceid, 'jumlah' => $totalhash, 'process' => 0, 'time' => time(), 'expired' => 0),3);
				
				$this -> models_log -> __insert_log(array('date' => $dateL, 'description' => 'Created Invoice - Invoice ID: ' . $invoiceid, 'user' => 'client', 'userid' => $apiUID, 'ipaddr' => $ipaddr));
				$this -> models_log -> __insert_log(array('date' => $dateL, 'description' => 'Email Sent to '.$apiName.' (Customer Invoice)  - User ID: ' . $apiUID, 'user' => 'client', 'userid' => $apiUID, 'ipaddr' => $ipaddr));
				$this -> models_log -> __insert_log(array('date' => $dateL, 'description' => 'Email Sent to '.$apiName.' (WHMCS New Order Notification)', 'user' => 'client', 'userid' => $apiUID, 'ipaddr' => $ipaddr));
				$this -> models_log -> __insert_log(array('date' => $dateL, 'description' => 'Email Sent to '.$apiName.' (Order Confirmation)  - User ID: ' . $apiUID, 'user' => 'client', 'userid' => $apiUID, 'ipaddr' => $ipaddr));
				$res = array('status' => -2, 'message' => 'Transaksi berhasil dilakukan.', 'totalhash' => $totalhash, 'invoice_id' => $invoiceid);
			}
			else {
				$res = array('status' => -1, 'message' => 'Unknown Product !!!');
			}
		}
		else {
			$res = array('status' => -1, 'message' => 'Invalid input data !!!');
		}
		echo json_encode($res);
	}
}
