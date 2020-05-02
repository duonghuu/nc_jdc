<?php
  	/*$d->reset();
  	$sql = "select ten_$lang, mota_$lang, photo from #_info where type='gioithieu'";
  	$d->query($sql);
  	$gioithieu = $d->fetch_array();*/

  	$d->reset();		
	$sql_khac = "select ten_$lang, tenkhongdau, mota_$lang, photo from #_baiviet where hienthi=1 and  type='gioithieu' and noibat=1 order by stt";
	$d->query($sql_khac);
	$gioithieu = $d->fetch_array();

	/*$d->reset();
	$sql_video="select id, ten_$lang, link from #_video where hienthi=1 AND type='video' order by stt";
	$d->query($sql_video);
	$video=$d->result_array();*/
?>
<div class="content12 clearfix">
	<div class="left_gt">
		<h3 class="name_gioithieu"><?=$gioithieu['ten_'.$lang]?></h3>
		<div class="des_gt"><?=$gioithieu['mota_'.$lang]?></div>
		<a href="gioi-thieu.html" class="xemthem_gt" title="Xem thêm">Xem thêm</a>	
	</div>
	<div class="right_gt">
		<img src="<?=_upload_baiviet_l.$gioithieu['photo']?>" alt="<?=$gioithieu['ten_'.$lang]?>">
	</div>
</div>

