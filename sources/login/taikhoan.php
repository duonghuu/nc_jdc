<?php if(!defined('_source')) die("Error");
		$title_tcat = _capnhattaikhoan;
		$title_bar .= _capnhattaikhoan;		
		
		
		if($_SESSION['login']['thanhvien']==''){
			transfer("Bạn phải đăng nhập mới được vào đây.", "http://$config_url/dang-nhap.html");
		} else {
			$d->reset();
		    $sql = "select * from #_member where mathanhvien ='".$_SESSION['login']['mathanhvien']."' ";
		    $d->query($sql);
		    $thanhvien_info = $d->fetch_array();
		}

		if($_GET['id']=='don-hang'){

			$d->reset();
			$sql = "select * from #_order where mathanhvien='".$_SESSION['login']['mathanhvien']."' order by id desc";
			$d->query($sql);
			$row_donhang = $d->result_array();

		} else if($_GET['id']=='tien-thuong'){
			$d->reset();
			$sql = "select * from #_order where mathanhvien='".$_SESSION['login']['mathanhvien']."' and trangthai=4 order by id desc";
			$d->query($sql);
			$row_donhang = $d->result_array();
		}
		
		
		$vl =  addslashes($_SESSION['login']['id_tv']);
		$diemthuong = $_SESSION['login']['diemtichluy']; 
		
		//Diem tich luy
		$d->reset();
		$sql = "select * from #_member where id='".$vl."'";
		$d->query($sql);
		$dtl = $d->fetch_array();
		

		
		if($_POST['email']){
			
			if($_POST['txtCaptcha'] != $_SESSION['captcha_code']) {
			   transfer(_maxacnhankhongchinhxac, "tai-khoan.html");
			} else {
				
				$data['password'] = md5($_POST['password']);
				$data['ten'] = $_POST['ten'];
				$data['dienthoai'] = $_POST['dienthoai'];
				$data['doanhnghiep_ten'] = $_POST['doanhnghiep_ten'];
				$data['doanhnghiep_diachi'] = $_POST['doanhnghiep_diachi'];
				$data['doanhnghiep_MST'] = $_POST['doanhnghiep_MST'];
				$data['sex'] = $_POST['sex'];
				$data['diachi'] = $_POST['diachi'];

				$ngaysinh = $_POST['ngaysinh'];
				$Ngay_arr = explode("/",$ngaysinh); // array(17,11,2010)
				if (count($Ngay_arr)==3) {
					$ngay = $Ngay_arr[0]; //17
					$thang = $Ngay_arr[1]; //11
					$nam = $Ngay_arr[2]; //2010
					if (checkdate($thang,$ngay,$nam)==false){ } else $ngaysinh=$nam."-".$thang."-".$ngay;
				}	
				$ngaysinh = strtotime($ngaysinh);
				$data['ngaysinh']=$ngaysinh;

				//dump($_POST);
				$d->setTable('member');
				$d->setWhere('email', $_POST['email']);
				if($d->update($data)) {

					$d->reset();
					$sql = "select * from #_member where email='".$_POST['email']."'";
					$d->query($sql);
					$row = $d->fetch_array();
					
					$_SESSION['login']['ten'] = $row['ten'];
					$_SESSION['login']['diachi'] = $row['diachi'];
					$_SESSION['login']['email'] = $row['email'];
					$_SESSION['login']['sex'] = $row['sex'];
					$_SESSION['login']['dienthoai'] = $row['dienthoai'];
					$_SESSION['login']['id_tv'] = $row['id'];
					$_SESSION['login']['diemtichluy'] = $row['tichluy'];
					
					transfer(_capnhattaikhoanthanhcong, "index.html");
					
				} else {
					transfer(_coloixayra, "tai-khoan.html");
				}
				
			}
		}


	
?>