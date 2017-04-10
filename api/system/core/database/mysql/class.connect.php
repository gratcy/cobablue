<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );
class connect_db {
	protected $host;
	protected $user;
	protected $pass;
	protected $db;
	protected $db_link;
	protected $options;
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
		
		if ($this -> persistant) {
			$this -> options = array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
				PDO::ATTR_PERSISTENT => true
			);
		}
		else {
			$this -> options = array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			);
		}
		
		$this -> db_link = new PDO('mysql:host='.$this -> host.';dbname='.$this -> db, $this -> user, $this -> pass, $this -> options);
		
		if (!$this -> db_link) {
			self::error();
		}
	}

	private function set_db_charset($charset, $collate, $dblink) {
		return $this -> db -> query('SET NAMES "'.$charset.'" COLLATE "'.$collate.'"', $dblink);
	}

	function __destruct() {
		if ($this -> conn){
			if ($this -> persistant) {
				$this -> conn = true;
			}
			else {
				$this -> db_link = null;
			}
		}
	}

	public function error() {
		if ($this -> debug) die('<strong>Database could not connect</strong>');
	}
}

$conn = new connect_db();
