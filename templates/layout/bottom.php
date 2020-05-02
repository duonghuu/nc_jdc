<?php
	$d->reset();
    $d->setTable('baiviet');
    $d->setWhere('hienthi','1');
    $d->setWhere('type','tintuc');
    $d->setWhere('noibat','1');
    $d->setOrder('stt');
    $d->select('ten_'.$lang.', mota_'.$lang.', tenkhongdau, thumb, ngaytao');
    $row_tintuc = $d->result_array();

    $d->reset();
    $d->setTable('video');
    $d->setWhere('hienthi','1');
    $d->setWhere('type','video');
    $d->setOrder('stt');
    $d->select('id, ten_'.$lang.', link');
    $row_video = $d->result_array();
?>
<div class="w_bottom">
    <div class="content12 clearfix">
        <div class="w_tintuc clearfix">
            <h3 class="title_bottom"><span><?=_tintucsukien?></span></h3>
            <div class="w_left_tintuc transAll600">
                <a href="<?=$row_tintuc[0]['tenkhongdau']?>" title="<?=$row_tintuc[0]['ten_'.$lang]?>" class="img zoom_hinh">
                    <img src="<?=_upload_baiviet_l.$row_tintuc[0]['thumb']?>" alt="<?=$row_tintuc[0]['ten_'.$lang]?>">
                </a>
                <h3><a href="<?=$row_tintuc[0]['tenkhongdau']?>" title="<?=$row_tintuc[0]['ten_'.$lang]?>"><?=$row_tintuc[0]['ten_'.$lang]?></a></h3>
                <p><?=$row_tintuc[0]['mota_'.$lang]?></p>
                <a class="xemthem_tintuc" href="<?=$row_tintuc[0]['tenkhongdau']?>" title="<?=_xemchitiet?>"><?=_xemchitiet?></a>
            </div>
            <div class="w_right_tintuc">
                <div class="slick_ver_3">
                    <?php foreach ($row_tintuc as $key => $value) { if($key > 0) { ?>
                        <div>
                            <div class="w_item_tintuc clearfix">
                                <a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>" class="img zoom_hinh">
                                    <img src="<?=_upload_baiviet_l.$value['thumb']?>" alt="<?=$value['ten_'.$lang]?>">
                                </a>
                                <h3><a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>"><?=$value['ten_'.$lang]?></a></h3>
                                <p><?=$value['mota_'.$lang]?></p>
                            </div>
                        </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
        <div class="w_video">
            <h3 class="title_bottom">Video Clip</h3>
            <div class="w_iframe">
                <iframe src="https://www.youtube.com/embed/<?=youtobi($row_video[0]['link'])?>" allowfullscreen></iframe>
            </div>
            <div class="slick_video">
                <?php foreach ($row_video as $key => $value) { ?>
                    <div>
                        <a class="img img_video" onclick="changevideo(<?=$value['id']?>)">
                            <img src="http://img.youtube.com/vi/<?=youtobi($value['link'])?>/0.jpg"/>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>