<div class="w_menu">
    <div class="content12 clearfix">
        <nav class="menu_top">
            <ul class="clearfix">
                <li class="<?php if($_GET['com']==''){?>active<?php }?>"><a href="trang-chu" title="<?=_trangchu?>"><?=_trangchu?></a></li>
                <li class="<?php if($_GET['com']=='gioi-thieu'){?>active<?php }?>"><a href="gioi-thieu" title="<?=_gioithieu?>"><?=_gioithieu?></a>
                    <?php /* 
                    <?=fordacap('baiviet_list','','','','gioithieu')?> 
                    */?>
                    <?php 
                    $d->reset();
                    $sql = "select id, ten_$lang as ten, tenkhongdau from #_baiviet_list where hienthi=1 and type='gioithieu' order by stt";
                    $d->query($sql);
                    $danhmuc_cap1 = $d->result_array();
                    
                    $str='';
                    $str.='<ul>';
                    $str.='<li><a href="hoi-dong" title="HỘI ĐỒNG QUẢN TRỊ">HỘI ĐỒNG QUẢN TRỊ</a></li>';
                    foreach ($danhmuc_cap1 as $key_list => $value_list) {
                        $str.='<li><a href="'.$value_list["tenkhongdau"].'" title="'.$value_list["ten"].'">'.$value_list["ten"].'</a></li>';
                    }
                    $str.='</ul>';
                    echo $str;
                     ?>
                </li>
                <li class="<?php if($_GET['com']=='san-pham'){?>active<?php }?>"><a href="san-pham" title="<?=_sanpham?>"><?=_sanpham?></a>
                    <?=fordacap('product_list','product_cat','product_item','','product')?>
                </li>
                <li class="<?php if($_GET['com']=='khach-hang'){?>active<?php }?>"><a href="khach-hang" title="<?=_khachhang?>"><?=_khachhang?></a>
                    <?=fordacap('album_list','album_cat','','','khachhang')?>
                </li>
                <li class="<?php if($_GET['com']=='tuyen-dung'){?>active<?php }?>"><a href="tuyen-dung" title="<?=_tuyendung?>"><?=_tuyendung?></a></li>
                <li class="<?php if($_GET['com']=='lien-he'){?>active<?php }?>"><a href="lien-he" title="<?=_lienhe?>"><?=_lienhe?></a></li>
            </ul>
        </nav>
        <!-- Menu RB -->
        <div id="st-container" class="st-effect-1">
            <button class="site-nav__toggler" id="site-nav__toggler">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
            <nav class="st-effect-1 st-menu" id="menu-1">
                <h3>Menu</h3>
                <form id="frmSearch_menu" name="frmSearch" class="clearfix">
                    <input type="text" name="keywords" id="txtSearch" placeholder="<?=_timkiem?>..."/>
                    <button type="submit" name="btnSearch" id="btnSearch" value=""></button>
                </form>
                <ul class="act">
                    <li class="<?php if($_GET['com']==''){?>active<?php }?>"><a href="" title="<?=_trangchu?>"><?=_trangchu?></a></li>
                    <li class="<?php if($_GET['com']=='gioi-thieu'){?>active<?php }?>"><a href="gioi-thieu" title="<?=_gioithieu?>"><?=_gioithieu?></a>
                        <ul>
                            <?php foreach ($row_gtmenu as $key => $value) { ?>
                                <li><a href="<?=$value['tenkhongdau']?>"><?=$value['ten_'.$lang]?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="<?php if($_GET['com']=='san-pham'){?>active<?php }?>"><a href="san-pham" title="<?=_sanpham?>"><?=_sanpham?></a>
                        <?=fordacap('product_list','product_cat','product_item','','product')?>
                    </li>
                    <li class="<?php if($_GET['com']=='khach-hang'){?>active<?php }?>"><a href="khach-hang" title="<?=_khachhang?>"><?=_khachhang?></a>
                        <?=fordacap('album_list','','','','khachhang')?>
                    </li>
                    <li class="<?php if($_GET['com']=='tuyen-dung'){?>active<?php }?>"><a href="tuyen-dung" title="<?=_tuyendung?>"><?=_tuyendung?></a></li>
                    <li class="<?php if($_GET['com']=='lien-he'){?>active<?php }?>"><a href="lien-he" title="<?=_lienhe?>"><?=_lienhe?></a></li>
                </ul>
            </nav>
        </div>
        <div class="w_language_menu">
            <a href="ngon-ngu&lang=vi" title="Viet Nam"><img src="images/vi.png" alt="Vi"></a>
            <a href="ngon-ngu&lang=en" title="English"><img src="images/en.png" alt="En"></a>
        </div>
    </div>
</div>