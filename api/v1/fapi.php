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
  require_once("php-export-data-master/php-export-data.class.php");
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
    deactivateAll_();
    
    switch($req){
      case "checkuser":
        release(checkuser());
        break;
      case "contact":
        release(contact());
        break;
      case "changedd":
        release(changedd());
        break;  
      case "getstudentfiles":
        release(getStudentFiles());
        break;
      case "getteacherfiles":
        release(getTeacherFiles());
        break;
      case "getsubmittedfiles":
        release(getSubmittedFiles());
        break;
      case "createlock":
        release(createLink());        
        break;
      case "changelock":
        release(changeLink());        
        break;
      case "getfiles":
        release(getfiles());        
        break; 
      case "compressed":
        release(getCompressed());        
        break; 
      case "spreadsheet":
        release(getSpreadSheet());        
        break;       
      case "insertfile":
        release(insertfile());        
        break;
      case "getallsubmittedfiles":
        release(getallsubmittedfiles());        
        break; case "editpass":
        release(editpass());
        break;
      case "changemethod":
        release(changemethod());
        break;        
      case "no_user":
        release(totalLink());        
        break;        
      case "delete":
        release(deleteLink());        
        break;
      case "createprof":
        release(createprof());
        break;
      case "editprof":
        release(editprofile());
        break;
      case "deactivate":
        release(deactivate());
        break;
      case "reactivate":
        release(reactivate());
        break;
      case "createLink":
        release(createLink());
        break;
      case "frgtpass":
        release(frgtPass());
        break;
      case "contactnolog":
        release(contact_notlogg());
        break;         
      default:
        release(undefReq());
        break;
    }
  }

  function checkquerry(){
    $req=getRequest();
    switch($req){     
      case "createprof":
        return true;
        break;
      case "contact":
        return true;
        break;
      case "contactnolog":
        return true;
        break;
      case "createnolog":
        return true;
        break;
      case "frgtpass":
        return true;
        break;
      default:
        return false;
    }
      return false;

  } 
?>