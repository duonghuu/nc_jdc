<?php  if(!defined('_source')) die("Error");

	@$idl = trim(strip_tags(addslashes($_GET['idl'])));
	@$idc = trim(strip_tags(addslashes($_GET['idc'])));
	@$idi = trim(strip_tags(addslashes($_GET['idi'])));
	@$ids = trim(strip_tags(addslashes($_GET['ids'])));
	@$id = trim(strip_tags(addslashes($_GET['id'])));

	$select_pro = " id, ten_$lang, mota_$lang, tenkhongdau, photo, thumb, giacu, giaban, giakm, sp_hot, sp_khuyenmai ";

	if($id!=''){

		$d->reset();
		$sql_detail = "select * from #_product where hienthi=1 and type='".$type_bar."' and id='".$id."'";
		$d->query($sql_detail);
		$row_detail = $d->fetch_array();

		$d->reset();
		$sql = "select id, ten_$lang, tenkhongdau from #_product_list where hienthi=1 and id='".$row_detail['id_list']."' ";
		$d->query($sql);
		$row_detail_list = $d->fetch_array();

		$d->reset();
		$sql = "select id, ten_$lang, tenkhongdau from #_product_cat where hienthi=1 and id='".$row_detail['id_cat']."' ";
		$d->query($sql);
		$row_detail_cat = $d->fetch_array();

		$d->reset();
		$sql = "select id, ten_$lang, tenkhongdau from #_product_item where hienthi=1 and id='".$row_detail['id_item']."' ";
		$d->query($sql);
		$row_detail_item = $d->fetch_array();

		$d->reset();
		$sql = "select id, ten_$lang, tenkhongdau from #_product_sub where hienthi=1 and id='".$row_detail['id_sub']."' ";
		$d->query($sql);
		$row_detail_sub = $d->fetch_array();

		//breadcrumb
		$com_all = "san-pham";
		$comt_all = "Sản phẩm";

		$list_all = $row_detail_list["tenkhongdau"];
		$listt_all = $row_detail_list["ten_$lang"];
		$listid_all = $row_detail_list["id"];

		$cat_all = $row_detail_cat["tenkhongdau"];
		$catt_all = $row_detail_cat["ten_$lang"];
		$catid_all = $row_detail_cat["id"];

		$item_all = $row_detail_item["tenkhongdau"];
		$itemt_all = $row_detail_item["ten_$lang"];
		$itemid_all = $row_detail_item["id"];

		$sub_all = $row_detail_sub["tenkhongdau"];
		$subt_all = $row_detail_sub["ten_$lang"];
		$subid_all = $row_detail_sub["id"];

		$d->reset();
		$sql = "UPDATE #_product SET luotxem=luotxem+1 WHERE id ='".$id."'";
		$d->query($sql);
	    $d->reset();
		
		daxem($row_detail['id']);

		$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';
		$share_facebook .= '<meta property="og:type" content="website" />';
		$share_facebook .= '<meta property="og:title" content="'.$row_detail['ten_'.$lang].'" />';
		$share_facebook .= '<meta property="og:description" content="'.$row_detail['mota_'.$lang].'" />';
		$share_facebook .= '<meta property="og:image" content="http://'.$config_url.'/'._upload_product_l.$row_detail['photo'].'"/>';

		$d->reset();
		$sql = "select * from #_product_photo where hienthi=1 and id_product='".$id."' and type='".$type_bar."' order by stt,id desc";
		$d->query($sql);
		$product_photos = $d->result_array();

		$d->reset();
		$sql = "select $select_pro from #_product where hienthi=1 and type='".$type_bar."' and id_list='".$row_detail['id_list']."' and id!='".$id."' order by stt,ngaytao desc";
		$d->query($sql);
		$product = $d->result_array();

		$d->reset();
		$sql = "select $select_pro from #_product where hienthi=1 and type='".$type_bar."' and sp_banchay=1 order by stt,ngaytao desc";
		$d->query($sql);
		$product_banchay = $d->result_array();

		$title_detail = $row_detail['ten_'.$lang];
		$title_bar .= $row_detail['title'];
		$keyword_bar .= $row_detail['keywords'];
		$description_bar .= $row_detail['description'];

	} elseif($idl!=''){

		$d->reset();
		$sql = "select id,ten_$lang,tenkhongdau from #_product_list where hienthi=1 and type='".$type_bar."' and id='".$idl."'";
		$d->query($sql);
		$row_detail = $d->fetch_array();

		$h1 = $row_detail['h1'];
		$h2 = $row_detail['h2'];
		$h3 = $row_detail['h3'];
		$h4 = $row_detail['h4'];
		$h5 = $row_detail['h5'];
		$h6 = $row_detail['h6'];

		//breadcrumb
		$com_all = "san-pham";
		$comt_all = "Sản phẩm";

		$per_page = 15;
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_product where hienthi=1 and type='".$type_bar."' and id_list='".$idl."'  order by stt,ngaytao desc";

		$sql = "select $select_pro from $where $limit";
		$d->query($sql);
		$product = $d->result_array();

		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);

		$title_detail = $row_detail['ten_'.$lang];
		$title_bar .= $row_detail['title'];
		$keyword_bar .= $row_detail['keywords'];
		$description_bar .= $row_detail['description'];

	} elseif($idc!=''){

		$d->reset();
		$sql = "select id, id_list, ten_$lang, tenkhongdau from #_product_cat where hienthi=1 and type='".$type_bar."' and id='".$idc."'";
		$d->query($sql);
		$row_detail = $d->fetch_array();

		$h1 = $row_detail['h1'];
		$h2 = $row_detail['h2'];
		$h3 = $row_detail['h3'];
		$h4 = $row_detail['h4'];
		$h5 = $row_detail['h5'];
		$h6 = $row_detail['h6'];

		$d->reset();
		$sql = "select id,ten_$lang,tenkhongdau from #_product_list where hienthi=1 and id='".$row_detail['id_list']."' ";
		$d->query($sql);
		$row_detail_list = $d->fetch_array();

		//breadcrumb
		$com_all = "san-pham";
		$comt_all = "Sản phẩm";
		$list_all = $row_detail_list["tenkhongdau"];
		$listt_all = $row_detail_list["ten_$lang"];
		$listid_all = $row_detail_list["id"];

		$per_page = 15;
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_product where hienthi=1 and type='".$type_bar."' and id_cat='".$row_detail['id']."'  order by stt,ngaytao desc";

		$sql = "select $select_pro from $where $limit";
		$d->query($sql);
		$product = $d->result_array();

		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);

		$title_detail = $row_detail['ten_'.$lang];
		$title_bar .= $row_detail['title'];
		$keyword_bar .= $row_detail['keywords'];
		$description_bar .= $row_detail['description'];

	} elseif($idi!=''){

		$d->reset();
		$sql = "select id, id_list, id_cat, ten_$lang, tenkhongdau from #_product_item where hienthi=1 and type='".$type_bar."' and id='".$idi."'";
		$d->query($sql);
		$row_detail = $d->fetch_array();

		$h1 = $row_detail['h1'];
		$h2 = $row_detail['h2'];
		$h3 = $row_detail['h3'];
		$h4 = $row_detail['h4'];
		$h5 = $row_detail['h5'];
		$h6 = $row_detail['h6'];

		$d->reset();
		$sql = "select id, ten_$lang, tenkhongdau from #_product_list where hienthi=1 and id='".$row_detail['id_list']."' ";
		$d->query($sql);
		$row_detail_list = $d->fetch_array();

		$d->reset();
		$sql = "select id, ten_$lang, tenkhongdau from #_product_cat where hienthi=1 and id='".$row_detail['id_cat']."' ";
		$d->query($sql);
		$row_detail_cat = $d->fetch_array();

		//breadcrumb
		$com_all = "san-pham";
		$comt_all = "Sản phẩm";

		$list_all = $row_detail_list["tenkhongdau"];
		$listt_all = $row_detail_list["ten_$lang"];
		$listid_all = $row_detail_list["id"];

		$cat_all = $row_detail_cat["tenkhongdau"];
		$catt_all = $row_detail_cat["ten_$lang"];
		$catid_all = $row_detail_cat["id"];

		$per_page = 15;
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_product where hienthi=1 and type='".$type_bar."' and id_item='".$idi."'  order by stt,ngaytao desc";

		$sql = "select $select_pro from $where $limit";
		$d->query($sql);
		$product = $d->result_array();

		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);

		$title_detail = $row_detail['ten_'.$lang];
		$title_bar .= $row_detail['title'];
		$keyword_bar .= $row_detail['keywords'];
		$description_bar .= $row_detail['description'];

	} elseif($ids!=''){

		$d->reset();
		$sql = "select id, id_list, id_cat, id_item, ten_$lang, tenkhongdau from #_product_sub where hienthi=1 and type='".$type_bar."' and id='".$idi."'";
		$d->query($sql);
		$row_detail = $d->fetch_array();

		$h1 = $row_detail['h1'];
		$h2 = $row_detail['h2'];
		$h3 = $row_detail['h3'];
		$h4 = $row_detail['h4'];
		$h5 = $row_detail['h5'];
		$h6 = $row_detail['h6'];

		$d->reset();
		$sql = "select id, ten_$lang, tenkhongdau from #_product_list where hienthi=1 and id='".$row_detail['id_list']."' ";
		$d->query($sql);
		$row_detail_list = $d->fetch_array();

		$d->reset();
		$sql = "select id, ten_$lang, tenkhongdau from #_product_cat where hienthi=1 and id='".$row_detail['id_cat']."' ";
		$d->query($sql);
		$row_detail_cat = $d->fetch_array();

		$d->reset();
		$sql = "select id, ten_$lang, tenkhongdau from #_product_item where hienthi=1 and id='".$row_detail['id_item']."' ";
		$d->query($sql);
		$row_detail_item = $d->fetch_array();

		//breadcrumb
		$com_all = "san-pham";
		$comt_all = "Sản phẩm";

		$list_all = $row_detail_list["tenkhongdau"];
		$listt_all = $row_detail_list["ten_$lang"];
		$listid_all = $row_detail_list["id"];

		$cat_all = $row_detail_cat["tenkhongdau"];
		$catt_all = $row_detail_cat["ten_$lang"];
		$catid_all = $row_detail_cat["id"];

		$item_all = $row_detail_item["tenkhongdau"];
		$itemt_all = $row_detail_item["ten_$lang"];
		$itemid_all = $row_detail_item["id"];

		$per_page = 15;
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_product where hienthi=1 and type='".$type_bar."' and id_item='".$idi."'  order by stt,ngaytao desc";

		$sql = "select $select_pro from $where $limit";
		$d->query($sql);
		$product = $d->result_array();

		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);

		$title_detail = $row_detail['ten_'.$lang];
		$title_bar .= $row_detail['title'];
		$keyword_bar .= $row_detail['keywords'];
		$description_bar .= $row_detail['description'];

	} else {
		$per_page = 16;
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;

		if($com=='hang-moi-ve'){
			$where_tk  = " and sp_moi=1";
		}
		$where = " #_product where hienthi=1 and type='".$type_bar."' ";
		$where .= $where_tk;
		$where .= " order by stt,ngaytao desc ";

		$sql = "select $select_pro from $where $limit";
		$d->query($sql);
		$product = $d->result_array();

		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);
	}		
?>