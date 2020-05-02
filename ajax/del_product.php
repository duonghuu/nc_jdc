<?php
	include ("ajax_config.php");

	$pid = $_POST['id_pro'];

	$max=count($_SESSION['cart']);
	for($i=0;$i<$max;$i++){
		if($pid==$_SESSION['cart'][$i]['productid'] and $size==$_SESSION['cart'][$i]['size'] and $mausac==$_SESSION['cart'][$i]['mausac']){
			unset($_SESSION['cart'][$i]);
		}
	}
	$_SESSION['cart']=array_values($_SESSION['cart']);
?>