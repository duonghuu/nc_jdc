<div class="content12 clearfix">
	<div class="w_left">
		<?php include _template."layout/left.php"; ?>
	</div>
	<div class="w_right">
	    <h3 class="title_baiviet"><?=$row_detail['ten_'.$lang]?></h3>
	    
	    <?php /*
	    <p class="ngaydang">Ngày đăng : <?=date('d/m/Y - g:i A',$row_detail['ngaysua']);?></p>
	    */?>
	    <div class="noidung_content">
	        <?=$row_detail['noidung_'.$lang]?>
	        <div class="addthis_native_toolbox"></div>
	        <?=get_social('','comment');?>
	    </div>
	</div>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-570467c6b3882b22"></script>