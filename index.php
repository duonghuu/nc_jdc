<?php
	session_start();
    error_reporting(0);
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './libraries/');
	include_once _lib."Mobile_Detect.php";

	if(!isset($_SESSION['lang']))
	{
	   $_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	include_once _lib."config.php";
	include_once "/lang/lang_$lang.php";
    include_once _lib."constant.php";
    include_once _lib."functions.php";
    include_once _lib."functions_share.php";
    include_once _lib."class.database.php";
    include_once _lib."functions_giohang.php";
	include_once _lib."functions_user.php";
	include_once _lib."file_requick.php";
	include_once _lib."counter.php";
	
	if($_GET['lang']!=''){
		$_SESSION['lang']=$_GET['lang'];
		header("location:".$_SESSION['links']);
	} else {
		$_SESSION['links']=getCurrentPageURL();
	}
	
?>
<!DOCTYPE html>
<html lang="vi" itemscope itemtype="http://schema.org/LocalBusiness">
    <head prefix="og: http://ogp.me/ns#; dcterms: http://purl.org/dc/terms/#">
        <base href="http://<?=$config_url?>/">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <?php include _template."layout/seo_web.php";?>
        <?=$share_facebook?>
        <?php include 'css/css.php';?>
        <script language="javascript" type="text/javascript" src="js/jquery-1.9.1.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <?=$row_setting['codeheader']?>
    </head>
    <body>
        <?php include _template."layout/background.php";?>
        <header>
            <?php include _template."layout/header.php";
            	include _template."layout/menu.php";
            	include _template."layout/nivo_slider.php"; ?>
        </header>
        <section>
            <?php if( !in_array($template, ['index','hoidong','hoidong_detail'])) { 
                include _template."layout/breadcrumb.php"; } ?>
            <?php include _template.$template."_tpl.php"; ?>
        </section>
        <footer>
            <?php include _template."layout/bottom.php";
            include _template."layout/footer.php";
            include _template."layout/goidien.php";
            ?>
        </footer>
        <?php include 'js/js.php';?>
        <?=$row_setting['vchat']?>
        <?=$row_setting['codebody']?>
    </body>
</html>