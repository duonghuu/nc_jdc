<?php
	session_start();
	@define ( '_template' , '../templates/');
	@define ( '_source' , '../sources/');
	@define ( '_lib' , '../libraries/');

	if(!isset($_SESSION['lang']))
	{
	$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."functions_share.php";
	include_once _lib."class.database.php";
	include_once "/lang/lang_$lang.php";
	include_once _lib."file_requick.php";
	
	if($_GET['lang']!=''){
		$_SESSION['lang']=$_GET['lang'];
		header("location:".$_SESSION['links']);
	} else {
		$_SESSION['links']=getCurrentPageURL();
	}

	if(!empty($_POST)){

		$d->reset();
		$sql_setting = "select * from #_setting limit 0,1";
		$d->query($sql_setting);
		$row_setting= $d->fetch_array();
		dump($_POST);
		//Save data
		$data1['hoten'] = $_POST['hoten'];
		$data1['sodienthoai'] = $_POST['dienthoai'];
		$data1['diachi'] = $_POST['diachi'];
		$data1['email'] = $_POST['email'];
		$data1['soluong'] = $_POST['soluong'];
		$data1['gioitinh'] = $_POST['gr_sex'];
		$data1['noidung'] = $_POST['noidung'];

		$data1['ngaytao'] = time();
		$d->setTable('newsletter');
		$d->insert($data1);

		include_once "phpMailer/class.phpmailer.php";	
		$mail = new PHPMailer();
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = $config_ip; // tên SMTP server
		$mail->SMTPAuth   = true; // Sử dụng đăng nhập vào account
		$mail->Username   = $config_email; // SMTP account username
		$mail->Password   = $config_pass;  

		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom($config_email,$row_setting['ten_'.$lang]);
		
		$mail->AddAddress($_POST['email'],$_POST['hoten']);
		
		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
 		*=====================================*/

		//Thiết lập tiêu đề
		$mail->Subject    = "Thông tin khách hàng đã đăng ký nhận tin";
		$mail->IsHTML(true);

		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";

		//Thiết lập nội dung chính của email
		$body = '<div style="border: 1px solid #ccc; padding: 10px; box-sizing: border-box; background: #fff;">
				<span style="display: block; padding: 5px 10px; text-transform: uppercase; color: #fff; background: linear-gradient(90deg, #160F07 0, #2B1E03 50%, #160F07 100%);">Thông tin chi tiết</span>
				<span style="display: block; padding: 8px 0px; color: #333;">Tên khách hàng: '.$_POST["hoten"].'</span>
				<span style="display: block; padding: 8px 0px; color: #333;">Số điện thoại: '.$_POST["dienthoai"].'</span>
				<span style="display: block; padding: 8px 0px; color: #333;">Địa chỉ: '.$_POST["diachi"].'</span>
				<span style="display: block; padding: 8px 0px; color: #333;">Email: '.$_POST["email"].'</span>
				<span style="display: block; padding: 8px 0px; color: #333;">Số lượng: '.$_POST["soluong"].'</span>
				<span style="display: block; padding: 8px 0px; color: #333;">Giới tính: '.$_POST["gr_sex"].'</span>
				<span style="display: block; padding: 8px 0px; color: #333;">Nội dung: '.$_POST["noidung"].'</span>
			</div>';		
		$mail->Body = $body;
		if($mail->Send())
		{	
			transfer("Thông tin của bạn đã được gửi. Cảm ơn.", "trang-chu.html");
		} else {
			transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "trang-chu.html",false);
		}
	}
?>