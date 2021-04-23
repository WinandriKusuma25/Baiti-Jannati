<?php
function helper_log($tipe = "", $str = ""){
    $CI =& get_instance();
 
    if (strtolower($tipe) == "login"){
        $log_tipe   = "login";
    }
    elseif(strtolower($tipe) == "logout")
    {
        $log_tipe   = "logout";
    }
    elseif(strtolower($tipe) == "tambah"){
        $log_tipe   = "tambah";
    }
    elseif(strtolower($tipe) == "edit"){
        $log_tipe  = "edit";
    }
    elseif(strtolower($tipe) == "hapus"){
        $log_tipe  = "hapus";
	}
 
	// parameter
    $param['log_user']      = $CI->session->userdata('name');
    $param['log_tipe']      = $log_tipe;
    $param['log_desc']      = $str;
 
    //load model log
    $CI->load->model('admin/M_log');
 
    //save to database 
    $CI->M_log->save_log($param);
}