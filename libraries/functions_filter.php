<?php
	function add_filter($id,$table){
		if($id==0 || $table=='') return;
		if(is_array($_SESSION['filter'])){
			if(filter_exists($id,$table)) return;
			$max=count($_SESSION['filter']);
			$_SESSION['filter'][$max]['id'] = $id;
			$_SESSION['filter'][$max]['table'] = $table;
		}else{
			$_SESSION['filter']=array();
			$_SESSION['filter'][0]['id'] = $id;
			$_SESSION['filter'][0]['table'] = $table;
		}
	}
	function filter_exists($id,$table){
		$id=intval($id);
		$max=count($_SESSION['filter']);
		$flag=0;
		for ($i=0; $i < $max; $i++) {
			if($id == $_SESSION['filter'][$i]['id'] && $table == $_SESSION['filter'][$i]['table']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}
?>