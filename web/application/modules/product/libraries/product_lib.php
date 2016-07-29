<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('product/product_model');
    }
    
    function __get_product($id='') {
		$city = $this -> _ci -> product_model -> __get_product_select();
		$res = '<option value="">-- Choose Product --</option>';
		foreach($city as $k => $v)
			if ($id == $v -> pid)
				$res .= '<option value="'.$v -> pid.'" point="'.$v -> ppoint.'" ptype="'.$v -> ptype.'" year="'.$v -> pyear.'" price="'.$v -> pprice.'" selected>'.$v -> pname.' - ' . __get_rupiah($v -> pprice,1).($v -> ptype == 1 ? ' - '.$v -> ppoint . ' Point' : '').'</option>';
			else
				$res .= '<option value="'.$v -> pid.'" point="'.$v -> ppoint.'" ptype="'.$v -> ptype.'" year="'.$v -> pyear.'" price="'.$v -> pprice.'">'.$v -> pname.' - ' . __get_rupiah($v -> pprice,1).($v -> ptype == 1 ? ' - '.$v -> ppoint . ' Point' : '').'</option>';
		return $res;
	}
}
