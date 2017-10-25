<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create_account_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('create_account/create_account_model');
    }
    
    function __get_accounts($id='') {
		$acc = $this -> _ci -> create_account_model -> __get_account_fake();
		$res = '<option value="">-- Choose Account --</option>';
		foreach($acc as $k => $v)
			if ($id == $v -> uemail)
				$res .= '<option value="'.$v -> uemail.'" selected>'.$v -> uemail.'</option>';
			else
				$res .= '<option value="'.$v -> uemail.'">'.$v -> uemail.'</option>';
		return $res;
	}
}
