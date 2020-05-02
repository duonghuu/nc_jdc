<?php  if(!defined('_source')) die("Error");

	$keywords=trim($_GET['keywords']);
	$key_khong_dau=changeTitle($keywords);

	$per_page = 12; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	
	$where = " #_product where hienthi=1 and type='product'";
	if($keywords!='') {
		$where.=" and ( ten_$lang like'%$keywords%' or tenkhongdau like'%$key_khong_dau%' ) ";
	}
	$where .= " order by stt";

	$sql = "select id, ten_$lang, tenkhongdau, photo, thumb, giacu, type from $where $limit";
	$d->query($sql);
	$product = $d->result_array();

	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);
?>