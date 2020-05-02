<?php 
	$sql_khac = "select mota_$lang from #_info where type='thanhtoanquanganhang'";
	$d->query($sql_khac);
	$phuongthuc = $d->fetch_array();

	$sql_khac = "select mota_$lang from #_info where type='thanhtoankhinhanhang'";
	$d->query($sql_khac);
	$phuongthuc1 = $d->fetch_array();
?>
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
<div class="content12 clearfix" id="info">
<div id="sanpham">
    <h3 class="title_web"><span><?=_xacnhanthanhtoan?></span></h3>
     	<form method="post" name="frm_order" action="" enctype="multipart/form-data"  id="frm_order">
	        <div class="xacnhan">
		        <div class="khungxn">
		        		<h4><?=_xacnhanthongtingiaohang?></h4>
		        		<p><label><b><?=_hovaten?> :</b> <?=$_POST['ten']?></label></p>
		        		<p><label><b><?=_address?> : </b><?=$_POST['diachi']?></label></p>
		        		<p><label><b><?=_phone?> :</b> <?=$_POST['dienthoai']?></label></p>
		        		<p><label><b><?=_mail?> : </b><?=$_POST['email']?></label></p>
		        		<p><label><b><?=_noidung?> : </b><?=$_POST['noidung']?></label></p>
		        		<input type="hidden" name="ten" value="<?=$_POST['ten']?>"/>
		        		<input type="hidden" name="diachi" value="<?=$_POST['diachi']?>"/>
		        		<input type="hidden" name="dienthoai" value="<?=$_POST['dienthoai']?>"/>
		        		<input type="hidden" name="email" value="<?=$_POST['email']?>"/>
		        		<input type="hidden" name="noidung" value="<?=$_POST['noidung']?>"/>
		        </div>
				<div class="phuongthuc">
					<h4><?=_phuongthucthanhtoan?> </h4>
					<div>
			       		<label><input type="radio" name="phuongthuc" value="Thanh toán qua ngân hàng"/>Thanh toán qua ngân hàng</label>
						<div class="noidung_tt">
							<?=$phuongthuc['mota_'.$lang]?>
						</div>  
					</div>
					<div>
			        	<label> <input type="radio" name="phuongthuc" value="<?=_thanhtoankhinhanhang?>" />
						<?=_thanhtoankhinhanhang?></label>
						<div class="noidung_tt">
							<?=$phuongthuc1['mota_'.$lang]?>
						</div>
					</div>
				</div>
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
	                        <td colspan="5">
	                            <?=_tonggia?> : <b class="capnhat_full"><?=number_format(get_order_total(),0, ',', '.')?>&nbsp;VND</b>
	                        </td>
	                    </tr>
	                <?php } else { ?>
	                    <tr><td colspan='4'><?=_bankhongcosanphamnaotronggiohang?></td></tr> 
	                <?php } ?>
	            </table>
			    <div class="icon_thanh">
			        <input title='<?=_thanhtoan?>' alt='<?=_thanhtoan?>' align="right" type="submit" name="xacnhan" value="<?=_thanhtoan?>" style="cursor:pointer;" style="padding:2px;" class="btn_cart"/>
			    </div> 
		    </div>
		</form>               
    </div>
</div>