<?php 
    $d->reset();
    $d->setTable('product');
    $d->setWhere('hienthi','1');
    $d->setWhere('type','product');
    $d->setWhere('noibat','1');
    $d->setOrder('stt', 'desc');
    $d->select('id, ten_'.$lang.', tenkhongdau, photo, giacu, giaban');
    $row_nb = $d->result_array();
?>
<h3 class="title_left">Sản phẩm nổi bật</h3>
<?php foreach ($row_nb as $key => $value) { ?>
	<div class="item_proright">
		<a href="<?=$value['tenkhongdau']?>/<?=$value['id']?>" class="img" title="<?=$value['ten_'.$lang]?>">
			<img src="thumb/265x245/1/<?=_upload_product_l.$value['photo']?>" alt="<?=$value['ten_'.$lang]?>">
		</a>
		<div class="info_pro">
			<h3><a href="<?=$value['tenkhongdau']?>/<?=$value['id']?>" title="<?=$value['ten_'.$lang]?>"><?=$value['ten_'.$lang]?></a></h3>
			<?php if($value['giacu'] != 0) { ?>
				<span class="old_price">
					<strong><?=number_format ($value['giacu'],0,",",".")." đ";?></strong>
					<?php if($value['giacu'] > $value['giaban']) { echo "-".giamgia($value['giacu'], $value['giaban']); } ?>
				</span>
			<?php } ?>
			<span class="new_price">Giá: <strong><?php if($value['giaban'] == 0) { echo "Liên hệ"; } else { echo number_format ($value['giaban'],0,",",".")." đ"; }?></strong></span>
			<a class="btn_chonmua" title="Chọn mua" onclick="addtocart(<?=$value['id']?>)">Chọn mua</a>
		</div>
	</div>
<?php } ?>