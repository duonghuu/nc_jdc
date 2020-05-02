<script type="text/javascript">
  $(document).ready(function(){
    $("#reset_capcha").click(function() {
      $("#hinh_captcha").attr("src", "sources/captcha.php?"+Math.random());
      return false;
    });
  });
</script>

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
  
  if(!isEmpty(document.dangky.password) && document.dangky.password.value!=document.dangky.renew_pass.value){
    alert("Nhập lại mật khẩu mới không chính xác.");
    document.dangky.renew_pass.focus();
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
</script>
<div class="padding30">
<h3 class="title_web"><span>Đăng ký</span></h3>  
<form method="post" name="dangky" action="" class="my_form" enctype="multipart/form-data">
  <div class="row_form">
     <label for="email">E-mail <span class="required_red">(*)</span></label>
     <div class="my_input">
        <div class="my_input_left"><i class="fa fa-user-secret"></i></div>
        <input type="text" class="my_input_right" value="" id="email" name="email" placeholder="Nhập email của bạn"/>
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
     <label for="password">Nhập lại mật khẩu <span class="required_red">(*)</span></label>
     <div class="my_input">
        <div class="my_input_left"><i class="fa fa-lock"></i></div>
        <input type="password" class="my_input_right" id="renew_pass" name="renew_pass" placeholder="Nhập mật khẩu" autocomplete="off" value="" />
        <div class="clear"></div>
     </div>
  </div>
  
  <div class="row_form">
     <label for="email">Họ tên <span class="required_red">(*)</span></label>
     <div class="my_input">
        <div class="my_input_left"><i class="fa fa-pencil-square-o"></i></div>
        <input type="text" class="my_input_right" value="" id="ten" name="ten" placeholder="Nhập họ tên của bạn"/>
        <div class="clear"></div>
     </div>
  </div>
  
  <div class="row_form">
     <label for="email">Điện thoại <span class="required_red">(*)</span></label>
     <div class="my_input">
        <div class="my_input_left"><i class="fa fa-mobile"></i></div>
        <input type="text" class="my_input_right" value="" id="dienthoai" name="dienthoai" placeholder="Số điện thoại của bạn"/>
        <div class="clear"></div>
     </div>
  </div>
  
  <div class="row_form">
     <label for="email">Địa chỉ</label>
     <div class="my_input">
        <div class="my_input_left"><i class="fa fa-map-marker"></i></div>
        <input type="text" class="my_input_right" value="" id="diachi" name="diachi" placeholder="Nhập địa chỉ của bạn"/>
        <div class="clear"></div>
     </div>
  </div>
  
  <div class="row_form">
     <label for="ngaysinh"">Ngày sinh</label>
     <div class="my_input">
        <div class="my_input_left"><i class="fa fa-calendar"></i></div>
        <input type="text" class="my_input_right" id="ngaysinh" name="ngaysinh" placeholder="Ngày / tháng / năm" autocomplete="off" />
        <div class="clear"></div>
     </div>
  </div>
  
  <div class="row_form">
     <label for="gender">Giới tính</label>
     <div class="radio-list">
        <label><input type="radio" id="gender_m" checked="checked" name="sex" value="1"> Nam</label>
        <label><input type="radio" id="gender_f" name="sex" value="0"> Nữ</label>
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
    <input class="btn_login" onclick="js_submit();" type="button" value="Đăng ký"/>
  </div>
</form>
</div>
