<?php 

	function deactivateAll_(){
		$qr="SELECT * FROM assign_teach WHERE deactivated_=0";
		$rows=fetch_assoc($qr);
		$time=time();
		for ($i=0; $i<count($rows); $i++){
			$id=$rows[$i]['id'];
			$deact=$rows[$i]['deactivation_time'];
			if ($time>$deact){
				$query="UPDATE assign_teach SET deactivated_=1, deactivated_time=$time WHERE id=$id";
				queryMysql($query);	
			}		
		}	
	}
	
	function getProfid(){
		return getUsername_();
	}
	
	function checkAppid(){
		$app="dhghdjkdhjd787637";
		$ret="325663653748jdfd";

		$ket=isset($_GET['appid'])?$_GET['appid']:"";
		if ($ket==$app){
	    	return true;
		}else if ($ket==$ret){
	    	return true;
		}
		return false;
    }

    function chk(){
		$gh="365374kfrhvikjeoeope";
		$ket=isset($_GET['appid'])?$_GET['appid']:"";
		if ($ket==$gh){
			return true;
		}
		return false;
    }

    function single(){
    	$la="SELECT * FROM provapp_pro ORDER BY prov_id ASC";
    	$a="SELECT * FROM provapp_pro ORDER BY prov_id DESC";
    	$nm=fetch_assoc($la)[0]['prov_id'];
    	$first=fetch_assoc($a)[0]['prov_id'];
    	$id=rand($first, $nm)-1;
    	$query="SELECT * FROM provapp_pro WHERE prov_id=$id";
    	return fetch_assoc($query);
    }

    function multi(){
    	$limit=isset($_GET['limit'])?$_GET['limit']:10;
    	$query="SELECT * FROM provapp_pro LIMIT $limit";
    	return fetch_assoc($query);
    }

    function search(){
    	$search=getPostString("search");
		$row2=array();
		$query1="SELECT * FROM provapp_pro WHERE prov_type='$search' OR prov_text='$search' OR prov_author='$search'";		
		$nurmo=querynum($query1);
		$rtr=ceil($nurmo/results_per_page);
		$query="SELECT * FROM provapp_pro WHERE prov_type='$search' OR prov_text='$search' OR prov_author='$search' ORDER BY id DESC ".calcpages($nurmo, results_per_page);
    	return fetch_assoc($query);
    }

    function allfrom(){
    	$search=getPostString("from");
		$row2=array();
		$query1="SELECT * FROM provapp_pro WHERE prov_type='$search'";		
		$nurmo=querynum($query1);
		$rtr=ceil($nurmo/results_per_page);
		$query="SELECT * FROM provapp_pro WHERE prov_type='$search' ORDER BY id DESC ".calcpages($nurmo, results_per_page);
    	return fetch_assoc($query);
    }
 ?>