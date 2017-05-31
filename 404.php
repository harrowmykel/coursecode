<?php 
    $get=isset($_GET['a'])?$_GET['a']:404;

    switch ($get) {
        case 403:
            $err="403, No permission or access.";
            $err_more="Sorry, you are not permitted to view this page.";
            break; 
        case 404:
            $err="404, Page not found.";
            $err_more="Sorry, this page was not found on this server.";
            break;        
        default:
            $err="Error $get";
            $err_more="Sorry, a $get error occured.";
            break;
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>CourseCode | Smart Assignment Solution </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.mn.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="assets/css/mainj.css" rel="stylesheet">

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/hover.zoom.js"></script>
    <script src="assets/js/hover.zoom.conf.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Static navbar -->
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle=" collapse" data-target=".navbar- collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">CourseCode</a>
        </div>
        <div class="navbar-collapse  collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="Signin.php">Sign In</a></li>
            <li><a href="Signup.php">Sign Up</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="api.php">Apis &amp; Developers</a></li>
          </ul>
        </div><!--/.nav- collapse -->
      </div>
    </div>

    <!-- +++++ Welcome Section +++++ -->
    <div id="ww">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                    <img src="assets/imgs/mac.jpg" class="home_img" alt="Stanley">
                    <h1><?php echo $err; ?></h1>
                    <p><?php echo $err_more; ?></p>
                
                </div><!-- /col-lg-8 -->
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /ww -->
    
    
    <!-- +++++ Projects Section +++++ -->    

    
    <!-- +++++ Footer Section +++++ -->
    
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-3">
                    <p><a href="contact.php">Contact</a></p>
                </div><!-- /col-lg-3 -->
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-3">
                    <p>
                        <a href="api.php">Apis &amp; Developers</a>
                    </p>
                </div><!-- /col-lg-3 -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-3">
                    <p><a href="signup.php">Create an Account</a></p>
                </div><!-- /col-lg-3 -->
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-3">
                    <p>
                        <a href="signin.php">Sign in</a>
                    </p>
                </div><!-- /col-lg-3 -->
            
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p class="pull-right">&copy; CourseCode, AroSoft 2017</p>
                </div><!-- /col-lg-3 -->
            
            </div>
        
        </div>
    </div>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
