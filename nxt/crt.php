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

    <!-- Custom CSS -->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

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
            <li class='active'><a href='edit.php'> Edit Profile</a></li>
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
            <li class="active"><a href='crt.php?page=1'><i class="icon icon-pencil"></i> Created Assignments</a></li>
            <li><a href='profile.php'><i class="fa fa-newspaper-o"></i> Profile</a></li>
            <li><a href='edit.php'><i class='icon icon-edit'></i> Edit Profile</a></li>
          </ul>
          <hr/>
          <ul class='nav nav-sidebar'>
            <li><a class='logout' href='logout.php'><i class="fa fa-sign-out"> Logout</i></a></li>
          </ul>
        </div>
        <div class='col-sm-8 col-sm-offset-4 col-md-9 col-md-offset-3 main'>
          <h1 class="page-header"><i class='icon icon-pencil'></i> Assignments</h1>

          <div class="row">
            <div class="col-md-8 col-sm-7">
              <?php 
                $ert=new apiQuery();
                $rtyt=isset($_GET['page']) ? $_GET['page'] : 1;
                $Response=$ert->teacherfile(getUser(), getPass(), $rtyt);
                $body=$Response->body;
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
                $errdhjvh=$_SERVER['PHP_SELF'];
              ?>
              <!-- link -->
              <div > 
                   <a href="crtnew.php?new"><button class="web_appp btn pull-right btn-sm btn-success btn-go btnn-go frfo bfjfg" id="go"><i class='icon icon-plus'></i> Create New Assignment Code</button></a>
              </div>

              <!-- link -->
              <!-- link -->

          <hr>
          <br>
              <a href="<?php echo $erru;?>" style="margin-bottom:15px;"><span class="btn btn-default btn-sm"><i class='icon icon-refresh'></i> <b>Refresh</b></span></a>
              <table class="table table-condensed table-striped table-hover table-bordered">
                <thead>
                  <tr>
                   <th><i class='fa fa-hashtag'></i></th>
                    <th><i class='fa fa-file-code-o'></i> Assignment Code</th>
                    <th><i class='fa fa-clock-o'></i> Time Created</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $prv=$rtyt-1;
                    if($erot){
                      for($i=0, $io=($prv*50)+1; $i<$numm; $i++, $io++){
                        $ass_code=$words[$i]->ass_code;
                        $time=formatThisForHr($words[$i]->time);
                        $deactivate=$words[$i]->deactivated_;

                    if ($deactivate>0){
                          echo "<tr class='warning'>
                              <td><b>$io</b></td>
                              <td><a href='crtview.php?link=$ass_code'>$ass_code</a></td>
                              <td>$time</td>
                            </tr>";
                        }else{
                          echo "<tr>
                              <td><b>$io</b></td>
                              <td><a href='crtview.php?link=$ass_code'>$ass_code</a></td>
                              <td>$time</td>
                            </tr>";
                        }
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
                            echo "<li class='active'><a href='".$errdhjvh."?page=$ie'>$ie</a></li>";
                          } else {
                            echo "<li><a href='".$errdhjvh."?page=$ie'>$ie</a></li>";  
                          }                   
                        }
                        if ($rtyt==$no_pages){
                          echo "<li class='disabled'><a href='".$errdhjvh."?page=5'>Next</a></li>";
                        }else{
                          echo "<li><a href='".$errdhjvh."?page=$nxxt'>Next</a></li>";                      
                        }
                    }        
                    echo "</ul>";
                }
        ?>
        </div> <!-- coll-8 -->
        <div class='col-md-4 col-sm-5'>
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
      </div>
    </div></div></div></body></html>


      
      
          
      
   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/k.js"></script> 
    <script src="../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
    </div>
  </div>
  </div>
  </body>
</html>
