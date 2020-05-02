<?php
	session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './libraries/');

	if(!isset($_SESSION['lang']))
	{
	$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	include_once _lib."file_requick.php";
	$d = new database($config['database']);

	function CreateXML1($link,$uutien=1){
		global $d,$config_url;
		echo '<url>'; 
			echo '<loc>http://'.$config_url.'/'.$link.'.html</loc>'; 
			echo '<lastmod>'.date('Y-m-d\TH:i:sP',time()).'</lastmod>';
			echo '<changefreq>daily</changefreq>'; 
			echo '<priority>'.$uutien.'</priority>';
			echo '</url>';
		return;	
	}
	function CreateXML3($tbl='',$type='',$uutien=1){
		global $d,$config_url;
		if($tbl=='') return false;
		
		$d->reset();
		$sql = "SELECT id, tenkhongdau, ngaytao FROM table_$tbl where hienthi=1 and type='".$type."' order by stt,ngaytao desc";
		$d->query($sql);
		$link_seo = $d->result_array();
		foreach ($link_seo as $key => $value) {
			echo '<url>'; 
			echo '<loc>http://'.$config_url.'/'.$value['tenkhongdau'].'</loc>';
			echo '<lastmod>'.date('Y-m-d\TH:i:sP',time()).'</lastmod>';
			echo '<changefreq>daily</changefreq>'; 
			echo '<priority>'.$uutien.'</priority>';
			echo '</url>';
		}
		return;	
	}

	header("Content-Type: application/xml; charset=utf-8"); 
	echo '<?xml version="1.0" encoding="UTF-8"?>'; 
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

	CreateXML1("gioi-thieu",'0.5');
	CreateXML1("dao-tao",'0.5');
	CreateXML1("trang-diem",'0.5');
	CreateXML1("ao-cuoi",'0.5');
	CreateXML1("album",'0.5');
	CreateXML1("tin-tuc",'0.5');
	CreateXML1("lien-he",'0.5');

	/*CreateXML3("product_list", "product", '0.8');
	CreateXML3("product_cat", "product", '0.7');
	CreateXML3("product_item", "product", '0.6');*/
	CreateXML3("product", "product", '1');
	CreateXML3("baiviet_list", "daotao", '1');
	CreateXML3("baiviet", "daotao", '1');
	CreateXML3("baiviet", "tintuc", '1');
	CreateXML3("baiviet", "aocuoi", '1');
	CreateXML3("album", "album", '1');
	CreateXML3("album", "album1", '1');
echo '</urlset>';
?>