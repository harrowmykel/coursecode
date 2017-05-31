<?php
	define('TIMEOUT', '3600');


	function deleteDir($dir){
	    $time=time();
	    $arr=scandir($dir);
	    foreach ($arr as $key => $value) {
	        if(($value!='..' && $value!='.')){
	            //if less than 1hr  ago.
	            $this__=$dir."/".$value;
	            // 
	            if (is_dir($this__)) {
	            	array_map('unlink', glob("$this__/*.*"));
	            	deleteDir($this__);
	            	rmdir($this__);
	            }else{
	            	@unlink($this__);
	            }
	        }
	    }
	}

	function deleteDir__($dir){
	    $time=time();
	    $arr=scandir($dir);
	    foreach ($arr as $key => $value) {
	        if(intval($value)<($time-TIMEOUT) &&($value!='..' && $value!='.')){
	            //if less than 1hr  ago.
	            $this__=$dir."/".$value;
	            // 
	            if (is_dir($this__)) {
	            	array_map('unlink', glob("$this__/*.*"));
	            	deleteDir($this__);
	            	rmdir($this__);
	            }else{
	            	@unlink($this__);
	            }
	        }
	    }
	}

	$dummy=base64_encode("DfEfhbh");
	function save_to_db($a, $b){
		$_SESSION['user']=$a;
		$_SESSION['pass']=$b;
	}

	function getUser(){
		global $dummy;
		if (isset($_SESSION['user'])){
			return $_SESSION['user'];
		}
		return $dummy;
	}

	function getLink($rt){
		$rty=ucfirst($rt);
		if(substr("$rty", 0, 4)=="Http"){$lek=$rt;}
		else {$lek= 'http://'.$rt;}

		return strtolower(urldecode($lek));
	}

	function getPass(){
		global $dummy;
		if (isset($_SESSION['pass'])){
			return $_SESSION['pass'];
		}
		return $dummy;
	}
	
    function createFile($rt, $art){
        $rtt=fopen("$rt", "a+");
        fwrite($rtt, $art);
    }

    function saveCookie__($a, $b){

    }

	function external_link($ndj){
		return $ndj;
	}

	function errorify($vr){
		$retu="Error";
		switch ($vr) {
	        case 1474:
	          $retu="No username";
	          break;
	        case 2474:
	          $retu="No password";
	          break;
	        case 3474:
	          $retu="Invalid username or password";
	          break;
	        case 4474:
	          $retu= "No or invalid imageid";
	          break;
	        case 5474:
	          $retu= "Invalid appid";
	          break;
	        case 6474:
	          $retu= "Error editing profile";
	          break;
	        case 6475:
	          $retu= "Undefined Request";
	          break;
	        case 6476:
	          $retu= "Invalid Request";
	          break;
	        case 6477:
	          $retu= "Invalid File";
	          break;
	        case 6478:
	          $retu= "No File";
	          break;
	        case 6479:
	          $retu= "Empty Array";
	          break;
	        case 6480:
	          $retu= "Invalid Username";
	          break;
	        case 6481:
	          $retu= "Invalid Email";
	          break;
	        case 6482:
	          $retu= "Invalid Date Of Birth";
	          break;	          
	        case 6483:
	          $retu= "Invalid Username or Email";
	          break;
	    }
		return $retu;
	}

	function possessUri(){

		//returns last word
		$rt="";
		if (isset($_SERVER['REQUEST_URI'])){
			$Request=$_SERVER['REQUEST_URI'];
			$rt=getLastWord($Request, 0);
		}
		return $rt;
	}


	function formatThisTime($time){	
		if($time>0){ 	              			
			$time_array=getdate($time);
			return $time_array['mday']."-".$time_array['mon']."-".$time_array['year'];
		}else{
			return 0;
		}
	}

	function formatThisForDay($time){	
		if($time>0){ 	              			
			$time_array=getdate($time);
			
			return $time_array['mday']."-".$time_array['mon']."-".$time_array['year'];
		}else{
			return 0;
		}
	}

	function formatThisForTme($time){	
		if($time>0){ 	              			
			$time_array=getdate($time);
			
			return $time_array['hours']."-".$time_array['minutes'];
		}else{
			return 0;
		}
	}
	function formatThisForHr($time){	
		if($time>0){ 	              			
			$time_array=getdate($time);
			
			return $time_array['mday']."-".$time_array['mon']."-".$time_array['year']." at ".$time_array['hours'].":".$time_array['minutes'].":".$time_array['seconds'];
		}else{
			return 0;
		}
	}


	function getNewChar(){
	  $a=rand(1,3);
	  switch ($a){
	      case 1:              
	    $wrd=rand(48, 57);//numbers
	          break;
	      case 2:              
	    $wrd=rand(65, 90);//capital
	          break;
	      case 3:              
	    $wrd=rand(97, 122);//small
	          break;
	    }
	  return chr($wrd);
	}
	  
	function gnrtNewString($a,$b){
	    $wrd="";
	    $d=rand($a,$b);
	    for ($i=0; $i<$d; $i++){
	        $wrd.=getNewChar();
	    }
	    return $wrd;
	    // return str_replace("=", "", base64_encode($wrd));
	}

    function mkdire($lop){
    	if(is_dir($lop)){
    	}else{
    		mkdir($lop, 0777, true);
    	}
    	return $lop;
    }

?>