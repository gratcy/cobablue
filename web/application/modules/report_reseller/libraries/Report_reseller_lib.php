<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_reseller_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('report_reseller/report_reseller_model');
    }
    
    function __get_reseller($id='') {
		$data = $this -> _ci -> report_reseller_model -> __get_reseller_select();
		$res = '<option value=""></option>';
		foreach($data as $k => $v)
			if ($id == $v -> uid)
				$res .= '<option value="'.$v -> uid.'" selected>'.$v -> reseller.'</option>';
			else
				$res .= '<option value="'.$v -> uid.'">'.$v -> reseller.'</option>';
		return $res;
	}
}
