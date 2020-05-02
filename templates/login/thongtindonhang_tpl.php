<style>
.widget{
	margin-bottom:30px;
}
	
.table {
    border-collapse: collapse;
    table-layout: fixed;
    margin: 0px 0px 10px 0px;
    width: 100%;
    border: 1px solid #D6D6D6;
    margin-top: 2px;
}

.table th{
	    padding: 14px 20px 10px 20px;
    border: 0px;
    color: #fff;
    font-size: 16px;
    color: #3d3d3d;
    vertical-align: top;	
}

.table tr {
    background: none repeat scroll 0 0 #FFFFFF;
    border-bottom: 1px solid #d6d6d6;
}

.table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th{
	border-right:thin solid #ccc;	
}

.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
	border-right:thin solid #ccc;	
}
</style>
<div class="bg_register row">
    <div class="register_left col-md-3 col-sm-4 col-xs-12">
    	<div class="content--full">
            <div class="box box_register box--no-padding">
                <div class="box__header">
                    <h2 class="box__title">Thông tin chung</h2>
                </div>
                <div class="box__body">
                    <div class="sidebar__widget widget widget--profile">
                        <div class="profile clearfix">
                            <div class="profile__avatar">
                                <img class="img-circle img-avatar" src="images/avatar.png" alt="" onclick="">
                            </div>
                            <div class="profile__info">
                                <div class="profile__name"><?=$_SESSION["login"]['ten']?></div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__widget widget">
                    	<?php include _template."layout/list_user.php"?>
                    </div>
                </div>
            </div>
    
    	</div>
        
    </div>
    
    
    <div class="register_right col-md-9 col-sm-8 col-xs-12">
    	<div class="content--full row">
           <div class="col-md-12 col-xs-12">
              <div class="box_register box--center">
                 <div class="box__header">
                    <h2 class="box__title">Thông tin đơn hàng</h2>
                 </div>
                 <div class="box__body">
                 
                    <div class="main_content">
        
 
                            
                    <?php for($i=0;$i<count($order);$i++){
                        $d->reset();
                        $sql= "select * from #_order_detail where id_order='".$order[$i]['id']."'";
                        $d->query($sql);
                        $result_ctdonhang = $d->result_array();
                        
                        $d->reset();
                        $sql= "select * from #_couple where id='".$order[$i]['id_couple']."'";
                        $d->query($sql);
                        $magiamgia = $d->fetch_array();
						
						$d->reset();
                        $sql= "select * from #_tinhtrang where id='".$order[$i]['trangthai']."'";
                        $d->query($sql);
                        $tinhtrang = $d->fetch_array();
                    ?>
                    <div class="widget">
                        <div class="title">
                                <h6 style="text-transform:uppercase;">
                                	<span>ĐƠN HÀNG: <?=$i+1?> &nbsp;&nbsp;&nbsp;&nbsp; </span>
                                    <span>Mã đơn hàng: <b style="text-decoration:underline;"><?=$order[$i]['madonhang']?></b> &nbsp;&nbsp;&nbsp;&nbsp; </span>
                                    <span>NGÀY ĐẶT: <b style="text-decoration:underline;"><?=date("d/m/Y",$order[$i]["ngaytao"])?></b> &nbsp;&nbsp;&nbsp;&nbsp; </span>
                                    
                                    <span>Tình trạng đơn hàng: <b style="text-decoration:underline;"><?=$tinhtrang["trangthai"]?></b> &nbsp;&nbsp;&nbsp;&nbsp; </span></h6>
                            </div>
                            <table cellpadding="0" cellspacing="0" width="100%" class="table table--listing table--orders" id="checkAll">
                        <thead>
                          <tr>
                           
                            <td align="center" class="tb_data_small" width="50">STT</td>      
                            <td align="center" class="sortCol">Tên sản phẩm</td>
                            <td align="center" width="150">Hình ảnh</td>
                            <td align="center" width="150">Đơn giá</td>
                            <td align="center" width="150">Số lượng</td>
                            <td align="center" width="150">Thành tiền</td>
                       
                          </tr>
                        </thead> 
                         <tfoot class="tons">
                          <tr>
                            <td colspan="5" style="text-align:left; padding-left:10px;"><div class="pagination">Tổng tiền</div></td>
                            <td align="center"><div class="pagination"> <?=number_format(get_tong_tien($order[$i]['id']),0, ',', '.')?>&nbsp;VNĐ</div></td>
                            
                          </tr>
                           
                          
                        </tfoot>   
                        
                        
                        <tbody>
                         <?php      
                                    $tongtien=0;          
                                    for($j=0,$count_donhang=count($result_ctdonhang);$j<$count_donhang;$j++){	
                                    $pid=$result_ctdonhang[$j]['id_product'];
                                    $idcolor = $result_ctdonhang[$j]['id_color'];
                                    $colorname = get_name_color($idcolor);	
                                    $pname=get_product_name($pid);
                                    $pphoto=get_thumb($pid);
                                    $tongtien+=	$result_ctdonhang[$j]['gia']*$result_ctdonhang[$j]['soluong'];				
                                ?>
                            <tr id="productct<?=$result_ctdonhang[$j]['id']?>">
                              <td class="tb_data_small"><?=$j+1?></td>
                              <td><?=$pname?> <?php if($colorname != "") {?>(<?=$colorname?>)<?php } ?> </td>
                              
                              
                              
                               <td>
                                <img  src="<?=_upload_product_l.$pphoto?>" height="100"  />
                          
                               </td>
                               
                               
                              <td align="center"><?=number_format($result_ctdonhang[$j]['gia'],0, ',', '.')?>&nbsp;VNĐ</td>
                              <td align="center"><?=$result_ctdonhang[$j]['soluong']?></td>
                              <td align="center" id="id_price<?=$result_ctdonhang[$j]['id']?>"><?=number_format($result_ctdonhang[$j]['gia']*$result_ctdonhang[$j]['soluong'],0, ',', '.')?>&nbsp;VNĐ</td>
                            
                            </tr>
                            <?php } ?>
                         </tbody>
                      </table>
                    </div>
                    <?php }?>
                    </div>
                    

                 </div>
              </div>
           </div>
        </div>
    </div>

</div>






