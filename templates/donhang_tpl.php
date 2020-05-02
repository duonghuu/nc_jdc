<div id="info">
    <div id="sanpham">        
        <div class="khung">
        <div class="menu_danhmuc">
            <ul>
            <li class="active"><a href="<?=getCurrentPageURL();?>"><?=$title_detail?></a></li>
            </ul>
      </div>

    
      <div class="kiemtra_donhang">
          <ul>
              <li>Mã đơn hàng  : <?=$row_donhang['madonhang']?></li>
              <li>Đặt ngày : <?=date('d/m/Y',$row_donhang['ngaytao']);?> </li>
              <li>Tình trạng đơn hàng : <?=$row_tinhtrang['trangthai']?> </li>
          </ul>
      </div>

      <div class="chitiet_donhang">
          <table width="100%">
          <tr class="title_don">
              <td width="10%" style="text-align:center">STT</td>
              <td width="90%">Chi tiết đơn hàng  </td>
          </tr>
              <?php for($i=0;$i<count($row_detail);$i++){
                $d->reset();
                $sql = "select * from #_product where id='".$row_detail[$i]['id_product']."' ";
                $d->query($sql);
                $row_product = $d->fetch_array();
              ?>
              <tr>
              <td class="col-md-1 col-sm-1 col-xx-1 col-xs-1" style="text-align:center"><?=$i+1?></td>
              <td class="col-md-11 col-sm-11 col-xx-11 col-xs-11">
              <a href="san-pham/<?=$row_product['tenkhongdau']?>.html">
                    <p><img src="<?=_upload_product_l.$row_product['thumb']?>" alt='<?=$row_product['ten_'.$lang]?>' width="100" /></p>
                    <h3><?=$row_product['ten_'.$lang]?></h3>
                    <p><span>Giá : <?php if($row_detail[$i]['gia']==0) echo _lienhe; else echo number_format ($row_detail[$i]['gia'],0,",",",");?></span>
                    <span>Số lượng : <?=$row_detail[$i]['soluong']?></span> </p>
              </a>
              </td>
              </tr>
              <?php } ?>

          </table>
      </div>

      <div class="thongtin_donhang">
          <ul>
              <li>Họ tên : <?=$row_donhang['hoten']?> </li>
              <li>Địa chỉ : <?=$row_donhang['diachi']?> </li>
              <li>Email :  <?=$row_donhang['email']?></li>
              <li>Điện thoại : <?=$row_donhang['dienthoai']?> </li>
              <li>Nội dung : <?=$row_donhang['noidung']?> </li>
          </ul>
      </div>


    </div>
    </div>
  </div>
  <h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>