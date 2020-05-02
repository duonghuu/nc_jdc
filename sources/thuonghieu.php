<?php  if(!defined('_source')) die("Error");

		@$id=  addslashes($_GET['id']);
		#các sản phẩm khác======================
		$select_pro = " id,thumb,ten_$lang,giaban,tenkhongdau,mota_$lang,giacu";
		if($id){

			$d->reset();
			$sql_detail = "select * from #_thuonghieu where hienthi=1 and tenkhongdau='".$id."'";
			$d->query($sql_detail);
			$row_detail = $d->fetch_array();

			$title_detail = $row_detail['tenthuonghieu'];
			$per_page = 12; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_product where hienthi=1 and type='product' and id_thuonghieu='".$row_detail['id']."'  order by stt,ngaytao desc";

			$sql = "select $select_pro from $where $limit";
			$d->query($sql);
			$product = $d->result_array();

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url);
		}		
?>