<?php
	include ("ajax_config.php");

	$d = new database($config['database']);

	$keywords = $_POST['term'];
	
	$d->reset();
	$d->query("select id, ten_vi, giaban, photo from #_product where hienthi=1 and ten_vi like '%$keywords%' order by stt,id desc");
	$pro = $d->result_array();

	foreach ($pro as $key => $value) {
		$result[$key]['tensp'] = $value['ten_vi'];
		$result[$key]['id'] = $value['id'];
		$result[$key]['giaban'] = number_format($value['giaban'],0,',',',').' VNĐ';
		$result[$key]['photo'] = $value['photo'];
	}

	echo json_encode($result);
?>   
