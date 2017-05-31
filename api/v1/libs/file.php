<?php
	function saveFile($store_at){
	 	$messu="emptiness/";
		if (!empty($store_at)){
		  	$messu=$store_at;
		}
		if (isset($_FILES['assignment'])){
			$file=$_FILES['assignment'];
			$file_name=$file['name'];
			$file_type=$file['type'];
			$tmp_name=$file['tmp_name'];
			$file_size=$file['size'];

		    $file_name=$file['name'];
		    $saveto = getLoc()."assignment/$store_at/$file_name";


			if (file_exists($saveto)){
				while (file_exists($saveto)) {
					$art=explode(".", "$file_name");
					$time=time()-1491262093;
					for ($i=0; $i <count($art) ; $i++) { 
						if($i==0){
							$rname=$art[0]."_copy".$time;
						}
						else{
							$rname=$rname.".".$art[$i];
						}
					}
					$rty++;
					// 
					$saveto = getLoc()."assignment/$store_at/$rname";
				}
			}
		
		    if (move_uploaded_file($file['tmp_name'], $saveto)){
		    	return success(64575);
		    }else{
		    	return error(6485);
		    }
		}
		return emptyArray();
}



function getUploadedName($store_at){
	if (isset($_FILES['assignment'])){
		$file=$_FILES['assignment'];
		$file_name=$file['name'];
		$saveto = loc()."$store_at/$file_name";
		return file_about($saveto);
	}
	return emptyArray();
}

function dmmp(){

		if (file_exists($saveto)){
			while (file_exists($saveto)) {
				$art=explode(".", "$file_name");
				$time=time()-1491262093;
				for ($i=0; $i <count($art) ; $i++) { 
					if($i==0){
						$rname=$art[0]."_copy".$time;
					}
					else{
						$rname=$rname.".".$art[$i];
					}
				}
				$rty++;
				// 
				$saveto = loc()."$store_at/$rty/$rname";
			}
		}
}

function is_image($file_type){
    $typeok = TRUE; 
    switch($file_type)
    {
      case "image/gif":    
      		break;
      case "image/jpeg":  
      		// Both regular and progressive jpegs
      case "image/jpeg":  
      		break;
      case "image/png":   
      		break;
      default:            
      		$typeok = FALSE; 
      		break;
    }
    return $typeok;

}

function saveImg($file,$store_at){

  }

function file_about($gdygfg){


	$arrays=@explode("/", $gdygfg);
	$fgdg=@count($arrays)-1;
	$fgdgj=@count($arrays)-2;
	$gdygfgo=$arrays[$fgdg];
	$link=$arrays[$fgdgj];
	$file_size=@filesize($gdygfg);
	if ($file_size>1000){
		$kb=($file_size/1000);
		if ($kb>1000){
			$mb=($file_size/1000);
			$file_size=$mb."mb";			
		}else{
			$file_size=$kb."kb";			
		}
	}else{
		$file_size=$file_size."b";		
	}
	$file_type=@filetype($gdygfg);
	$file_mod=@filemtime($gdygfg);
	$arr=array();


	// $fg=$gdygfgo;
	$username="";
	$name="";


	$q="SELECT * FROM assignment where file_name='$gdygfgo' AND ass_code='$link'";
	if (isset(fetch_assoc($q)[0]['username']))
		$username=fetch_assoc($q)[0]['username'];
	$q="SELECT * FROM profile where username='$username'";	
	if (isset(fetch_assoc($q)[0]['name']))		
		$name=fetch_assoc($q)[0]['name'];

	array_push($arr, array("name"=>$name,
							"file_name"=>$gdygfgo,
							"file_type"=>$file_type,
							"file_size"=>$file_size, 
							"file_mod"=>$file_mod));
	return $arr;
}

function compressImg($location, $src){
	$saveto=$location;

      list($w, $h) = getimagesize($saveto);
    

      $max = 600;
      $tw  = $w;
      $th  = $h;
    

      if ($w > $h && $max < $w)
      {
        $th = $max / $w * $h;
        $tw = $max;
        
      }
      elseif ($h > $w && $max < $h)
      {
        $tw = $max / $h * $w;
        $th = $max;
      }
      elseif ($max < $w)
      {
        $tw = $th = $max;
      }

      $tmp = imagecreatetruecolor($tw, $th);
      imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h); //first two  after 0's may be changed 
      imageconvolution($tmp, array(array(-1, -1, -1),
        array(-1, 16, -1), array(-1, -1, -1)), 8, 0);
      imagejpeg($tmp, $saveto);
      imagedestroy($tmp);
      imagedestroy($src);
     
    }


		function loc(){
			return "../../assignment/";
		}



?>