<form name="form_giohang" action="index.php" method="post">
  <input type="hidden" name="productid" />
  <input type="hidden" name="command" />
</form>
<div id="info">
    <div id="sanpham">

    
        
    <div class="khung">
    <div class="thanh_title"><h2><?=$title_detail?></h2> </div>
    <ul>
		<?php if(count($product)!=0){?>
        <?php for($j=0,$count_sp=count($product);$j<$count_sp;$j++){?>
             <li class="thuonghieu_item">
                    <a href="thuong-hieu/<?=$product[$j]['tenkhongdau']?>.html"><img src="<?=_upload_tieude_l.$product[$j]['thumb']?>" alt="<?=$product[$j]['ten_'.$lang]?>" /></a>
                    <h3><a href="thuong-hieu/<?=$product[$j]['tenkhongdau']?>.html"><?=$product[$j]['ten_'.$lang]?></a></h3>
                </li> 
        <?php } ?>
		<?php } else { ?>
    <div style="text-align:center; color:#FF0000; font-weight:900; font-size:22px; text-transform:uppercase;"> Chưa Có Tin Cho Mục này . </div>
    <?php }?>

</ul>
<div class="clear"></div>
<div class="paging"><?=$paging?></div> 

</div>
</div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>


<div style='display:none'>
<div id='inline_content'></div>
</div>