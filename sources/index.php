<?php  if(!defined('_source')) die("Error");
    $d->reset();
    $d->setTable('photo');
    $d->setWhere('hienthi','1');
    $d->setWhere('type','slider1');
    $d->setOrder('stt');
    $d->select('photo_vi, thumb_vi, link, ten_vi, mota_'.$lang);
    $row_slider1 = $d->result_array();

	$d->reset();
    $d->setTable('baiviet');
    $d->setWhere('hienthi','1');
    $d->setWhere('type','gioithieu');
    $d->setWhere('noibat','1');
    $d->setOrder('stt');
    $d->setLimit('1');
    $d->select('id, ten_'.$lang.', mota_'.$lang.', tenkhongdau');
    $row_gioithieu = $d->fetch_array();

    $d->reset();
    $d->setTable('product_list');
    $d->setWhere('hienthi','1');
    $d->setWhere('type','product');
    $d->setWhere('noibat','1');
    $d->setOrder('stt');
    $d->select('id, ten_'.$lang.', tenkhongdau, photo');
    $row_list = $d->result_array();
    $arradd = array('id'=>'all','ten_vi'=>'Tất cả','ten_en'=>'All','tenkhongdau'=>'');
    array_unshift($row_list,$arradd);

    $d->reset();
    $d->setTable('product');
    $d->setWhere('hienthi','1');
    $d->setWhere('type','product');
    $d->setWhere('noibat','1');
    $d->setOrder('stt');
    $d->select('id, ten_'.$lang.', tenkhongdau, photo');
    $row_noibat = $d->result_array();
?>