<?php if(!defined('_source')) die("Error");

		if($_SESSION['login']['thanhvien']!=''){
			redirect("http://".$config_url);
		}
		
		$randomkey = $_GET['thongtin'];

		
		
		//exit();
		$sqlUPDATE_ORDER = "UPDATE table_member SET active=1 WHERE mathanhvien='$randomkey'";

		$d->reset();
        $sql = "select ten from table_member where mathanhvien='".$randomkey."'";
        $d->query($sql);
        $taikhoan = $d->fetch_array();

		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

		$title_bar .= _kichhoattaikhoan;	
		$title_tcat = _kichhoattaikhoan;	
?>