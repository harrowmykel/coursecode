<?php 
    include 'beginn.php';
    $link=isset($_GET['link']) ? urldecode($_GET['link']) : '';
    $act=isset($_GET['todo']) ? urldecode($_GET['todo']) : '';
    $message="";

    $erto=new apiQuery();
    $Response=$erto->getAllUserSubmittedfile(getUser(), getPass(), $link);
    $body=$Response->body;
    if (isset($body[0]->error)){
        $erot=false;
        $error=$body[0]->error_more;
    }else{
        $words=$body[0][0];
        $numm=count($words);
        $erot=true;
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

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">


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
            <li class='active'><a href='#'><i class="icon icon-eye-open"> </i> View Submitted Assignments</a></li>
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
                <div class="col-md-8 col-sm-7">
                    <?php echo $message;
                        $arrayu=array("panel-green", "panel-yellow", "panel-info", "panel-default");
                        $color=$arrayu[rand(0,3)];
                    ?>
                    <div class="panel <?php echo $color;?>">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart-o fa-fw fa-5x"></i>
                                </div>                                
                                <div class="col-xs-9">
                                    <div class="huge text-right"><?php echo $link; ?></div>
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
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <i class="fa fa-list-ul fa-fw"></i> Submissions
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body reduce_margin">
                            <table class='table table-condensed table-striped table-hover table-bordered'>
                                <thead>
                                 <tr>
                                     <th>S/N</th>
                                     <th>Name</th>
                                     <th>File Name</th>
                                     <th>File Type</th>
                                     <th>File Size</th>
                                     <th>File Upload Time</th>
                                </tr>
                                </thead>
                                  <tbody>
                            <?php
                            if($erot){
                                $body1=$body[1];
                                for($i = 0; $i<count($body1); $i++) {
                                    $arr=$body1[$i][0];
                                    $ii=$i+1;       
                                    $rtjfjn=formatThisForHr($arr->file_mod);
                                    echo "<tr>";    
                                    echo "<td>$ii</td>";
                                    echo "<td>$arr->name</td>"; 
                                    echo "<td>$arr->file_name</td>";    
                                    echo "<td>$arr->file_type</td>";    
                                    echo "<td>$arr->file_size</td>";    
                                    echo "<td>$rtjfjn</td>";
                                }
                            }
                        ?>
                                    </tbody>
                                </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-md-4 col-sm-5">
                    <?php
                        $arrayu=array("panel-green", "panel-yellow", "panel-info", "panel-red", "panel-default", "panel-warning");
                        $color=$arrayu[rand(0,5)];
                    ?>
                    <div class="panel <?php echo $color;?>">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-fw fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">                      
                                        <?php
                                            if($erot){
                                                echo $body[2]->total;
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
                                            $view=$body[2]->total;
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
                    <!-- /.panel .chat-panel -->'>
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

    <!-- Custom Theme JavaScript -->
    <script src='../assets/js/k.js'></script>
    <script src='../assets/js/docs.min.js'></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src='../../assets/js/ie10-viewport-bug-workaround.js'></script>
		</div>
  </div>
	</div>
  </body>
</html>
