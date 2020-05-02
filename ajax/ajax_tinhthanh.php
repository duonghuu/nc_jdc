<?php 
	include ("ajax_config.php");
	$d = new database($config['database']);
	if (isset($_POST["level"])) {
		 $level = $_POST["level"];
		 $table = $_POST["table"];
		$id=$_POST["id"];
		 $type = $_POST["type"];
		switch ($level) {
			case '0':{
				$id_temp= "id_list";
				break;
			}
			case '1':{
				$id_temp= "id_cat";
				break;
			}
			case '2':{
				$id_temp= "id_item";
				break;
			}
			default:
				echo 'error ajax'; exit();
				break;
		}
		echo $sql="select * from ".$table." where $id_temp=".$id." order by ten, id ";
		$stmt=mysql_query($sql);
		$str='
			<option value="0">Lựa chọn</option>
			';
		while ($row=@mysql_fetch_array($stmt)){
			if($row["id"]==(int)@$id_select)
				$selected="selected";
			else 
				$selected="";

			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		echo  $str;
	}
?>
