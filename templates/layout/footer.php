<?php
	$d->reset();
    $d->setTable('lkweb');
    $d->setWhere('hienthi','1');
    $d->setWhere('type','lkweb');
    $d->setOrder('stt');
    $d->select('ten_'.$lang.', thumb, link');
    $row_lkweb = $d->result_array();
?>
<div class="w_ft">
    <div class="content12 clearfix">
        <div class="w_ft1">
            <h3 class="name_com"><?=$row_setting['ten_'.$lang]?></h3>
            <p class="com_info"><?=$row_setting['diachi_'.$lang]?></p>
            <p class="com_info"><?=$row_setting['dienthoai']?></p>
            <p class="com_info"><?=$row_setting['email']?></p>
            <p class="com_info"><?=$row_setting['website']?></p>
        </div>
        <div class="w_ft2">
            <div class="fb-page" data-href="<?=$row_setting['facebook']?>" data-tabs="timeline" data-width="500" data-height="145" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
        </div>
    </div>
</div>
<div class="w_copyright">
    <div class="content12 clearfix">
        <span class="left_copy">Copyright © 2018 <strong><?=$row_setting['ten_'.$lang]?></strong>. All Rights Reserved</span>
        <?php $count=count_online();$dang_xem=$count['dangxem'];?>
        <span class="right_copy"><?=_dangonline?>: <?=$dang_xem?> | <?=_tongtruycap?>: <?=$tongtruycap?></span>
    </div>
</div>