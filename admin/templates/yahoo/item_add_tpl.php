<script type="text/javascript">	
	function TreeFilterChanged2(){
		$('#validate').submit();
	}
</script>
<div class="wrapper">
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=yahoo&act=man"><span>Nhân viên tư vấn</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<form name="supplier" id="validate" class="form" action="index.php?com=yahoo&act=save" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>

		<!-- <div class="formRow">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
		            	<input type="file" id="file" name="file" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<div class="note"> width : <?php echo "90";?> px , Height : <?php echo "90";?> px </div>
			</div>
			<div class="clear"></div>
		</div>
		        <?php if($_GET['act']=='edit'){?>
		<div class="formRow">
			<label>Hình Hiện Tại :</label>
			<div class="formRight">
				<div class="mt10"><img src="<?=_upload_baiviet.$item['thumb']?>"  alt="NO PHOTO" width="100" /></div>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>	 -->

		<!-- <div class="formRow">
			<label>Phòng</label>
			<div class="formRight">
		                <input type="text" name="phong" title="Nhập tên phòng nhân viên hỗ trợ" id="phong" class="tipS validate[required]" value="<?=@$item['phong']?>" />
			</div>
			<div class="clear"></div>
		</div> -->
		<div class="formRow">
			<label>Tên</label>
			<div class="formRight">
                <input type="text" name="ten_vi" title="Nhập tên nhân viên hỗ trợ" id="ten_vi" class="tipS validate[required]" value="<?=@$item['ten_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
			<label>Điện thoại</label>
			<div class="formRight">
                <input type="text" name="dienthoai" title="Nhập số điện thoại" id="dienthoai" class="tipS validate[required]" value="<?=@$item['dienthoai']?>" />
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
			<label>Email</label>
			<div class="formRight">
				<input type="text" name="email" title="Nhập địa chỉ email" id="email" class="tipS validate[required]" value="<?=@$item['email']?>" />
			</div>
			<div class="clear"></div>
		</div>
        <!-- <div class="formRow">
        			<label>Zalo</label>
        			<div class="formRight">
            	<input type="text" name="zalo" title="Nhập nick zalo" id="zalo" class="tipS validate[required]" value="<?=@$item['zalo']?>" />
        			</div>
        			<div class="clear"></div>
            	</div> -->
        <div class="formRow">
			<label>Skype</label>
			<div class="formRight">
        		<input type="text" name="skype" title="Nhập nick chat skype" id="skype" class="tipS validate[required]" value="<?=@$item['skype']?>" />
			</div>
			<div class="clear"></div>
		</div>
        <!-- <div class="formRow">
        			<label>Viper</label>
        			<div class="formRight">
        		<input type="text" name="viper" title="Nhập số Viper" id="viper" class="tipS validate[required]" value="<?=@$item['viper']?>" />
        			</div>
        			<div class="clear"></div>
        		</div> -->
		
        <div class="formRow">
          	<label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
          	<div class="formRight">
            	<input type="checkbox" name="active" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
            	<label for="check1">Hiển thị</label>            
          	</div>
          	<div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Số thứ tự: </label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="num" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
            </div>
            <div class="clear"></div>
        </div>
		<div class="formRow">
			<div class="formRight">
                 <input type="hidden" name="id" id="id_this_yahoo" value="<?=@$item['id']?>" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>
</div>