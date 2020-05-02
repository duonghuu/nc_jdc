<?php 
	$d -> reset();
	$sql = "select * from #_donvi";
	$d->query($sql);
	$row_donvi = $d->result_array();
?>
<div class="wrapper">
	<div class="control_frm" style="margin-top:25px;">
	    <div class="bc">
	        <ul id="breadcrumbs" class="breadcrumbs">
	        	<li><a href="index.php?com=product&act=add_gia"><span>Thêm Mức giá</span></a></li>
	            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
	        </ul>
	        <div class="clear"></div>
	    </div>
	</div>

	<form name="supplier" id="validate" class="form" action="index.php?com=product&act=save_gia" method="post" enctype="multipart/form-data">
		<div class="widget">

	        <div class="formRow">
				<label>Tên</label>
				<div class="formRight">
	                <input type="text" name="ten_vi" title="Nhập tên" id="ten_vi" class="tipS" value="<?=@$item['ten_vi']?>" />
				</div>
				<div class="clear"></div>
			</div>

	        <div class="formRow">
				<label>Giá từ</label>
				<div class="formRight">
	                <input type="text" name="giatu" title="Nhập giá từ" id="giatu" class="conso tipS" value="<?=@$item['giatu']?>" />
				</div>
				<div class="clear"></div>
			</div>

	        <!-- <div class="formRow">
	        				<label>Đơn vị giá từ</label>
	        				<div class="formRight">
	                <select name="donvigiatu" class="main_select">
	                	<?php foreach ($row_donvi as $key => $value) { ?>
	                		<option value="<?=$value['id']?>"><?=$value['ten_vi']?></option>
	                	<?php } ?>
	                </select>
	        				</div>
	        				<div class="clear"></div>
	        			</div> -->

	        <div class="formRow">
				<label>Giá đến</label>
				<div class="formRight">
	                <input type="text" name="giaden" title="Nhập giá đến" id="giaden" class="conso tipS" value="<?=@$item['giaden']?>" />
				</div>
				<div class="clear"></div>
			</div>

	        <!-- <div class="formRow">
	        				<label>Đơn vị giá đến</label>
	        				<div class="formRight">
	                <select name="donvigiaden" class="main_select">
	                	<?php foreach ($row_donvi as $key => $value) { ?>
	                		<option value="<?=$value['id']?>"><?=$value['ten_vi']?></option>
	                	<?php } ?>
	                </select>
	        				</div>
	        				<div class="clear"></div>
	        			</div> -->

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
	                <input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
	            	<input type="submit" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
	            	<a href="index.php?com=product&act=man_gia" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
				</div>
				<div class="clear"></div>
			</div>

		</div>
	</form>
</div>
