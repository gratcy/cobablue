<?php
class libraries_memcached {
	var $memcached_obj;

	function __construct() {
		global $conf;
		if (!session_id()) {
			session_name( 'aHA' );
			session_start();
		}
		
		$this -> ses_id = sha1(md5(session_id()) . 'Wogh') . session_id();
		
		$this -> memcached_obj = new Memcached;
		$this -> memcached_obj -> addServer($conf['memcache']['host'], $conf['memcache']['port']);
	}

	function memcached_set($key, $value, $expiration) {
		if ($expiration == false)
			return $this -> memcached_obj -> set(self::memcached_set_key($key), $value);
		else
			return $this -> memcached_obj -> set(self::memcached_set_key($key), $value, $expiration);
	}

	function memcached_get($key) {
		return $this -> memcached_obj -> get($this -> ses_id . $key);
	}

	function memcached_set_key($key) {
		return $this -> ses_id . $key;
	}

	function memcached_delete($key=false) {
		if ($key)
			$this -> memcached_obj -> delete($this -> ses_id . $key);
		else
			$this -> memcached_obj -> flush(1); 
	}
}

