<?php if(!defined('_lib')) die("Error");

class thongke{
	
	function get_ip(){
		if (isset($_SERVER['HTTP_CLIENT_IP']))
	    {
	        $real_ip_adress = $_SERVER['HTTP_CLIENT_IP'];
	    }

	    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	    {
	        $real_ip_adress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    else
	    {
	        $real_ip_adress = $_SERVER['REMOTE_ADDR'];
	    }

	    return $cip = $real_ip_adress;
	}

}
?>