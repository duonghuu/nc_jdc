<script src="js/my_script.js" type="text/javascript"></script>
<script language="javascript">
function js_submit(){
   if(isEmpty(document.getElementById('username'), "Xin nhập tên đăng nhập.")){
      document.getElementById('username').focus();
      return false;
   }
   if(isEmpty(document.getElementById('password'), "Xin nhập password.")){
      document.getElementById('password').focus();
      return false;
   }
   document.dangky.submit();
}
</script>
<div class="padding30">
   <h3 class="title_web"><span>Đăng nhập</span></h3>  
   <form method="post" name="dangky" action="" class="my_form" enctype="multipart/form-data">
      <div class="row_form">
         <label for="email">E-mail <span class="required_red">(*)</span></label>
         <div class="my_input">
            <div class="my_input_left"><i class="fa fa-user-secret"></i></div>
            <input type="text" class="my_input_right" value="" id="username" name="username" placeholder="Nhập email của bạn"/>
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
         <input class="btn_login" onclick="js_submit();" type="button" value="Đăng nhập"/>
      </div>
   </form>
</div>
      