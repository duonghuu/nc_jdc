<?php
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$d = new database($config['database']);
	
	$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
	if ($page <= 0) $page = 1;	
	
	$d->reset();
	$sql_setting = "select * from #_setting limit 0,1";
	$d->query($sql_setting);
	$row_setting= $d->fetch_array();

	$d->reset();
    $sql = "select thumb_$lang from #_photo where type='favicon'";
    $d->query($sql);
    $favicon = $d->fetch_array();
	
	if($com){
		$data = array(
			array("tbl"=>"product_list","field"=>"idl","source"=>"product","com"=>"san-pham","type"=>"product"),
			array("tbl"=>"product_cat","field"=>"idc","source"=>"product","com"=>"san-pham","type"=>"product"),
			array("tbl"=>"product_item","field"=>"idi","source"=>"product","com"=>"san-pham","type"=>"product"),
			array("tbl"=>"product","field"=>"id","source"=>"product","com"=>"san-pham","type"=>"product"),

			array("tbl"=>"album_list","field"=>"idl","source"=>"album","com"=>"khach-hang","type"=>"khachhang"),
			array("tbl"=>"album_cat","field"=>"idc","source"=>"album","com"=>"khach-hang","type"=>"khachhang"),
			array("tbl"=>"album","field"=>"id","source"=>"album","com"=>"khach-hang","type"=>"khachhang"),

			array("tbl"=>"baiviet_list","field"=>"idl","source"=>"news","com"=>"gioi-thieu","type"=>"gioithieu"),
			array("tbl"=>"baiviet","field"=>"id","source"=>"news","com"=>"gioi-thieu","type"=>"gioithieu"),
			
			array("tbl"=>"baiviet","field"=>"id","source"=>"news","com"=>"hoi-dong","type"=>"hoidong"),

			array("tbl"=>"baiviet","field"=>"id","source"=>"news","com"=>"tuyen-dung","type"=>"tuyendung"),
			array("tbl"=>"baiviet","field"=>"id","source"=>"news","com"=>"tin-tuc","type"=>"tintuc"),
		);
		foreach($data as $k=>$v){
			if(isset($com)){
				$d->query("select id from #_".$v['tbl']." where tenkhongdau='".$com."' and type='".$v['type']."'");
			}
			if($d->num_rows()>=1){
				$row = $d->fetch_array();
				$_GET[$v['field']] = $row['id'];
				$com = $v['com'];
				break;
			}
		}
	}

	switch($com){
	//NEWS
		case 'khach-hang':
			$source = "album";
			$template = isset($_GET['id']) ? "album_detail" : "album";
			$type_bar = 'khachhang';
			$title_detail = _khachhang;
			break;

	//NEWS
		case 'tin-tuc':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'tintuc';
			$title_detail = _tintuc;
			break;
		case 'gioi-thieu':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'gioithieu';
			$title_detail = _gioithieu;
			break;
		case 'hoi-dong':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "hoidong";
			$type_bar = 'hoidong';
			$title_detail = _hoidong;
			break;
		case 'tuyen-dung':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'tuyendung';
			$title_detail = _tuyendung;
			break;

	//PRODUCT
		case 'san-pham':
			$source = "product";
			$template = isset($_GET['id']) ? "product_detail" : "product";
			$type_bar = 'product';
			$title_detail = _sanpham;
			break;

	//ABOUT
		case 'gioi-thieu':
			$source = "about";
			$template = "about";
			$type_bar = 'gioithieu';
			$title_detail = _gioithieu;
			break;
		case 'hoat-dong-cong-ty':
			$source = "about";
			$template = "about";
			$type_bar = 'bvgt';
			$title_detail = _hoatdongcongty;
			break;
		case 'dich-vu':
			$source = "about";
			$template = "about";
			$type_bar = 'dichvu';
			$title_detail = _dichvu.' ++';
			break;
		case 'lien-he':
			$source = "contact";
			$template = "contact";
			$title_detail = _lienhe;
			break;
		case 'tim-kiem':
			$source = "search";
			$template = "product";
			$title_detail = _ketquatimkiem;
			break;
		case 'ngon-ngu':
			break;
		case 'trang-chu':
			$source = "index";
			$template = "index";
			break;
		case '':
			$source = "index";
			$template = "index";
			break;
		default:
			header("HTTP/1.0 404 Not Found");
			echo file_get_contents("http://$config_url/404.php");
			exit();
	}
	if($source!="") include _source.$source.".php";
	/*if($_SERVER["REQUEST_URI"]=='/index.php'){
		header("location:https://www.tenmien.vn/");
	}*/
	if($_REQUEST['com']=='logout')
	{
		session_unregister($login_name);
		header("Location:index.php");
	}
	if($_REQUEST['com']=='thoat')
	{
		unset($_SESSION['login']);
		header("location:trang-chu.html");
	}
?>