<?php 
//function get video youtube
function get_video_youtube($width=2,$height=1,$select=true,$auto=false ){
	global $d;
	$ratio = round($height/$width*100,2);
	//get database
	$sql_video = "select ten_vi as ten,photo,links from #_video where type='video' and hienthi=1  order by stt,id desc";
	$d->query($sql_video);
	$video = $d->result_array();
	$chuoi=explode("=",$video[0]['links']);
	//showtext div load
	$showtext .= '<div style="padding-bottom: '.$ratio.'%;position:relative;width:100%;height: 0;" id="box_video" data-id="'.$chuoi[1].'" data-width="'.$width.'" data-height="'.$height.'" data-auto="'.$auto.'" ></div>';
	if($select){
		$showtext .= '<div class="select_video"><select width="100%" id="video_lienquan">';
		$showtext .='<option value="">Video khác</option>';
		for ($i=0,$count=count($video); $i < $count; $i++) { 
			$chuoi=explode("=",$video[$i]['links']);
			$showtext .='<option value="'.$chuoi[1].'">'.$video[$i]['ten'].'</option>';
		}
		$showtext .='</select></div>';
	}
	//script
	$showtext.='<script>$(function(){
		var o=$("#box_video").data("id"),d=$("#box_video").data("width"),a=$("#box_video").data("height");
		$("#box_video").load("ajax/load_video.php?id="+o+"&width="+d+"&height="+a);
		$("#video_lienquan").change(function(){
			var i=$(this).val();
			$("#box_video").load("ajax/load_video.php?id="+i);
		});});</script>';
	/*copright by bossini - M.Tân - tan1993.nina@gmail.com */
	echo $showtext;
}
function get_video_youtube_2($width=2,$height=1,$select=true,$auto=false ){
	global $d;
	$ratio = round($height/$width*100,2);
	//get database
	$sql_video = "select ten_vi as ten,photo,links from #_video where type='video' and hienthi=1  order by stt,id desc";
	$d->query($sql_video);
	$video = $d->result_array();
	$chuoi=explode("=",$video[0]['links']);
	//showtext div load
	$showtext .= '<div style="padding-bottom: '.$ratio.'%;position:relative;width:100%;height: 0;" id="box_video" data-id="'.$chuoi[1].'" data-width="'.$width.'" data-height="'.$height.'" data-auto="'.$auto.'" ></div>';
	if($select){
		$showtext .= '<div class="select_video owl-carousel-video">';
		for ($i=0,$count=count($video); $i < $count; $i++) { 
			$chuoi=explode("=",$video[$i]['links']);
			$showtext .='<div class="video_thumb" data-id="'.$chuoi[1].'">';
			$showtext .='<img src="http://img.youtube.com/vi/'.$chuoi[1].'/default.jpg" border="0" align="left" />';
			$showtext .='</div>';
		}
		$showtext .='</div>';
	}
	//script
	$showtext.='<script>$(function(){
		var o=$("#box_video").data("id"),d=$("#box_video").data("width"),a=$("#box_video").data("height");
		$("#box_video").load("ajax/load_video.php?id="+o+"&width="+d+"&height="+a);
		$(".video_thumb").click(function(){
			var i=$(this).data("id");
		$("#box_video").load("ajax/load_video.php?id="+i);
		});
	});</script>';
	/*copright by bossini - M.Tân - tan1993.nina@gmail.com */
	echo $showtext;
}
//function load social
function get_social($url,$type="share",$width="100%",$height="auto"){
	switch ($type) {
		case 'share':
			if($url=='') $url= getCurrentPageURL(); 
			$showtext = '<div class="clear" style="text-align:right" id="share_social" data-url="'.$url.'" ></div>';
			$showtext.='<script>$(function(){var a=!1;$(window).scroll(function(){$(window).scrollTop()>1&&!a&&($("#share_social").load("ajax/load_share.php?url="+$("#share_social").data("url")),a=!0)})});</script>';
			break;
		case 'fanpage':
			if($url=='') $url= "https://www.facebook.com/facebook";
			$showtext = '<div id="fanpage" data-url="'.$url.'" data-width="'.$width.'" data-height="'.$height.'" ></div>';
			$showtext.='<script>$(function(){ $("#fanpage").load("ajax/load_fanpage.php?url="+$("#fanpage").data("url")+"&width="+$("#fanpage").data("width")+"&height="+$("#fanpage").data("height"))});</script>';
			break;
		case 'comment':
			if($url=='') $url= getCurrentPageURL();
			$showtext = '<div id="comment" data-url="'.$url.'" ></div>';
			$showtext.='<script>$("#comment").load("ajax/load_comment.php?url="+$("#comment").data("url"));</script>';
			break;
		default:
			if($url=='') $url= getCurrentPageURL();
			$showtext = '<div class="clear" style="text-align:right" id="share_social" data-url="'.$url.'" ></div>';
			$showtext.='<script>$(function(){var a=!1;$(window).scroll(function(){$(window).scrollTop()>1&&!a&&($("#share_social").load("ajax/load_share.php?url="+$("#share_social").data("url")),a=!0)})});</script>';
			break;
	}
	/*copright by bossini - M.Tân - tan1993.nina@gmail.com */
	echo $showtext;
}
//get map google api
function get_mapapi($width=2,$height=1,$coor='',$zoom=16){
	$ratio = round($height/$width*100,2);
	$showtext ='<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>';
	$showtext .='<div style="padding-bottom:'.$ratio.'%;position:relative;width:100%;height: 0"><div id="map_canvas" data-coor="'.$coor.'" data-zoom="'.$zoom.'" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;"></div></div>';
	$showtext .='<script>$("#map_canvas").load("ajax/load_map.php?coor="+$("#map_canvas").data("coor")+"&zoom="+$("#map_canvas").data("zoom"));</script>';
	echo $showtext;
}
//get url now
?>