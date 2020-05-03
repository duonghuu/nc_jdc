<div class="logo"> <a href="#" target="_blank" onclick="return false;"> <img src="images/logo.png"  alt="" /> </a></div>
<div class="sidebarSep mt0"></div>
<ul id="menu" class="nav">
  	<li class="dash" id="menu1"><a class=" active" title="" href="index.php"><span>Trang chủ</span></a></li>

	<li class="categories_li <?php if($_GET['com']=='product' || $_GET['com']=='newsletter') echo ' activemenu' ?>" id="menu_1"><a href="" title="" class="exp"><span>Sản phẩm</span><strong></strong></a>
	    <ul class="sub">
	      	<li <?php if($_GET['act']=='man_list' && $_GET['type']=='product') echo ' class="this"' ?>><a href="index.php?com=product&act=man_list&type=product">Quản lý danh mục cấp 1</a></li>
	      	<li <?php if($_GET['act']=='man_cat' && $_GET['type']=='product') echo ' class="this"' ?>><a href="index.php?com=product&act=man_cat&type=product">Quản lý danh mục cấp 2</a></li>
	      	<li <?php if($_GET['act']=='man_item' && $_GET['type']=='product') echo ' class="this"' ?>><a href="index.php?com=product&act=man_item&type=product">Quản lý danh mục cấp 3</a></li>
	      	<li <?php if($_GET['act']=='man' && $_GET['type']=='product') echo ' class="this"' ?>><a href="index.php?com=product&act=man&type=product">Quản lý sản phẩm</a></li>
	      	<li <?php if($_GET['type']=='dh') echo ' class="this"' ?>><a href="index.php?com=newsletter&act=man&type=dh" title="">Đặt hàng</a></li>
	    </ul>
	</li>

	<li class="categories_li <?php if($_GET['com']=='baiviet' && $_GET['type']=='gioithieu') echo ' activemenu' ?>" id="menu_2"><a href="" title="" class="exp"><span>Giới thiệu</span><strong></strong></a>
	    <ul class="sub">
	      	<li <?php if($_GET['act']=='man_list' && $_GET['type']=='gioithieu') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man_list&type=gioithieu">Quản lý danh mục cấp 1</a></li>
	      	<li <?php if($_GET['act']=='man' && $_GET['type']=='gioithieu') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=gioithieu">Quản lý giới thiệu</a></li>
	    </ul>
	</li>

	<li class="categories_li <?php if($_GET['type']=='bannerhd' || $_GET['type']=='hoidong') 
	echo ' activemenu' ?>" id="menu_2hd">
		<a href="" title="" class="exp"><span>Hội đồng quản trị</span><strong></strong></a>
	    <ul class="sub">
	      	<li <?php if($_GET['act']=='man' && $_GET['type']=='hoidong') echo ' class="this"' ?>>
	      		<a href="index.php?com=baiviet&act=man&type=hoidong">Hội đồng quản trị</a></li>
	      	<li <?php if($_GET['type']=='banner') echo ' class="this"' ?>><a 
	      		href="index.php?com=bannerqc&act=capnhat&type=bannerhd" title="">Banner Hội đồng quản trị</a></li>
	    </ul>
	</li>

	<li class="categories_li <?php if($_GET['com']=='album' && $_GET['type']=='khachhang') echo ' activemenu' ?>" id="menu_3"><a href="" title="" class="exp"><span>Khách hàng</span><strong></strong></a>
	    <ul class="sub">
	      	<li <?php if($_GET['act']=='man_list' && $_GET['type']=='khachhang') echo ' class="this"' ?>><a href="index.php?com=album&act=man_list&type=khachhang">Quản lý danh mục cấp 1</a></li>
	      	<li <?php if($_GET['act']=='man_cat' && $_GET['type']=='khachhang') echo ' class="this"' ?>><a href="index.php?com=album&act=man_cat&type=khachhang">Quản lý danh mục cấp 2</a></li>
	      	<li <?php if($_GET['act']=='man' && $_GET['type']=='khachhang') echo ' class="this"' ?>><a href="index.php?com=album&act=man&type=khachhang">Quản lý khách hàng</a></li>
	    </ul>
	</li>

	<li class="categories_li <?php if($_GET['type']=='tintuc' || $_GET['type']=='gioithieu' || $_GET['type']=='tuyendung') echo ' activemenu' ?>" id="menu_bv"><a href="" title="" class="exp"><span>Bài viết</span><strong></strong></a>
	    <ul class="sub">
	      	<li <?php if($_GET['type']=='tintuc') echo'class="this"'?>><a href="index.php?com=baiviet&act=man&type=tintuc">Tin tức</a></li>
	      	<li <?php if($_GET['type']=='tuyendung') echo'class="this"'?>><a href="index.php?com=baiviet&act=man&type=tuyendung">Tuyển dụng</a></li>
	    </ul>
	</li>

	<li class="categories_li <?php if($_GET['com']=='info') echo ' activemenu' ?>" id="menu_tt"><a href="" title="" class="exp"><span>Trang tĩnh</span><strong></strong></a>
	    <ul class="sub">
	      	<li <?php if($_GET['type']=='bvgt') echo ' class="this"' ?>><a href="index.php?com=info&act=capnhat&type=bvgt">Bài viết trên Slider</a></li>
	      	<li <?php if($_GET['type']=='dichvu') echo ' class="this"' ?>><a href="index.php?com=info&act=capnhat&type=dichvu">Dịch vụ ++</a></li>
	     </ul>
	</li>

	<li class="template_li<?php if($_GET['com']=='setting' || $_GET['com']=='lkweb' || $_GET['com']=='newsletter' || $_GET['com']=='company' || $_GET['com']=='bannerqc' || $_GET['com']=='background' || $_GET['com']=='yahoo' || $_GET['com']=='dichnghia' || $_GET['com']=='chinhanh') echo ' activemenu' ?>" id="menu5"><a href="#" title="" class="exp"><span>Thông tin công ty</span><strong></strong></a>
	    <ul class="sub">
	    	<li <?php if($_GET['com']=='dichnghia') echo ' class="this"' ?>><a href="index.php?com=dichnghia&act=man" title="">Dịch nghĩa</a></li>
	      	<li <?php if($_GET['type']=='logo') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=logo" title="">Logo</a></li>
	      	<li <?php if($_GET['type']=='logo1') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=logo1" title="">Logo Slider</a></li>
	      	<li <?php if($_GET['type']=='banner') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=banner" title="">Banner</a></li>
	      	<li <?php if($_GET['type']=='favicon') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=favicon" title="">Favicon</a></li>
	      	<li <?php if($_GET['type']=='lienhe') echo ' class="this"' ?>><a href="index.php?com=company&act=capnhat&type=lienhe" title="">Liên hệ</a></li>
	      	<li <?php if($_GET['com']=='setting') echo ' class="this"' ?>><a href="index.php?com=setting&act=capnhat" title="">Cấu hình chung</a></li>
	      	<li <?php if($_GET['type']=='bg_slider') echo ' class="this"' ?>><a href="index.php?com=background&act=capnhat&type=bg_slider" title="">Background Slider</a></li>
	      	<li <?php if($_GET['type']=='bg_header') echo ' class="this"' ?>><a href="index.php?com=background&act=capnhat&type=bg_header" title="">Background Header</a></li>
	      	<li <?php if($_GET['com']=='chinhanh') echo ' class="this"' ?>><a href="index.php?com=chinhanh&act=man&type=chinhanh" title="">Chi nhánh</a></li>
	    </ul>
	</li>

  	<li class="gallery_li<?php if($_GET['com']=='photo' || $_GET['com']=='video' || $_GET['com']=='album') echo ' activemenu' ?>" id="menu7"><a href="#" title="" class="exp"><span>Media</span><strong></strong></a>
    	<ul class="sub">
    		<li <?php if($_GET['type']=='slider1') echo ' class="this"' ?>><a href="index.php?com=photo&act=man_photo&type=slider1" title="">Slider giới thiệu</a></li>
			<li <?php if($_GET['type']=='video') echo ' class="this"' ?>><a href="index.php?com=video&act=man&type=video" title="">Video</a></li>
    	</ul>
  	</li>
</ul>