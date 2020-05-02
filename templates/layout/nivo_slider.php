<?php
    $d->reset();
    $d->setTable('photo');
    $d->setWhere('hienthi','1');
    $d->setWhere('type','slider');
    $d->setOrder('stt');
    $d->select('photo_'.$lang.', link, ten_vi, mota_'.$lang);
    $slide_show = $d->result_array();

    $d->reset();
    $d->setTable('info');
    $d->setWhere('type','bvgt');
    $d->select('id, thumb, ten_'.$lang.', mota_'.$lang);
    $row_bvgt = $d->fetch_array();

    $d->reset();
    $d->setTable('info');
    $d->setWhere('type','dichvu');
    $d->select('id, thumb, ten_'.$lang.', mota_'.$lang);
    $row_dichvu = $d->fetch_array();

    $d->reset();
    $d->setTable('product_list');
    $d->setWhere('hienthi','1');
    $d->setWhere('type','product');
    $d->setWhere('noibat','1');
    $d->setOrder('stt');
    $d->select('id, ten_'.$lang.', tenkhongdau, thumb');
    $list = $d->result_array();

    $d->reset();
    $d->setTable('photo');
    $d->setWhere('type','logo1');
    $d->select('thumb_'.$lang);
    $row_logo1 = $d->fetch_array();
?>
<?php if($template == 'index') { ?>
	<div id="wrapper">
		<?php /*
	    <div id="slider-wrapper">
	        <div id="slider" class="nivoSlider">
	            <?php foreach($slide_show as $key => $value){ ?>
	                <a href="<?=$value["link"]?>"><img src="thumb/1366x575/1/<?=_upload_hinhanh_l.$value["photo_".$lang]?>"  alt="<?=$value["ten_".$lang]?>"/>
	                </a> 
	            <?php }?>
	        </div>
	    </div>
	    */?>
	    <div class="content12 clearfix">
		    <div class="w_rotate">
		    	<div class="destop">
			    	<div class="img img_logo1"><img src="<?=_upload_hinhanh_l.$row_logo1['thumb_'.$lang]?>" alt="Logo1"></div>
			    	<div id="vortex">
			    		<?php foreach ($list as $key => $value) { ?>
			    			<div class="item_vortex">
			    				<div class="img">
			    					<a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>" class="img"><img src="<?=_upload_product_l.$value['thumb']?>" alt="<?=$value['ten_'.$lang]?>"></a>
			    					<h3><a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>"><?=$value['ten_'.$lang]?></a></h3>
			    				</div>
			    			</div>
			    		<?php } ?>
			    		<div class="item_vortex">
		    				<div class="img">
		    					<a href="dich-vu" title="<?=_dichvu?> ++" class="img"><img src="<?=_upload_hinhanh_l.$row_dichvu['thumb']?>" alt="<?=_dichvu?> ++"></a>
		    					<h3><a href="dich-vu" title="<?=_dichvu?> ++"><?=_dichvu?> ++</a></h3>
		    				</div>
		    			</div>
			    	</div>
		    	</div>
		    	<div class="mobile clearfix">
		    		<?php foreach ($list as $key => $value) { ?>
		    			<div class="wrap">
			    			<div class="item_vortex">
			    				<div class="img">
			    					<a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>" class="img"><img src="<?=_upload_product_l.$value['thumb']?>" alt="<?=$value['ten_'.$lang]?>"></a>
			    					<h3><a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>"><?=$value['ten_'.$lang]?></a></h3>
			    				</div>
			    			</div>
		    			</div>
		    		<?php } ?>
		    		<div class="wrap">
		    			<div class="item_vortex">
		    				<div class="img">
		    					<a href="dich-vu" title="<?=_dichvu?> ++" class="img"><img src="<?=_upload_hinhanh_l.$row_dichvu['thumb']?>" alt="<?=_dichvu?> ++"></a>
		    					<h3><a href="dich-vu" title="<?=_dichvu?> ++"><?=_dichvu?> ++</a></h3>
		    				</div>
		    			</div>
	    			</div>
		    	</div>
		    </div>
		    <div class="w_hoatdong clearfix">
		    	<div class="left_hoatdong">
		    		<h3><?=$row_bvgt['ten_'.$lang]?></h3>
		    		<p><?=catchuoi($row_bvgt['mota_'.$lang], 500)?></p>
		    		<a class="xemthem_hd" href="hoat-dong-cong-ty"><?=_xemthem?> <i class="fas fa-angle-double-right"></i></a>
		    	</div>
		    	<div class="img img_hoatdong">
		    		<img src="<?=_upload_hinhanh_l.$row_bvgt['thumb']?>" alt="<?=$row_bvgt['ten_'.$lang]?>">
		    	</div>
		    </div>
	    </div>
	</div>
<?php } ?>