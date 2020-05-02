<?
	function get_product_name($pid){
		global $d, $row,$lang;
		$sql = "select ten_$lang from #_product where id='".$pid."'";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row['ten_'.$lang];
	}
	
	function get_price($pid, $q){
		global $d, $row;
		if($q == 1) {
			$d->reset();
			$sql = "select giaban from table_product where id='".$pid."'";
			$d->query($sql);
			$row = $d->fetch_array();
			return $row['giaban'];
		} else {
			$d->reset();
			$sql = "select * from table_gia where id_product='".$pid."'";
			$d->query($sql);
			$row_giasl = $d->result_array();
			if(count($row_giasl) > 0) {
				$d->reset();
				$sql = "select gia from table_gia where id_product=".$pid." and ".$q." >= soluongtu and ".$q." <= soluongden";
				$d->query($sql);
				$row = $d->fetch_array();
				return $row['gia'];
			} else {
				$d->reset();
				$sql = "select giaban from table_product where id='".$pid."'";
				$d->query($sql);
				$row = $d->fetch_array();
				return $row['giaban'];
			}
		}
	}
		
	function get_thumb($pid){
		global $d, $row;
		$sql = "select photo from table_product where id='".$pid."' ";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row['photo'];
	}
	function remove_product($pid,$size,$mausac){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid'] and $size==$_SESSION['cart'][$i]['size'] and $mausac==$_SESSION['cart'][$i]['mausac']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	function remove_pro_thanh($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
		redirect('thanh-toan.html');
	}
	function get_order_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid, $q);
			$sum+=$price*$q;
		}
		return $sum;
	}
	function addtocart($pid,$size,$mausac,$q){die($q);
		if($pid<1 or $q<1) return;
		
		if(is_array($_SESSION['cart'])){
			if(product_exists($pid,$size,$mausac)) return;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['productid']=$pid;
			$_SESSION['cart'][$max]['qty']=$q;
			$_SESSION['cart'][$max]['size']=$size;
			$_SESSION['cart'][$max]['mausac']=$mausac;
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['productid']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
			$_SESSION['cart'][0]['size']=$size;
			$_SESSION['cart'][0]['mausac']=$mausac;
		}
	}
	function product_exists($pid,$size,$mausac){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid'] and $size==$_SESSION['cart'][$i]['size'] and $mausac==$_SESSION['cart'][$i]['mausac']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}
?>