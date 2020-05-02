<div class="content12 clearfix">
  <h3 class="title_web"><span><?=$title_detail?></span></h3>
	<div class="video_left">
		<iframe width="100%" src="https://www.youtube.com/embed/<?=youtobi($row_detail['link'])?>?autoplay=1" frameborder="0" allowfullscreen></iframe>
        <h3 class="name_video_detail"><?=$row_detail['ten_vi']?></h3>
        <span class="luotxem"><?=$row_detail['luotxem']?> views - <?=date('d/m/Y',$row_detail['ngaytao']);?></span>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-570467c6b3882b22"></script>
        <div class="addthis_native_toolbox"></div>
        <?=get_social('','comment');?>
    </div>
    <div class="video_right">
        <h3 class="title_other_video">Video khác</h3>
      	<?php foreach ($video as $key => $value) { ?>
      		<div class="item_video_other clearfix">
	      		<div class="img_video_other">
	          		<a href="<?=$value['tenkhongdau']?>" >
	            		<img src="http://img.youtube.com/vi/<?=youtobi($value['link'])?>/sddefault.jpg"/>
	          		</a>
	          	</div>
	          	<div class="vid_info">
	            	<a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_vi']?>"><h3><?=$value['ten_'.$lang]?></h3></a>
	            	<span class="luotxem"><?=$value['luotxem']?> views - <?=date('d/m/Y',$value['ngaytao']);?></span>
	         	</div>
      		</div>
      	<?php }?>
    </div>
</div>