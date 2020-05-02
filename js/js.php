<!-- Default -->
<div id="fb-root"></div>
<script type="text/javascript">
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDIcgayYKPPDnRhRPUdgsCi63XC3-VB12k"></script>
<script src="js/slick.min.js"></script>
<script src="js/jquery.simplyscroll.js"></script>
<script src="js/enscroll-0.5.2_menu_bar.min.js"></script>
<script src="js/script_menubar.js"></script>
<script src="js/magiczoomplus.js"></script>
<script src="js/my_script.js"></script>
<script src="js/jquery.nivo.slider.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/wow.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/jPages.js"></script>

<!-- Slider gioi thieu -->
<script src="js/vortex/js/jquery.vortex.min.js"></script>

<!-- Template -->
<?php if($template == 'album_detail') { ?>
	<script src="js/masory/js/modernizr.custom.js"></script>
	<script src='js/jquery.photobox.js'></script>
	<script src="js/masory/js/masonry.pkgd.min.js"></script>
	<script src="js/masory/js/imagesloaded.js"></script>
	<script src="js/masory/js/classie.js"></script>
	<script src="js/masory/js/AnimOnScroll.js"></script>
<?php } ?>

<script type="text/javascript">
	$(document).ready(function(e) {
		$('img').each(function(index, element) {
			if(!$(this).attr('alt') || $(this).attr('alt')=='') {
				$(this).attr('alt','<?=$row_setting['title']?>');
			}
		});
		$(window).scroll(function(){
			if($(this).scrollTop()!=0){
				$("#noop-top").fadeIn();
			}else{
				$("#noop-top").fadeOut();
			}
		});
		$("#noop-top").click(function(){
			$("body,html").animate({scrollTop:0},1000);
			return false;
		})
		$('#slider').nivoSlider({effect: 'random', slices: 15, boxCols: 8, boxRows: 4, animSpeed: 1000, pauseTime: 5000, startSlide: 0, directionNav: false, controlNav: false, controlNavThumbs: false, pauseOnHover: true, manualAdvance: false, prevText: 'Prev', nextText: 'Next', randomStart: false, beforeChange: function(){}, afterChange: function(){}, slideshowEnd: function(){}, lastSlide: function(){}, afterLoad: function(){} });
		$('#st-container .site-nav__toggler').click(function(){
			if($("#st-container").hasClass("st-menu-open")){
				$("#st-container").removeClass('st-menu-open');
			} else $("#st-container").addClass('st-menu-open');
			if($(this).hasClass("site-nav__toggler--active")){
				$(this).removeClass('site-nav__toggler--active');
			} else $(this).addClass('site-nav__toggler--active');
			if($('.site-cover').hasClass("site-cover--active")){
				$('.site-cover').removeClass('site-cover--active');
			} else $('.site-cover').addClass('site-cover--active');
		});
		$menu = $("#main-nav").clone();
		$menu.removeAttr("id");
		$menu.find(".no-index").remove();
		$(".st-menu .act").append($menu);
		$menu = $(".st-menu .act");
		$menu.find("li").each(function(){
			if($(this).find("ul").length){
				$(this).addClass("has-child");
				$(this).find("a").first().append("<span class='toggle-menu'></span>");
			}
		})
		$(".st-menu .toggle-menu").click(function(){
			if(!$(this).hasClass("active")){
				$(this).parent().parent().find("ul").first().slideDown();
				$(this).addClass("active");
			}else{
				$(this).parent().parent().find("ul").first().slideUp();
				$(this).removeClass("active");
			}
			return false;
		})
		<?php if($template == 'contact') { ?>
			function initialize_map() {var myLatlng = new google.maps.LatLng(<?=$row_setting['toado']?>); var mapOptions = {zoom: 15, center: myLatlng, scrollwheel: false, }; var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions); var contentString = "<table style='text-align:left; font-weight:100;'><tr><th style='font-size:16px; color:#039BB2; font-weight:bold; text-transform: uppercase;'><?=$row_setting['ten_'.$lang]?></th></tr><tr><th><?=_diachi?> : <?=$row_setting['diachi_'.$lang]?></th></tr><tr><th><?=_dienthoai?>: <?=$row_setting['dienthoai']?></th></tr><tr><th>Email : <?=$row_setting['email']?></th></tr></table>"; var infowindow = new google.maps.InfoWindow({content: contentString }); var marker = new google.maps.Marker({position: myLatlng, map: map, title: "<?=$row_setting["ten_".$lang]?>"}); infowindow.open(map, marker); } google.maps.event.addDomListener(window, 'load', initialize_map);
		<?php } ?>
		<?php if($template == 'album_detail') { ?>
			!(function(){
				$('#grid').photobox('a', { thumbs:true, loop:false });
			})();
			new AnimOnScroll( document.getElementById( 'grid' ), {
				minDuration : 0.3,
				maxDuration : 0.7,
				viewportFactor : 0.2
			});
		<?php } ?>
		<?php if($template == 'contact') { ?>
			$('#frmContact').validate({
				rules: {
					ten: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
					dienthoai: {
						required: true,
						number: true,
						digits: true,
						maxlength: 15
					},
					noidung: {
						required: true
					}
				},
				messages: {
					ten: {
						required: "Xin vui lòng nhập tên!"
					},
					email: {
						required: "Xin vui lòng nhập Email!",
						email: "Email sai định dạng!"
					},
					dienthoai: {
						required: "Xin vui lòng nhập Số điện thoại!",
						number: "Số điện thoại bắt buộc là kiểu số!",
						digits: "Số điện thoại không được nhập số âm!",
						maxlength: "Số điện thoại không được quá 15 ký tự!"
					},
					noidung: {
						required: "Xin vui lòng nhập nội dung!"
					}
				},
				submitHandler: function(form) {
    				form.submit();
  				}
			});
		<?php } ?>
		<?php if($template == 'product_detail') { ?>
			$('#tabs li').click(function(event) {
				$('#tabs li').removeClass('active');
				$(this).addClass('active');
				var id = $(this).attr('data-tab');
				$('.item_tab_detail').removeClass('active');
				$(id).addClass('active');
				return false;
			});
		<?php } ?>
	});
</script>
<?php 
	$arrTD=explode(',', $row_setting['toado']);
	$arrTD[0]=trim($arrTD[0])+0.002;
?>
<!-- Custom -->
<script type="text/javascript">
	$(document).ready(function() {

	//Map
		if($('#map_canvas1').length) {
		   var map;
		   var infowindow;
		   var marker= new Array();
		   var old_id= 0;
		   var infoWindowArray= new Array();
		   var infowindow_array= new Array();
		   function initialize1(){
		   var defaultLatLng = new google.maps.LatLng(<?=$arrTD[0]?>,<?=$arrTD[1]?>);
		   var myOptions= {
		   zoom: 16,
		   center: defaultLatLng,
		   scrollwheel : false,
		   mapTypeId: google.maps.MapTypeId.ROADMAP
		   };
		   map = new google.maps.Map(document.getElementById("map_canvas1"), myOptions);map.setCenter(defaultLatLng);

		   var arrLatLng = new google.maps.LatLng(<?=$row_setting['toado']?>);
		   infoWindowArray[7895] = '<div class="map_description"><div class="map_title"><h2 style="color:green;font-size:16px;font-weight:bold;"><?=$row_setting["ten_$lang"]?></h2></div><b><?=_diachi?>:</b> <?=$row_setting["diachi_$lang"]?><br><b><?=_dienthoai?>: </b><?=$row_setting["dienthoai"]?><br><b>Email : </b><?=$row_setting["email"]?></div>';
		   loadMarker(arrLatLng, infoWindowArray[7895], 7895);
		   id=7895;
		   	if (old_id > 0) infowindow_array[old_id].close();infowindow_array[id].open(map, marker[id]);old_id = id;
			}
		   function loadMarker(myLocation, myInfoWindow, id){marker[id] = new google.maps.Marker({position: myLocation, map: map, visible:true,animation:google.maps.Animation.BOUNCE});
		   var popup = myInfoWindow;infowindow_array[id] = new google.maps.InfoWindow({ content: popup});google.maps.event.addListener(marker[id], 'mouseover', function() {if (id == old_id) return;if (old_id > 0) infowindow_array[old_id].close();infowindow_array[id].open(map, marker[id]);old_id = id;});google.maps.event.addListener(infowindow_array[id], 'closeclick', function() {old_id = 0;});}
		   
		   function moveToMaker(id){var location = marker[id].position;map.setCenter(location);
		   	if (old_id > 0) 
		   		infowindow_array[old_id].close();
		   	infowindow_array[id].open(map, marker[id]);old_id = id;
		   }
		   google.maps.event.addDomListener(window, "load", initialize1);
		}

	//SimplyScroll
		$("#scroller").simplyScroll({orientation:'vertical',customClass:'vert',auto:true});

	//WOW animate
		wow = new WOW({ animateClass: 'animated', offset: 100, callback: function(box) { console.log("WOW: animating <" + box.tagName.toLowerCase() + ">") } }); wow.init();

	//Fixed MENU
		$(window).scroll(function(){
			var cach_top = $(window).scrollTop();
			var h_header = $('.w_header').height();
			var h_menu = $('.w_menu').height();
			var total_height = h_header + h_menu;
			if(cach_top > total_height){
				$('.w_menu').addClass('w_menu_fixed');
			} else {
				$('.w_menu').removeClass('w_menu_fixed');
			}
		});

	//Slick
		$(".slick_img_lq").slick({
			dots: false,
			infinite: true,
			slidesToShow: 5,
			slidesToScroll: 1,
			vertical: false,
			autoplay:true,
			arrows: true,
			rows: 1
		});
		$('.slider-for').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			asNavFor: '.slider-nav'
		});
		$('.slider-nav').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			asNavFor: '.slider-for',
			dots: false,
			centerMode: false,
			autoplay:true,
			focusOnSelect: true,
			responsive: [
				{
				  breakpoint: 1050,
			      	settings: {
			        	slidesToShow: 2,
			        	slidesToScroll: 1,
			        	infinite: true,
			        	dots: false
			      	}
				},
				{
				  breakpoint: 768,
			      	settings: {
			        	slidesToShow: 3,
			        	slidesToScroll: 1,
			        	infinite: true,
			        	dots: false
			      	}
				},
				{
				  breakpoint: 500,
			      	settings: {
			        	slidesToShow: 2,
			        	slidesToScroll: 1,
			        	infinite: true,
			        	dots: false
			      	}
				}
			]
		});
		$(".slick_ver_3").slick({
			dots: false,
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			vertical: true,
			autoplay:true,
			arrows: false,
			rows: 1
		});
		$(".slick_video").slick({
			dots: false,
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			vertical: false,
			autoplay:true,
			arrows: false,
			rows: 1
		});
		$(".slick_4").slick({
			dots: false,
			infinite: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			vertical: false,
			autoplay:true,
			arrows: false,
			rows: 1
		});
		$(".slick_1").slick({
			dots: false,
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			vertical: false,
			autoplay:true,
			arrows: false,
			rows: 1
		});

	//Search
	    $('#frmSearch').submit(function(){
			var keywords = $("input[name='keywords']").val();
			if(!keywords){
				alert('<?=_banchuanhaptukhoa?>');
				$("input[name='keywords']").focus();
			} else { 
				window.location.href="tim-kiem&keywords="+keywords;
			}
			return false;
		})

	//Newsletter
		$('#frmdknt').submit(function(event) {
			var email = $("input[name='email']").val();
			var type = $("input[name='type']").val();
			$.ajax ({
				type: "POST",
				url: "ajax/dangky_email.php",
				data: {email:email,type:type},
				success: function(result) {
					if(result==0){
						$('.dangkymail input').attr('value','');
						alert('<?=_chucmungbandadangkythanhcong?>');
						$('.dangkymail input').attr('value','');
					} else if(result==1){
						alert('<?=_emaildaduocdangky?>');
						$('.dangkymail input').attr('value','');
					} else if(result==2){
						alert('<?=_dkkthanhcong?>');
					}
				}
			});
			return false;
		});
	});

	//Chat FB
		$(".chat_fb").click(function() {
			$('.fchat').toggle('slow');
		});

	//Change Video
		function changevideo(id){
			/*var id = $('#listVideo option:selected').attr('value');*/
			$.ajax({
				url:'ajax/load_video.php',
				type:'post',
				data:'id='+id,
				async:true,
				success:function(result){
					$('.w_iframe').html(result);
				}
			});
		}
</script>
<script>
	$(document).ready(function() {
		$('.item_tabs').click(function(e) {
			$('.item_tabs').removeClass('active');
			$(this).addClass("active");
			var id_danhmuc = $(this).attr('data-id');
			loadData(1,id_danhmuc);
		});
	});
	$(window).load(function() {
		$('#vortex').vortex({
			initialPosition: 270,
			speed: 300,
			deepFactor: 0
		});
	});
</script>