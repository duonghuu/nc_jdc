<?php 
    $d->reset();
    $d->setTable('product_list');
    $d->setWhere('hienthi','1');
    $d->setWhere('type','product');
    $d->setOrder('stt');
    $d->select('id, ten_'.$lang.', tenkhongdau');
    $row_dm1left = $d->result_array();
?>
<div class="w_item_left">
	<h3 class="title_left">Danh mục sản phẩm</h3>
	<ul id="menu_left">
		<?php foreach ($row_dm1left as $key_list => $value_list) {
		    $d->reset();
		    $d->setTable('product_cat');
		    $d->setWhere('hienthi','1');
		    $d->setWhere('type','product');
		    $d->setWhere('id_list',$value_list['id']);
		    $d->setOrder('stt');
		    $d->select('id, ten_'.$lang.', tenkhongdau');
		    $row_dm2left = $d->result_array();
		?>
			<li><a href="<?=$value_list['tenkhongdau']?>" title="<?=$value_list['ten_'.$lang]?>"><?=$value_list['ten_'.$lang]?></a>
				<?php if(count($row_dm1left) > 0) { ?>
					<ul>
						<?php foreach ($row_dm2left as $key_cat => $value_cat) {
						    $d->reset();
						    $d->setTable('product_item');
						    $d->setWhere('hienthi','1');
						    $d->setWhere('type','product');
						    $d->setWhere('id_cat',$value_cat['id']);
						    $d->setOrder('stt');
						    $d->select('id, ten_'.$lang.', tenkhongdau');
						    $row_dm3left = $d->result_array();
						?>
							<li><a href="<?=$value_cat['tenkhongdau']?>" title="<?=$value_cat['ten_'.$lang]?>"><?=$value_cat['ten_'.$lang]?></a>
								<?php if(count($row_dm1left) > 0) { ?>
									<ul>
										<?php foreach ($row_dm3left as $key_item => $value_item) { ?>
											<li><a href="<?=$value_item['tenkhongdau']?>" title="<?=$value_item['ten_'.$lang]?>"><?=$value_item['ten_'.$lang]?></a></li>
										<?php } ?>
									</ul>
								<?php } ?>
							</li>
						<?php } ?>
					</ul>
				<?php } ?>
			</li>
		<?php } ?>
		<li><a href="dich-vu" title="<?=_dichvu?> ++"><?=_dichvu?> ++</a></li>
	</ul>
</div>