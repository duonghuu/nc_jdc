<?php
	$type = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "";	
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$act = explode('_',$act);
	if(count($act>1)){
		$act = $act[1];
	} else {
		$act = $act[0];
	}
	switch($type){
		case 'product':
			switch($act){
				case 'list':
					$title_main = "Danh mục cấp 1";
					$config_images = "true";
					$config_mota= "false";
					$config_noibat = "true";
					$config_trangchu = "false";
					@define ( _width_thumb , 135 );
					@define ( _height_thumb , 135 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				case 'cat':
					$title_main = "Danh mục cấp 2";
					break;
				case 'item':
					$title_main = "Danh mục cấp 3";
					break;
				default:
					$title_main = "Sản phẩm";
					$config_list = "true";
					$config_cat = "true";
					$config_item = "true";
					$config_images = "true";
					$config_tieude = "true";
					$config_mota= "true";
					$config_noidung = "true";
					$config_noibat = "true";
					@define ( _width_thumb , 255 );
					@define ( _height_thumb , 255 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
				break;
		case 'khachhang':
			switch($act){
				case 'list':
					$title_main = "Danh mục cấp 1";
					$config_images = "false";
					@define ( _width_thumb , 300 );
					@define ( _height_thumb , 300 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				default:
					$title_main = "Khách hàng";
					$config_list = "true";
					$config_images = "true";
					$config_tieude = "true";
					$config_mota= "false";
					$config_noidung = "true";
					$config_noibat = "false";
					@define ( _width_thumb , 300 );
					@define ( _height_thumb , 300 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
				break;
			case 'hoidong':
				switch($act){
					case 'list':
						$title_main = "Danh mục cấp 1";
						$config_images = "false";
						@define ( _width_thumb , 300 );
						@define ( _height_thumb , 300 );
						@define ( _style_thumb , 1 );
						$ratio_ = 1;
						break;
					default:
						$title_main = "Hội đồng quản trị";
						$config_list = "false";
						$config_images = "true";
						$config_tieude = "true";
						$config_mota= "true";
						$config_noidung = "true";
						$config_noibat = "true";
						@define ( _width_thumb , 300 );
						@define ( _height_thumb , 300 );
						@define ( _style_thumb , 1 );
						$ratio_ = 1;
						break;
					}
					@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
					break;
		case 'gioithieu':
			switch($act){
				case 'list':
					$title_main = "Danh mục cấp 1";
					$config_images = "false";
					@define ( _width_thumb , 300 );
					@define ( _height_thumb , 300 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				default:
					$title_main = "Giới thiệu";
					$config_list = "true";
					$config_images = "true";
					$config_tieude = "true";
					$config_mota= "true";
					$config_noidung = "true";
					$config_noibat = "true";
					@define ( _width_thumb , 300 );
					@define ( _height_thumb , 300 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
				break;
		case 'tintuc':
			$title_main = "Tin tức";
			$config_images = "true";
			$config_tieude = "true";
			$config_mota= "true";
			$config_noidung = "true";
			$config_noibat = "true";
			@define ( _width_thumb , 300 );
			@define ( _height_thumb , 300 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'tuyendung':
			$title_main = "Tuyển dụng";
			$config_images = "true";
			$config_tieude = "true";
			$config_mota= "true";
			$config_noidung = "true";
			$config_noibat = "false";
			@define ( _width_thumb , 300 );
			@define ( _height_thumb , 300 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'video':
		    $title_main = "Video";
			$links_ = "true";
			break;
		case 'yahoo':
			$config_images = "true";
			@define ( _width_thumb , 120 );
			@define ( _height_thumb , 110 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'album':
			$title_main = "Album";
			$config_images = "true";
			$config_list = "false";
			$config_mota= "false";
			$config_noibat= "true";
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			@define ( _width_thumb , 215 );
			@define ( _height_thumb , 340 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;

		//-------------info------------------
		case 'bvgt':
			$title_main = 'Giới thiệu';
			$config_tieude = 'true';
			$config_images = 'true';
			$config_mota = 'true';
			$config_noidung = 'true';
			@define ( _width_thumb , 245 );
			@define ( _height_thumb , 165 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'dichvu':
			$title_main = 'Dịch vụ ++';
			$config_tieude = 'true';
			$config_images = 'true';
			$config_mota = 'false';
			$config_noidung = 'true';
			@define ( _width_thumb , 135 );
			@define ( _height_thumb , 135 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'tags':
			$title_main = 'tags';
			$config_ten = 'true';
			break;
		case 'lienhe':
			$title_main = 'Liên hệ';
			break;
		case 'banner':
			$title_main = 'Banner';
			@define ( _width_thumb , 248 );
			@define ( _height_thumb , 58 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_ = 1;
			break;
		case 'logo':
			$title_main = 'Logo';
			@define ( _width_thumb , 173 );
			@define ( _height_thumb , 103 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'logo1':
			$title_main = 'Logo Slider';
			@define ( _width_thumb , 185 );
			@define ( _height_thumb , 185 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'favicon':
			$title_main = 'Favicon';
			@define ( _width_thumb , 40 );
			@define ( _height_thumb , 40 );
			@define ( product_style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'bannerqc':
			$title_main = 'Banner Quảng cáo';
			$config_mota = "false";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 103 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		case 'bg_slider':
			$title_main = 'Background Slider';
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 575 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'bg_header':
			$title_main = 'Background Header';
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 180 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		//-------------photo------------------
		case 'slider':
			$title_main = "Hình ảnh slider";
			$config_ten = 'true';
			$config_mota= 'false';
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 575 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;
		case 'slider1':
			$title_main = "Slider giới thiệu";
			$config_ten = 'true';
			$config_mota= 'false';
			@define ( _width_thumb , 515 );
			@define ( _height_thumb , 390 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "false";
			break;
		case 'dknt':
		    $title_main = "Đăng ký nhận tin";
			break;
		case 'dh':
		    $title_main = "Đặt hàng";
			break;
		//--------------defaut---------------
		default: 
			$source = "";
			$template = "index";
			break;
	}
?>