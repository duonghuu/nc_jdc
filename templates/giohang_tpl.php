<?php if($_REQUEST[ 'command']=='delete' && $_REQUEST[ 'pid']>0){ remove_product($_REQUEST['pid']); } else if($_REQUEST['command']=='clear'){ unset($_SESSION['cart']); } ?>
<div class="content12 padding20">
    <h3 class="title_web"><span><?=_giohang?></span></h3>
    <div class="khung">
        <form name="form1" method="post">
            <input type="hidden" name="pid"/>
            <input type="hidden" name="command"/>
            <table class="tbl_cart">
                <tr class="title_cart">
                    <th><?=_stt?></th>
                    <th><?=_hinhanh?></th>
                    <th><?=_sanpham?></th>
                    <th><?=_dongia?></th>
                    <th><?=_soluong?></th>
                    <th><?=_tonggia?></th>
                    <th><?=_xoa?></th>
                </tr>
                <?php if(is_array($_SESSION[ 'cart'])){
                    $max=count($_SESSION[ 'cart']); 
                    for($i=0;$i<$max;$i++){
                        $pid=$_SESSION[ 'cart'][$i][ 'productid']; 
                        $q=$_SESSION[ 'cart'][$i][ 'qty']; 
                        $pname=get_product_name($pid); 
                        if($q==0) continue; ?>
                        <tr class="body_cart">
                            <td width="5%"><?=$i+1?></td>
                            <td width="20%"><img src="thumb/100x100/1/upload/product/<?=get_thumb($pid)?>" alt="<?=$pname?>"/></td>
                            <td width="30%">
                                <a class="name_pid" href="<?=changeTitle($pname)?>"><?=$pname?></a>
                            </td>
                            <td width="10%" class="update_gia_<?=$pid?>">
                                <?=number_format(get_price($pid, $q),0, ',', '.')?>&nbsp;VND
                            </td>
                            <td width="10%">
                                <i class="fa fa-minus-square giam_sl" name="<?=$pid?>" aria-hidden="true"></i>
                                <input type="number" name="<?=$pid?>" value="<?=$q?>" class="capnhat_sl capnhat_sl_<?=$pid?>"/>
                                <i class="fa fa-plus-square tang_sl" name="<?=$pid?>" aria-hidden="true"></i>
                            </td>
                            <td width="20%" class="capnhat_price_<?=$pid?>">
                                <?=number_format(get_price($pid, $q)*$q,0, ',', '.')?>&nbsp;VND
                            </td>
                            <td width="5%"><i class="fa fa-trash fa-lg" onclick="del(<?=$pid?>)" aria-hidden="true"></i></td>
                        </tr>
                    <?php } ?>
                    <tr class="price_cart">
                        <td colspan="7">
                            <?=_tonggia?> : <b class="capnhat_full"><?=number_format(get_order_total(),0, ',', '.')?>&nbsp;VND</b>
                        </td>
                    </tr>
                <?php } else { ?>
                    <tr><td colspan='6'><?=_bankhongcosanphamnaotronggiohang?></td></tr> 
                <?php } ?>
            </table>
            <input type="button" value="<?=_muatiep?>" onclick="window.location='trang-chu.html'" class="btn_cart">
            <input type="button" value="<?=_xoatatca?>" onclick="clear_cart()" class="btn_cart">
            <input type="button" value="<?=_thanhtoan?>" onclick="window.location='thanh-toan.html'" class="btn_cart">
            <div class="clear"></div>
        </form>
    </div>
</div>