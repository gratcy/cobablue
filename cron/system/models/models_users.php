<?php
class models_users extends objectdb {
	function __get_users() {
		return $this -> query('SELECT * FROM users_tab WHERE uauto=1');
	}
	
	function __update_user($data, $id) {
		return $this -> update_array('users_tab', $data, 'uid='.$id);
	}
	
	function __insert_history($data, $id) {
		return $this -> insert_array('create_account', $data);
	}
}
