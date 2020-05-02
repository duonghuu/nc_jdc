<?php
    $d->reset();
    $d->setTable('photo');
    $d->setWhere('hienthi','1');
    $d->setWhere('type','slider');
    $d->setOrder('stt');
    $d->select('photo_'.$lang.', link, ten_vi, mota_'.$lang);
    $slide_show = $d->result_array();
?>
<div class="w_slider">
    <div id="wowslider-container1">
        <div class="ws_images">
            <ul>
                <?php foreach($slide_show as $key => $value){ ?>
                    <li><img src="thumb/1366x655/1/<?=_upload_hinhanh_l.$value['photo_'.$lang]?>" alt="<?=$value['ten_vi']?>" title="<div class='w_title_slider'><a class='transAll600' href='<?=$value['link']?>' title='<?=$value['ten_vi']?>'>Xem chi tiết</a></div>" id="slide<?=$key?>"/></li>
                <?php } ?>
            </ul>
        </div>
        <div class="ws_bullets">
            <div>
                <?php foreach($slide_show as $key => $value){ ?>
                    <a href="#slide<?=$key?>" title="slider"></a>
                <?php } ?>
            </div>
        </div>
        <div class="ws_shadow"></div>
    </div>
</div>