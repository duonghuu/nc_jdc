<form name="form_giohang" action="index.php" method="post">
  <input type="hidden" name="productid" />
  <input type="hidden" name="command" />
</form>
<div id="info">
    <div id="sanpham">
        <div class="thanh_title"> <h2>Tìm Kiếm ' <?=$_GET['keywords']?> ' </h2> </div>

        <div class="khung_in">
        <ul>
    <?php if(count($product)!=0){?>
      <?php for($j=0, $count_tt=count($product);$j<$count_tt;$j++){  ?> 
           <li class="item" style="width:250px;">
                <div class="img">
                    <a href="san-pham/<?=$product[$j]['tenkhongdau']?>.html">
                        <img src="<?=_upload_product_l.$product[$j]['thumb']?>" alt="<?=$product[$j]['ten_'.$lang]?>" />
                    </a>
                </div>
                <h3><a href="san-pham/<?=$product[$j]['tenkhongdau']?>.html"><?=$product[$j]['ten_'.$lang]?></a></h3>
                <div class="chitiet"><a href="san-pham/<?=$product[$j]['tenkhongdau']?>.html">Xem thêm</a></div>
            </li>
       <?php }?>
    <?php } else {?><div style="text-align:center; color:#FF0000; font-weight:bold; font-size:22px; text-transform:uppercase;" >Chưa Có Tin Cho Mục này .</div> <?php }?>
    </ul>

      </div>
         <div class="paging"><?=$paging['paging']?></div> 
    </div>

   
  </div> 