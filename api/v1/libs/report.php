<?php 

	function echo_($vr){
		echo $vr;
	}

	function errorify($vr){
		$retu=error_title;
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
	          $retu= "Invalid Date Of Birth (DD-MM-YYYY)";
	          break;
	        case 6483:
	          $retu= "Invalid Username or Email";
	          break;
	        case 6484:
	          $retu= "Invalid Or Empty Link";
	          break;
	        case 6485:
	          $retu= "Internal Error";
	          break;
	        case 6486:
	          $retu= "Invalid Matric";
	          break;
	        case 6487:
	          $retu= "Invalid Date Or Time Of Submission";
	          break;
	        case 6488:
	          $retu= "Assignment has been deactivated";
	          break;
	        case 6489:
	          $retu= "Unable to send Email";
	          break;
	    }
		return $retu;
	}


	function successify($vr){
		$retu="done";
		switch($vr){
			case 64564:
				$retu="msg_sent";
	          break;
			case 64565:
				$retu="msg_deleted";
	          break;
			case 64566:
				$retu="blocked";
	          break;
			case 64567:
				$retu="reported";
	          break;
			case 64568:
				$retu="liked";
	          break;
			case 64569:
				$retu="deleted";
	          break;
			case 64570:
				$retu="changed";
	          break;
			case 64571:
				$retu="user exists";
	          break;
			case 64572:
				$retu="deactivated";
	          break;
			case 64573:
				$retu="reactivated";
	          break;
			case 64574:
				$retu="Email Sent";
	          break;
			case 64575:
				$retu="File Uploaded";
	          break;
		}

		return $retu;
	}

	function DeactAss(){
		$err_code=6488;
		$err=error($err_code);
		newError($err_code);
		return $err;	
	}

	function newError($err_code){
		global $location;
		$loc=$location;
	}

	function invMatric(){
		$err_code=6486;
		$err=error($err_code);
		newError($err_code);
		return $err;		
	}

	function invUserPass(){
		$err_code=3474;
		$err=error($err_code);
		newError($err_code);
		return $err;
	}
	function invDob(){
		$err_code=6482;
		$err=error($err_code);
		newError($err_code);
		return $err;
	}

	function invDOS(){
		$err_code=6487;
		$err=error($err_code);
		newError($err_code);
		return $err;
	}

	function invReq(){
		$err_code=6476;
		$err=error($err_code);
		newError($err_code);
		return $err;
	}

	function invUser(){
		$err_code=6480;
		$err=error($err_code);
		newError($err_code);
		return $err;
	}

	function invEmail(){
		$err_code=6481;
		$err=error($err_code);
		newError($err_code);
		return $err;
	}


	function invFile(){
		$err_code=6477;
		$err=error($err_code);
		newError($err_code);
		return $err;
	}

	function noFile(){
		$err_code=6478;
		$err=error($err_code);
		newError($err_code);
		return $err;
	}

	function invUserEmail(){
		$err_code=6483;
		$err=error($err_code);
		newError($err_code);
		return $err;
	}

	function invAppId(){
		$err_code=5474;
		$err=error($err_code);
		newError($err_code);
		return $err;
	}

	function cantEditProf(){
		$err_code=6474;
		$err=error($err_code);
		newError($err_code);
		return $err;
	}

	function undefReq(){
		$err_code=6475;
		$err=error($err_code);
		newError($err_code);
		return $err;
	}

	function emptyArray(){
		$err_code=6479;
		$err=error($err_code);
		newError($err_code);
		return $err;
	}

	function error($vr){
		$arr=array();
		$time=time();
		$error_more=errorify($vr);
		array_push($arr, array(error_title=>$vr, error_time=>$time, error_more=>$error_more));
		return $arr;
	}

	function success($vr){
		$arr=array();
		$time=time();
		$error_more=successify($vr);
		array_push($arr, array(success_title=>$vr, success_time=>$time, success_more=>$error_more));
		return $arr;
	}

	function release($var){
		// echo trim(json_encode($var));
		print_r(json_encode($var));
		exit();
	}
?>