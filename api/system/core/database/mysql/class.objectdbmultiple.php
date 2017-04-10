<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );
class objectdb {
	protected $debug = false, $conn = false, $db_link, $options;
	private $reconnect = false, $lastInsId = 0;
	
	function __construct($dbname='', $reconnect='') {
		global $db;
		$dbname = $dbname ? $dbname : 'default';
		$this -> debug = $db[$dbname]['dbdebug'];
		$reconnect = true;
		$this -> reconnect = $reconnect;

		$this -> options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		); 

		if ($reconnect === true) {
			try {
				$this -> db_link = new PDO('mysql:host='.$db[$dbname]['dbhost'].';dbname='.$db[$dbname]['dbdatabase'], $db[$dbname]['dbuser'], $db[$dbname]['dbpassword'], $this -> options);

				$this -> conn = true;
				
				if ($this -> db_link === false) {
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
		return $this -> db_link -> query('SET NAMES "'.$charset.'" COLLATE "'.$collate.'"', $dblink);
	}

	function num_rows($sql) {
		if ($sql) return $sql -> rowCount();
	}

	function query($sql) {
		if (empty($sql)) {
			self::error(1);
		}
		else {
			$sql = $this -> db_link -> query($sql);
			$sql -> execute();
			if (!$sql)
				self::error(2);
			else
				return $sql;
		}
	}
	
	function free_result($sql) {
		return $sql -> closeCursor();
	}
	
	function query_one($sql) {
		if ($sql) {
			$sql = $this -> db_link -> query($sql . " limit 1", PDO::FETCH_ASSOC);
			if ($sql)
				return $sql -> fetch();
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
			$sql = $sql -> fetch();
			$total = $sql[0] + 1;
			return $total;
		}
	}

	function result_sql($sql, $type='FETCH_BOTH') {
		if (!$sql) {
			self::error(2);
		}
		else {
			if ($type == 'FETCH_ASSOC') $r = $sql -> fetchAll(PDO::FETCH_ASSOC);
			if ($type == 'FETCH_BOTH') $r = $sql -> fetchAll(PDO::FETCH_BOTH);
			if ($type == 'FETCH_NUM') $r = $sql -> fetchAll(PDO::FETCH_NUM);
			
			if (!$r) return false;
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
		if (!$sql) {
			self::error(2);
		}
		else {
			$this -> lastInsId = (int) $this -> db_link -> lastInsertId();
			return $this -> lastInsId;
		}
	}

	function update_array($table,$data,$kondisi) {
		if (empty($data) || empty($table) || empty($kondisi)) self::error(2);

		$sql = "UPDATE $table SET ";
		foreach ($data as $key=>$value) $sql .= $key . "=". "'$value'" . ",";
		$sql = rtrim($sql,",");
		$sql = $this -> db_link -> prepare($sql . " WHERE $kondisi");
		return $sql -> execute($arr);
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
			$sql = $this -> db_link -> prepare("INSERT INTO $table $cols VALUES $values");
			$sql -> execute($arr);
			$this -> lastInsId = $this -> db_link -> lastInsertId();
			return $this -> lastInsId;
		}
	}

	public function error($type) {
		if ($this -> debug) {
			if ($type) {
				if ($type == 1)
					die('<strong>mysql error</strong> ' . $this -> db_link -> errorCode() .' at line '. $this -> db_link -> errorInfo()[2]);
				elseif ($type == 2)
					die('<strong>error </strong>, Proses has been stopped');
				else
					die('<strong>error </strong>, no connection !!!' . $this -> db_link -> errorCode() .' at line '. $this -> db_link -> errorInfo()[2]);
			}
		}
	}
	
	public function last_id() {
		return $this -> lastInsId;
	}

	function __destruct() {
		if ($this -> reconnect && $this -> conn){
			$this -> conn = false;
			$this -> db_link = null;
		}
	}
}
