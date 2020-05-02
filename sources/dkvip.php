<?php if(!defined('_source')) die("Error");
		
		if(!empty($_POST)){
			if($_POST['txtCaptcha'] != $_SESSION['security_code']) {
				transfer(_maxacnhankhongchinhxac, "dang-ky-vip.html");
			}

		include_once "phpMailer/class.phpmailer.php";	
		$mail = new PHPMailer();
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = $config_ip; // tên SMTP server
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->Username   = $config_email; // SMTP account username
		$mail->Password   = $config_pass;  

		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom($config_email,$row_setting['ten_'.$lang]);
		
		$mail->AddAddress($row_setting['email'],$row_setting['ten_'.$lang]);
		
		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
 		*=====================================*/

		//Thiết lập tiêu đề
		$mail->Subject    = '['.$_POST['txthoten_vip'].']';
		$mail->IsHTML(true);
		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";	
			$body = '<table>';
			$body .= '
				<tr> 
					<th colspan="2">&nbsp;</th>
				</tr>

				<tr>
					<th colspan="2">Thư liên hệ từ website <a href="http://'.$config_url.'">www.'.$config_url.'</a></th>
				</tr>

				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>

				<tr>
					<th>Họ tên :</th><td>'.$_POST['txthoten_vip'].'</td>
				</tr>

				<tr>
					<th>Email :</th><td>'.$_POST['txtemail_vip'].'</td>
				</tr>';
			$body .= '</table>';

			$data1['hoten'] = $_POST['hoten'];
			$data1['email'] = $_POST['email'];

			$data1['ngaytao'] = time();
			$d->setTable('dkvip');
			$d->insert($data1);

				
			$mail->Body = $body;	
			
			if($mail->Send())
			{	
				transfer("Thông tin liên hệ được gửi . Cảm ơn.", "trang-chu.html");
			} else {
				transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "dang-ky-vip.html",false);
			}
		}
	
?>