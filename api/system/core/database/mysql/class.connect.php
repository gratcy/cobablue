<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );
class connect_db {
	protected $host;
	protected $user;
	protected $pass;
	protected $db;
	protected $db_link;
	protected $debug = false;
	protected $conn = false;
	protected $persistant = false;

	function __construct() {
		global $db;
		$this -> host = $db['default']['dbhost'];
		$this -> user = $db['default']['dbuser'];
		$this -> pass = $db['default']['dbpassword'];
		$this -> db = $db['default']['dbdatabase'];
		$this -> debug = $db['default']['dbdebug'];
		$this -> persistant = $db['default']['dbpersistant'];
		
		if ($this -> persistant)
			$this -> db_link = mysql_pconnect($this -> host, $this -> user, $this -> pass, true);
		else 
			$this -> db_link = mysql_connect($this -> host, $this -> user, $this -> pass, true);

		if (!$this -> db_link) {
			self::error();
		}
		else {
			if (!$this -> db) {
				self::error();
			}
			else {
				$this -> dbselect = mysql_select_db($this -> db, $this -> db_link);
				self::set_db_charset($db['default']['dbcharset'], $db['default']['dbcollat'], $this -> db_link);
				if ( !$this -> dbselect ) self::error();
				$this -> conn = true;
			}
		}
	}

	private function set_db_charset($charset, $collate, $dblink) {
		return @mysql_query('SET NAMES "'.$charset.'" COLLATE "'.$collate.'"', $dblink);
	}

	function __destruct() {
		if ($this -> conn){
			if ($this -> persistant) {
				$this -> conn = true;
			}
			else {
				mysql_close($this -> db_link);
				$this -> conn = false;
			}
		}
	}

	public function error() {
		if ($this -> debug) die('<strong>Database could not connect</strong>');
	}
}

$conn = new connect_db();
