<?php
	$d->reset();
	$sql = "select * from #_bgweb where type='bg_slider'";
	$d->query($sql);
	$bg_slider = $d->fetch_array();

	$d->reset();
	$sql = "select * from #_bgweb where type='bg_header'";
	$d->query($sql);
	$bg_header = $d->fetch_array();
?>
<style type="text/css" media="screen">
	#wrapper { background:url(<?=_upload_hinhanh_l.$bg_slider['photo']?>) <?=$bg_slider['re_peat']?> <?=$bg_slider['tren']?> <?=$bg_slider['trai']?>; background-color:<?=$bg_slider['mauneen']?>; background-attachment:<?=$bg_slider['fix_bg']?>; }
	.w_header { background:url(<?=_upload_hinhanh_l.$bg_header['photo']?>) <?=$bg_header['re_peat']?> <?=$bg_header['tren']?> <?=$bg_header['trai']?>; background-color:<?=$bg_header['mauneen']?>; background-attachment:<?=$bg_header['fix_bg']?>; }
</style>

<h1 style="display: none;"><?php if($h1 == '') { echo $row_setting['title']; } else { echo $h1; }?></h1>
<h2 style="display: none;"><?php if($h2 == '') { echo $row_setting['title']; } else { echo $h2; }?></h2>
<h3 style="display: none;"><?php if($h3 == '') { echo $row_setting['title']; } else { echo $h3; }?></h3>
<h4 style="display: none;"><?php if($h4 == '') { echo $row_setting['title']; } else { echo $h4; }?></h4>
<h5 style="display: none;"><?php if($h5 == '') { echo $row_setting['title']; } else { echo $h5; }?></h5>
<h6 style="display: none;"><?php if($h6 == '') { echo $row_setting['title']; } else { echo $h6; }?></h6>