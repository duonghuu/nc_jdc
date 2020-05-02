<?php  if(!defined('_source')) die("Error");

	@$id = trim(strip_tags(addslashes($_GET['id'])));
	@$idl = trim(strip_tags(addslashes($_GET['idl'])));
	@$idc = trim(strip_tags(addslashes($_GET['idc'])));

	if ($id!='') {
		$sql = "select * from #_album where hienthi=1 and id='".$id."'";
		$d->query($sql);
		$album_detail = $d->fetch_array();

		$title_detail = $album_detail['ten_'.$lang];
		$title_bar .= $album_detail['title'];
		$keyword_bar .= $album_detail['keywords'];
		$description_bar .= $album_detail['description'];

		$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';
		$share_facebook .= '<meta property="og:type" content="website" />';
		$share_facebook .= '<meta property="og:title" content="'.$album_detail['ten_'.$lang].'" />';
		$share_facebook .= '<meta property="og:description" content="'.$album_detail['mota_'.$lang].'" />';
		$share_facebook .= '<meta property="og:image" content="http://'.$config_url.'/'._upload_album_l.$album_detail['photo'].'" />';
		//breadcrumb
		$com_all = "khach-hang";
		$comt_all = _khachhang;

		$sql_khac = "select * from #_album_photo where hienthi=1 and id_album ='".$album_detail['id']."' order by id desc";
		$d->query($sql_khac);
		$album_images = $d->result_array();

	}elseif($idl!=''){

		$d->reset();
		$sql = "select id,ten_$lang,tenkhongdau from #_album_list where hienthi=1 and type='".$type_bar."' and id='".$idl."'";
		$d->query($sql);
		$row_detail = $d->fetch_array();

		//breadcrumb
		$com_all = "khach-hang";
		$comt_all = _khachhang;

		$per_page = 16;
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_album where hienthi=1 and type='".$type_bar."' and id_list='".$idl."'  order by stt,ngaytao desc";

		$sql = "select * from $where $limit";
		$d->query($sql);
		$album = $d->result_array();

		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);

		$title_detail = $row_detail['ten_'.$lang];
		$title_bar .= $row_detail['title'];
		$keyword_bar .= $row_detail['keywords'];
		$description_bar .= $row_detail['description'];
	}elseif($idc!=''){
		$d->reset();
		$sql = "select id,id_list,ten_$lang,tenkhongdau from #_album_cat where hienthi=1 and type='".$type_bar."' and id='".$idl."'";
		$d->query($sql);
		$row_detail = $d->fetch_array();

		$d->reset();
		$sql = "select id,ten_$lang,tenkhongdau from #_album_list where hienthi=1 and id='".$row_detail['id_list']."' ";
		$d->query($sql);
		$row_detail_list = $d->fetch_array();

		//breadcrumb
		$com_all = "khach-hang";
		$comt_all = _khachhang;

		$list_all = $row_detail_list["tenkhongdau"];
		$listt_all = $row_detail_list["ten_$lang"];
		$listid_all = $row_detail_list["id"];

		$per_page = 16;
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_album where hienthi=1 and type='".$type_bar."' and id_cat='".$idc."'  order by stt,ngaytao desc";

		$sql = "select * from $where $limit";
		$d->query($sql);
		$album = $d->result_array();

		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);

		$title_detail = $row_detail['ten_'.$lang];
		$title_bar .= $row_detail['title'];
		$keyword_bar .= $row_detail['keywords'];
		$description_bar .= $row_detail['description'];
	} else {
		$sql_tintuc = "select * from #_album where hienthi=1 and type='".$type_bar."' order by id desc";
		$d->query($sql_tintuc);
		$album = $d->result_array();
		
		$title_bar .= $row_meta['title'];
		$keyword_bar .= $row_meta['keywords'];
		$description_bar .= $row_meta['description'];
	}
?>