<?php 
    include 'beginn.php';
    $link=isset($_GET['link']) ? urldecode($_GET['link']) : '';
    $act=isset($_GET['todo']) ? urldecode($_GET['todo']) : '';
    $message="";

    $ass_code="Insert Assignment Code";
    $erot=false;
    $error="Input Assignment Code first";
    $apiquery=new apiQuery();

    if (isset($_POST['dummy'])){
      $ass_code=$_POST['ass_code'];
      if (!empty($ass_code)){
          $res=$apiquery->getfile(getUser(), getPass(), $ass_code);
          $body=$res->body;
          if (isset($body[0]->ass_code)){
            $words=$body[0];
            $erot=true;
            if (isset($words->deactivated_)){
              if($words->deactivated_==1){
                $message= "<div class='alert fade-in m-warning'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>This assignment has been deactivated!</strong>
                          </div>";                    
              }            
            }
          }else if (isset($body[0]->error_more)) {
            $error=$body[0]->error_more;
            $message= "<div class='alert fade-in m-warning'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Sorry,  An Error Occured! $error</strong>
                      </div>";
          }
      }
    }

    if (isset($_POST['ddmy'])){
        $file_dump="b/";
        mkdire($file_dump);
        $bb=mkdire($file_dump.gnrtNewString(2, 6)."/");
      if (!isset($_POST['crtefile'])){
        $rname=$_FILES['assign']['name'];
        $f_location=$bb.$rname;

        while(is_file($f_location) && file_exists($f_location)){
          $bb=mkdire($file_dump.gnrtNewString(2, 6)."/");
          $f_location=$bb.$rname;
        }

        move_uploaded_file($_FILES['assign']['tmp_name'], $f_location);
      }else{
        $rname=isset($_POST["assign_name"])?$_POST["assign_name"]:"no name.txt";
        $f_content=isset($_POST["fillew"])?$_POST["fillew"]:"";

        $bb=mkdire($file_dump.gnrtNewString(2, 6)."/");
        $f_location=$bb.$rname;

        while(is_file($f_location) && file_exists($f_location)){
          $bb=mkdire($file_dump.gnrtNewString(2, 6)."/");
          $f_location=$bb.$rname;
        }

        fwrite(fopen($f_location, "a+"), $f_content);
      }
      $res=$apiquery->submitFile(getUser(), getPass(), $ass_code, $f_location);
      if(isset($res[0]->error)){
         $errrr=$res[0]->error_more;
         $message= "<div class='alert fade-in m-warning'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Sorry,  An Error Occured! $errrr</strong>
          </div>";        
      }else if (isset($res[0][0]->error)){
        $errrr=$res[0][0]->error_more;
        $message= "<div class='alert fade-in m-warning'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Sorry,  An Error Occured! $errrr</strong>
          </div>";
        unlink($f_location);
      } else if (isset($res[0][0]->success)){
        $f_nm=$res[1][0]->file_name;
        $f_sz=$res[1][0]->file_size;
         $message= "<div class='alert fade-in m-warning'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>success,  File Uploaded as $f_nm ($f_sz)!</strong>
          </div>";
        unlink($f_location);
      }
    }
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <link rel='icon' href='../assets/ico/favicon.png'>

    <title>CourseCode</title>

    <!-- Bootstrap core CSS -->
    <link href='../assets/css/bootstrap.min.css' rel='stylesheet'>
    <link href='../assets/css/font-awesome.mn.css' rel='stylesheet'>
    <link href='../assets/css/font-awesome.min.css' rel='stylesheet'>

    <!-- MetisMenu CSS -->
    <link href="../assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom Fonts -->

    <!-- Custom styles for this template -->
    <link href='../assets/css/styles.css' rel='stylesheet'>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src='../../assets/js/ie8-responsive-file-warning.js'></script><![endif]-->
    <script src='../../assets/js/ie-emulation-modes-warning.js'></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
      <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->
  </head>

  <body>

    <div class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
      <div class='container-fluid'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='.navbar-collapse'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='index.php'>CourseCode</a>
        </div>
        <div class='navbar-collapse collapse'>
          <ul class='nav navbar-nav navbar-right'>            
            <li><a href='index.php?page=1'> Submitted Assignments</a></li>
            <li><a href='crt.php?page=1'> Created Assignments</a></li>
            <li><a href='profile.php'> Profile</a></li>
            <li><a href='edit.php'> Edit Profile</a></li>
            <li><a class='logout' href='logout.php'>Logout</a></li>
          </ul>
          <form class='navbar-form navbar-right' action='search.php' method='POST'>
            <input type='text' class='form-control' name='search' placeholder='Search...'>
          </form>
        </div>
      </div>
    </div>
  
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-sm-4 col-md-3 sidebare'>
          <ul class='nav nav-sidebar'>
            <li><a href='index.php?page=1'><i class="icon icon-plus"></i> Submitted Assignments</a></li>
            <li class='active'><a href='#'><i class="icon icon-eye-open"> </i> Submit a new file</a></li>
            <li><a href='crt.php?page=1'><i class="icon icon-pencil"></i> Created Assignments</a></li>
            <li><a href='profile.php'><i class="fa fa-newspaper-o"></i> Profile</a></li>
            <li><a href='edit.php'><i class="icon icon-edit"></i> Edit Profile</a></li>
          </ul>
          <hr/>
          <ul class='nav nav-sidebar'>
            <li><a class='logout' href='logout.php'><i class="fa fa-sign-out"> Logout</i></a></li>
          </ul>
        </div>
        <div class='col-sm-8 col-sm-offset-4 col-md-9 col-md-offset-3 main'>
          <h1 class='page-header'><?php echo $link ?></h1> 
            <div class="row">
                <div class="col-lg-8">
                    <?php echo $message;?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Input Assignment Code
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">                            
                          <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <input type='text' name='ass_code' value="<?php echo $ass_code;?>" class='form-control' placeholder='Input Assignment Code'/>  <br>
                            <input type='hidden' name="dummy" value="Go"/>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer"> 
                            <input type='submit' class='btn btn-success btn-sm btn-lng' value="Go"/>    
                          </form>   
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel -->
                    <?php
                        $arrayu=array("panel-green", "panel-yellow", "panel-info", "panel-default");
                        $color=$arrayu[rand(0,2)];
                        
                    ?>
                    <div class="panel <?php echo $color;?>">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart-o fa-fw fa-5x"></i>
                                </div>                                
                                <div class="col-xs-9">
                                    <div class="huge text-right"><?php echo $ass_code; ?></div>
                                  </div>
                              </div>
                          </div>
                        <!-- /.panel-heading --> 
                            <div class="panel-footer">
                                <b class="pull-left"> 
                                    Title                                
                                </b>
                                <div class="clearfix"></div>
                            </div>
                        <!-- /.panel-footer -->                        
                        <div class="panel-body">    
                            <?php
                                if($erot){                                    
                                    $method=$words->title_;
                                    echo $method;
                                }
                            ?> 
                        </div>
                        <!-- /.panel-body -->  
                        <div class="panel-footer">
                            <b class="pull-left"> 
                                Description                               
                            </b>    
                            <div class="clearfix"></div>
                        </div>
                    <!-- /.panel-footer -->                        
                        <div class="panel-body">
                            <?php
                                if($erot){                                    
                                    $method=$words->method_;
                                    echo Markdown($method);
                                }
                            ?> 
                        </div>
                        <!-- /.panel-body --> 
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Submit Assignment
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Upload a file</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Create a file</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home"> <br>
                                  <form method='POST' enctype='multipart/form-data' action="<?php echo $_SERVER['PHP_SELF'];?>">
                                    <input type='file' name='assign'><br>
                                      <input type='hidden' name='ass_code' value="<?php echo $ass_code;?>"/> 
                                    <input type='hidden' value='remember-me' name='ddmy'> 
                                    <input type='hidden' value='remember-me' name='dummy'>   
                                    <input type='hidden' value='remember-me' name='upldfile'> 
                                    <input type='submit' class='btn btn-sm btn-lng btn-success' value='Submit'/> 
                                  </form>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                  <br>
                                  <form method='POST' action="<?php echo $_SERVER['PHP_SELF'];?>">
                                    <input type='text' class='form-control' name='assign_name' placeholder='File name'><br>
                                    <textarea class='form-control' name='fillew'>Type Assignment here </textarea>

                                    <div class='checkbox'>
                                      <label>
                                        <input type='checkbox' value='remember-me' name='use_below'> Use The text Above
                                      </label>
                                      <input type='hidden' name='ass_code' value="<?php echo $ass_code;?>"/>    
                                    </div>
                                    <input type='hidden' value='remember-me' name='ddmy'> 
                                    <input type='hidden' value='remember-me' name='dummy'>   
                                    <input type='hidden' value='remember-me' name='crtefile'>   
                                    <input type='submit' class='btn btn-smbtn-lng btn-success' value='Submit'/> 
                                  </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <?php
                        $arrayu=array("panel-green", "panel-yellow", "panel-info", "panel-red", "panel-default");
                        $color=$arrayu[rand(0,3)];
                    ?>
                    <div class="panel <?php echo $color;?>">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bell fa-fw fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">                      
                                        <?php
                                            if($erot){
                                                echo $body[1]->total;
                                            }else{
                                                echo "0";
                                            }?>
                                    </div>
                                    <div>Total Submissions!</div>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body reduce_margin">                           
                            <div class="list-group">
                                    <?php
                                        if($erot){
                                            $gen_url=$words->ass_code;
                                            $deactivated=$words->deactivated_;
                                            $method=$words->method_;
                                            $view=$body[1]->total;
                                            $time=formatThisForHr($words->time);
                                            $deactivatedtime=formatThisForHr($words->deactivated_time);
                                            $deactivationtime=formatThisForHr($words->deactivation_time);
                                            if($deactivated!=0){
                                                $deact='Reactivate';
                                            }else{
                                                $deact='Deactivate';
                                            }
                                            $array_1=array("Assignment code",
                                                            "Total Submission",
                                                            "Time", 
                                                            "Submission Time",
                                                            "Deactivated",
                                                            "Deactivation Time");
                                            $array_2=array("$gen_url", "$view",
                                                            "$time", 
                                                            "$deactivationtime",
                                                            "$deactivated",
                                                            "$deactivatedtime");
                                            for($ioi=0; $ioi<count($array_2); $ioi++){
                                                echo "<div class='list-group-item'>
                                                            <i class='fa fa-comment fa-fw'></i>".$array_1[$ioi]."
                                                            <span class='pull-right text-muted small'><em>".$array_2[$ioi]."</em>
                                                            </span>
                                                      </div>";
                                            }
                                        }else{
                                            echo "<div href='#' class='list-group-item'>
                                                        <i class='fa fa-comment fa-fw'></i>1
                                                        <span class='pull-right text-muted small'><em>$error</em>
                                                        </span>
                                                    </div>";
                                        }
                                     ?>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    <div class="panel panel-green">
                      <?php 
                          $quot_api=new ApiQuery();
                          $quot_him=$quot_api->getSingleQuote()->body[0];
                      ?>
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">                      
                                    <i class="fa fa-quote-left icon-md"></i></a>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">                      
                                        <?php $prov_id=$quot_him->prov_id; echo $prov_id; ?>
                                    </div>
                                    <div>
                                      <?php $prov_auth=$quot_him->prov_author;
                                           $lij="quote.php?q=$prov_auth";
                                            echo "<span class='be_ins'>$prov_auth</span>";
                                            echo "<a href='$lij' class='auth' id='$prov_id'></a>";
                                          ?>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.panel-heading -->   
                        <div class="panel-body">
                            <?php echo $quot_him->prov_text; ?>
                        </div>   
                        <div class="panel-footer">
                            <span class="pull-left be_ins">Be Inspired!</span>
                            <span class="pull-right"><i class="fa fa-heart-o fa-3x" id="love"></i></span>
                            <span class="pull-right"><i class="fa fa-heart fa-3x" id="loved"></i></span>
                            <div class="clearfix"></div>
                        </div>      
                    </div><!-- /.panel --> 
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
          
        </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src='../assets/js/jquery.js'></script>
    <script src='../assets/js/bootstrap.min.js'></script>
    <script type="text/javascript" src="../assets/js/k.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src='../assets/js/docs.min.js'></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src='../../assets/js/ie10-viewport-bug-workaround.js'></script>
    </div>
  </div>
  </div>
  </body>
</html>
