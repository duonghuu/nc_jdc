<?php 
$d->reset();
$d->setTable('photo');
$d->setWhere('type','bannerhd');
$d->select('photo_'.$lang);
$bannerhd = $d->fetch_array();
$hero_bg = _upload_hinhanh_l.$bannerhd['photo_'.$lang];
$img = "thumb/300x300/1/"._upload_baiviet_l.$row_detail['photo'];
 ?>
<div class="hero-img" style="background-image: url('<?= $hero_bg ?>')">
  <h2 class="hero-title"><?= _hoidong ?></h2>
</div>
<div class="content12 clearfix">
    <div class="hoidong-detail-head">
        <figure><img src="<?= $img ?>" alt="<?=$row_detail['ten_'.$lang]?>"></figure>
        <div class="hoidong-detail-head__info">
            <h2><?=$row_detail['ten_'.$lang]?></h2>
            <div class="desc"><?=$row_detail['mota_'.$lang]?></div>
        </div>
    </div>
    <div class="hoidong-detail-body">
        <?=$row_detail['noidung_'.$lang]?>
    </div>
    <div class="hoidong-detail-foot">
        <a href="hoi-dong"><?= _quaylai ?></a>
    </div>
</div>
