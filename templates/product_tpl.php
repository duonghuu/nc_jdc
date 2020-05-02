<div class="content12 clearfix">
	<div class="w_left">
		<?php include _template."layout/left.php"; ?>
	</div>
	<div class="w_right">
		<?php if(count($product)!=0){?>
			<div class="clearfix">
			<?php foreach($product as $key => $value) {?>
				<div class="item_product">
					<div class="w_img">
						<a href="<?=$value['tenkhongdau']?>" class="img">
							<img src="<?=_upload_product_l.$value['thumb']?>" alt="<?=$value['ten_'.$lang]?>">
						</a>
						<div class="info_product"><a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>">
							<?php /*
							<span><?=_gia?>: <strong><?php if($value['giacu'] == 0) { echo _lienhe; } else { echo number_format ($value['giacu'],0,",",".")."<sup>đ</sup>"; }?></strong></span>
							*/?>
						</a></div>
					</div>
					<h3><a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>"><?=$value['ten_'.$lang]?></a></h3>
				</div>
			<?php } ?>
			</div>
		<div class="paging"><?=$paging?></div><div style='display:none'><div id='inline_content'></div></div>
		<?php } else { ?>
			<h3 class="title_update">Dữ liệu đang cập nhật...</h3>
		<?php } ?>
	</div>
</div>