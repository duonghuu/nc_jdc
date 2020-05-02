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
				<li><a href="index.php?com=bannerqc&act=capnhat<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Quản lý <?=$title_main?></span></a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
	<form name="supplier" id="validate" class="form" action="index.php?com=bannerqc&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
		<div class="widget">
			<div class="title chonngonngu">
				<ul>
					<li><a href="vi" class="active tipS validate[required]" title="Chọn tiếng Việt "><img src="./images/vi.png" alt="" class="tiengviet" />Tiếng Việt</a></li>
					<li><a href="en" class="tipS validate[required]" title="Chọn tiếng Anh "><img src="./images/en.png" alt="" class="tienganh" />Tiếng Anh</a></li>
				</ul>
			</div>

			<div class="formRow lang_hidden lang_vi active" >
				<label>Tải <?=$title_main?> :</label>
				<div class="formRight">
					<input type="file" id="file_vi" name="file_vi" />
					<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
					<div class="note"> width : <?php echo _width_thumb*$ratio_;?> px , Height : <?php echo _height_thumb*$ratio_;?> px </div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="formRow lang_hidden lang_vi active">
				<label><?=$title_main?> hiện tại :</label>
				<div class="formRight">
					<div class="mt10">
						<img src="<?=_upload_hinhanh.$item['thumb_vi']?>"  alt="NO PHOTO"/>
			        </div>
			    </div>
			    <div class="clear"></div>
			</div>

			<div class="formRow lang_hidden lang_en" >
				<label>Tải <?=$title_main?> (Tiếng anh) :</label>
				<div class="formRight">
					<input type="file" id="file_en" name="file_en" />
					<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
					<div class="note"> width : <?php echo _width_thumb*$ratio_;?> px , Height : <?php echo _height_thumb*$ratio_;?> px </div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="formRow lang_hidden lang_en">
				<label><?=$title_main?> hiện tại :</label>
				<div class="formRight">
					<div class="mt10">
						<img src="<?=_upload_hinhanh.$item['thumb_en']?>"  alt="NO PHOTO"/>
					</div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="formRow lang_hidden lang_cn" >
				<label>Tải <?=$title_main?> (Tiếng Trung) :</label>
				<div class="formRight">
					<input type="file" id="file_cn" name="file_cn" />
					<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
					<div class="note"> width : <?php echo _width_thumb*$ratio_;?> px , Height : <?php echo _height_thumb*$ratio_;?> px </div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="formRow lang_hidden lang_cn">
				<label><?=$title_main?> hiện tại :</label>
				<div class="formRight">
					<div class="mt10">
						<img src="<?=_upload_hinhanh.$item['thumb_cn']?>"  alt="NO PHOTO"/>
					</div>
				</div>
				<div class="clear"></div>
			</div>

		<?php if($links_=='true'){?>
			<div class="formRow">
				<label>Link liên kết:</label>
				<div class="formRight">
					<input type="text" id="code_pro" name="link" value="<?=$item['link']?>"  title="Nhập link liên kết cho hình ảnh" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
		<?php }  ?>

		<?php if($config_mota == 'true') { ?>
			<div class="formRow lang_hidden lang_vi active">
				<label>Mô tả</label>
				<div class="ck_editor">
					<textarea id="mota_vi" name="mota_vi"><?=@$item['mota_vi']?></textarea>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow lang_hidden lang_en">
				<label>Mô tả (Tiếng Anh)</label>
				<div class="ck_editor">
					<textarea id="mota_en" name="mota_en"><?=@$item['mota_en']?></textarea>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow lang_hidden lang_cn">
				<label>Mô tả (Tiếng Trung)</label>
				<div class="ck_editor">
					<textarea id="mota_cn" name="mota_cn"><?=@$item['mota_cn']?></textarea>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>

		<?php if($config_hienthi=='true'){?>
			<div class="formRow">
				<label>Hiển thị : <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>
				<div class="formRight">
					<input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>

			<div class="formRow">
				<div class="formRight">
					<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</form>
</div>
