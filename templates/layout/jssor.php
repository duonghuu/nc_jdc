<div class="slick_img_lq">
    <div>
        <a data-zoom-id="Zoom-1" href="<?=_upload_product_l.$row_detail['photo']?>"
        data-image="thumb/280x385/2/<?=_upload_product_l.$row_detail['photo']?>"><img src="thumb/90x110/1/<?=_upload_product_l.$row_detail['photo']?>" alt="$row_detail['ten_'.$lang]"></a>
    </div>
    <?php foreach ($product_photos as $key => $value) { ?>
        <div>
            <a data-zoom-id="Zoom-1" href="<?=_upload_product_l.$value['photo']?>"
            data-image="thumb/280x385/2/<?=_upload_product_l.$value['photo']?>"><img src="thumb/90x110/1/<?=_upload_product_l.$value['photo']?>" alt="$row_detail['ten_'.$lang]"></a>
        </div>
    <?php } ?>
</div>