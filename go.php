<?php
	$to_go=isset($_GET['to'])?$_GET['to']:"user";
	$hash=isset($_GET['hash'])?$_GET['hash']:"";

	if (!empty($hash)){
		echo $to_go." dnjdn ".$hash;		
	}


$gdygfg="l.php";

print_r(json_encode(file_about($gdygfg)));

function file_about($gdygfg){
	$file_size=filesize($gdygfg);
	$file_type=filetype($gdygfg);
	$file_mod=filemtime($gdygfg);
	$arr=array();
	array_push($arr, array("file_name"=>$gdygfg,
							"file_type"=>$file_type,
							"file_size"=>$file_size, 
							"file_mod"=>$file_mod));
	return $arr;
}
?>