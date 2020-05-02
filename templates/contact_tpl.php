<div class="content12">
	<div class="w_lienhe clearfix">
		<div class="w_info_lienhe">
			<h3 class="title_lienhe"><?=_thongtinlienhe?></h3>
			<div class="noidung_content"><?=$row_detail['noidung_'.$lang]?></div>
		</div>
		<div class="w_form_lienhe">
			<h3 class="title_lienhe"><?=_formlienhe?></h3>
			<form id="frmContact" method="post" name="frm" action="lien-he" enctype="multipart/form-data">
				<div class="item_validate input">
					<input type="text" name="ten" placeholder="<?=_hovaten?> (*)">
				</div>
				<div class="item_validate input">
					<input type="text" name="email" placeholder="<?=_mail?> (*)">
				</div>
				<div class="item_validate input">
					<input type="text" name="dienthoai" placeholder="<?=_phone?> (*)">
				</div><div class="clear"></div>
				<div class="item_validate textarea">
					<textarea name="noidung" rows="8" placeholder="<?=_noidung?> (*)"></textarea>
				</div>
				<div class="g-recaptcha" data-sitekey="6Ld4v0AUAAAAAFvCtXMRRMtaQzW99X-ftFwKiAiP"></div>
	            <button class="btn_contact transAll600" onclick="js_submit12();"><?=_gui?></button>
	            <button class="btn_contact transAll600" type="reset"><?=_huy?></button>        
		    </form>
		</div>
	</div>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD5Mevy_rl8U4ZyBB8i5jmdxfvb9Cg5UoE"></script>
           <script language="javascript" src="js/map.js"></script>
		<div id="gmap" style="height: 600px;width: 100%;margin-bottom: 10px;" class="col-md-12 col-sm-12 col-xs-12 vk" >
		</div>
        		<script>
               var maplace = new Maplace({
                 map_div: '#gmap',
                controls_div: '#controls',
                controls_type: 'dropdown',
                 type: 'marker',
                 controls_on_map: false
             });
    	
			 $('#controls a').click(function(e) {
			 	e.preventDefault();
			 	var index = $(this).attr('data-load');
				
			 });
			 function showGroup(s) {
			 	$.getJSON('geomap.php', { type: 2,pro: s }, function(data) {
			 		maplace.Load({
			 			locations: data.points,
	 			type: 'marker',
			 			 view_all_text: data.title,
			 			force_generate_controls: false,
			 			mapTypeId: google.maps.MapTypeId.ROADMAP
			 		});
			 	});
			 }
			 $(function(){
			 	$('#cbo_map').change(function(e) {
			 		e.preventDefault();
			 		 var s = $(this).val();
			 		showGroup(s);
			 	});			
			 	showGroup($('#cbo_map').val());
				
			 });
			
			 $(function(){
			 	$('.view-more-estate').click(function(){
			 		 $('i.fa',this).toggleClass("fa-sort-asc");
			 		$('.other-estate-hiden',$(this).attr('href') ).slideToggle();
			 		return false;
			 	});
			}); 
    </script>