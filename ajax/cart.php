<?php
	include ("ajax_config.php");
	
	$act = trim(strip_tags($_POST['act']));
	
	switch($act){
		case "addcart":
			addcart();
			break;
		case "dangnhap":
			check_user();
			break;
		default:
			break;
	}

function addcart() {
	global $d;
	$id = intval($_POST['id']);
	$size = trim(strip_tags($_POST['size']));
	$mausac = trim(strip_tags($_POST['mausac']));
	$soluong = intval($_POST['soluong']);
	
	addtocart($id,$size,$mausac,$soluong);

	$return['sl'] = count($_SESSION['cart']);
	echo json_encode($return);
}
?>   
