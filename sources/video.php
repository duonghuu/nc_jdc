<?php  if(!defined('_source')) die("Error");

		$id =  addslashes($_GET['id']);
		
		if($id!=''){

			$sql_lanxem = "UPDATE table_video SET luotxem=luotxem+1  WHERE tenkhongdau ='".$id."'";
			$d->query($sql_lanxem);

			$sql = "select * from #_video where hienthi=1 and tenkhongdau='".$id."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$title_detail = "Video";
			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];
			
			#các tin cu hon
			$sql_khac = "select id, ten_$lang, tenkhongdau, link, ngaytao, luotxem from #_video where hienthi=1 and tenkhongdau !='".$id."' and type='video' order by stt,ngaytao desc limit 0,10";
			$d->query($sql_khac);
			$video = $d->result_array();

		} else {

			// cac tin tuc
			$per_page = 9; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_video where hienthi=1 and type='video' order by id desc";

			$sql = "select id, ten_$lang, tenkhongdau, link, ngaytao, luotxem from $where $limit";
			$d->query($sql);
			$video = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);

			$title_detail = "Video";

		}
	
?>