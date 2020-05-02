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
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

<form name="supplier" id="validate" class="form" action="index.php?com=newsletter&act=save<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<?php if($_GET['type'] == 'dknt') { ?>
        <div class="formRow">
			<label>Họ Tên : </label>
			<div class="formRight">
               <?=@$item['hoten']?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Email : </label>
			<div class="formRight">
               <?=@$item['email']?>
			</div>
			<div class="clear"></div>
		</div>
		<?php } else { ?>
        <div class="formRow">
			<label>Họ Tên : </label>
			<div class="formRight">
               <?=@$item['hoten']?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Email : </label>
			<div class="formRight">
               <?=@$item['email']?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Điện thoại : </label>
			<div class="formRight">
               <?=@$item['sodienthoai']?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Nội Dung : </label>
			<div class="formRight">
               <?=@$item['noidung']?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Thông tin sản phẩm : </label>
			<div class="formRight">
               <a href="http://<?=$config_url?>/<?=@$item['gioitinh']?>"><?=@$item['tieude']?></a>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
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
		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
                <input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
            	<a href="index.php?com=newsletter&act=man<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>
</div>
