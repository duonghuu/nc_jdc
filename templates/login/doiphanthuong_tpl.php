<script language="javascript" src="js/my_script.js"></script>
<script language="javascript">
function js_submit(){
	
	var id_mucthuong = ($('input[name="mucthuong"]:checked', '#myForm').val()); 
	
	if(id_mucthuong != 0){
		hoi= confirm("Bạn có chắc muốn đổi lấy phần thưởng này");
	} else {
		hoi= confirm("Bạn muốn tiếp tục tích lũy điểm");
	}
	
	if (hoi==true) {
		document.dangky.submit();
	}
	
}
</script>
 
<div class="bg_register row">
    <div class="register_left col-md-3 col-sm-4 col-xs-12">
    	<div class="content--full">
            <div class="box box_register box--no-padding">
                <div class="box__header">
                    <h2 class="box__title">Thông tin chung</h2>
                </div>
                <div class="box__body">
                    <div class="sidebar__widget widget widget--profile">
                        <div class="profile clearfix">
                            <div class="profile__avatar">
                                <img class="img-circle img-avatar" src="images/avatar.png" alt="" onclick="">
                            </div>
                            <div class="profile__info">
                                <div class="profile__name"><?=$_SESSION["login"]['ten']?></div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__widget widget">
                    	<?php include _template."layout/list_user.php"?>
                    </div>
                </div>
            </div>
    
    	</div>
        
    </div>
    
    
    <div class="register_right col-md-9 col-sm-8 col-xs-12">
    	<div class="content--full row">
           <div class="col-md-12 col-xs-12">
              <div class="box_register box--center">
                 <div class="box__header">
                    <h2 class="box__title"><?=$title_tcat?></h2>
                 </div>
                 <div class="box__body">
                 
                    <form method="post" name="dangky" action="" id="myForm" class="form form--general" enctype="multipart/form-data">
                    
                    <input type="hidden" class="form-control" value="<?=$_SESSION["login"]['id_tv']?>" id="id_tv" name="id_tv" />
                    
                    
                    <div class="form-group form-group-lg">
                    	<p><label><input type="radio" checked="checked" name="mucthuong" value="0"> Tiếp tục tích điểm</label></p>
                    	<?php foreach($res_mucthuong as $k=>$v) {?>
                        <p><label><input type="radio" name="mucthuong" value="<?=$v['id']?>"> <?=$v["ten_vi"]?> (Tương đương <?=$v["diemthuong"]?> điểm)</label></p>
                        <?php } ?>

                    </div>
                                
                    
                       <div class="row form">
                          <div class="col-md-6 col-sm-8 col-xs-12">
                             <div class="form__inner">
                                
                                <div class="form-group form-group-lg">
                                    <input class="fix-button" onclick="js_submit();" type="button" value="Cập nhật"/>
                           
                                </div>
                             </div>
                          </div>
                       </div>
                    </form>
                 </div>
              </div>
           </div>
        </div>
    </div>

</div>  

