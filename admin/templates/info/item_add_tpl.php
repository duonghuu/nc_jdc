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

<form name="supplier" id="validate" class="form" action="index.php?com=info&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">

	<div class="control_frm" style="margin-top:25px;">
	    <div class="bc">
	        <ul id="breadcrumbs" class="breadcrumbs">
	        	<li><a href="index.php?com=info&act=capnhat<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Cập nhật <?=$title_main?></span></a></li>
	        </ul>
	        <div class="clear"></div>
	    </div>
	</div>

	<div class="widget">
		<div class="title chonngonngu">
		<ul>
			<li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng Việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
			<li><a href="en" class="tipS validate[required]" title="Chọn tiếng Anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li>
		</ul>
	</div>
<?php if($config_images == 'true') { ?>	
	<div class="formRow">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
            	<input type="file" id="file" name="file" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<div class="note"> width : <?php echo _width_thumb*$ratio_;?> px , Height : <?php echo _height_thumb*$ratio_;?> px </div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Hình Hiện Tại :</label>
			<div class="formRight">
			
			<div class="mt10"><img src="<?=_upload_hinhanh.$item['thumb']?>"  alt="NO PHOTO" width="100" /></div>
			</div>
			<div class="clear"></div>
		</div>
<?php } ?>

<?php if($config_tieude=='true'){ ?>
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
<?php } ?>

<?php if($config_video == 'true') { ?>
		<div class="formRow">
			<label>Link (Youtube)</label>
			<div class="formRight">
                <input type="text" name="link" title="Nhập tên link youtube" id="link" class="tipS validate[required]" value="<?=@$item['link']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Video Hiện Tại :</label>
			<div class="formRight">
				<object width="300" height="200"><param name="movie" value="//www.youtube.com/v/<?=youtobi($item['link'])?>?version=3&amp;hl=vi_VN&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="//www.youtube.com/v/<?=youtobi($item['link'])?>?version=3&amp;hl=vi_VN&amp;rel=0" type="application/x-shockwave-flash" width="300" height="200" allowscriptaccess="always" allowfullscreen="true" wmode="transparent" ></embed></object>

			</div>
			<div class="clear"></div>
		</div>
<?php } ?>

<?php if($config_mota == 'true') { ?>
		<div class="formRow lang_hidden lang_vi active">
			<label>Mô tả</label>
			<div class="formRight">
                <textarea id="mota_vi" name="mota_vi" rows="5"><?=@$item['mota_vi']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_en">
			<label>Mô tả (Tiếng Anh)</label>
			<div class="formRight">
                <textarea id="mota_en" name="mota_en" rows="5"><?=@$item['mota_en']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_cn">
			<label>Mô tả (Tiếng Trung)</label>
			<div class="formRight">
                <textarea id="mota_cn" name="mota_cn" rows="5"><?=@$item['mota_cn']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
<?php } ?>
<?php if($_GET['type']=='thanhtoanquanganhang' || $_GET['type']=='thanhtoankhinhanhang') { ?>
		<div class="formRow lang_hidden lang_vi active">
			<label>Mô tả</label>
			<div class="formRight">
                <textarea id="mota_vi" name="mota_vi" rows="5"><?=@$item['mota_vi']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_en">
			<label>Mô tả (Tiếng Anh)</label>
			<div class="formRight">
                <textarea id="mota_en" name="mota_en" rows="5"><?=@$item['mota_en']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_cn">
			<label>Mô tả (Tiếng Trung)</label>
			<div class="formRight">
                <textarea id="mota_cn" name="mota_cn" rows="5"><?=@$item['mota_cn']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
<?php } ?>
<?php if($config_noidung =='true') { ?> 
	<div class="formRow lang_hidden lang_vi active">
			<label>Nội Dung</label>
			<div class="ck_editor">
                <textarea id="noidung_vi" name="noidung_vi"><?=@$item['noidung_vi']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_en">
			<label>Nội Dung (Tiếng Anh)</label>
			<div class="ck_editor">
                <textarea id="noidung_en" name="noidung_en"><?=@$item['noidung_en']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow lang_hidden lang_cn">
			<label>Nội Dung (Tiếng Trung)</label>
			<div class="ck_editor">
                <textarea id="noidung_cn" name="noidung_cn"><?=@$item['noidung_cn']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
<?php } ?>

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
			<label>Từ khóa</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho sản phẩm" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="formRow">
			<label>Description:</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS" name="description"><?=@$item['description']?></textarea>
                <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="des_char" value="<?=@$item['des_char']?>" /> ký tự <b>(Tốt nhất là 160 ký tự)</b>
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="id_cat" id="id_this_product" value="<?=@$item['id_cat']?>" />
            	<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>   