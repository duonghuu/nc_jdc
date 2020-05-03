<?php 
$where = " #_baiviet where hienthi=1 and type='".$type_bar."' ";
$where .= " order by stt,ngaytao desc ";

$sql = "select $select_news from $where ";
$d->query($sql);
$tintuc = $d->result_array();

$d->reset();
$d->setTable('photo');
$d->setWhere('type','bannerhd');
$d->select('photo_'.$lang);
$bannerhd = $d->fetch_array();
$hero_bg = _upload_hinhanh_l.$bannerhd['photo_'.$lang];
 ?>
<div class="hero-img" style="background-image: url('<?= $hero_bg ?>')">
  <h2 class="hero-title"><?=$title_detail?></h2>
</div>
<div class="content12 clearfix">
  <div class="hoidong-flex">
    <?php foreach ($tintuc as $key => $value) { ?>
    <div class="hoidong-item">
      <a href="<?=$value['tenkhongdau']?>">
        <figure><img src="thumb/300x300/1/<?=_upload_baiviet_l.$value['photo']?>"
         alt="<?=$value['ten_'.$lang]?>"></figure>
        <h5><?=$value['ten_'.$lang]?></h5>
        <span class="hoidong__line"></span>
        <div class="desc"><?=$value['mota_'.$lang]?></div>
        <span class="hoidong__read"><?= _docthem ?></span>
      </a>
    </div>
    <?php } ?>
  </div>
</div>
