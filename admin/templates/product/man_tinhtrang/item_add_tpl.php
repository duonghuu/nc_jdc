<div class="wrapper">
	<div class="control_frm">
	    <div class="bc">
	        <ul id="breadcrumbs" class="breadcrumbs">
	        	<li><a href="index.php?com=product&act=add_tinhtrang"><span>Thêm </span></a></li>
	            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
	        </ul>
	        <div class="clear"></div>
	    </div>
	</div>
	<form name="supplier" id="validate" class="form" action="index.php?com=product&act=save_tinhtrang" method="post" enctype="multipart/form-data">
		<div class="widget">
			
	        <div class="formRow">
				<label>Tiêu đề</label>
				<div class="formRight">
	                <input type="text" name="ten_vi" title="Nhập tên" id="ten_vi" class="tipS" value="<?=@$item['ten_vi']?>" />
				</div>
				<div class="clear"></div>
			</div>

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
	            	<a href="index.php?com=product&act=man_tinhtrang" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
				</div>
				<div class="clear"></div>
			</div>

		</div>
	</form>
</div>