<div class="content12">
	<?php if(count($tintuc) > 0) { ?>
		<div class="clearfix">
			<?php foreach ($tintuc as $key => $value) { ?>
				<div class="w_news clearfix">
					<a href="<?=$value['tenkhongdau']?>" class="img zoom_hinh" title="<?=$value['ten_'.$lang]?>">
						<img src="thumb/370x240/1/<?=_upload_baiviet_l.$value['photo']?>" alt="<?=$value['ten_'.$lang]?>">
					</a>
					<div class="w_info_news clearfix">
						<h3><a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>"><?=$value['ten_'.$lang]?></a></h3>
						<div class="mota_news clearfix"><?=$value['mota_'.$lang]?></div>
						<?php if($value['type'] != 'tuyendung') { ?>
							<a class="btn_more transAll600" href="<?=$value['tenkhongdau']?>" title="<?=_xemthem?>"><?=_xemthem?></a>
						<?php } else { ?>
							<a class="btn_more transAll600" href="lien-he" title="APPLY">APPLY</a>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
		</div>
	<div align="center" ><div class="paging"><?=$paging?></div></div>
	<?php } else { ?>
		<h3 class="title_update"><?=_dulieudangcapnhat?></h3>
	<?php } ?>
</div>