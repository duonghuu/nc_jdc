<script type="text/javascript">	
	function TreeFilterChanged2(){
		$('#validate').submit();
	}
</script>
<script type="text/javascript">		
	$(document).ready(function() {
		$('.chonngonngu li a').click(function(event) {
			var lang = $(this).attr('href');
			$('.chonngonngu li a').removeClass('active');
			$(this).addClass('active');
			$('.lang_hidden').removeClass('active');
			$('.lang_'+lang).addClass('active');
			return false;
		});
	});
</script>
<div class="wrapper">
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=lkweb&act=man"><span>Quản lý  <?=$title_main?></span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<form name="supplier" id="validate" class="form" action="index.php?com=lkweb&act=save&type=<?=$_GET['type']?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title chonngonngu">
			<ul>
				<li><a href="vi" class="active tipS" title="Chọn tiếng Việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
				<li><a href="en" class="tipS" title="Chọn tiếng Anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li>
			</ul>
		</div>
		<div class="formRow">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
            	<input type="file" id="file" name="file" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<div class="note"> width : <?php echo _width_thumb*$ratio_;?> px , Height : <?php echo _height_thumb*$ratio_;?> px </div>
			</div>
			<div class="clear"></div>
		</div>
        <?php if($_GET['act']=='edit'){?>
		<div class="formRow">
			<label>Hình Hiện Tại :</label>
			<div class="formRight">
			
			<div class="mt10"><img src="<?=_upload_hinhanh.$item['thumb']?>"  alt="NO PHOTO" width="40" /></div>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>

		<div class="formRow lang_hidden lang_vi active">
			<label>Tên</label>
			<div class="formRight">
                <input type="text" name="ten_vi" title="Nhập tên mạng xã hội" id="name" class="tipS validate[required]" value="<?=@$item['ten_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_en">
			<label>Tên (Tiếng Anh)</label>
			<div class="formRight">
                <input type="text" name="ten_en" title="Nhập tên mạng xã hội" id="name" class="tipS validate[required]" value="<?=@$item['ten_en']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_cn">
			<label>Tên (Tiếng Trung)</label>
			<div class="formRight">
                <input type="text" name="ten_cn" title="Nhập tên mạng xã hội" id="name" class="tipS validate[required]" value="<?=@$item['ten_cn']?>" />
			</div>
			<div class="clear"></div>
		</div>

        <div class="formRow">
			<label>Link</label>
			<div class="formRight">
                <input type="text" name="link" title="Nhập link website" id="link" class="tipS validate[required]" value="<?=@$item['link']?>" />
			</div>
			<div class="clear"></div>
		</div>
		
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
                 <input type="hidden" name="id" id="id_this_lkweb" value="<?=@$item['id']?>" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>
</div>