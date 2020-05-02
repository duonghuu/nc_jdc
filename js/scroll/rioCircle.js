 //Document by Mrr.Rio - nam.le.fat@gmail.com
 $.fn.InitRio=function(options){
	var defaults={
		radius:800
	}
	var options=$.extend(defaults,options);
    var angles = [90, 54, 18, 342, 306, 270, 234, 198, 162, 126];
    var timer;
	var flag=true;
	var flag2;
	var timerBG;
	var timedelay;
	var timestart;
	var auto1;
	var auto2;
    var rio_circle = function(){
		$j=0;
        $.each($('.r-carousel li'), function(idx, val){ 
		$j++;
            var rad = angles[idx] * (Math.PI / 180);
            $(val).css({
                left: Math.cos(rad) * 480  + 'px',
                top: 500 * (0.062 - Math.sin(rad))  + 'px'
            });
			if(flag==true){
				angles[idx]++;
			}else{
				angles[idx]--;
			}	
        });
    }
	/*function runToYou(div){
		var speed=10;
		if((div).position().top>0){
			speed=0;
		}
		timer = setInterval(function(){
			if($(div).position().left==0 && $(div).position().top <0 ){
				clearInterval(timer);
			}else{
				rio_circle();
			};
		},speed);
	}*/
	function bg_riocirle(){
		 
		if($('.s-bg-random div').css('visibility')=="visible"){
			$('.s-bg-random div').removeClass('animation-zoom');
			$('.s-bg-random div').addClass('animation-zoomout');	
			timmerBG=setTimeout(function(){
				$('.s-bg-random div').addClass('animation-visibility-h');
				clearTimeout(timmerBG);
				timmerBG=setTimeout(function(){
				$('.s-bg-random div').removeClass('animation-zoomout');
				$('.s-bg-random div').removeClass('animation-visibility-h');
				$('.s-bg-random div').addClass('animation-zoom');
				clearTimeout(timmerBG);
				},100);
			},500);
			
		}else{
			$('.s-bg-random div').removeClass('animation-zoomout');
			$('.s-bg-random div').removeClass('animation-visibility-h');
			$('.s-bg-random div').addClass('animation-zoom');
			
		} 
	}
	
	function display_element(){
		$.each($('.r-carousel li'), function(idx, val){
			if($(this).hasClass('active')){
				setActiveElement(idx);
				setActiveMenu(idx);
			}
		});
	}
	var tick;
	var tick2;
	var tick3;
	function setActiveElement(idx){
		 $('.s-element .se').removeClass('active');	  
		 $.each($('.s-element .se'), function(idxs, value){	 
			if(idxs==idx){ 
				$(this).animate({opacity:0},500);
				$(this).animate({opacity:1},1000);
				$(this).addClass('active');
				$(this).addClass('animation-zoom');
				tick=setTimeout(function(){
					$('.s-element .se span:nth-of-type(2) img').addClass('animation-bottomTo');
				},1000);
				tick2=setTimeout(function(){
					$('.s-element .se span:nth-of-type(1) img').addClass('animation-bottomTo');
				},1500);
				tick3=setTimeout(function(){
					$('.s-element .se span:nth-of-type(3) img').addClass('animation-bottomTo');
				},2000);
			}else{
				//clearTimeout(tick);
				//clearTimeout(tick2);
				//clearTimeout(tick3);
				$(this).animate({opacity:0},100);
				$(this).removeClass('animation-zoom');
				$('.s-element .se span:nth-of-type(2) img').removeClass('animation-bottomTo');
				$('.s-element .se span:nth-of-type(1) img').removeClass('animation-bottomTo');
				$('.s-element .se span:nth-of-type(3) img').removeClass('animation-bottomTo');
			}
		 });
	}
	function setActiveMenu(idx){
		 $('.r-circle-Menu li').removeClass('active');	  
		 $.each($('.r-circle-Menu li'), function(idxs, value){	 
			if(idxs==idx){
				$(this).addClass('active');
				 
			} 
		 });
	}
	function menuClick(idx){
		$.each($('.r-carousel li'), function(idxs, val){
			 if(idxs==idx){
				 $('.circle_bang ul li').removeClass('circle_bang_eff');
				clearInterval(timer);
				clearInterval(timedelay);
				var left=$(this).position().left;  
				var div=$(this); 
				$(".r-carousel li").removeClass('active');
				$(this).addClass('active');
				if(left<0){
				flag=false;
				}else{
				flag=true;
				}
				runToYou(div);
				bg_riocirle();
				display_element();
			}
		});
	}
	function autoBang(){
		$('.circle_bang ul li').removeClass('circle_bang_eff');
		clearInterval(timer);
			timer=setInterval(function(){
				rio_circle(); 
				$.each($('.r-carousel li'), function(idxs, val){
					if($(this).position().left==0 && $(this).position().top <0 ){
						$(".r-carousel li").removeClass('active');
						$(this).addClass('active');	 
						bg_riocirle();
						display_element();
						clearInterval(timer);
						//clearInterval(timedelay);
					}
				});
				
			},10);	
	}

	function backnextBang(){
		$('.circle_bang ul li').removeClass('circle_bang_eff');
		//alert(flag);
			clearInterval(timer);
			clearInterval(timedelay);
			timer=setInterval(function(){
				rio_circle(); 
				$.each($('.r-carousel li'), function(idxs, val){
					if($(this).position().left==0 && $(this).position().top <0 ){
						$(".r-carousel li").removeClass('active');
						$(this).addClass('active');
						bg_riocirle();
						display_element();
						clearInterval(timer);
					}
				});
			},10);	
	}
	/////
	timestart=setTimeout(function(){
		
		timedelay=setInterval(function(){
			autoBang();
			
		},8000);
	
	},8000);
	
	$('.n-prev').click(function(){
		 
		flag=false;
		backnextBang();	
	
	});
	$('.n-next').click(function(){
		  
		flag=true;
		backnextBang();	

	});
	//$('.circle_center').mouseleave(function(){
//		timedelay=setInterval(function(){
//			autoBang();
//		},5000);
//	});
	//$('.circle_center').mouseenter(function(){
//		    clearInterval(timer);
//			clearInterval(timedelay);
//	});
	//autoBang();
	// timer = setInterval(function(){rio_circle()},10);
	auto1=setTimeout(function(){
		$('.r-carousel li').css('opacity',1);
		$('.circle_bang ul').addClass('r-bangef');
		$('.circle_bang ul li').addClass('circle_bang_eff');
		rio_circle();
		
		auto2=setTimeout(function(){
			$('.s-element .s1').animate({opacity:0},100);
			$('.s-element .s1').animate({opacity:1},500);
			$('.s-element .s1').addClass('active');
			$('.s-element .s1 ').addClass('animation-zoom');
				window.setTimeout(function(){
					$('.s-element .s1 span:nth-of-type(2) img').addClass('animation-opacity');
				},100);
				window.setTimeout(function(){
					$('.s-element .s1 span:nth-of-type(1) img').addClass('animation-opacity');
				},1000);
				window.setTimeout(function(){
					$('.s-element .s1 span:nth-of-type(3) img').addClass('animation-opacity');
				},1400);
				bg_riocirle();
			},2500);
	},500);
	 
	$('.r-carousel li').click(function(){
			$('.circle_bang ul li').removeClass('circle_bang_eff');
			clearInterval(timer);
			clearInterval(timedelay);
			clearInterval(timestart);
			clearInterval(timerBG);
			clearInterval(auto2);
			clearInterval(auto2);
			var left=$(this).position().left;  
			var div=$(this); 
			$(".r-carousel li").removeClass('active');
			$(this).addClass('active');
			if(left<0){
			flag=false;
			}else{
			flag=true;
			}
			runToYou(div);
			bg_riocirle();
			display_element();
	});
	
	$('.r-circle-Menu li a').click(function(){
		var idx=$(this).attr('index');
		 
		menuClick(idx);
	
	});
	
	$('.s-element .se').mouseenter(function(){
	 	$(this).find('.s-element-view').css('visibility','visible');
		$(this).find('.s-element-view').css('z-index','150');
	});
	$('.s-element .se').mouseleave(function(){
	 	$(this).find('.s-element-view').css('visibility','hidden');
		$(this).find('.s-element-view').css('z-index','-1');
	});
	 
	 
	 $(window).resize(function() {
	 		clearInterval(timer);
			clearInterval(timedelay);
			clearInterval(timestart);
			clearInterval(timerBG);
			clearInterval(auto2);
			clearInterval(auto1);
	 
	 })
 }
 
 
$(document).ready(function(e) {
	
	$(".rio_cicle").InitRio({
		radius:$('.rio_cicle .circle_bang').height()
	});

	//$(window).resize(function() {
//		$(".rio_cicle").InitRio().destroy()
//		$(".rio_cicle").InitRio({
//			radius:400
//		});
//		 
//	});
});