<div class="content12 clearfix">
	<div class="w_left">
		<?php include _template."layout/left.php"; ?>
	</div>
	<div class="w_right">
		<div class="khung clearfix">
			<div class="frame_images" >
				<div class="app-figure" id="zoom-fig">
					<a href="<?=_upload_product_l.$row_detail['photo']?>" id="Zoom-1" class="MagicZoom" data-options="zoomMode: magnifier; zoomPosition: inner;" title="<?=$row_detail['ten_'.$lang]?> ."><img src="thumb/390x300/2/<?=_upload_product_l.$row_detail['photo']?>" alt="<?=$row_detail['ten_'.$lang]?>"/></a>
					<div class="selectors">
						<?php
						    $d->reset();
						    $sql = "select thumb,id,photo from #_product_photo where hienthi=1 and type='product' and id_product='".$row_detail['id']."' order by stt,id desc ";
						    $d->query($sql);
						    $product_photos = $d->result_array();
						?>
						<div class="slick_img_lq">
						    <div>
						        <a data-zoom-id="Zoom-1" href="<?=_upload_product_l.$row_detail['photo']?>"
						        data-image="thumb/280x385/2/<?=_upload_product_l.$row_detail['photo']?>"><img src="thumb/90x110/1/<?=_upload_product_l.$row_detail['photo']?>" alt="$row_detail['ten_'.$lang]"></a>
						    </div>
						    <?php foreach ($product_photos as $key => $value) { ?>
						        <div>
						            <a data-zoom-id="Zoom-1" href="<?=_upload_product_l.$value['photo']?>"
						            data-image="thumb/280x385/2/<?=_upload_product_l.$value['photo']?>"><img src="thumb/90x110/1/<?=_upload_product_l.$value['photo']?>" alt="$row_detail['ten_'.$lang]"></a>
						        </div>
						    <?php } ?>
						</div>
					</div>
				</div>
			</div>
			<ul class="khung_thongtin">
				<h2><?=$row_detail['ten_'.$lang]?></h2>
				<li><?=_masp?>: <?=$row_detail['masp']?></li>
				<?php /*
				<li class="gia_detail"><?=_gia?>: <span><?php if($row_detail['giacu'] == 0) { echo _lienhe; } else { echo number_format ($row_detail['giacu'],0,",",".")."<sup>đ</sup>"; }?></span></li>
				*/?>
				<li><?=_luotxem?>: <?=$row_detail['luotxem']?></li>
				<?php if($row_detail['mota_vi'] != '') { ?>
				<li><?=_mota?>: <div><?=$row_detail['mota_'.$lang]?></div></li>
				<?php } ?>
				<a data-fancybox data-src="#modal" class="btn_dathang" href="javascript:;" title="<?=_dathang?>"><?=_dathang?></a>
				<div id="modal" style="display: none; padding: 50px 5vw; max-width: 800px;text-align: center;">
				    <form method="post" class="frm_dk" action="newsletter.php" enctype="multipart/form-data">
				        <h3><?=_dathang?></h3>
				        <input type="hidden" name="name_sp" value="<?=$row_detail['ten_'.$lang]?>">
				        <input type="hidden" name="tenkhongdau_sp" value="<?=$row_detail['tenkhongdau']?>">
				        <input type="text" name="ten" placeholder="<?=_hovaten?>">
				        <input type="text" name="diachi" placeholder="<?=_address?>">
				        <input type="text" name="dienthoai" placeholder="<?=_phone?>">
				        <input type="text" name="email" placeholder="<?=_mail?>">
				        <textarea id="txtnoidung" rows="5" name="noidung" placeholder="<?=_noidung?>"></textarea>
				        <button class="btn_send" type="submit"><?=_dathang?></button>
				    </form>
				</div>
				<li>
					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-570467c6b3882b22"></script>
					<div class="addthis_native_toolbox"></div>
				</li>
			</ul>
		</div>
		<div id="tabs_detail">
			<ul id="tabs" class="clearfix">
				<li data-tab="#tab-1" class="active"><?=_thongtin?></li>
				<li data-tab="#tab-2"><?=_binhluan?></li>
			</ul>
			<div class="item_tab_detail tab_hidden active" id="tab-1">
				<div class="content_noidung clearfix"><?=$row_detail['noidung_'.$lang]?></div>
			</div>
			<div class="item_tab_detail tab_hidden" id="tab-2">
				<div class="content_noidung">
					<?=get_social('','comment');?>
				</div>
			</div>
		</div>
		<div class="container_other">
			<h3 class="title_web"><?=_sanphamlienquan?></h3>
			<div class="clearfix">
				<?php foreach($product as $k=>$value){?>
					<div class="item_product">
						<div class="w_img">
							<a href="<?=$value['tenkhongdau']?>" class="img">
								<img src="<?=_upload_product_l.$value['thumb']?>" alt="<?=$value['ten_'.$lang]?>">
							</a>
							<div class="info_product"><a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>"><span><?=_gia?>: <strong><?php if($value['giacu'] == 0) { echo _lienhe; } else { echo number_format ($value['giacu'],0,",",".")."<sup>đ</sup>"; }?></strong></span></a></div>
						</div>
						<h3><a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>"><?=$value['ten_'.$lang]?></a></h3>
					</div>
				<?php } ?>
			</div>
			<div class="paging"><?=$paging?></div><div style='display:none'><div id='inline_content'></div></div>
		</div>
	</div>
</div>