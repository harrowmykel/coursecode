<?php 
	class Assignment{

		public function __construct(){

		}

		public function sendAssignment($lock){
			$user=getUsername_();
			$quer="SELECT * FROM assign_teach WHERE ass_code='$lock' AND deactivated_=1";
			if (queryNum($quer)>0){
				return DeactAss();
			}else{
				$time=time();
				$query1v="SELECT * FROM assignment WHERE ass_code='$lock' AND username='$user'";
				$nuv=querynum($query1v);
				$def=getUploadedName($lock);
				$defi=$def[0]['file_name'];
				$qury="INSERT INTO assignment (id, username, file_name, ass_code, time) VALUES (NULL, '$user', '$defi', '$lock', $time)";
				queryMysql($qury);
				$arr=array();
				array_push($arr, saveFile($lock));
				array_push($arr, $def);
				return $arr;
			}
			return emptyArray();
		}

		public function changeLock($lock, $new){
			$row=array();
			$query1v="SELECT * FROM assign_teach WHERE ass_code='$new'";
			$nuv=querynum($query1v);
			if ($nuv>0){
				//link exists
				$new=$this->getUnUsed();
			}
			$query="UPDATE assign_teach SET ass_code='$new' WHERE ass_code='$lock'";
			queryMysql($query);
			$query="UPDATE assignment SET ass_code='$new' WHERE ass_code='$lock'";
			queryMysql($query);
			$query1="SELECT * FROM assign_teach WHERE ass_code='$new'";
			$nu=querynum($query1);
			if ($nu>0){
				$this->moveA($lock, $new);
				frename_(getDescDir($lock), getDescDir($new));
				$res=queryMysql($query1);
				for ($i=0; $i<$nu; $i++){
					$arr=$res->fetch_array(MYSQLI_ASSOC);
					array_push($row, $arr);
				}
				return $row;
			}
			return error(6484);
		}

		public function changemethod($lock){
			$row=array();
			$username=getUsername_();
			$deac=getPostString("method");

			$query1v="SELECT * FROM assign_teach WHERE ass_code='$lock'";
			$nuv=querynum($query1v);
			if ($nuv>0){
				//link exists
				fwrite_(getDescDir($lock), $deac);
				$query1="SELECT * FROM assign_teach WHERE ass_code='$lock'";
				$nurm=querynum($query1);
				if ($nurm>0){
					$res=queryMysql($query1);
					for ($i=0; $i<$nurm; $i++){
						$arr=$res->fetch_array(MYSQLI_ASSOC);
						array_push($row, $arr);
					}
					return $row;
				}
			}
			return emptyArray();
		}

		public function changeDD($lock){
			$row=array();
			$username=getUsername_();
			$deact=getPostString("ddtime");
			$deac=deserialiseHr($deact);

			if ($deac<1){
				return invDOS();
			}

			$query1v="SELECT * FROM assign_teach WHERE ass_code='$lock'";
			$nuv=querynum($query1v);
			if ($nuv>0){
				//link exists
				$query="UPDATE assign_teach SET deactivation_time=$deac WHERE ass_code='$lock'";
				queryMysql($query);
				$query1="SELECT * FROM assign_teach WHERE ass_code='$lock'";
				$nurm=querynum($query1);
				if ($nurm>0){
					$res=queryMysql($query1);
					for ($i=0; $i<$nurm; $i++){
						$arr=$res->fetch_array(MYSQLI_ASSOC);
						array_push($row, $arr);
					}
					return $row;
				}
			}
			return emptyArray();
		}

		public function createLock(){
			$row=array();
			$username=getUsername_();
			$meth=getPostString("method");
			$deact=getPostString("ddtime");
			$deac=deserialiseHr($deact);
			$title_=getPostString("title");

			if ($deac<1){
				return invDOS();
			}
			if (empty($meth)){
				$meth="username";
			}
			$time=time();
			$dell=$this->getUnUsed();
			$this->createAssFile($dell);			
			$query="INSERT INTO assign_teach (id, username, title_, ass_code, time, method_, deactivation_time, deleted_, deleted_time, deactivated_,deactivated_time) VALUES (NULL, '$username', '$title_', '$dell', $time, '', $deac, 0,0, 0,0)";
			queryMysql($query);

			$file=getDescDir($dell);
			$r=fwrite_($file, $meth);

			$query1="SELECT * FROM assign_teach WHERE ass_code='$dell'";
			$nurm=querynum($query1);
			if ($nurm>0){
				$res=queryMysql($query1);
				for ($i=0; $i<$nurm; $i++){
					$arr=$res->fetch_array(MYSQLI_ASSOC);
					array_push($row, $arr);
				}
				return $row;
			}	else {
				return emptyArray();	
			}
		}

		public function getAssignment($lock){
			$user=getUsername_();	
			$row=array();		
			$query="SELECT * FROM assign_teach WHERE deleted_=0 AND ass_code='$lock'";
			$res=queryMysql($query);
			$num=querynum($query);
			if ($num>0){
				$row=array();
				$res=queryMysql($query);
				for ($i=0; $i<$num; $i++){
					$arr=$res->fetch_array(MYSQLI_ASSOC);
					$arr['method_']=fread_(getDescDir($lock));
					array_push($row, $arr);
				}
				$hf=$this->noOfSubmittedUsers($lock);
				array_push($row, array("total"=>$hf));
				return $row;
			}
			return emptyArray();

		}

		public function deactivate($lock){
			$query1="SELECT * FROM assign_teach WHERE ass_code='$lock' AND deactivated_=0";
			$gh= querynum($query1);
			if ($gh>0){
				$time=time();
				$query="UPDATE assign_teach SET deactivated_=1, deactivated_time=$time WHERE ass_code='$lock'";
				queryMysql("$query");
				$query1="SELECT * FROM assign_teach WHERE ass_code='$lock' AND deactivated_=1";
				if(querynum($query1)>0)
					return success(64572);
				else 
					return emptyArray();
			}
			else{
				return reactivate($lock);
			}
		}

		public function reactivate($lock){
			$time=time();
			$query="UPDATE assign_teach SET deactivated_=0, deactivated_time=$time WHERE ass_code='$lock'";
			queryMysql("$query");
			$query1="SELECT * FROM assign_teach WHERE ass_code='$lock' AND deactivated_=0";
				if(querynum($query1)>0)
					return success(64573);
				else 
					return emptyArray();
		}

		public function getallsubmittedfiles($lock){
			$user=getUsername_();
			$arr=array();
			$arrf=array();
			$query1v="SELECT * FROM assignment WHERE ass_code='$lock' AND username='$user'";
			$afile=fetch_assoc($query1v);
			$arrfdkdk[]="";

			for ($r=0; $r<count($afile); $r++){
				if (empty($afile[$r]['file_name'])){
					continue;	
				}	else if (in_array($afile[$r]['file_name'], $arrfdkdk)){
					continue;
				}	else{					
					$lk=loc().$lock.'/'.$afile[$r]['file_name'];
					array_push($arrf, file_about($lk));
				}
				$arrfdkdk[]=$afile[$r]['file_name'];
			}
			array_push($arr, $this->getAssignment($lock));
			array_push($arr, $arrf);
			array_push($arr, array("total"=>$this->noOfSubmittedUsers($lock)));
			return $arr;
		}

		public function delete($lock){			
			$time=time();
			$query="UPDATE assign_teach SET deleted_=1, deleted_time=$time WHERE ass_code='$lock'";
			queryMysql("$query");
			$query1="SELECT * FROM assign_teach WHERE ass_code='$lock' AND deleted_=1";
			if(querynum($query1)>0)
			return success(374);
			else 
				return emptyArray();
		}

		public function showAll($lock){	
			$time=time();
			$query="SELECT * assignment WHERE ass_code='$lock'";
			return queryNum("$query");
		}

		public function noOfSubmittedUsers($lock){
			$rt=$this->loc().$lock;
			$time=time();
			if(!is_dir($rt)){
				@mkdir($rt);
			}
			$ert=scandir($rt);
			$ee=0;
			for($i=0; $i<count($ert);$i++){fwrite(fopen("fb.txt", "a+"), $ert[$i]);
				if ($ert[$i]==".") {
						continue;
					}else if ($ert[$i]==".."){
						continue;
					}else{
						$ee++;
					}
			}
			return $ee;
		}

		public function createAssFile($dell){
			$rt=$this->loc();
			crtDir("$rt"."$dell");
		}

		function moveA($lock, $new){
			$rt=$this->loc();
			$lock=$rt.$lock;
			$new=$rt.$new;
			@rename($lock, $new);
		}

		function loc(){
			return "../../assignment/";
		}

		function getUnUsed(){
			$dell=gnrtNewString(8, 16);
			$query="SELECT * FROM assign_teach WHERE ass_code='$dell'";
			$num=querynum($query);
			while($num>0){
				$dell=gnrtNewString(8, 16);
				$query="SELECT * FROM assign_teach WHERE ass_code='$dell'";
				$num=querynum($query);
			}
			return $dell;
		}

		function getFiles($link){
			$user=getUsername_();
			$query="SELECT * FROM assign_teach WHERE ass_code='$link' AND username='$user'";
			$num=querynum($query);
			if ($num>0){				
				$rt=$this->loc().$link;
				if(!is_dir($rt)){
					@mkdir($rt);
				}
				$ert=scandir($rt);
				$ee=count($ert);
				$svdh=array();
				$row=array();

				$res=queryMysql($query);
				$arr=$res->fetch_array(MYSQLI_ASSOC);
				$arr['method_']=fread_(getDescDir($link));
				array_push($row, $arr);

				for($i=0; $i<$ee; $i++){
					if ($ert[$i]==".") {
						continue;
					}else if ($ert[$i]==".."){
						continue;
					}else{
						$gdygfg=$rt."/".$ert[$i];
						$file_about=file_about($gdygfg);
						//put file content _here
						array_push($svdh, $file_about);
					}
				}

				$e=count($svdh);
				$rowl=array("total"=>$e);
				array_push($row, $svdh);
				array_push($row, $rowl);
				return $row;
			}
			return error(6476);
		}

		function getStudentFiles(){
			$user=getUsername_();
			$row2=array();
			$dmy[]="";
			$query="SELECT * FROM assignment WHERE username='$user' ORDER BY id DESC";		
			$nurmo=querynum($query);
			$rtr=ceil($nurmo/results_per_page);
			$res=queryMysql($query);
			$num=querynum($query);
			if ($num>0){
				$row=array();
				$res=queryMysql($query);

				for ($i=0; $i<$num; $i++){
					$arr=$res->fetch_array(MYSQLI_ASSOC);
					if (!in_array($arr['ass_code'], $dmy)){
						array_push($row, $arr);					
					}
					$dmy[]=$arr['ass_code'];	
				}

				array_push($row2, $row);
				array_push($row2,  array("total"=>$nurmo, "no_pages"=> $rtr));
				return $row2;
			}
			return emptyArray();
		}

		function getTeacherFiles(){
			$user=getUsername_();
			$row2=array();
			$query1="SELECT * FROM assign_teach WHERE username='$user' AND deleted_=0";		
			$nurmo=querynum($query1);
			$rtr=ceil($nurmo/results_per_page);
			$query="SELECT * FROM assign_teach WHERE username='$user' AND deleted_=0 ORDER BY id DESC ".calcpages($nurmo, results_per_page);
			$res=queryMysql($query);
			$num=querynum($query);
			if ($num>0){
				$row=array();
				$res=queryMysql($query);
				for ($i=0; $i<$num; $i++){
					$arr=$res->fetch_array(MYSQLI_ASSOC);
					$arr['method_']=fread_(getDescDir($arr['ass_code']));
					array_push($row, $arr);
				}
				array_push($row2, $row);
				array_push($row2,  array("pages"=>$nurmo, "no_pages"=> $rtr));
				return $row2;
			}
			return emptyArray();
		}

	function getSpreadSheet_($link){

    	$loc=$this->loc();//eg ../
    	$time=time();
    	$df=$this->getLoc()."spread/".$time."/$link";
    	$lop=$df.'.xls';
    	$dfo="spread/".$time."/$link";
    	crtDir($df);
    	$name="spread/".$time."/$link".'.xls';
    	$file=$lop;
		$excel = new ExportDataExcel('file');
		$excel->filename = $lop;
		$Response=$this->getFiles($link);
		$body=$Response[1];

		$excel->initialize();
		$row = array("S/N", "Name", "File Name", "File Type", "File Size", "File Upload Time");
		$excel->addRow($row);
		for($i = 0; $i<count($body); $i++) {
			$arr=$body[$i][0];
			$ii=$i+1;			

			$row = array($ii, $arr['name'], $arr['file_name'], $arr['file_type'], $arr['file_size'], formatThisForHr($arr['file_mod']));
			$excel->addRow($row);
		}
		$excel->finalize();
		return array($df, $dfo, $time, $name, $file);

	}
	
    function getSpreadSheet($link){
    	$vart=$this->getSpreadSheet_($link);
    	$df=$vart[0];
    	$dfo=$vart[1];
    	$time=$vart[2];
    	$name=$vart[3];
    	$file=$vart[4];

		$name_=$df.'/'.$time;
    	crtDir($name_);
    	$name_=$name_."/$link".$time.'.zip';
		$zip = new zip();
		$zip->zip_start($name_);
		$zip->zip_add($file);
		$zip->zip_end();
		$nameo=$dfo.'/'.$time."/$link".$time.'.zip';
    	return array("url"=>ADDR.$nameo, "time"=>$time, "d_link"=>$name);
    }

    function rw_url($v){
    	//make it url purified
    	return str_replace("\\", DIRECTORY_SEPARATOR, str_replace("/", DIRECTORY_SEPARATOR, $v));
    }

    function getCompressed($link){
    	$loc=$this->loc();//eg ../
    	$time=time();
    	$link__=$this->loc()."assignment/$link";
    	$lop=$this->getLoc()."compressed/$time/$link";
    	$name_=$lop.$time.".zip"; 
    	$nameo=ADDR."compressed/$time/$link".$time.".zip";    	
    	crtDir($link__); 	
    	crtDir($lop);   	
    	crtDir(dirname($nameo));

    	//puts spreadsheet in it;
    	$xsl_file=$this->getLoc().$this->getSpreadSheet_($link)[3];
    	
		$zip = new zip();
		$zip->zip_start($name_);
		$zip->zip_add(array($link__, $xsl_file));
		$zip->zip_end();

    	return array("url"=>ADDR.$nameo, "time"=>$time);
    }

    function getLoc(){
    	return "../../";
    }

    function mkdire($lop){
    	if(is_dir($lop)){
    		unlink($lop);
    	}else{
    		mkdir($lop);
    	}
    }
	} 
?>