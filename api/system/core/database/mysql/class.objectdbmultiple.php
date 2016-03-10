<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );
class objectdb {
	protected $debug = false, $conn = false, $db_link, $dbselect;
	private $reconnect = false;
	
	function __construct($dbname='', $reconnect='') {
		global $db;
		$dbname = $dbname ? $dbname : 'default';
		$this -> debug = $db[$dbname]['dbdebug'];
		$this -> reconnect = $reconnect;

		if ($reconnect === true) {
			try {
				$this -> db_link = mysql_connect($db[$dbname]['dbhost'], $db[$dbname]['dbuser'], $db[$dbname]['dbpassword'], true);
				$this -> dbselect = mysql_select_db($db[$dbname]['dbdatabase'], $this -> db_link);
				self::set_db_charset($db[$dbname]['dbcharset'], $db[$dbname]['dbcollat'], $this -> db_link);
				$this -> conn = true;
				
				if ($this -> dbselect === false || $this -> db_link === false) {
					throw new Exception('cannot connect to database server !!!');
					exit();
				}
			}
			catch(Exception $e) {
				die('<h1>Database Enstablish Connection</h1>' . $e -> getMessage());
			} 
		}
	}

	private function set_db_charset($charset, $collate, $dblink) {
		return @mysql_query('SET NAMES "'.$charset.'" COLLATE "'.$collate.'"', $dblink);
	}

	function num_rows($sql) {
		if ($sql) return mysql_num_rows($sql);
	}

	function query($sql) {
		if (empty($sql)) {
			self::error(1);
		}
		else {
			$sql = mysql_query($sql);
			if (!$sql)
				self::error(2);
			else
				return $sql;
		}
	}
	
	function free_result($sql) {
		return @mysql_free_result($sql);
	}
	
	function query_one($sql) {
		if ($sql) {
			$sql = self::query($sql . " limit 1");
			if ($sql) {
				$r = mysql_fetch_array($sql);
				return $r;
			}
			else
				self::error(1);
		}
		else
			self::error(1);
	}
	
	function maxid($id,$table) {
		$sql = self::query("select max($id) from $table");
		if (!$sql) {
			self::error(2);
		}
		else {
			$sql = mysql_fetch_row($sql);
			$total = $sql[0] + 1;
			return $total;
		}
	}

	function result_sql($sql, $type='MYSQL_BOTH') {
		if (!$sql) {
			self::error(2);
		}
		else {
			if ($type == 'MYSQL_ASSOC') $r = mysql_fetch_array($sql, MYSQL_ASSOC);
			if ($type == 'MYSQL_BOTH') $r = mysql_fetch_array($sql, MYSQL_BOTH);
			if ($type == 'MYSQL_NUM') $r = mysql_fetch_array($sql, MYSQL_NUM);
			
			if (!$r) return false;
			foreach ($r as $key => $value) $r[$key] = $value;
			return $r;
		}
	}

	function update_sql($sql) {
		$sql = self::query($sql);
		if (!$sql)
			self::error(2);
		else
			return $sql;
	}

	function insert_sql($sql) {
		$sql = self::query($sql);
		if (!$sql)
			self::error(2);
		else
			return $sql;
	}

	function update_array($table,$data,$kondisi) {
		if (empty($data) || empty($table) || empty($kondisi)) self::error(2);

		$sql = "UPDATE $table SET ";
		foreach ($data as $key=>$value) $sql .= $key . "=". "'$value'" . ",";
		$sql = rtrim($sql,",");
		$sql = self::update_sql($sql . " WHERE $kondisi");
		return $sql;
	}

	function insert_array($table,$data){
		if (empty($table) || empty($data)) {
			self::error(2);
		}
		else {
			$cols = '(';
			$values = '(';

			foreach ($data as $key=>$value) {
				$cols .= $key . ",";
				$values .= "'$value'" . ",";
			}
			$cols = rtrim($cols, ',').')';
			$values = rtrim($values, ',').')';
			$sql = self::insert_sql("INSERT INTO $table $cols VALUES $values");
			return $sql;
		}
	}

	public function error($type) {
		if ($this -> debug) {
			if ($type) {
				if ($type == 1)
					die('<strong>mysql error</strong> ' . mysql_error() .' at line '. mysql_errno());
				elseif ($type == 2)
					die('<strong>error </strong>, Proses has been stopped');
				else
					die('<strong>error </strong>, no connection !!!' . mysql_error() .' at line '. mysql_errno());
			}
		}
	}
	
	public function last_id() {
		return mysql_insert_id();
	}

	function __destruct() {
		if ($this -> reconnect && $this -> conn){
			mysql_close($this -> db_link);
			$this -> conn = false;
		}
	}
}
