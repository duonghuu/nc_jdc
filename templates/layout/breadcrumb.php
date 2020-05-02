<div class="breadcrumb">
	<div class="content12">
		<a href="trang-chu" title="<?=_trangchu?>"><?=_trangchu?></a>
		<?php if($com_all !=""){?>
		<span>&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;&nbsp;</span>
		<a href="<?=$com_all?>" title="<?=$comt_all?>"><?=$comt_all?></a>
		<?php } ?>
		<?php if($list_all !=""){?>	
		<span>&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;&nbsp;</span>
		<a href="<?=$list_all?>" title="<?=$listt_all?>"><?=$listt_all?></a>
		<?php } ?>
		<?php if($cat_all !=""){?>
		<span>&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;&nbsp;</span>
		<a href="<?=$cat_all?>" title="<?=$catt_all?>"><?=$catt_all?></a>
		<?php } ?>
		<?php if($item_all !=""){?>
		<span>&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;&nbsp;</span>
		<a href="<?=$item_all?>" title="<?=$itemt_all?>"><?=$itemt_all?></a>
		<?php } ?>
		<?php if($sub_all !=""){?>
		<span>&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;&nbsp;</span>
		<a href="<?=$sub_all?>" title="<?=$subt_all?>"><?=$subt_all?></a>
		<?php } ?>
		<span>&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;&nbsp;</span>
		<span><?=$title_detail?></span>
	</div>
</div>