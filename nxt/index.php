<?php include 'beginn.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../assets/ico/favicon.png">

    <title>CourseCode</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href='../assets/css/font-awesome.mn.css' rel='stylesheet'>
    <link href='../assets/css/font-awesome.min.css' rel='stylesheet'>

    <!-- MetisMenu CSS -->
    <link href="../assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/styles.css" rel="stylesheet">

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">CourseCode</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php?page=1">Submitted Assignments</a></li>
            <li><a href="crt.php?page=1">Created Assignments</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="edit.php">Edit Profile</a></li>
            <li><a class="logout" href="logout.php">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right" action="search.php" method="POST">
            <input type="text" class="form-control" name="search" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>
  
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4 col-md-3 sidebare">
          <ul class='nav nav-sidebar'>
            <li class="active"><a href='index.php?page=1'><i class="icon icon-plus"></i> Submitted Assignments</a></li>
            <li><a href='crt.php?page=1'><i class="icon icon-pencil"></i> Created Assignments</a></li>
            <li><a href='profile.php'><i class="fa fa-newspaper-o"></i> Profile</a></li>
            <li><a href='edit.php'><i class='icon icon-edit'></i> Edit Profile</a></li>
          </ul>
          <hr/>
          <ul class='nav nav-sidebar'>
            <li><a class='logout' href='logout.php'><i class="fa fa-sign-out"> Logout</i></a></li>
          </ul>
        </div>
        <div class="col-sm-8 col-sm-offset-4 col-md-9 col-md-offset-3 main">
          <h1 class="page-header">Assignments</h1>
          <div class="row">
            <div class="col-md-8 col-sm-7">

              <?php 
              
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

                $ert=new apiQuery();
                $rtyt=isset($_GET['page']) ? $_GET['page'] : 1;
                $Response=$ert->studentfile(getUser(), getPass(), $rtyt);
                
                $body=$Response->body;
                // var_dump{$body);
                if (isset($body[0]->error)){
                  $erot=false;
                  $error=$body[0]->error_more;
                  //error
                }else{
                  $words=$body[0];
                  $numm=count($words);
                  $erot=true;
                  $no_pages=$body[1]->no_pages;
                }
                $erru=$_SERVER['PHP_SELF']."?page=$rtyt";
              ?>

              
              <!-- link -->
              <div > 
                   <a href="subnew.php?new"><button class="web_appp btn pull-right btn-sm btn-success btn-go btnn-go frfo bfjfg" id="go"><i class="fa fa-plus"></i> Submit A New Assignment</button></a>
              </div>

              <!-- link -->
              <!-- link -->
              <a href="<?php echo $erru;?>" style="margin-bottom:15px;"><span class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Refresh</span></a>
              <table class="table table-condensed table-striped table-hover table-bordered">
                <thead>
                  <tr>
                   <th><i class="fa fa-hashtag"></i></th>
                    <th><i class="fa fa-code"></i> Assignment Code</th>
                    <th><i class="fa fa-clock-o"></i> Time Submitted</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $prv=$rtyt-1;
                    if($erot){
                      for($i=0, $io=($prv*50)+1; $i<$numm; $i++, $io++){
                        $ass_code=$words[$i]->ass_code;
                        $time=formatthisforHr($words[$i]->time);
                        echo "<tr>
                            <td>$io</td>
                            <td><a href='view.php?link=$ass_code'>$ass_code</a></td>
                            <td>$time</td>
                          </tr>";
                      
                      }
                    } else{
                      echo "<tr>
                              <td>1</td>
                              <td>$error</td>
                              <td>--</td>
                            </tr>";
                    }
                 ?>
                </tbody>
              </table>

              <?php
                $nxxt=$rtyt+1;

                if($erot){
                    echo "<ul class='pagination pagination-centered'>";
                    if ($rtyt==1){
                      echo "<li class='disabled'><a href='index.php?page=1'>Prev</a></li>";
                    }else{
                      echo "<li><a href='index.php?page=$prv'>Prev</a></li>"; 
                    }

                    if($no_pages>1){
                        for($ie=1; $ie!=$no_pages; $ie++){
                          if ($ie==$rtyt){
                            echo "<li class='active'><a href='index.php?page=$ie'>$ie</a></li>";
                          } else {
                            echo "<li><a href='index.php?page=$ie'>$ie</a></li>";  
                          }                   
                        }
                        if ($rtyt==$no_pages){
                          echo "<li class='disabled'><a href='index.php?page=5'>Next</a></li>";
                        }else{
                          echo "<li><a href='index.php?page=$nxxt'>Next</a></li>";                      
                        }
                    }  
                    echo "</ul>";                    
                }
              ?>
            </div>
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
                                          echo $body[1]->total;
                                      }else{
                                          echo "0";
                                      }?>
                              </div>
                              <div>Total Submissions!</div>
                          </div>
                      </div>
                  </div><!-- /.panel-heading -->   
                  <div class="panel-footer">

                  </div>         
                </div><!-- /.panel -->
              <div class="panel panel-green">
                <?php 
                    $quot_api=new ApiQuery();
                    $quot_him=$quot_api->getSingleQuote()->body[0];
                ?>
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">                      
                              <i class="fa fa-quote-left icon-md"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">                      
                                  <?php echo $quot_him->prov_id; ?>
                              </div>
                              <div> <?php echo $quot_him->prov_author; ?></div>
                          </div>
                      </div>
                  </div><!-- /.panel-heading -->   
                  <div class="panel-body">
                      <?php echo $quot_him->prov_text; ?>
                  </div>   
                  <div class="panel-footer">
                      <span class="pull-left">Be Inspired!</span>
                      <span class="pull-right"><i class="fa fa-heart-o fa-3x" id="love"></i></span>
                      <span class="pull-right"><i class="fa fa-heart fa-3x" id="loved"></i></span>
                      <div class="clearfix"></div>
                  </div>      
              </div><!-- /.panel -->
            </div>
          </div>
        </div>
    	</div><!-- large container -->


		  
		  
          
      
   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/k.js"></script>
    <script type="text/javascript" src="../assets/js/nxt.js"></script>
    <script src="../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
		</div>
  </div>
	</div>
  </body>
</html>
