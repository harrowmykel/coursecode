<?php 
header('Access-Control-Allow-Origin: *');
  define("lib_stor", "libs/");
  // $jdf=fopen("chdbd.txt", "a+");
  // fwrite($jdf, "string");
  $rel="" .lib_stor;
  require_once($rel."constant.php");
  require_once($rel."db.php");
  require_once($rel."profile.php");
  require_once($rel."assignment.php");
  require_once($rel."file.php");
  require_once($rel."verifier.php");
  require_once($rel."report.php");
  require_once($rel."email.php");
  require_once($rel."ip_.php");
  require_once("../"."db_vr.php");
  $hasBeenCheck=false;

  if (checkAppid()){
    if (checkquerry()){
      $user=getUser();
      $userId=getProfid($user);
      setUsername_($userId);
      $hasBeenCheck=true;
    } else{
      if (checkUserPass()){
        $user=getUser();
        $userId=getProfid($user);
        setUsername_($userId);
        $hasBeenCheck=true;
      }else{
        release(invUserPass());
      }     
    }
  }else{
    release(invAppId());
  }

  if ($hasBeenCheck){
    $req=getRequest();
    switch($req){
        case "changedd":
        release(changedd());
        break;  
      case "createlock":
        release(createLink());        
        break;
      case "changelock":
        release(changeLink());        
        break;
      default:
        release(undefReq());
        break;
    }
  }

  function checkquerry(){
    $req=getRequest();
    switch($req){    
      default:
        return false;
    }
      return false;

  } 
?>