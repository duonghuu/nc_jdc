<?php
    $d->reset();
    $sql = "select thumb,id,photo from #_baiviet_photo where hienthi=1 and type='pctour' and id_baiviet='".$row_detail['id']."' order by stt,id desc ";
    $d->query($sql);
    $news_photos = $d->result_array();
?>
<div class="content12 clearfix">
	<h3 class="title_baiviet"> <?=$row_detail['ten_'.$lang]?></h3>
	<i class="ngaydang"><?=_ngaydang?>: <?=date('d/m/Y - g:i A',$row_detail['ngaytao']);?></i>
	<div class="noidung_content clearfix">
		<?=$row_detail['noidung_'.$lang]?>
		<div class="addthis_native_toolbox"></div>
		<?=get_social('','comment');?>
	</div>
	<div class="other_news">
		<h3 class="title_other"><span><?=_baidanglienquan?></span></h3>
		<ul>
			<?php foreach ($tintuc as $key => $value) { ?>
				<li><a class="transAll600" href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>"><i class="fas fa-eye"></i> <?=$value['ten_'.$lang]?></a></li>
			<?php } ?>
		</ul>
	</div>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-570467c6b3882b22"></script>