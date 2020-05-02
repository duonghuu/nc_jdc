<div class="w_gioithieu content12 clearfix">
	<h3 class="title_gt"><?=$row_gioithieu['ten_'.$lang]?></h3>
	<div class="left_gt">
		<div class="slider-for">
			<?php foreach ($row_slider1 as $key => $value) { ?>
				<div>
					<div class="img"><img src="<?=_upload_hinhanh_l.$value['thumb_vi']?>" alt=""></div>
				</div>
			<?php } ?>
		</div>
		<div class="slider-nav">
			<?php foreach ($row_slider1 as $key => $value) { ?>
				<div>
					<div class="img"><img src="<?=_upload_hinhanh_l.$value['thumb_vi']?>" alt=""></div>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="right_gt">
		<p class="clearfix"><?=$row_gioithieu['mota_'.$lang]?></p>
		<a class="xemthem_gt" href="gioi-thieu" title="<?=_xemthem?>"><?=_xemthem?></a>
	</div>
</div>

<link href="ajax_paging/ajax_paging.css" rel="stylesheet" type="text/css"/>
<div class="w_noibat content12">
	<div class="w_title_noibat clearfix">
		<span><?=_sanphamnoibat?></span>
		<ul class="clearfix">
			<?php foreach ($row_list as $key_list => $value_list) { ?>
				<li class="item_tabs <?php if($key_list == 0) { echo "active"; }?>" data-id="<?=$value_list['id']?>"><?=$value_list['ten_'.$lang]?></li>
			<?php } ?>
			<li class=""><a href="dich-vu" title="<?=_dichvu?> ++"><?=_dichvu?> ++</a></li>
		</ul>
	</div>
	<script>
	    function loadData(page,id_danhmuc){
	        $("#loadbody").fadeIn("fast");  
	        $.ajax
	        ({
	            type: "POST",
	            url: "ajax_paging/ajax_paging.php",
	            data: {page:page,id_danhmuc:id_danhmuc},
	            success: function(msg)
	            {
	                $("#loadbody").fadeOut("fast");
	                $('#content_data').html(msg);
					$('#content_data .pagination_ajax li.active').click(function(){
						var pager = $(this).attr("p");
						var id_danhmucr = $("input[name='id_current']").val();
						loadData(pager,id_danhmucr);
					});
	            }
	        });
	    }
	</script>
	<div id="content_data" data-idcur="all" class="clearfix">
		<script>
			$().ready(function(){
				loadData(1,"<?=$row_list[0]['id']?>");
			});
		</script>
	</div>
</div>