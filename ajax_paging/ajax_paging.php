<?php
	session_start();
	error_reporting(0);
	@define ( '_template' , '../templates/');
	@define ( '_lib' , '../libraries/');
	@define ( '_source' , '../sources/');	
	
	if(!isset($_SESSION['lang']))
	{
	$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once "/lang/lang_$lang.php";
	include_once _lib."class.database.php";

	$d = new database($config['database']);

	if(isset($_POST["page"]))
    {
		$paging = new paging_ajax();
		
		$paging->class_pagination = "pagination_ajax";
		$paging->class_active = "active";
		$paging->class_inactive = "inactive";
		$paging->class_go_button = "go_button";
		$paging->class_text_total = "total";
		$paging->class_txt_goto = "txt_go_button";
		$paging->per_page = 12;
		$paging->page = $_POST["page"];
		if($_POST['id_danhmuc'] == 'all') {
			$paging->text_sql = "select id, ten_vi, tenkhongdau, thumb, mota_".$lang.", giacu from table_product where hienthi=1 and noibat=1 and type='product' order by stt,id";
			$sql = "select id, ten_vi, tenkhongdau, photo from table_product where hienthi=1 and noibat=1 and type='product' order by stt,id";
		} else {
			$paging->text_sql = "select id, ten_".$lang.", tenkhongdau, thumb, mota_".$lang.", giacu from table_product where hienthi=1 and noibat=1 and type='product' and id_list='".$_POST['id_danhmuc']."' order by stt,id";
			$sql = "select id, ten_".$lang.", tenkhongdau, photo from table_product where hienthi=1 and noibat=1 and type='product' and id_list='".$_POST['id_danhmuc']."' order by stt,id";
		}
		$result_pag_data = $paging->GetResult();
		$message = '';
		$paging->data = "" . $message . "";

		$d->reset();
		$d->query($sql);
		$product = $d->result_array();
	}
?>
<div class="clearfix">
	<?php $i=0; while ($row = mysql_fetch_array($result_pag_data)) {?>
		<div class="item_product">
			<div class="w_img">
				<a href="<?=$row['tenkhongdau']?>" class="img">
					<img src="<?=_upload_product_l.$row['thumb']?>" alt="<?=$row['ten_'.$lang]?>">
				</a>
				<div class="info_product"><a href="<?=$row['tenkhongdau']?>" title="<?=$row['ten_'.$lang]?>">
					<?php /*
					<span><?=_gia?>: <strong><?php if($row['giacu'] == 0) { echo _lienhe; } else { echo number_format ($row['giacu'],0,",",".")."<sup>đ</sup>"; }?></strong></span>
					*/?>
				</a></div>
			</div>
			<h3><a href="<?=$row['tenkhongdau']?>" title="<?=$row['ten_'.$lang]?>"><?=$row['ten_'.$lang]?></a></h3>
		</div>
	<?php $i++;} ?>
</div>
<input type="hidden" name="id_current" value="<?=$_POST['id_danhmuc']?>">
<?php 
	if(count($product) > 12){
		echo $paging->Load();
	}
?>