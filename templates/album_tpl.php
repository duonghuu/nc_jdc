<div class="content12">   
    <h3 class="title_web"><span><?=$title_detail?></span></h3>
    <?php if(count($album)!=0){?>
        <div class="wrap_album_man clearfix">
        <?php foreach ($album as $key => $value) { ?>
            <div class="item_alb">
                <a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>" class="img zoom_hinh">
                    <img src="thumb/280x240/1/<?=_upload_album_l.$value['photo']?>" alt="<?=$value['ten_'.$lang]?>">
                </a>
                <h3><a href="<?=$value['tenkhongdau']?>" title="<?=$value['ten_'.$lang]?>"><?=$value['ten_'.$lang]?></a></h3>
            </div>
        <?php } ?>
        </div>
        <div class="paging"><?=$paging?></div>
    <?php } else { ?>
        <h3 class="title_update">Dữ liệu đang cập nhật...</h3>
    <?php }?>
</div>