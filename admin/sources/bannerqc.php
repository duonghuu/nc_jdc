<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "capnhat":
		get_banner();
		$template = "bannerqc/banner_add";
		break;
	case "save":
		save_banner();
		break;
	default:
		$template = "index";
}

function get_banner(){
	global $d, $item;

	$sql = "select * from #_photo where type='".$_GET['type']."'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_banner(){
	global $d;
	$file_name=images_name($_FILES['file_vi']['name']);
	$file_name1=images_name($_FILES['file_en']['name']);
	$file_name2=images_name($_FILES['file_cn']['name']);

	$sql = "select * from #_photo where type='".$_GET['type']."'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	
	if($id){ 
		if($photo = upload_image("file_vi", 'swf|jpg|gif|png', _upload_hinhanh,$file_name)){
			$data['photo_vi'] = $photo;
			$data['thumb_vi'] = create_thumb($data['photo_vi'], _width_thumb, _height_thumb, _upload_hinhanh,$file_name,_style_thumb);
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->setWhere('type',$_GET['type']);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['photo_vi']);
			delete_file(_upload_hinhanh.$row['thumb_vi']);
		}
		if($photo = upload_image("file_en", 'swf|jpg|gif|png', _upload_hinhanh,$file_name1)){
			$data['photo_en'] = $photo; 
			$data['thumb_en'] = create_thumb($data['photo_en'], _width_thumb, _height_thumb, _upload_hinhanh,$file_name1,_style_thumb);
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->setWhere('type',$_GET['type']);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['photo_en']);
			delete_file(_upload_hinhanh.$row['thumb_en']);
		}
		if($photo = upload_image("file_cn", 'swf|jpg|gif|png', _upload_hinhanh,$file_name2)){
			$data['photo_cn'] = $photo; 
			$data['thumb_cn'] = create_thumb($data['photo_cn'], _width_thumb, _height_thumb, _upload_hinhanh,$file_name2,_style_thumb);
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->setWhere('type',$_GET['type']);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['photo_cn']);
			delete_file(_upload_hinhanh.$row['thumb_cn']);
		}

		$data['mota_vi'] = $_POST['mota_vi'];
		$data['mota_en'] = $_POST['mota_en'];
		$data['mota_cn'] = $_POST['mota_cn'];
		$data['link'] = $_POST['link'];

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('type',$_GET['type']);
		if($d->update($data))
			redirect("index.php?com=bannerqc&act=capnhat&type=".$_GET['type']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat&type=".$_GET['type']."");
	} else {
		if($photo = upload_image("file_vi", 'swf|jpg|gif|png', _upload_hinhanh,$file_name)){
			$data['photo_vi'] = $photo;
			$data['thumb_vi'] = create_thumb($data['photo_vi'], _width_thumb, _height_thumb, _upload_hinhanh,$file_name1,_style_thumb);
		}
		if($photo1 = upload_image("file_en", 'swf|jpg|gif|png', _upload_hinhanh,$file_name1)){
			$data['photo_en'] = $photo1; 
			$data['thumb_en'] = create_thumb($data['photo_en'], _width_thumb, _height_thumb, _upload_hinhanh,$file_name,_style_thumb);
		}
		if($photo2 = upload_image("file_cn", 'swf|jpg|gif|png', _upload_hinhanh,$file_name2)){
			$data['photo_cn'] = $photo2;
			$data['thumb_cn'] = create_thumb($data['photo_cn'], _width_thumb, _height_thumb, _upload_hinhanh,$file_name1,_style_thumb);
		}

		$data['mota_vi'] = $_POST['mota_vi'];
		$data['mota_en'] = $_POST['mota_en'];
		$data['mota_cn'] = $_POST['mota_cn'];
		$data['link'] = $_POST['link'];

		$data['type']=$_GET['type'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$d->setTable('photo');
		if($d->insert($data))
			redirect("index.php?com=bannerqc&act=capnhat&type=".$_GET['type']."");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat&type=".$_GET['type']."");
		}
	}
?>