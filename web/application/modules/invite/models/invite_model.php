<?php
class Invite_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
	function __insert_invite($data) {
		return $this -> db -> insert('invitation_tab', $data);
	}
}
