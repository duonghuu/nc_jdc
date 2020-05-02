<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){
	case "capnhat":
		get_info();
		$template = "info/item_add";
		break;
	case "save":
		save_info();
		break;		
	default:
		$template = "index";
}

function get_info(){
	global $d, $item;
	$type = $_GET['type'];
	$sql = "select * from #_info where type='$type' limit 0,1";	
	$d->query($sql);
	$item = $d->fetch_array();
}

function save_info(){
	global $d;
	$file_name=images_name($_FILES['file']['name']);
	$file_name1=images_name($_FILES['file1']['name']);
	$file_name2=images_name($_FILES['file2']['name']);

	$d->reset();
	$sql = "select * from #_info where type='".$_GET['type']."' ";	
	$d->query($sql);
	$row_item = $d->result_array();
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=info&act=capnhat&type=".$_GET['type']);
	$type = $_GET['type'];
	
	if(count($row_item )>0){
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_hinhanh,$file_name,_style_thumb);	
			$d->setTable('info');
			$d->setWhere('type', $type);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo']);	
				delete_file(_upload_hinhanh.$row['thumb']);				
			}
		}
		if($photo1 = upload_image("file1", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name1)){
			$data['photo1'] = $photo1;	
			$data['thumb1'] = create_thumb($data['photo1'], _width_thumb, _height_thumb, _upload_hinhanh,$file_name1,_style_thumb);	
			$d->setTable('info');
			$d->setWhere('type', $type);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo1']);	
				delete_file(_upload_hinhanh.$row['thumb1']);				
			}
		}
		if($photo2 = upload_image("file2", 'mp3', _upload_hinhanh,$file_name2)){
			$data['file_nhacnen'] = $photo2;	
			$d->setTable('info');
			$d->setWhere('type', $type);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['file_nhacnnen']);				
			}
		}

		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['link'] = $_POST['link'];

		$data['mota_vi'] = magic_quote($_POST['mota_vi']);
		$data['mota_en'] = magic_quote($_POST['mota_en']);
		$data['mota_cn'] = magic_quote($_POST['mota_cn']);

		$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
		$data['noidung_en'] = magic_quote($_POST['noidung_en']);
		$data['noidung_cn'] = magic_quote($_POST['noidung_cn']);	
		
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('info');
		$d->setWhere('type', $type);
		if($d->update($data))
			redirect("index.php?com=info&act=capnhat&curPage=".$_REQUEST['curPage']."&type=".$_GET['type']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=info&act=capnhat&type=".$_GET['type']);
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], _width_thumb, _height_thumb, _upload_hinhanh,$file_name,_style_thumb);	
		}
		if($photo1 = upload_image("file1", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name1)){
			$data['photo1'] = $photo1;	
			$data['thumb1'] = create_thumb($data['photo1'], _width_thumb, _height_thumb, _upload_hinhanh,$file_name1,_style_thumb);	
		}
		if($photo2 = upload_image("file2", 'mp3', _upload_hinhanh,$file_name2)){
			$data['file_nhacnen'] = $photo2;	
		}		

		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['link'] = $_POST['link'];

		$data['mota_vi'] = magic_quote($_POST['mota_vi']);
		$data['mota_en'] = magic_quote($_POST['mota_en']);
		$data['mota_cn'] = magic_quote($_POST['mota_cn']);

		$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
		$data['noidung_en'] = magic_quote($_POST['noidung_en']);
		$data['noidung_cn'] = magic_quote($_POST['noidung_cn']);

		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
				
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['type'] = $type;
		$d->setTable('info');
		if($d->insert($data))
		{			
			redirect("index.php?com=info&act=capnhat&type=".$_GET['type']);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=info&act=capnhat&type=".$_GET['type']);
	}
}
?>