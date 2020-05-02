<!-- Form Search -->
<form id="frmSearch" name="frmSearch" class="clearfix">
    <input type="text" name="keywords" id="txtSearch" placeholder="Từ khóa"/>
    <button type="submit" name="btnSearch" id="btnSearch" value=""></button>
</form>
<style type="text/css">
	
</style>
<!-- End Form Search -->

<?php
	$d->reset();
    $d->setTable('lkweb');
    $d->setWhere('hienthi','1');
    $d->setWhere('type','mangxh');
    $d->setOrder('stt');
    $d->select('ten_'.$lang.', thumb, link');
    $row_mangxh = $d->result_array();
?>
<div class="mangxh">
	<?php foreach ($mangxh as $key => $value) { ?>
		<a class="xoay_hinh" href="<?=$value['link']?>" target="_blank" title="<?=$value['ten']?>">
			<img src="<?=_upload_hinhanh_l.$value['thumb']?>" alt="<?=$value['ten']?>"/>
		</a>
	<?php } ?>
</div>

<a id="noop-top"></a>
<style type="text/css" media="screen">
	a#noop-top { display: none; width: width: 37px; height: 37px; position: fixed; bottom: 50px; right:10px; cursor:pointer; background: url('../images/icon/back_to_top.png') no-repeat top center; z-index: 99999; }
</style>

<!-- ================================ Layout Bottom ================================= -->

<!-- Tin tức -->
<div class="w_tintuc clearfix">
	<h3 class="title_bottom"><span>Tin tức</span></h3>
	<div class="w_left_tintuc transAll600">
		<a href="<?=$row_tintuc[0]['ten_'.$lang]?>" title="<?=$row_tintuc[0]['ten_'.$lang]?>" class="img zoom_hinh">
			<img src="thumb/330x200/1/<?=_upload_baiviet_l.$row_tintuc[0]['photo']?>" alt="<?=$row_tintuc[0]['ten_'.$lang]?>">
		</a>
		<h3><a href="<?=$row_tintuc[0]['ten_'.$lang]?>" title="<?=$row_tintuc[0]['ten_'.$lang]?>"><?=$row_tintuc[0]['ten_'.$lang]?></a></h3>
		<span><?=$row_tintuc[0]['mota_'.$lang]?></span>
		<a class="xt_tintuc" href="<?=$row_tintuc[0]['ten_'.$lang]?>" title="<?=$row_tintuc[0]['ten_'.$lang]?>">Xem thêm</a>
	</div>
	<div class="w_right_tintuc">
		<div class="slick_ver_3">
			<?php foreach ($row_tintuc as $key => $value) { if($key > 0) { ?>
				<div>
					<div class="w_item_tintuc clearfix">
						<a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>" class="img zoom_hinh">
							<img src="thumb/150x110/1/<?=_upload_baiviet_l.$value['photo']?>" alt="<?=$value['ten_'.$lang]?>">
						</a>
						<h3><a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>"><?=$value['ten_'.$lang]?></a></h3>
						<span><?=$value['mota_'.$lang]?></span>
					</div>
				</div>
			<?php } } ?>
		</div>
	</div>
</div>
<!-- End tin tuc -->

<!-- Video -->
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
<div class="w_video">
	<h3 class="title_bottom"><span>Video Clip</span></h3>
	<div class="w_iframe">
		<iframe src="https://www.youtube.com/embed/<?=youtobi($row_video[0]['link'])?>" allowfullscreen></iframe>
	</div>
	<select name="listVideo" id="listVideo" onchange="changevideo()">
		<?php foreach ($row_video as $key => $value) { ?>
			<option value="<?=$value['id']?>"><?=$value['ten_'.$lang]?></option>
		<?php } ?>
	</select>
</div>
<style type="text/css">
	div.w_iframe { width: 100%; height: 350px; }
	div.w_iframe iframe { width: 100%; height: 100%; outline: none; border: none; }
	select#listVideo { width: 100%; height: 35px; font-family: 'Roboto-Regular'; font-size: 14px; color: #333; margin-top: 5px; outline: none; }
</style>
<!-- End Video -->

<!-- Product -->
<div class="item_product">
	<a href="san-pham/<?=$value['tenkhongdau']?>-<?=$value['id']?>.html" class="img zoom_hinh" title="<?=$value['ten_'.$lang]?>">
		<img src="thumb/280x240/1/<?=_upload_product_l.$value['photo']?>" alt="<?=$value['ten_'.$lang]?>">
	</a>
	<h3><a href="san-pham/<?=$value['tenkhongdau']?>-<?=$value['id']?>.html" title="<?=$value['ten_'.$lang]?>"><?=$value['ten_'.$lang]?></a></h3>
	<span><?php if($value['giaban'] != 0) { ?>$<?=number_format ($value['giaban'],0,",",".")." VNĐ";?><?php } ?></span>
</div>
<style type="text/css">
	div.item_product { width: 280px; min-height: 300px; float: left; margin-right: 25px; margin-bottom: 15px; background: #fff; text-align: center; text-transform: uppercase; position: relative; }
	div.item_product:nth-child(4n) { margin-right: 0px; }
	div.item_product:nth-child(4n+1) { clear: both; }
	div.item_product a.img:before { position: absolute; content: ''; width: calc(100% - 10px); height: calc(100% - 10px); background: transparent; border: 1px solid rgba(255,255,255,0.5); left: 50%; top: 50%; transform: translate(-50%, -50%); z-index: 99; }
	div.item_product h3 a { display: block; font-family: 'OpenSansRegular'; font-size: 15px; color: #181818; margin-bottom: 5px; margin-top: 10px; }
	div.item_product h3 a:hover { color: #d49d30; }
	div.item_product span { display: block; font-family: 'MyriadProRegular'; font-size: 15px; color: #f20202; margin-bottom: 5px; }
</style>
<!-- End Product -->

<!-- Doi tac -->
<?php
    $d->reset();
    $d->setTable('photo');
    $d->setWhere('hienthi','1');
    $d->setWhere('type','doitac');
    $d->setOrder('stt');
    $d->select('ten_vi, link, photo'.$lang);
    $row_doitac = $d->result_array();
?>
<div class="w_doitac">
	<div class="margin_auto">
		<div id="owl_doitac" class="owl-carousel owl-theme">
			<?php foreach ($row_doitac as $key => $value) { ?>
			<div>
				<a href="<?=$value['link']?>" class="img img_doitac">
					<img src="thumb/190x100/2/<?=_upload_hinhanh_l.$value['photo_vi']?>">
				</a>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- End Doi tac -->


<!-- Copyright -->
<div class="w_copyright">
    <div class="content12 clearfix">
        <span class="left_copy">Copyright © 2017 <strong><?=$row_setting['ten_'.$lang]?></strong>. All Rights Reserved. Designed by Nina.vn</span>
        <?php $count=count_online();$dang_xem=$count['dangxem'];?>
        <span class="right_copy"><?=_onl?>: <?=$dang_xem?> | Tổng truy cập: <?=$tongtruycap?></span>
    </div>
</div>
<!-- End Copyright -->

<!-- Chat FB -->
<div id="cfacebook">
    <a href="javascript:;" class="chat_fb" onclick="return:false;"></a>
    <div class="fchat">
        <div class="fb-page" data-tabs="messages" data-href="<?=$row_setting['facebook']?>" data-width="300" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
    </div>
	<style>
		#cfacebook{position:fixed;bottom:0px;right:0px;z-index:999999999999999;width:300px;height:auto; background: rgba(255,255,255,0);border-top-left-radius:5px;border-top-right-radius:5px;}
		#cfacebook .fchat{float:left;width:100%;height:400px;display:none;background-color:#fff;}
		#cfacebook .fchat .fb-page{float:left;}
		#cfacebook a.chat_fb{float:right; text-align: right;width:250px;color:#fff;text-decoration:none;height:44px;line-height:44px;text-shadow:0 1px 0 rgba(0,0,0,0.1);background:url(images/title_fb.png) no-repeat;border:0;z-index:9999999;font-size:18px;}
		#cfacebook a.chat_fb:hover{color:yellow;text-decoration:none;}</style>
</div>
<!-- End Chat FB -->

<!-- Fanpage -->
<div class="w_fanpage">
	<h3 class="title_ft">Facebook</h3>
	<div class="fb-page" data-href="<?=$row_setting['facebook']?>" data-tabs="timeline" data-width="500" data-height="145" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
</div>
<!-- End Fanpage -->

<!-- Call, SMS, Map -->
<div id="w_call_sms_map">
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td><a class="img blink_me" href="tel:<?=$row_setting['hotline1']?>"><img src="images/icon/goidien.png">Call</a></td>
			<td><a class="img" href="sms:<?=$row_setting['hotline1']?>"><img src="images/icon/tuvan.png">SMS</a></td> 
			<td><a class="img" href="http://maps.google.com/?q=<?=$row_setting['toado']?>"><img src="images/icon/chiduong.png">Map</a></td>
		</tr>
	</table>
</div>
<style type="text/css">
	div#w_call_sms_map { position: fixed; width: 100%; left: 0px; bottom: 0px; z-index: 9999999999999; background: rgba(0,0,0,0.5); }
	div#w_call_sms_map table td { width: 33.3333%; text-align: center; }
	div#w_call_sms_map table td a { font-family: 'UTMAvoBold'; font-size: 12px; color: #fff; text-transform: uppercase; }
</style>
<!-- End Call, SMS, Map -->

<!-- Map -->
<div class="w_bando">
	<div id="map_canvas1" style="width: 100%; height: 160px;"></div>
</div>
<!-- End Map -->

<!-- Call -->
<link href="css/widget.css" rel="stylesheet" type="text/css"/>
<a href="tel:<?=$row_setting['hotline']?>">
	<div class="coccoc-alo-phone coccoc-alo-green coccoc-alo-show" id="coccoc-alo-phoneIcon">
		<div class="coccoc-alo-ph-circle"></div>
		<div class="coccoc-alo-ph-circle-fill"></div>
		<div class="coccoc-alo-ph-img-circle"></div>
	</div>
</a>
<!-- End Call -->

<!-- DKNT -->
<div class="w_dknt">
	<h3 class="title_ft">Đăng ký nhận tin</h3>
	<span class="slogan_nhantin">Hãy đăng ký để nhận thông tin mới nhất từ chúng tôi</span>
	<form method="post" id="frmdknt" class="clearfix">
		<input type="hidden" name="type" value="dknt">
		<input id="txtemail" name="email" type="text" class="input" placeholder="Email của bạn...">
		<button id="dangky" type="submit" value=""></button>
	</form>
</div>
<style type="text/css">
	form#frmdknt { width: 100%; height: 35px; margin: 10px 0px 15px 0px; }
	form#frmdknt input { display: block; width: 250px; float: left; height: 100%; background: none; border: 1px solid #ccc; border-right: none; outline: none; padding-left: 10px; }
	form#frmdknt input::placeholder { font-family: Arial; font-size: 12px; color: #fff; }
	form#frmdknt button { display: block; width: calc(100% - 250px); float: left;  height: 100%; border: none; outline: none; }
</style>
<!-- End DKNT -->

<!-- Thong ke truy cap -->
<div class="w_thongketruycap">
	<h3 class="title_ft">THỐNG KÊ TRUY CẬP</h3>
	<table>
		<?php $count=count_online();$dang_xem=$count['dangxem'];?>
		<tr><td><img src="images/dang_onl.png"></td><td class="text_td">Đang online:</td> <td class="text_td1"><?= $items?></td></tr>
		<tr><td><img src="images/ngay.png"></td><td class="text_td">Hôm nay:</td> <td class="text_td1"><?=$homnay?></td></tr>
		<tr><td><img src="images/thang.png"></td><td class="text_td">Tháng này:</td> <td class="text_td1"><?=$trongthang?></td></tr>
		<tr><td><img src="images/tong.png"></td><td class="text_td">Tổng truy cập:</td><td class="text_td1"><?=$tongtruycap?></td></tr>
	</table>
</div>
<!-- End Thong ke truy cap -->

<!-- Danh muc Left -->
<?php 
    $d->reset();
    $d->setTable('product_list');
    $d->setWhere('hienthi','1');
    $d->setWhere('type','product');
    $d->setOrder('stt');
    $d->select('id, ten_'.$lang.', tenkhongdau');
    $row_dm1left = $d->result_array();
?>
<h3 class="title_left">Danh mục sản phẩm</h3>
<ul class="menu_left">
	<?php foreach ($row_dm1left as $key_list => $value_list) { ?>
	<?php 
	    $d->reset();
	    $d->setTable('product_cat');
	    $d->setWhere('hienthi','1');
	    $d->setWhere('type','product');
	    $d->setWhere('id_list',$value_list['id']);
	    $d->setOrder('stt');
	    $d->select('id, ten_'.$lang.', tenkhongdau');
	    $row_dm2left = $d->result_array();
	?>
		<li class=""><a href="<?=$value_list['tenkhongdau']?>/<?=$value_list['id']?>" title="<?=$value_list['ten_'.$lang]?>"><i class="fas fa-angle-double-right"></i> <?=$value_list['ten_'.$lang]?></a>
			<?php if(count($row_dm2left) > 0) { ?>
				<ul>
					<?php foreach ($row_dm2left as $key_cat => $value_cat) { ?>
						<li><a href="<?=$value_cat['tenkhongdau']?>/<?=$value_cat['id']?>" title="<?=$value_cat['ten_'.$lang]?>"><?=$value_cat['ten_'.$lang]?></a></li>
					<?php } ?>
				</ul>
			<?php } ?>
		</li>
	<?php } ?>
</ul>

<!-- End Danh muc Left -->

<!-- jPages -->
<div class="clearfix" id="itemContainer">
	<?php foreach ($row_noibat as $key => $value) { ?>
		<div class="w_item_product">
			<a href="san-pham/<?=$value['tenkhongdau']?>-<?=$value['id']?>.html" class="img zoom_hinh" title="<?=$value['ten_'.$lang]?>">
				<img src="thumb/280x240/1/<?=_upload_product_l.$value['photo']?>" alt="<?=$value['ten_'.$lang]?>">
			</a>
			<h3><a href="san-pham/<?=$value['tenkhongdau']?>-<?=$value['id']?>.html" title="<?=$value['ten_'.$lang]?>"><?=$value['ten_'.$lang]?></a></h3>
			<span><?php if($value['giaban'] != 0) { ?>$<?=number_format ($value['giaban'],0,",",".")." VNĐ";?><?php } ?></span>
		</div>
	<?php } ?>
</div>
<?php if(count($row_noibat)>8){ ?> <div class="holder" id="holder"></div> <?php } ?>
<script>
  	$(function(){
    	$("div#holder").jPages({
     		containerID  : "itemContainer",
      		perPage      : 8,
      		startPage    : 1,
      		startRange   : 1,
      		midRange     : 5,
      		endRange     : 1
    	});
  	});
</script>
<!-- End jPages -->

<!-- Gioi thieu -->
<?php
    $d->reset();
    $d->setTable('info');
    $d->setWhere('type','gioithieu');
    $d->select('id, ten_'.$lang.', photo, mota_'.$lang);
    $row_gioithieu = $d->fetch_array();
?>
<div class="w_gioithieu">
	<div class="content12 clearfix">
		<div class="w_left_gt clearfix">
			<h3><a href="gioi-thieu.html" title="Giới thiệu"><?=$row_gioithieu['ten_'.$lang]?></a></h3>
			<span><?=catchuoi($row_gioithieu['mota_'.$lang], 750)?></span>
			<a href="gioi-thieu.html" title="Giới thiệu">Xem thêm <i class="fas fa-angle-double-right"></i></a>
		</div>
		<div class="img img_gt">
			<img src="<?=_upload_hinhanh_l.$row_gioithieu['photo']?>" alt="">
		</div>
	</div>
</div>
<!-- End Gioi thieu -->

<!-- Thong tin cong ty -->
	<p class="com_info">Địa chỉ: <?=$row_setting['diachi_'.$lang]?></p>
	<p class="com_info">Điện thoại: <?=$row_setting['hotline1']?></p>
	<p class="com_info">Email: <?=$row_setting['email']?></p>
	<p class="com_info">Website: <?=$row_setting['website']?></p>
<!-- End Thong tin cong ty -->