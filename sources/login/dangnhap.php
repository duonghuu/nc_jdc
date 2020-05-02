<?php 
//echo $_SESSION['login']['username'];
	$title_tcat = "Đăng nhập";
	$title_bar .="Đăng nhập";
	
	if($_SESSION['login']['thanhvien']!=''){
		redirect("index.php");
	}
	
if(!empty($_POST)&& isset($_POST['username'])){
	
	global $d, $login_name;
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "select * from #_member where email='".$username."'";
	
	$d->query($sql);
	if($d->num_rows() == 1){
		$row = $d->fetch_array();
		
		if($row['active']!=1){
			transfer(_banphaikichhoattaikhoantruockhidangnhap, "dang-nhap.html");
		} else { 
			if(($row['password'] == md5($password))){
			  
				$sql_lanxem = "UPDATE #_member SET lastlogin='".time()."' WHERE email ='".$username."'";
				$d->query($sql_lanxem);
				
				$_SESSION[$login_name] = true;
				$_SESSION['login']['thanhvien'] = $username;
				$_SESSION['login']['ten'] = $row['ten'];
				$_SESSION['login']['diachi'] = $row['diachi'];
				$_SESSION['login']['mathanhvien'] = $row['mathanhvien'];
				$_SESSION['login']['email'] = $row['email'];
				$_SESSION['login']['sex'] = $row['sex'];
				$_SESSION['login']['dienthoai'] = $row['dienthoai'];
				$_SESSION['login']['id_tv'] = $row['id'];
				$_SESSION['login']['diemtichluy'] = $row['tichluy'];
				transfer(_chucmungbandadangnhapthanhcong,"javascript:history.go(-2)");
			}
		}
	}
	transfer(_tendangnhaphoacmatkhaukhongdung, "dang-nhap.html");
	}
	
	 
?>