<?php
class cron_autopoin extends controller {
	function __construct() {
		parent::database();
		parent::module('models', 'models_users');
	}
	
	function execute() {
		$sql = $this -> models_users -> __get_users();
		while($r = $this -> db -> result_sql($sql)) :
			if ($r['uauto'] == 1) {
				if ($r['uexpire'] < time()) {
					$this -> models_users -> __update_user(array('uexpire' => strtotime('+1 year')), $r['uid']);
					$msg = 'Bot: Auto used poin when your account expired. If you dont agree, please change your current profile settings. But poin cannot be rollback.';
					$this -> models_users -> __insert_history(array('ctype' => 2, 'cuid' => $r['uid'], 'cdate' => time(), 'cemail' => $r['uemail'], 'cduration' => 12, 'cprice' => 0, 'cdesc' => addslashes($msg)));
					echo "expired dan sudah di perpanjang \n";
				}
				else {
					echo "belum expired \n";
				}
			}
		endwhile;
	}
}
