<?php
	session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './libraries/');

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";	
	$d = new database($config['database']);
	
	
	$d->query("select ten_vi,diachi,photo,toado from #_chinhanh order by id desc ");
	$data = array();
	foreach($d->result_array() as $k=>$v){
		
		
		$td = explode(",",$v['toado']);
		//$data[$k]['points'] = array("lat"=>$td[0],"lon"=>$td[1]);
		$data[$k]['lat'] = $td[0];
		$data[$k]['lon'] = $td[1];
		$data[$k]['title'] = $v['ten_vi'];
		$data[$k]['html'] = '<div class="box-info-map"><div ><img src="'._upload_baiviet_l.$v['photo'].'"style="width:80px;height:70px;float:left;margin-right:10px;"></div><a><div class="bd"><h3 class="map-name">'.$v['ten_vi'].' </h3></div><div class="estate-address"><i class="fa fa-map-marker"></i> <strong>Vị trí:</strong> "'.$v['diachi'].'"</div></a></div>';
		$data[$k]['icon'] = "http://".$config_url."/"._upload_baiviet_l.$v['photo'];
		$data[$k]['zoom'] = 15;
		
		
	}
	$xx['title'] = 'xxx';
	$xx['type'] = 'marker';
	$xx['points'] = $data;
	echo json_encode($xx);
	
	
?>
