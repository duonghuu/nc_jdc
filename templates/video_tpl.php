<div class="content12 clearfix">
	<h3 class="title_web"><span><?=$title_detail?></span></h3>
	<?php foreach ($video as $key => $value) { ?>
		<div class="item_video">
			<div class="img_vid">
				<a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_vi']?>"><img src="http://img.youtube.com/vi/<?=youtobi($value['link'])?>/0.jpg"/>
				</a>
			</div>
			<a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_vi']?>"><h3 class="name_video"><?=$value['ten_'.$lang]?></h3></a>
			<span class="view_video"><?=$value['luotxem']?> views</span> - <span class="ngaydang_video"><?=date('d/m/Y',$value['ngaytao']);?></span>
		</div>
	<?php }?>
</div>
<div align="center" ><div class="paging"><?=$paging?></div></div>