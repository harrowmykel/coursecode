<?php 
	//this class generates ads

	/*
		$adGen=new adGen(2);
	  	$ad_type=$adGen->BannerAd();
	    $ad_type=$adGen->GridAd();
	    $img_link =$adGen->genImglink($ad_type);
	    $url_link=$adGen->genAdLink($ad_type);
	    $ad_desc=$adGen->genAdDesc($ad_type); 
    */

	class adGen2{
		var $to, $current_array;

		function __construct(){
		}

		function getTo(){			
			if (isset($_GET['to'])){
				return $_GET['to'];
			}
			return "null";
		}

		function BannerAd(){	
			$query="SELECT * FROM adtable where type=1 AND deactivated=0";
			
			return $this->Calc_and_mk_curr_array($query);
		}

		function GridAd(){	
			$query="SELECT * FROM adtable where type=2 AND deactivated=0";

			return $this->Calc_and_mk_curr_array($query);
		}

		function Calc_and_mk_curr_array($query){			
			$request=queryMysql($query);
			$num=queryNum($query);
			$arr=array();

			if ($num>0){
				for ($i=0; $i<$num; $i++){
					$row=$request->fetch_array(MYSQLI_ASSOC);
					array_push( $arr, $row);
				}
			} 

			if ($num!=1){
				$rando=$num-1;				
			}else{
				$rando=$num;
			}

			$rand=rand(0, $rando);

			$this->current_array=$arr[$rand];

			return $arr[$rand]['id'];
		}

		function genImglink($ad_id){
			return $this->current_array["img_link"];
		}

		function getUser(){
			return $this->current_array["username"];
		}

		function genAdLink($ad_id){	
			// return $this->current_array["ad_link"];			
			return "http://adpay.tk/goad/".$this->current_array["id"]."/".$this->getUser();
		}

		function genAdDesc($ad_id){
			return $this->current_array["ad_desc"];
		}
		
		function genBannerAd(){	
		// echo $_GET['to'];
			$ad_id=rand(1, 3);
			if ($ad_id==2){
				return "_include/img/work/thumbs/ad/banner_ade.png";
			}
			return "_include/img/work/thumbs/ad/campaign.png";
		}

		function genGridAd(){
			$ad_id=rand(3, 7);
			if ($ad_id==3){
				return "_include/img/work/thumbs/ad/light_ade.png";
			} else if ($ad_id==4){
				return "_include/img/work/thumbs/ad/blue_ade.png";
			} else if ($ad_id==5){
				return "_include/img/work/thumbs/ad/dark_ade.png";
			} else if ($ad_id==6){
				return "_include/img/work/thumbs/ad/banner_ade.png";
			} 
			return $this->genBannerAd();			
		}

		function genRandomAd($title){
			
		}
	}


	class adGen{
		var $to;

		function __construct(){

		}

		function getTo(){			
			if (isset($_GET['to'])){
				return $_GET['to'];
			}
			return "null";
		}

		function BannerAd(){	
			$ad_id=rand(6, 7);
			return $ad_id;
		}

		function GridAd(){	
			$ad_id=rand(2, 5);
			return $ad_id;
		}

		function genImglink($ad_id){	
			$ad_id=$ad_id;
			if ($ad_id==3){
				return "_include/img/work/thumbs/ad/light_ade.png";
			} else if ($ad_id==4){
				return "_include/img/work/thumbs/ad/blue_ade.png";
			} else if ($ad_id==5){
				return "_include/img/work/thumbs/ad/dark_ade.png";
			} else if ($ad_id==6){
				return "_include/img/work/thumbs/ad/banner_ade.png";
			} else if ($ad_id==7){
				return "_include/img/work/thumbs/ad/campaign.png";
			}
			return "_include/img/work/thumbs/ad/campaign.png";
		}

		function genAdLink($ad_id){	
			return "../index.html";
		}


		function genAdDesc($ad_id){
			return "Create ad";
		}
		
		function genBannerAd(){	
		// echo $_GET['to'];
			$ad_id=rand(1, 3);
			if ($ad_id==2){
				return "_include/img/work/thumbs/ad/banner_ade.png";
			}
			return "_include/img/work/thumbs/ad/campaign.png";
		}

		function genGridAd(){
			$ad_id=rand(3, 7);
			if ($ad_id==3){
				return "_include/img/work/thumbs/ad/light_ade.png";
			} else if ($ad_id==4){
				return "_include/img/work/thumbs/ad/blue_ade.png";
			} else if ($ad_id==5){
				return "_include/img/work/thumbs/ad/dark_ade.png";
			} else if ($ad_id==6){
				return "_include/img/work/thumbs/ad/banner_ade.png";
			} 
			return $this->genBannerAd();			
		}

		function genRandomAd($title){
			
		}
	}
	
?>