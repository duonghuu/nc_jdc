<?php
    $d->reset();
    $d->setTable('photo');
    $d->setWhere('type','logo');
    $d->select('photo_'.$lang.', link');
    $row_popup = $d->fetch_array();
?>
<script type="text/javascript">
    $(document).ready(function(){
        
    })
</script>
<div id="w_popup">
    <a href="<?=$row_popup['link']?>" class="img">
        <img src="thumb/500x400/2/<?=$row_popup['photo_'.$lang]?>" alt="Popup">
    </a>
</div>