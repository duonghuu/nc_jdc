<?php
	include ("ajax_config.php");
	include_once _lib."functions_filter.php";

	$act = trim(strip_tags($_POST['act']));
	
if($act == 'remove') {
	$id=$_POST['id'];
	$table=$_POST['table'];
	$max=count($_SESSION['filter']);
	for($i=0;$i<$max;$i++){
		if($id==$_SESSION['filter'][$i]['id'] && $table==$_SESSION['filter'][$i]['table']){
			unset($_SESSION['filter'][$i]);
			break;
		}
	}
	$_SESSION['filter']=array_values($_SESSION['filter']);
	$max=count($_SESSION['filter']);

//Lay du lieu data1
	for ($i=0; $i < $max; $i++) {

		$d->reset();
		$sql = "select id, ten_vi from #_".$_SESSION['filter'][$i]['table']." where id='".$_SESSION['filter'][$i]['id']."'";
		$d->query($sql);
		$row_label = $d->fetch_array();

		$data1 .= '<div class="item_f clearfix" data-id="'.$_SESSION['filter'][$i]['id'].'" data-table="'.$_SESSION['filter'][$i]['table'].'"><span>'.$row_label["ten_vi"].'</span><i class="far fa-times-circle"></i></div>';

	}
	$data1 .= '<script type="text/javascript">
	$(document).ready(function() {
		$(".item_f i").click(function(){
			id = $(this).parent().attr("data-id");
			table = $(this).parent().attr("data-table");
			act = "remove";
			$.ajax({
			    url:"ajax/filter.php",
			    type:"post",
			    data:{id:id,table:table,act:act},
			    async:true,
			    success:function(result){
			    	var getData = $.parseJSON(result); 
			        $(".data_filter").html(getData.data1);
			        $("#w_content_data").html(getData.data2);
			        $(this).parent().remove();
			    }
			});
		});
		$(".remove_f").click(function(){
			act = "clear";
			$.ajax({
			    url:"ajax/filter.php",
			    type:"post",
			    data:{act:act},
			    async:true,
			    success:function(result){
			        window.location.reload();
			    }
			});
		});
	})
</script>';

//Lay du lieu data2
    $select_pro = " id, ten_$lang, mota_$lang, tenkhongdau, photo, giacu, giaban, giakm, sp_hot, sp_khuyenmai ";
	$per_page = 16;
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	$where = " #_product where hienthi=1 and type='product' ";
	for ($i=0; $i < $max; $i++) {
		if($_SESSION['filter'][$i]['table'] == 'product_list'){
			$where .= " and id_list = '".$_SESSION['filter'][$i]['id']."'";
		}
		if($_SESSION['filter'][$i]['table'] == 'thuonghieu'){
			$where .= " and id_thuonghieu = '".$_SESSION['filter'][$i]['id']."'";
		}
		if($_SESSION['filter'][$i]['table'] == 'tinhtrangmay'){
			$where .= " and id_tinhtrangmay = '".$_SESSION['filter'][$i]['id']."'";
		}
		if($_SESSION['filter'][$i]['table'] == 'kieu'){
			$where .= " and id_kieu = '".$_SESSION['filter'][$i]['id']."'";
		}
		if($_SESSION['filter'][$i]['table'] == 'gia'){
			$d->reset();
		    $sql = "select id, giatu, giaden from #_gia where id='".$_SESSION['filter'][$i]['id']."'";
		    $d->query($sql);
		    $data_gia = $d->fetch_array();

			if($data_gia['giatu']==0){
				$where.= " and giaban <= ".$data_gia['giaden']." ";
			} else if($data_gia['giaden']==0){
				$where.= " and giaban >= ".$data_gia['giatu']."  ";
			} else {
				$where.= " and giaban >= ".$data_gia['giatu']." and giaban <= ".$data_gia['giaden']." ";
			}
		}
	}
	$where .= " order by stt,ngaytao desc ";

	$sql = "select $select_pro from $where $limit";
	$d->query($sql);
	$product = $d->result_array();

	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);

	if(count($product)!=0){
		$data2 = '<div class="content_product clearfix">';
		foreach($product as $key => $value) {
			$data2 .= '<div class="w_item_product">';
				$data2 .= '<a href="san-pham/'.$value['tenkhongdau'].'-'.$value['id'].'.html'.'" class="img zoom_hinh" title="'.$value['ten_'.$lang].'">';
					$data2 .= '<img src="thumb/270x130/2/'._upload_product_l.$value['photo'].'" alt="'.$value['ten_'.$lang].'">
				</a>';
				$data2 .= '<div class="info_pro">';
					$data2 .= '<h3><a href="san-pham/'.$value['tenkhongdau'].'-'.$value['id'].'.html" title="'.$value['ten_'.$lang].'">'.$value['ten_'.$lang].'</a></h3>';
					$data2 .= '<span class="new_price">';
					if($value['giaban'] != 0) {
						$data2 .= 'Khuyến mãi: <strong>'.number_format ($value['giaban'],0,",",".").' đ'.'</strong>';
					}
					$data2 .= '</span>';
					$data2 .= '<span class="old_price">';
					if($value['giacu'] != 0) {
						$data2 .= 'Giá: <strong>';
						if($value['giacu'] == 0) {
							$data2 .= 'Liên hệ';
						} else {
							$data2 .= number_format ($value['giacu'],0,",",".").' đ'; 
					}
					$data2 .= '</strong>';
				}
				$data2 .= '</span>';
					if($value['giacu'] != 0) {
						$data2 .= '<span class="sale_price">-'.$value['giakm'].' %</span>';
					}
				$data2 .= '</div>';
			$data2 .= '</div>';
		}
		$data2 .= '</div>';
	$data2 .= '<div class="paging">'.$paging.'</div><div style="display:none"><div id="inline_content"></div></div>';
	} else {
		$data2 .= '<h3 class="title_update">Dữ liệu đang cập nhật...</h3>';
	}

	$data_result = array('data1' => $data1, 'data2' => $data2);
	echo json_encode($data_result);

} elseif($act=='clear') {
	unset($_SESSION['filter']);
} else {
	$d = new database($config['database']);
	
	$arr = explode('-',$_POST['id']);
	$id = $arr[0];
	$table = $arr[1];

	add_filter($id, $table);
	$max=count($_SESSION['filter']);

//Lay du lieu data1
	for ($i=0; $i < $max; $i++) {

		$d->reset();
		$sql = "select id, ten_vi from #_".$_SESSION['filter'][$i]['table']." where id='".$_SESSION['filter'][$i]['id']."'";
		$d->query($sql);
		$row_label = $d->fetch_array();

		$data1 .= '<div class="item_f clearfix" data-id="'.$_SESSION['filter'][$i]['id'].'" data-table="'.$_SESSION['filter'][$i]['table'].'"><span>'.$row_label["ten_vi"].'</span><i class="far fa-times-circle"></i></div>';

	}
	$data1 .= '<a class="remove_f">Xóa tất cả</a>';
	$data1 .= '<script type="text/javascript">
	$(document).ready(function() {
		$(".item_f i").click(function(){
			id = $(this).parent().attr("data-id");
			table = $(this).parent().attr("data-table");
			act = "remove";
			$.ajax({
			    url:"ajax/filter.php",
			    type:"post",
			    data:{id:id,table:table,act:act},
			    async:true,
			    success:function(result){
			    	var getData = $.parseJSON(result); 
			        $(".data_filter").html(getData.data1);
			        $("#w_content_data").html(getData.data2);
			        $(this).parent().remove();
			    }
			});
		});
		$(".remove_f").click(function(){
			act = "clear";
			$.ajax({
			    url:"ajax/filter.php",
			    type:"post",
			    data:{act:act},
			    async:true,
			    success:function(result){
			        window.location.reload();
			    }
			});
		});
	})
</script>';

//Lay du lieu data2
    $select_pro = " id, ten_$lang, mota_$lang, tenkhongdau, photo, giacu, giaban, giakm, sp_hot, sp_khuyenmai ";
	$per_page = 16;
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	$where = " #_product where hienthi=1 and type='product' ";
	for ($i=0; $i < $max; $i++) {
		if($_SESSION['filter'][$i]['table'] == 'product_list'){
			$where .= " and id_list = '".$_SESSION['filter'][$i]['id']."'";
		}
		if($_SESSION['filter'][$i]['table'] == 'thuonghieu'){
			$where .= " and id_thuonghieu = '".$_SESSION['filter'][$i]['id']."'";
		}
		if($_SESSION['filter'][$i]['table'] == 'tinhtrangmay'){
			$where .= " and id_tinhtrangmay = '".$_SESSION['filter'][$i]['id']."'";
		}
		if($_SESSION['filter'][$i]['table'] == 'kieu'){
			$where .= " and id_kieu = '".$_SESSION['filter'][$i]['id']."'";
		}
		if($_SESSION['filter'][$i]['table'] == 'gia'){
			$d->reset();
		    $sql = "select id, giatu, giaden from #_gia where id='".$_SESSION['filter'][$i]['id']."'";
		    $d->query($sql);
		    $data_gia = $d->fetch_array();

			if($data_gia['giatu']==0){
				$where.= " and giaban <= ".$data_gia['giaden']." ";
			} else if($data_gia['giaden']==0){
				$where.= " and giaban >= ".$data_gia['giatu']."  ";
			} else {
				$where.= " and giaban >= ".$data_gia['giatu']." and giaban <= ".$data_gia['giaden']." ";
			}
		}
	}
	$where .= " order by stt,ngaytao desc ";

	$sql = "select $select_pro from $where $limit";
	$d->query($sql);
	$product = $d->result_array();

	$url = getCurrentPageURL();
	$paging = pagination($where,$per_page,$page,$url);

	if(count($product)!=0){
		$data2 = '<div class="content_product clearfix">';
		foreach($product as $key => $value) {
			$data2 .= '<div class="w_item_product">';
				$data2 .= '<a href="san-pham/'.$value['tenkhongdau'].'-'.$value['id'].'.html'.'" class="img zoom_hinh" title="'.$value['ten_'.$lang].'">';
					$data2 .= '<img src="thumb/270x130/2/'._upload_product_l.$value['photo'].'" alt="'.$value['ten_'.$lang].'">
				</a>';
				$data2 .= '<div class="info_pro">';
					$data2 .= '<h3><a href="san-pham/'.$value['tenkhongdau'].'-'.$value['id'].'.html" title="'.$value['ten_'.$lang].'">'.$value['ten_'.$lang].'</a></h3>';
					$data2 .= '<span class="new_price">';
					if($value['giaban'] != 0) {
						$data2 .= 'Khuyến mãi: <strong>'.number_format ($value['giaban'],0,",",".").' đ'.'</strong>';
					}
					$data2 .= '</span>';
					$data2 .= '<span class="old_price">';
					if($value['giacu'] != 0) {
						$data2 .= 'Giá: <strong>';
						if($value['giacu'] == 0) {
							$data2 .= 'Liên hệ';
						} else {
							$data2 .= number_format ($value['giacu'],0,",",".").' đ'; 
					}
					$data2 .= '</strong>';
				}
				$data2 .= '</span>';
					if($value['giacu'] != 0) {
						$data2 .= '<span class="sale_price">-'.$value['giakm'].' %</span>';
					}
				$data2 .= '</div>';
			$data2 .= '</div>';
		}
		$data2 .= '</div>';
	$data2 .= '<div class="paging">'.$paging.'</div><div style="display:none"><div id="inline_content"></div></div>';
	} else {
		$data2 .= '<h3 class="title_update">Dữ liệu đang cập nhật...</h3>';
	}

	$data_result = array('data1' => $data1, 'data2' => $data2);
	echo json_encode($data_result);
}
?>