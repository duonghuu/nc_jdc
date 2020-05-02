<?php
	session_start();
	@define ( '_template' , '../templates/');
	@define ( '_lib' , '../libraries/');
	@define ( '_source' , '../sources/');

	if(!isset($_SESSION['lang'])) { $_SESSION['lang']='vi'; } $lang=$_SESSION['lang'];

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);

    $d->reset();
    $d->setTable('product');
    $d->setWhere('hienthi','1');
    $d->setWhere('type','product');
    
	if($_POST['id_tabs'] == 'tabs_noibat') {
	    $d->setWhere('noibat','1');
	}
	if($_POST['id_tabs'] == 'tabs_moi') {
	    $d->setWhere('sp_moi','1');
	}
	if($_POST['id_tabs'] == 'tabs_khuyenmai') {
	    $d->setWhere('sp_khuyenmai','1');
	}
	if($_POST['id_tabs'] == 'tabs_banchay') {
	    $d->setWhere('sp_banchay','1');
	}

    $d->setOrder('stt');
    $d->select('id, ten_'.$lang.', tenkhongdau, giaban, giacu, photo');
    $pro_data = $d->result_array();
?>
<script type="text/javascript">
	$(".slick_pro").slick({
        dots: false,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        vertical: false,
        autoplay:true,
        arrows: true,
        speed: 2000,
        autoplaySpeed: 3000,
        rows: 1
    });
</script>
<div class="slick_pro">
	<?php foreach ($pro_data as $key => $value) { ?>
		<div>
			<div class="item_pro clearfix">
				<a class="img zoom_hinh hover_sang2" href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>">
					<img src="<?=_upload_product_l.$value['photo']?>" alt="<?=$value['ten_'.$lang]?>">
				</a>
				<h3><a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>"><?=$value['ten_'.$lang]?></a></h3>
				<strong><?php if($value['giacu'] == 0) { echo "Liên hệ"; } else { echo number_format ($value['giacu'],0,",",".")." VNĐ"; }?></strong>
				<span><?php if($value['giaban'] == 0) { echo "Liên hệ"; } else { echo number_format ($value['giaban'],0,",",".")." VNĐ"; }?></span>
				<a class="btn_cart" title="<?=_muangay?>" onclick="addtocart(<?=$value['id']?>)"><img src="images/icon5.png" alt="Cart"></a>
			</div>
		</div>
	<?php } ?>
</div>
