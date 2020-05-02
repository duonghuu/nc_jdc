<?php 
	/**
	 * NINA Framework
	 * Vertion 1.0
	 * Author NINA Co.,Ltd. (nina@nina.vn)
	 * Copyright (C) 2015 NINA Co.,Ltd. All rights reserved
	*/
	 
	if(!defined('_lib')) die("Error");
	function nettuts_error_handler($number, $message, $file, $line, $vars)
	{
		if ( ($number !== E_NOTICE) && ($number < 2048) ) {
			include 'templates/error_tpl.php';
			die();
		}
	}
	$config_url=$_SERVER["SERVER_NAME"].'/2005/nc_jdc';
	$config['debug']=0;
	$config['lang']=array('vi'=>'Tiếng Việt','en'=>'Tiếng Anh');
	$config_email="admin@jdc.com.vn";
	$config_pass="Adminjdc!234";
	$config_ip="103.15.48.248";

	$config['database']['servername'] = 'localhost';
	$config['database']['username'] = 'root';
	$config['database']['password'] = '';
	$config['database']['database'] = 'nc_jdc';
	$config['database']['refix'] = 'table_';
	$config['salt']='@#$fd_!34^';

	$config['author']['name'] = 'Nguyễn Hoàng Hiếu';
	$config['author']['email'] = 'hieu1996.nina@gmail.com';
	$config['author']['timefinish'] = '5/2018';
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	error_reporting(0);
?>