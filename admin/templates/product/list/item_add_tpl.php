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
        	<li><a href="index.php?com=product&act=add_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Thêm Danh mục cấp 1</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="supplier" id="validate" class="form" action="index.php?com=product&act=save_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title chonngonngu">
			<ul>
				<li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng Việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
				<li><a href="en" class="tipS validate[required]" title="Chọn tiếng Anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li>
			</ul>
		</div>	
	<?php if($config_images == 'true') { ?>
		<div class="formRow">
			<label>Hình ảnh :</label>
			<div class="formRight">
            	<input type="file" id="file" name="file" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<div class="note"> width : <?php echo _width_thumb*$ratio_;?> px , Height : <?php echo _height_thumb*$ratio_;?> px </div>
			</div>
			<div class="clear"></div>
		</div>
        <?php if($_GET['act']=='edit_list'){?>
		<div class="formRow">
			<label>Hình Hiện Tại :</label>
			<div class="formRight">
				<div class="mt10"><img src="<?=_upload_product.$item['thumb']?>"  alt="NO PHOTO" width="90" /></div>
			</div>
			<div class="clear"></div>
		</div> 
	<?php } } ?>

	<?php if($config_icon == 'true') { ?>
		<div class="formRow">
			<label>Icon:</label>
			<div class="formRight">
            	<input type="file" id="file1" name="file1" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải icon (ảnh JPEG, GIF , JPG , PNG)">
				<div class="note"> width : 80px , Height : 80px </div>
			</div>
			<div class="clear"></div>
		</div>
        <?php if($_GET['act']=='edit_list'){?>
		<div class="formRow">
			<label>Icon hiện tại:</label>
			<div class="formRight">
				<div class="mt10"><img src="<?=_upload_product.$item['icon']?>"  alt="NO PHOTO" width="65" /></div>
			</div>
			<div class="clear"></div>
		</div> 
	<?php } } ?>
		
        <div class="formRow lang_hidden lang_vi active">
			<label>Tiêu đề</label>
			<div class="formRight">
                <input type="text" name="ten_vi" title="Nhập tên danh mục" id="ten_vi" class="tipS validate[required]" value="<?=@$item['ten_vi']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_en">
			<label>Tiêu đề (Tiếng Anh)</label>
			<div class="formRight">
                <input type="text" name="ten_en" title="Nhập tên danh mục" id="ten_en" class="tipS validate[required]" value="<?=@$item['ten_en']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_cn">
			<label>Tiêu đề (Tiếng Trung)</label>
			<div class="formRight">
                <input type="text" name="ten_cn" title="Nhập tên danh mục" id="ten_cn" class="tipS validate[required]" value="<?=@$item['ten_cn']?>" />
			</div>
			<div class="clear"></div>
		</div>
	<?php if($config_mota == 'true') { ?>
		<div class="formRow lang_hidden lang_vi active">
			<label>Mô tả</label>
			<div class="formRight">
                <textarea rows="10" cols="" title="Nhập mô tả . " class="tipS" id="mota_vi" name="mota_vi"><?=@$item['mota_vi']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_en">
			<label>Mô tả (Tiếng Anh)</label>
			<div class="formRight">
                <textarea rows="10" cols="" title="Nhập mô tả . " class="tipS" id="mota_en" name="mota_en"><?=@$item['mota_en']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_cn">
			<label>Mô tả (Tiếng Trung)</label>
			<div class="formRight">
                <textarea rows="10" cols="" title="Nhập mô tả . " class="tipS" name="mota_cn"><?=@$item['mota_cn']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
	<?php } ?>

<?php /*
		<div class="formRow">
			<label>Màu </label>
			<div class="formRight">
		        <input type="text" name="color" title="Nhập color" id="color" class="tipS color validate[required]" value="<?=@$item['color']?>" />
			</div>
			<div class="clear"></div>
		</div>

		 <div class="formRow">
			<label>Link</label>
			<div class="formRight">
                <input type="text" name="links" title="Nhập link quảng cáo" id="links" class="" value="<?=@$item['links']?>" />
			</div>
			<div class="clear"></div>
		</div>	 

*/?>
        <div class="formRow">
          	<label>Hiển thị : <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>
          	<div class="formRight">
            	<input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
             	<label>Số thứ tự: </label>
              	<input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
          	</div>
          	<div class="clear"></div>
        </div>
	</div>  
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
			<h6>Nội dung seo</h6>
		</div>
			
		<div class="formRow">
			<label>Title</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['title']?>" name="title" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
            <label>H1</label>
            <div class="formRight">
                <input type="text" value="<?=@$item['h1']?>" name="h1" title="Thẻ h1" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>H2</label>
            <div class="formRight">
                <input type="text" value="<?=@$item['h2']?>" name="h2" title="Thẻ h2" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>H3</label>
            <div class="formRight">
                <input type="text" value="<?=@$item['h3']?>" name="h3" title="Thẻ h3" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>H4</label>
            <div class="formRight">
                <input type="text" value="<?=@$item['h4']?>" name="h4" title="Thẻ h4" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>H5</label>
            <div class="formRight">
                <input type="text" value="<?=@$item['h5']?>" name="h5" title="Thẻ h5" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>H6</label>
            <div class="formRight">
                <input type="text" value="<?=@$item['h6']?>" name="h6" title="Thẻ h6" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
		<div class="formRow">
			<label>Từ khóa</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho danh mục" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Description:</label>
			<div class="formRight">
				<textarea rows="4" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS" name="description"><?=@$item['description']?></textarea>
                <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="des_char" value="<?=@$item['des_char']?>" /> ký tự <b>(Tốt nhất là 68 - 170 ký tự)</b>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
                <input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
            	<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
            	<a href="index.php?com=product&act=man_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>
</div>
