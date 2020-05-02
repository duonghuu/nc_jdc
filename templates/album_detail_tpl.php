<div class="content12 padding20">
    <div class="khung" style="padding:0px">
      <div class="noidung_content clearfix"><?=$album_detail['noidung_'.$lang]?></div><br>
      <?php if($album_images) {?>
       <div id="gallery-wrap">
            <ul class="grid effect-1" id="grid">
                <?php for($i=0,$count_ab=count($album_images);$i<$count_ab;$i++){?>
                    <li class="loaded">
                        <div class="rel">
                            <a rel="prettyPhoto[gallery<?=$i+1?>]" title="<?=$album_detail['ten_'.$lang]?>" href="<?=_upload_album_l.$album_images[$i]['photo']?>">
                                <img src="thumb/297x170/1/<?=_upload_album_l.$album_images[$i]['photo']?>" alt="<?=$album_detail['ten_'.$lang]?>">
                            </a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
      <?php } else { ?>
          <h3 class="title_update">Dữ liệu đang cập nhật...</h3>
      <?php }?>
    </div>
</div>