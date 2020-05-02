<form name="form_giohang" action="index.php?com=thanh-toan" method="get">
	<input type="hidden" name="com" value="thanh-toan" />
	<input type="hidden" name="pid" />
    <input type="hidden" name="command" />
</form>
<?php
	if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_pro_thanh($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
?>
<?php 
    $d->reset();
    $d->setTable('place_city');
    $d->setWhere('hienthi','1');
    $d->select('id, ten');
    $row_city = $d->result_array();

    $d->reset();
    $d->setTable('place_dist');
    $d->setWhere('hienthi','1');
    $d->select('id, ten');
    $row_dist = $d->result_array();

    $d->reset();
    $d->setTable('place_ward');
    $d->setWhere('hienthi','1');
    $d->select('id, ten');
    $row_ward = $d->result_array();
?>
<div class="content12 padding20 clearfix">
    <h3 class="title_web"><span><?=_thanhtoan?></span></h3>
	<form method="post" name="frm_order" action="xac-nhan.html" enctype="multipart/form-data"  id="frm_order">
		<div class="xacnhan">
			<h3>Thông tin giao hàng</h3>
			<input name="ten" id="ten" class="formsubmit" value="<?=$thanhvien_tv['hoten']?>" required="required" placeholder="<?=_hovaten?>"/>
			<input name="dienthoai" id="dienthoai" class="formsubmit" value="<?=$thanhvien_tv['dienthoai']?>" required="required" placeholder="<?=_phone?>"/>
            <select id="id_city" name="id_city" data-level="0" data-table="table_place_dist" data-child="id_dist" class="select_tinhthanh">
                <option value="0">Tỉnh/TP</option>
                <?php foreach ($row_city as $key => $value) { ?>
                    <option value="<?=$value['id']?>"><?=$value['ten']?></option>
                <?php } ?>
            </select>
            <select id="id_dist" name="id_dist" data-level="1" data-table="table_place_ward" data-child="id_ward" class="select_tinhthanh">
                <option value="0">Quận/Huyện</option>
                <?php foreach ($row_dist as $key => $value) { ?>
                    <option value="<?=$value['id']?>"><?=$value['ten']?></option>
                <?php } ?>
            </select>
            <select id="id_ward" name="id_ward">
                <option value="0">Phường/Xã</option>
                <?php foreach ($row_ward as $key => $value) { ?>
                    <option value="<?=$value['id']?>"><?=$value['ten']?></option>
                <?php } ?>
            </select>
			<input  name="diachi"  id="diachi" class="formsubmit" required="required"  value="<?=$thanhvien_tv['diachi']?>" placeholder="<?=_address?>"/>
			<input type="email" name="email" id="email" class="formsubmit" required="required"  value="<?=$thanhvien_tv['email']?>" placeholder="<?=_mail?>"/>
			<textarea name="noidung" placeholder="Ghi chú thêm khi giao hàng" rows="5"><?=$_POST['noidung']?></textarea>
		</div>
		<div class="khungphai">      
            <table class="tbl_cart">
                <tr class="title_cart">
                    <th><?=_stt?></th>
                    <th><?=_sanpham?></th>
                    <th><?=_soluong?></th>
                    <th><?=_tonggia?></th>
                    
                </tr>
                <?php if(is_array($_SESSION[ 'cart'])){
                    $max=count($_SESSION[ 'cart']); 
                    for($i=0;$i<$max;$i++){
                        $pid=$_SESSION[ 'cart'][$i][ 'productid']; 
                        $q=$_SESSION[ 'cart'][$i][ 'qty']; 
                        $pname=get_product_name($pid); 
                        if($q==0) continue; ?>
                        <tr class="body_cart">
                            <td><?=$i+1?></td>
                            <td>
                                <a class="name_pid" href="<?=changeTitle($pname)?>"><?=$pname?></a>
                            </td>
                            <td>
                                <i class="fa fa-minus-square giam_sl" name="<?=$pid?>" aria-hidden="true"></i>
                                <input type="number" name="<?=$pid?>" value="<?=$q?>" class="capnhat_sl capnhat_sl_<?=$pid?>"/>
                                <i class="fa fa-plus-square tang_sl" name="<?=$pid?>" aria-hidden="true"></i>
                            </td>
                            <td class="capnhat_price_<?=$pid?>">
                                <?=number_format(get_price($pid, $q)*$q,0, ',', '.')?>&nbsp;VND
                            </td>
                            
                        </tr>
                    <?php } ?>
                    <tr class="price_cart">
                        <td colspan="4">
                            <?=_tonggia?> : <b class="capnhat_full"><?=number_format(get_order_total(),0, ',', '.')?>&nbsp;VND</b>
                        </td>
                    </tr>
                <?php } else { ?>
                    <tr><td colspan='5'><?=_bankhongcosanphamnaotronggiohang?></td></tr> 
                <?php } ?>
            </table>
		    <div class="icon_thanh">
		        <input id="submit_thanhtoan" type="submit" name="next" value="<?=_thanhtoan?>" class="btn_cart"/>
		    </div>
	    </div>
	</form>
</div>