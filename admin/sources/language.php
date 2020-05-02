<?php if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){
	case "man":
		get_languages();
		$template = "language/list";
		break;
	case "man_add":
		$template = "language/list_add";
		break;
	case "man_edit":
		get_language();
		$template = "language/list_add";
		break;
	case "save":
		save_language();
		break;
	case "man_delete":
		delete_language();
		break;
	default:
		$template = "index";
		break;
}
function get_languages(){
	global $d, $items, $paging, $page;

	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	$where = " #_lang ";

	if($_REQUEST['keyword']!='')
	{
		$keyword=addslashes($_REQUEST['keyword']);
		$where.=" where tenbien like '%$keyword%' or ten_vi like '%$keyword%' or ten_en like '%$keyword%' or ten_cn like '%$keyword%'";
		$link_add .= "&keyword=".$_GET['keyword'];
	}
	$where .=" order by id desc";

	$sql = "select id, tenbien, ten_vi, ten_en, ten_cn from $where $limit";
	$d->query($sql);
	$items = $d->result_array();
    
    $url = "index.php?com=dichnghia&act=man".$link_add;
	$paging = pagination($where,$per_page,$page,$url);

	// Doc va ghi file lang_vi, lang_en, lang_ge
	$file_lang_vi = "../lang/lang_vi.php";
	if (!file_exists ($file_lang_vi)){
		$file_lang_vi = @fopen ($file_lang_vi, "w+") or die ("Couldn't create the file");
		fwrite($file_lang_vi, "<?php \n");
		foreach ($items as $key => $value) {
			$line = "@define ('".$value['tenbien']."','".$value['ten_vi']."');\n";
			fwrite($file_lang_vi, $line);
		}
		fwrite($file_lang_vi, '?>');
		fclose ($file_lang_vi);
	}

	$file_lang_en = "../lang/lang_en.php";
	if (!file_exists ($file_lang_en)){
		$file_lang_en = @fopen ($file_lang_en, "w+") or die ("Couldn't create the file");
		fwrite($file_lang_en, "<?php \n");
		foreach ($items as $key => $value) {
			$line = "@define ('".$value['tenbien']."','".$value['ten_en']."');\n";
			fwrite($file_lang_en, $line);
		}
		fwrite($file_lang_en, '?>');
		fclose ($file_lang_en);
	}

	$file_lang_cn = "../lang/lang_cn.php";
	if (!file_exists ($file_lang_cn)){
		$file_lang_cn = @fopen ($file_lang_cn, "w+") or die ("Couldn't create the file");
		fwrite($file_lang_cn, "<?php \n");
		foreach ($items as $key => $value) {
			$line = "@define ('".$value['tenbien']."','".$value['ten_cn']."');\n";
			fwrite($file_lang_cn, $line);
		}
		fwrite($file_lang_cn, '?>');
		fclose ($file_lang_cn);
	}
}
function get_language(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id) transfer("Không nhận được dữ liệu", "index.php?com=dichnghia&act=man");
	$sql = "select * from #_lang where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=dichnghia&act=man");
	$item = $d->fetch_array();
}
function save_language(){
	global $d;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=dichnghia&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$d->reset();
		$d->setTable('lang');
		$d->setWhere('id', $id);
		if($d->update($data)){
			create_lang();
			redirect("index.php?com=dichnghia&act=man&curPage=".$_REQUEST["curPage"]);
		} else {
			transfer("Cập nhật bị lỗi", "index.php?com=dichnghia&act=man&curPage=".$_REQUEST["curPage"]);
		}
	} else {
		$data['tenbien'] = $_POST['tenbien'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$d->reset();
		$d->setTable('lang');
		if($d->insert($data)){
			create_lang();
			redirect("index.php?com=dichnghia&act=man_add");
		} else {
			transfer("Dữ liệu bị lỗi, không thể thêm mới", "index.php?com=dichnghia&act=man");
		}
	}
}
function delete_language(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$sql = "delete from #_lang where id='".$id."'";
		$d->query($sql);
		if($_REQUEST['curPage']!='') $curPage = "&curPage=". $_REQUEST['curPage'];
		else $curPage = "";
		if($d->query($sql))
			redirect("index.php?com=dichnghia&act=man".$curPage);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=dichnghia&act=man".$curPage);
	} else {
		transfer("Không nhận được dữ liệu", "index.php?com=dichnghia&act=man");
	}
}
function create_lang(){
	global $d;
	$sql = "select * from #_lang where id != 0 order by id desc";
	$d->query($sql);
	$items = $d->result_array();

	// Doc va ghi file lang_vi, lang_en, lang_ge
	$file_lang_vi = "../lang/lang_vi.php";
	if (file_exists ($file_lang_vi)){
		unlink($file_lang_vi);
		$file_lang_vi = @fopen ($file_lang_vi, "w+") or die ("Couldn't create the file");
		fwrite($file_lang_vi, "<?php \n");
		foreach ($items as $key => $value) {
			$line = "@define ('".$value['tenbien']."','".$value['ten_vi']."');\n";
			fwrite($file_lang_vi, $line);
		}
		fwrite($file_lang_vi, '?>');
		fclose ($file_lang_vi);
	}

	$file_lang_en = "../lang/lang_en.php";
	if (file_exists ($file_lang_en)){
		unlink($file_lang_en);
		$file_lang_en = @fopen ($file_lang_en, "w+") or die ("Couldn't create the file");
		fwrite($file_lang_en, "<?php \n");
		foreach ($items as $key => $value) {
			$line = "@define ('".$value['tenbien']."','".$value['ten_en']."');\n";
			fwrite($file_lang_en, $line);
		}
		fwrite($file_lang_en, '?>');
		fclose ($file_lang_en);
	}

	$file_lang_cn = "../lang/lang_cn.php";
	if (file_exists ($file_lang_cn)){
		unlink($file_lang_cn);
		$file_lang_cn = @fopen ($file_lang_cn, "w+") or die ("Couldn't create the file");
		fwrite($file_lang_cn, "<?php \n");
		foreach ($items as $key => $value) {
			$line = "@define ('".$value['tenbien']."','".$value['ten_cn']."');\n";
			fwrite($file_lang_cn, $line);
		}
		fwrite($file_lang_cn, '?>');
		fclose ($file_lang_cn);
	}
}
?>
