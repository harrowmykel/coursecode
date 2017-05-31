<?php

	function getPrimaryLink(){
		return "http://localhost/Adpay/xeon/";
	}

	function getShrtenedLinkdir(){
		return "small/";
	}

	function getLinkToGo(){
		$last_url=getLastUrl(0);
		$link_to_go_to="";
		$er=getUrlAsDir();
		$url=fetch_url();

		if (getLastUrl(1)=="es" || getLastUrl(0)=="es"){
			//spanish
			$frr="es";
			$link_to_go_to=getLangLink($frr);
		}
		else if (getLastUrl(1)=="fr" || getLastUrl(0)=="fr"){
			// french
			$frr="fr";
			$link_to_go_to=getLangLink($frr);
		}
		else if (getLastUrl(1)=="de" || getLastUrl(0)=="de"){
			//german
			$frr="de";
			$link_to_go_to=getLangLink($frr);
		}else if(is_file(getShrtenedLinkdir().getLastUrl(0).'.php')){
			$link_to_go_to=getShrtenedLinkdir().getLastUrl(0).'.php';
		}else if (is_dir(getLastUrl(1))){
			$link_to_go_to=getThisUrlDir().'/'.getLastUrl(1).'/'.getLastUrl(0);
		}else if (is_file(getLastUrl(0))){
			$link_to_go_to=getThisUrlDir().'/'.getLastUrl(0);
		}else if(empty($last_url)){
			$link_to_go_to="index.html";
		}else{
			$link_to_go_to=getLastUrl(0);
		}

		return $link_to_go_to;
	}

	function getLinkToGoNow(){
		$last_url=getLastUrl(0);
		$link_to_go_to="";
		$er=getUrlAsDir();
		$url=fetch_url();

		if (getLastUrl(1)=="es" || getLastUrl(0)=="es"){
			//spanish
			$frr="es";
			$link_to_go_to=getLangLink($frr);
		}
		else if (getLastUrl(1)=="fr" || getLastUrl(0)=="fr"){
			// french
			$frr="fr";
			$link_to_go_to=getLangLink($frr);
		}
		else if (getLastUrl(1)=="de" || getLastUrl(0)=="de"){
			//german
			$frr="de";
			$link_to_go_to=getLangLink($frr);
		}else if(empty($last_url)){
			$link_to_go_to="index.html";
		}else{
			$link_to_go_to=getLastUrl(0);
		}

		return $link_to_go_to;
	}

	function getLangLink($er){
		if (getLastUrl(0)==$er){
			return getThisUrlDir().'/'.getLastUrl(0);			
		}
		return getThisUrlDir().'/'.getLastUrl(1).'/'.getLastUrl(0);
	}


	function getUrlAsDir(){
		$last_url = getUrlDir().'/'.getLastUrl(0);
		return $last_url;
	}

	function getUrlDir(){
		$website=website;
		$url=fetch_url();
		$arr=explode("/", $url);
		$num = count($arr)-1;

		$rtygy="";
		$nu=$num-1;
		for($df=0; $df<$nu; $df++){
			if(!empty($rtygy))
				$rtygy=$rtygy."/".$arr[$df];
			else
				$rtygy=$arr[$df];
		}

		$last_url = $rtygy;
		return $last_url;
	}


	function getThisUrlDir(){
		$url=$_SERVER["PHP_SELF"];

		$arr=explode("/", $url);
		$num = count($arr)-1;

		$rtygy="";
		$nu=$num-1;
		for($df=0; $df<$nu; $df++){
			if ($arr[$df]==name){	
				continue;				
			}
				if(!empty($rtygy))
					$rtygy=$rtygy."/".$arr[$df];
				else
					$rtygy=$arr[$df];	
		}

		$last_url = $rtygy;
		return $last_url;
	}

	function getLastUrl($r){
		$Request=website;
		return getLastWord($Request, $r);
	}

	function getLastWord($Request, $r){
		$rn=$r+1;
		$website=$Request;
		$url=fetch_url();
		$arr=explode("/", $url);
		$num = count($arr)-$rn;
		$last_url = "";

		//url= link up
		$last_url = $arr[$num];
		return $last_url;
	}

	function fetch_url()
	{	
		$website=website;
		$url= $_SERVER["PHP_SELF"];

		if ($url!=$website){
			if (isset($_SERVER['REQUEST_URI'])){
				$url= $_SERVER['REQUEST_URI'];
			}
		}

		if ($url!=$website){
			if (isset($_SERVER['HTTP_REFERER'])){
				$url= $_SERVER['HTTP_REFERER'];
			}
		}

		return $url;
	}

?>