<?php

    function is_admin_session()
    {
        $CI =& get_instance();
        if ($CI->session->userdata('logged_in') == true && $CI->session->userdata('role') == "admin") {
        	return true;
        } else {
        	return false;
        }
    }

    function is_user_session()
    {
        $CI =& get_instance();
        if ($CI->session->userdata('logged_in') == true && $CI->session->userdata('role') == "user") {
            return true;
        } else {
            return false;
        }
    }