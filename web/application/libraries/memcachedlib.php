<?php
class Memcachedlib {
    var $memcached_obj, $sesresult, $_memcache_conf;
	public $login = false;
	private $_ci;

    function __construct() {
		$this -> _ci =& get_instance();
        if (!session_id()) {
            session_name( 'MaxHidden' );
            session_start();
        }
        
        if (isset($_SERVER['HTTP_X_REAL_IP'])) {
			$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_REAL_IP'];
		}
        
		if ($this -> _ci ->config->load('memcached', TRUE, TRUE))
		{
			if (is_array($this -> _ci->config->config['memcached']))
			{
				$this->_memcache_conf = NULL;

				foreach ($this -> _ci->config->config['memcached'] as $name => $conf)
				{
					$this->_memcache_conf[$name] = $conf;
				}
			}
		}
		
        $this -> ses_id = sha1(md5(session_id())) . session_id();

        $this -> memcached_obj = new Memcache;

        $this -> memcached_obj -> addServer($this->_memcache_conf['default']['hostname'], $this->_memcache_conf['default']['port']);

        $this -> sesresult = self::get('__login');

		if (isset($this -> sesresult['uemail']) && isset($this -> sesresult['uid']) && isset($this -> sesresult['ulevel']) && isset($this -> sesresult['skey']) == md5(sha1($this -> sesresult['ulevel'].$this -> sesresult['uemail']) . 'Hidden'))
			$this -> login = true;
		else
			$this -> login = false;
        self::__check_login();
        self::__save_post();
        self::__privileges();
    }
    
    function __save_post() {
		if (preg_match('/\_update/i',$_SERVER['REQUEST_URI'])) return false;
		if ($_POST && count($_POST) > 0) self::set(__keyTMP($_SERVER['REQUEST_URI']), $_POST, 60);
	}

	function __check_login() {
		if ($this -> _ci -> uri -> segment(1) == 'panel') {
			if ($this -> _ci -> uri -> segment(2) !== 'login') {
				if (!$this -> login) redirect(site_url('panel/login'));
			}
			else {
				if ($this -> _ci -> uri -> segment(3) !== 'logout') {
					if ($this -> login) redirect(site_url());
				}
			}
		}
	}

	function __privileges() {
		if ($this -> _ci -> uri -> segment(1) == 'register' || $this -> _ci -> uri -> segment(1) == 'lostpwd') {
			if ($this -> login == true) redirect(site_url());
		}
		
		if (preg_match('/^upload|product|reporting|report_reseller/i', $this -> _ci -> uri -> segment(2))) {
			if ($this -> sesresult['ulevel'] != 1) redirect(site_url('panel'));
		}
		
		if (preg_match('/^report$|transaction|topup\-tutorial/i', $this -> _ci -> uri -> segment(2))) {
			if ($this -> sesresult['ulevel'] != 4) redirect(site_url('panel'));
		}
		
		if (preg_match('/^refferal|invite/i', $this -> _ci -> uri -> segment(2))) {
			if ($this -> sesresult['ulevel'] != 4 && $this -> sesresult['ulevel'] != 3) redirect(site_url('panel'));
		}
		
		if (preg_match('/^use\-voucher/i', $this -> _ci -> uri -> segment(2))) {
			if ($this -> sesresult['ulevel'] != 4) redirect(site_url('panel'));
		}
		else {
			if (preg_match('/^confirmation|voucher/i', $this -> _ci -> uri -> segment(2))) {
				if ($this -> sesresult['ulevel'] != 1 && $this -> sesresult['ulevel'] != 2 && $this -> sesresult['ulevel'] != 3) redirect(site_url('panel'));
			}
		}
	}
	
	function add($key, $value, $expiration=false,$keyGlobal=false) {
        if (!$expiration)
            return $this -> memcached_obj -> set(self::set_key($key,$keyGlobal), json_encode($value), MEMCACHE_COMPRESSED);
        else
            return $this -> memcached_obj -> set(self::set_key($key,$keyGlobal), json_encode($value), MEMCACHE_COMPRESSED, $expiration);
	}
	
    function set($key, $value, $expiration=false,$keyGlobal=false) {
        if (!$expiration)
            return $this -> memcached_obj -> set(self::set_key($key,$keyGlobal), json_encode($value), MEMCACHE_COMPRESSED);
        else
            return $this -> memcached_obj -> set(self::set_key($key,$keyGlobal), json_encode($value), MEMCACHE_COMPRESSED, $expiration);
    }

    function get($key,$keyGlobal=false) {
		if ($keyGlobal)
			return json_decode($this -> memcached_obj -> get($key), true);
        else
			return json_decode($this -> memcached_obj -> get($this -> ses_id . $key), true);
    }

    function set_key($key,$keyGlobal) {
		if ($keyGlobal)
			return $key;
        else
			return $this -> ses_id . $key;

    }
    
    function delete($key=false,$keyGlobal=false) {
        if ($key)
            $this -> memcached_obj -> delete(($keyGlobal == true ? '' : $this -> ses_id) . $key);
        else
            $this -> memcached_obj -> flush(1);
    }

	function __regenerate_cache($key,$arr,$time=3600) {
		self::delete($key);
		return self::set($key, $arr, $time,true);
	}
}
