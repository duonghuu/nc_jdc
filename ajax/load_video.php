<?php
	error_reporting(0);
	session_start();
	@define ( '_template' , '../templates/');
	@define ( '_source' , '../sources/');
	@define ( '_lib' , '../libraries/');
	
	if(!isset($_SESSION['lang']))
	{
	$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."functions_share.php";
	include_once _lib."class.database.php";
	include_once "/lang/lang_$lang.php";
	include_once _lib."functions_giohang.php";
	
	include_once _lib."file_requick.php";
	

	$id =  $_POST['id'];
 
	$d->reset();
	$sql_tintuc = "select * from #_video where hienthi=1 AND type='video' and id=".$id." order by stt,id desc";
	$d->query($sql_tintuc);
	$tintuccc = $d->result_array();
?>
<iframe src="https://www.youtube.com/embed/<?=youtobi($tintuccc[0]['link'])?>" allowfullscreen></iframe>
