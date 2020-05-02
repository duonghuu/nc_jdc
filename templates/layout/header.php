<?php
    $d->reset();
    $d->setTable('photo');
    $d->setWhere('type','logo');
    $d->select('photo_'.$lang);
    $row_logo = $d->fetch_array();

    $d->reset();
    $d->setTable('photo');
    $d->setWhere('type','banner');
    $d->select('photo_'.$lang);
    $row_banner = $d->fetch_array();
?>
<div class="w_header">
    <div class="content12 clearfix">
        <a href="" class="img w_logo" title="<?=_trangchu?>">
            <img src="<?=_upload_hinhanh_l.$row_logo['photo_'.$lang]?>" alt="<?=_trangchu?>">
        </a>
        <div class="img w_banner">
            <img src="<?=_upload_hinhanh_l.$row_banner['photo_'.$lang]?>" alt="<?=_trangchu?>">
        </div>
        <div class="w_hd_right clearfix">
            <div class="w_language">
                <a href="ngon-ngu&lang=vi" title="Viet Nam"><img src="images/vi.png" alt="Vi"></a>
                <a href="ngon-ngu&lang=en" title="English"><img src="images/en.png" alt="En"></a>
            </div>
            <div class="w_hotline clearfix">
                <div class="left_hotline">HOTLINE</div>
                <div class="right_hotline">
                    <div class="clearfix"><span>- <?=_banhang?>:</span><strong><?=$row_setting['hotline1']?></strong></div>
                    <div class="clearfix"><span>- <?=_hotrokythuat?>:</span><strong><?=$row_setting['hotline2']?></strong></div>
                </div>
            </div>
            <form id="frmSearch" name="frmSearch" class="clearfix">
                <input type="text" name="keywords" id="txtSearch" placeholder="<?=_timkiem?>..."/>
                <button type="submit" name="btnSearch" id="btnSearch" value=""></button>
            </form>
        </div>
    </div>
</div>