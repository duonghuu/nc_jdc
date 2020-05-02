<script language="javascript" src="js/my_script.js"></script>
<script language="javascript">
function js_submit(){
	if(isEmpty(document.getElementById('email'), "Xin nhập email.")){
		document.getElementById('email').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('password'), "Xin nhập Password .")){
		document.getElementById('password').focus();
		return false;
	}
    
	if(!isEmpty(document.dangky.password) && document.dangky.password.value.length<5){
		alert("Mật khẩu phải nhiều hơn 4 ký tự.");
		document.dangky.password.focus();
		return false;
	}
	   
	if(isEmpty(document.getElementById('ten'), "Xin nhập họ tên .")){
		document.getElementById('ten').focus();
		return false;
	}

	if(isEmpty(document.getElementById('dienthoai'), "Xin nhập Số điện thoại.")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	
	if(!isNumber(document.getElementById('dienthoai'), "Số điện thoại không hợp lệ.")){
		document.getElementById('dienthoai').focus();
		return false;
	}

	if(isEmpty(document.getElementById('diachi'), "Xin nhập địa chỉ .")){
		document.getElementById('diachi').focus();
		return false;
	}
            
	if(isEmpty(document.getElementById('txtCaptcha'), "Xin nhập mã xác nhận .")){
		document.getElementById('txtCaptcha').focus();
		return false;
	}
	document.dangky.submit();
}
  $(document).ready(function($) {
      $(".colorbox").colorbox({
            inline:true, 
            width:"70%",
            height:"650px",
            onOpen:function(){
                var id = $(this).data('id');
                 $.ajax({
                  type: "POST",
                  url: "ajax/order_detail.php",
                  data: {id:id},
                  success: function(string){
                    $('#inline_order').html(string);
                  }          
                });
            }
        });
  });
</script>
 
<div class="padding30">
<h3 class="title_web"><span>Thông tin tài khoản</span></h3>

<form method="post" name="dangky" action="" class="my_form" enctype="multipart/form-data">
  <div class="row_form">
     <label for="email">E-mail <span class="required_red">(*)</span></label>
     <div class="my_input">
        <div class="my_input_left"><i class="fa fa-user-secret"></i></div>
        <input type="text" class="my_input_right" value="<?=$_SESSION["login"]['email']?>" id="email" name="email" placeholder="Nhập email của bạn"/>
        <div class="clear"></div>
     </div>
  </div>
  <div class="row_form">
     <label for="password">Mật khẩu <span class="required_red">(*)</span></label>
     <div class="my_input">
        <div class="my_input_left"><i class="fa fa-lock"></i></div>
        <input type="password" class="my_input_right" id="password" name="password" placeholder="Nhập mật khẩu" autocomplete="off" value="" />
        <div class="clear"></div>
     </div>
  </div>
  <div class="row_form">
     <label for="email">Họ tên <span class="required_red">(*)</span></label>
     <div class="my_input">
        <div class="my_input_left"><i class="fa fa-pencil-square-o"></i></div>
        <input type="text" class="my_input_right" value="<?=$_SESSION["login"]["ten"]?>" id="ten" name="ten" placeholder="Nhập họ tên của bạn"/>
        <div class="clear"></div>
     </div>
  </div>
  <div class="row_form">
     <label for="email">Điện thoại <span class="required_red">(*)</span></label>
     <div class="my_input">
        <div class="my_input_left"><i class="fa fa-mobile"></i></div>
        <input type="text" class="my_input_right" value="<?=$_SESSION["login"]["dienthoai"]?>" id="dienthoai" name="dienthoai" placeholder="Số điện thoại của bạn"/>
        <div class="clear"></div>
     </div>
  </div>
  <div class="row_form">
     <label for="email">Địa chỉ</label>
     <div class="my_input">
        <div class="my_input_left"><i class="fa fa-map-marker"></i></div>
        <input type="text" class="my_input_right" value="<?=$_SESSION["login"]["diachi"]?>" id="diachi" name="diachi" placeholder="Nhập địa chỉ của bạn"/>
        <div class="clear"></div>
     </div>
  </div>
  <div class="row_form">
     <label for="ngaysinh"">Ngày sinh</label>
     <div class="my_input">
        <div class="my_input_left"><i class="fa fa-calendar"></i></div>
        <input type="text" class="my_input_right" value="<?=date('d/m/Y',$thanhvien_info['ngaysinh']);?>" id="ngaysinh" name="ngaysinh" placeholder="Ngày / tháng / năm" autocomplete="off" />
        <div class="clear"></div>
     </div>
  </div>
  <div class="row_form">
     <label for="gender">Giới tính</label>
     <div class="radio-list">
        <label><input type="radio" id="gender_m" <?php if($_SESSION['login']['sex'] == 1) { echo"checked='checked'"; }?> name="sex" value="1"> Nam</label>
        <label><input type="radio" id="gender_f" <?php if($_SESSION['login']['sex'] == 0) { echo"checked='checked'"; }?> name="sex" value="0"> Nữ</label>
     </div>
  </div>
  <div class="row_form">
     <label for="email"">Mã xác nhận <span class="required_red">(*)</span></label>
     <div class="my_input">
        <div class="my_input_left my_input_captcha"><i class="fa fa-file-text-o"></i></div>
        <div class="padding_Captcha">
          <input type="text" name="txtCaptcha" id="txtCaptcha" maxlength="10" size="12" placeholder="Mã xác nhận"/>
          <img id="img-captcha" style="vertical-align: middle;" src="captcha/image.php" alt="" noloaderror="0">
          <img id="Img2" class="reloadCapcha" onmouseover="this.style.cursor='pointer'" onclick="$('#img-captcha').attr('src', 'captcha/image.php?rand=' + Math.random())" style="vertical-align: middle;" title="Đổi mã an toàn" alt="Renew capcha" src="images/icon/refresh.png">
          <div class="clear"></div>
        </div>
     </div>
  </div>
  <div class="row_form">
    <input class="btn_login" onclick="js_submit();" type="button" value="Cập nhật"/>
  </div>
</form>