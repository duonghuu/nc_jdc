<?php
	$d->reset();
	$sql = "select ten_vi, tenkhongdau, thumb, mota_vi from #_baiviet where hienthi='1' AND noibat=1 AND  type='dichvu' order by stt";
	$d->query($sql);
	$service_index = $d->result_array();

	$d->reset();
	$sql = "select ten_vi, tenkhongdau, thumb, photo, mota_vi, video_youtube from #_product where hienthi='1' AND noibat=1 AND  type='product' order by stt";
	$d->query($sql);
	$product_index = $d->result_array();
?>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<script language="javascript" src="js/perspective/jquery.ui.touch-punch.min.js"></script>
<script language="javascript" src="js/perspective/logo_perspective.js"></script>
<link href="js/perspective/logo_perspective.css" rel="stylesheet">
<div class="main_content">
	<div class="wrap_dichvu">
		<h3 class="title_web">Dịch vụ</h3>
		<div id="logo_perspective_black">
			<div class="myloader"></div>
			<ul class="logo_perspective_list">
				<?php foreach ($service_index as $key => $value) { ?>
					<li>
						<div class="img_dv">
							<a href="dich-vu/<?=$value['tenkhongdau']?>.html" title="<?=$value['ten_vi']?>"><img src="<?=_upload_baiviet_l.$value['thumb']?>" alt="<?=$value['ten_vi']?>" ></a>
							<div class="des_dv">
								<p><?=$value['mota_vi']?></p>
							</div>
						</div>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<script>
	$(function() {
		jQuery('#logo_perspective_black').logo_perspective({
			skin: 'black',
			width: 1200,
			responsive:true,
			imageWidth:650,
			imageHeight:355,
			border:5,
			borderColorOFF:'#000000',
			showTooltip:true,
			elementsHorizontalSpacing:140,
			elementsVerticalSpacing:20,
			autoPlay: 5,
			numberOfVisibleItems:5
		});
	});
</script>