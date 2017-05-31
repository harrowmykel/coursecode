<?php 
header('Access-Control-Allow-Origin: *');
  define("lib_stor", "libs/");
  // $jdf=fopen("chdbd.txt", "a+");
  // fwrite($jdf, "string");
  $rel="" .lib_stor;
  require_once($rel."constant.php");
  require_once($rel."db.php");
  require_once($rel."profile.php");
  require_once($rel."verifier.php");
  require_once($rel."report.php");
  require_once("../"."db_vr.php");
  $hasBeenCheck=false;


  if (!checkAppid()){
    release(invAppId());
  }else{
    $hasBeenCheck=true;
  }

  if ($hasBeenCheck){
    $req=getRequest(); 
    deactivateAll_();
    
    switch($req){
      case "single":
        release(single());
        break;
      case "multi":
        release(multi());
        break;
      case "search":
        release(search());
        break;  
      case "allfrom":
        release(allfrom());
        break;
      default:
        release(undefReq());
        break;
    }
  }
?>