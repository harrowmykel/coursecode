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

    function checkUserPass(){
    	$user=getUsername_();
    	$pass=getPass_();
    	return verifyUser($user, $pass);
    }

    function verifyUser($user, $pass){
    	$query1="Select * from passtable WHERE username='$user' AND pass='$pass' AND current_=1";
		$rtu=queryNum($query1);
		if ($rtu>0){
  			return true;
		}
		return false;
	}
	
	function getPostOtherUser($vr){
		$val=getGetString($vr);
		if ($val!=""){
 		 return getProfid($val);
		}
		return noUserid;
	}
	
	function getDbPass($ido){	
		$query1="SELECT * FROM passtable WHERE ".id_col."=$ido ORDER BY ".id_col." DESC";
		$row=fetch_assoc($query1);
		$oldDb=$row[pass_col];
		return $oldDb;
	}

function saveIp($user, $loc){
	$time=time();
	$ip=get_ip_address();
	$query="INSERT INTO iptable (id, username, ip_add, type_, time) VALUES (NULL, '$user', '$ip', '$loc', $time)";
	queryMysql($query);
}

function contact(){
		$user=getUsername_();
		$query="SELECT * FROM profile WHERE username='$user'";
		$row=fetch_assoc($query);
		$name=$row['name'];
		$email=$row['email'];
		$title=getPostString("title");
		$text=getPostString("topic");
		return inputThought($name, $email, $title, $text);
	}

	function contact_notlogg(){
		$name=getPostString("name");
		$email=getPostString("email");
		$title=getPostString("title");
		$text=getPostString("topic");
		return inputThought($name, $email, $title, $text);
	}

	function checkuser(){
		$user=getUsername_();
		$pass=getPass_();
		$query="SELECT * FROM passtable WHERE username='$user' AND pass='$pass'";
		if (queryNum($query)>0){
			return fetchprof();
		}
		return emptyArray();
	}

	function frgtPass(){
		$user=getUsername_();
		$uusername=getUsername_();

		saveIp($user, 'frgtPass');	

		if (is_username($user)){
			$query="SELECT * FROM profile WHERE username='$user'";
			$uusername=getUsername_();
		}else if (is_matric($user)){
			$query="SELECT * FROM profile WHERE matric_no='$user'";
			if (queryNum($query)>0){
				$ERRRR=queryMysql($query)->fetch_array(MYSQLI_ASSOC);
				$uusername=$ERRRR['username'];
			}
		}else {
			$query="SELECT * FROM profile WHERE email='$user'";
			if (queryNum($query)>0){
				$ERRRR=queryMysql($query)->fetch_array(MYSQLI_ASSOC);
				$uusername=$ERRRR['username'];				
			}
		}

		if (queryNum($query)>0){
			$query="SELECT * FROM profile WHERE username='$uusername'";
			$ERRRR=queryMysql($query)->fetch_array(MYSQLI_ASSOC);
			$email=$ERRRR['email'];
			if(sendRecoveryEmail($email, $uusername))
				return success(435);
			else
				return error(6489);
		}
		return invUserEmail();
	}

	function is_matric($user){
		return is_numeric($user);
	}

	function inputThought($name, $email, $topic, $text){
		$time=time();
		$query="INSERT INTO contacttable (id, name, email, title, message, time) VALUES (NULL, '$name', '$email', '$topic', '$text', $time)";
		queryMysql($query);
		return success(64574);
	}

	function createprof(){
		$timi=0;
		$name=getPostString("name");
		$username=getUsername_();
		$dob=getPostString("dob");
		$dob=deserialise($dob);		
		if ($dob<1){
			return invDOb();
		}
		$country=getPostString("country");
		$email=getPostString("email");
		$matric=getPostString("matric");
		$school=getPostString("school");
		$teacher=is_numeric(getPostString("teacher"))?getPostString("teacher"):0;
		$pass=getPass_();
		$query="SELECT * FROM profile WHERE username='$username'";
		$num=querynum($query);
		if ($num>0){
			$timi++;
			return invUser();	
		} 
		$query="SELECT * FROM profile WHERE email='$email'";
		if ($num>0){
			$timi++;
			return invEmail();	
		}	
		$query="SELECT * FROM profile WHERE matric_no='$matric'";
		if ($num>0){
			$timi++;
			return invMatric();	
		}	
		if ($timi==0){
			$time=time();
			$query="INSERT INTO profile (id, name, username, dob, email, country, time, matric_no, school, teacher) VALUES (NULL, '$name', '$username', $dob, '$email', '$country', $time, '$matric', '$school', '$teacher')";
			queryMysql($query);
			$query="INSERT INTO passtable (id, username, pass, time, current_)VALUES (NULL, '$username', '$pass', $time, 1)";
			queryMysql($query);			
			saveIp($username, 'createprof');	
			setUsername_($username);
			return fetchprof();
			// success(344);			
		}
		return emptyArray();
	}
	
	function getSpreadSheet(){		
		$lock=getPostString("link");
		if (!empty($lock)){
			$Assignment=new Assignment();
			return $Assignment->getSpreadSheet($lock);
		}
	}

	function getCompressed(){		
		$lock=getPostString("link");
		if (!empty($lock)){
			$Assignment=new Assignment();
			return $Assignment->getCompressed($lock);
		}
	}

	function insertfile(){		
		$lock=getPostString("link");
		if (!empty($lock)){
			$Assignment=new Assignment();
			return $Assignment->sendAssignment($lock);
		}
	}

    function getallsubmittedfiles(){
		$lock=getPostString("link");
		if (!empty($lock)){
			$Assignment=new Assignment();
			return $Assignment->getallsubmittedfiles($lock);
		}
		return emptyArray();    	
    }

	function deleteLink(){
		$lock=getPostString("link");
		if (!empty($lock)){
			$Assignment=new Assignment();
			return $Assignment->delete($lock);
		}
		return emptyArray();
	}

	function totalLink(){
		$lock=getPostString("link");
		if (!empty($lock)){
			$Assignment=new Assignment();
			$nu=$Assignment->noOfSubmittedUsers($lock);
			return appry($nu);
		}
		return emptyArray();
	}

	function appry($g){
		//array creator for single objects
		$arr=array();
		array_push($arr, array("total"=>$g));
		return $arr;		
	}

	function reactivate(){
		$lock=getPostString("link");
		if (!empty($lock)){
			$Assignment=new Assignment();
			return $Assignment->reactivate($lock);
		}
		return emptyArray();
	}

	function getStudentFiles(){
		$Assignment=new Assignment();
		return $Assignment->getStudentFiles();		
	}

	function getTeacherFiles(){
		$Assignment=new Assignment();
		return $Assignment->getTeacherFiles();		
	}	


    function getSubmittedFiles(){
		$lock=getPostString("link");
		if (!empty($lock)){
			$Assignment=new Assignment();
			return $Assignment->getFiles($lock);
		}
		return emptyArray();
    }

	function changedd(){
		$lock=getPostString("link");
		if (!empty($lock)){
			$Assignment=new Assignment();
			return $Assignment->changeDD($lock);
		}
		return emptyArray();		
	}

	function deactivate(){
		$lock=getPostString("link");
		if (!empty($lock)){
			$Assignment=new Assignment();
			return $Assignment->deactivate($lock);
		}
		return emptyArray();
	}

	function changeLink(){
		$lock=getPostString("link");
		$new_link=getPostString("newlink");
		if (!empty($lock)){
			$Assignment=new Assignment();
			return $Assignment->changeLock($lock, $new_link);
		}
		return emptyArray();
	}

	function createLink(){
		$Assignment=new Assignment();
		return $Assignment->createLock();
	}

	function editprofile(){
		$name=getPostString("name");
		$username=getUsername_();
		$dob=getPostString("dob");
		$dob=deserialise($dob);
		if ($dob<1){
			return invDOb();
		}
		$country=getPostString("country");
		$email=getPostString("email");
		//is username==$username where email =$email?// isEmailthatOfthis user?
		if((queryNum("SELECT * FROM profile WHERE email='$email'")>0) AND (!queryNum("SELECT * FROM profile WHERE email='$email' AND username='$username'")>0))
			return invEmail();
		
		$pass=getPass_();
		$matric=getPostString("matric");
		$school=getPostString("school");
		$teacher=getPostString("teacher");
		//for it to have gotten here pass has been checked true and verifyUser()
		$time=time();
		$query="UPDATE profile SET name='$name', dob=$dob, email='$email', country='$country', matric_no='$matric', school='$school', teacher='$teacher' WHERE username='$username'";
		queryMysql($query);
		saveIp($username, 'editprof');	
		return fetchprof();
	}

	function editPass(){	
		$username=getUsername_();
		$time=time();	
		$new_pass=getPostString("newpass");
		if (!empty($new_pass)){
			$query="UPDATE passtable SET current_=0 WHERE username='$username'";
			queryMysql($query);
			$query="INSERT INTO passtable (id, username, pass, time, current_) VALUES (NULL, '$username', '$new_pass', $time, 1)";
			queryMysql($query);
			return fetchprof();			
		}
		return error(2474);
	}

	function deserialise($dob){
        $dobo=explode("-", "$dob");
        if (count($dobo)==3){
            for ($ri=0; $ri<3; $ri++){
                //check numericity
                if(!is_numeric($dobo[$ri])){
                    return 0;
                } 
            }
            $day=$dobo[0];
            $month=$dobo[1];
            $year=$dobo[2];

            $dob=$day;
            $mob=$month;
            $yob=$year;

            $job = checkdate($mob,$dob,$yob) ? 'trueo' :'falseo'; // checks if date is corrr
            // $job="trueo";
            if ($job == 'trueo'){
                $importantDate = mktime(9,40,0,$month,$day,$year);
                return $importantDate;
            } 
        }
         return 0;
        // print_r($dobo);
    }


	function deserialiseHr($dob){
        $dobo=explode("-", "$dob");
        if (count($dobo)==5){
            for ($ri=0; $ri<5; $ri++){
                //check numericity
                if(!is_numeric($dobo[$ri])){
                    return 0;
                } 
            }
            $day=$dobo[0];
            $month=$dobo[1];
            $year=$dobo[2];
            $hr=$dobo[3];
            $min=$dobo[4];

            $dob=$day;
            $mob=$month;
            $yob=$year;

            $job = checkdate($mob,$dob,$yob) ? 'trueo' :'falseo'; // checks if date is corrr
            // $job="trueo"; 
            $jobs = $hr<25 && $hr>0 ? 'trueo' :'falseo'; // checks if time is corrr
            // $job="trueo";
            if ($job == 'trueo' && $jobs=="trueo"){
                $importantDate = mktime($hr,$min,0,$month,$day,$year);
                return $importantDate;
            } 
        }
         return 0;
        // print_r($dobo);
    }

    function getfiles(){    	
		$lock=getPostString("link");
		if (!empty($lock)){
			$Assignment=new Assignment();
			return $Assignment->getAssignment($lock);
		}
    }


    function changemethod(){    	
		$lock=getPostString("link");
		if (!empty($lock)){
			$Assignment=new Assignment();
			return $Assignment->changemethod($lock);
		}
    }

	function fetchprof(){		
		$user=getUsername_();
		$query="SELECT * FROM profile WHERE username='$user'";
		$row=array();
		$res=queryMysql($query);
		$nurm=querynum($query);

		saveIp($user, 'fetchprof');	
		if ($nurm>0){
			for ($i=0; $i<$nurm; $i++){
				$arr=$res->fetch_array(MYSQLI_ASSOC);
				array_push($row, $arr);
			}
			return $row;
		} 
			return emptyArray();
	}

	function is_username($user){
        if (!strpos($user, "@")>0){
            return true;
        }
        return false;
	}


	function create_this_file($vr){
		// $rtt="../../small/";
		// $rttt=$rtt."$vr".'.php';
		// if (!file_exists($rtt))
		// 	mkdir($rtt);	

		//ends up creating lots of rules in htaccess removed --Aro Micheal 7.3.2017
		// $string="\n". "ReWriteRule ^". $vr. '$' ." go?to=".$vr ." [NC,L]";
		// //write to ht access
		// $htacc=fopen("../../.htaccess", "a+");
		// fwrite($htacc, $string);
	}

	function createFile($a, $b){		
		$erjrrkjfk=fopen($a, "a+");
		fwrite($erjrrkjfk, $b);
	}
 ?>