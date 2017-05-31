<?php 
require 'php/beginn.php';
deleteAllDirs();

    function deleteAllDirs(){
        deleteDir__("compressed");
        deleteDir__("spread");
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
            <li><a href="signin.php">Sign In</a></li>
            <li><a href="signup.php">Sign Up</a></li>
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
                    <h1>Hi, I am CourseCode!</h1>
                    <p>Hello everybody. I'm CourseCode, a free and smart handsome way to assignment submission. With a really simple theme for those wanting to submit their work or create an assignment with a cute &amp; clean style.</p>
                
                </div><!-- /col-lg-8 -->
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /ww -->
    
    
    <!-- +++++ Projects Section +++++ -->    


    <section id="services">
        <div class="container">
            <div class="box">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="fa fa-clock-o icon-md icon-color3"></i>
                            <h4>Measure Time</h4>
                            <p> At CourseCode, we provide a timeline of when submissions are made..</p>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="fa fa-qq icon-md icon-color2"></i>
                            <h4>Easily Identify Problems</h4>
                            <p>Download and compare files with dynamically generated Spreadsheets and Zip files.</p>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="fa fa-tags icon-md icon-color3"></i>
                            <h4>Track Documentations</h4>
                            <p>Easily attach files, images, texts or compressed folders to your assignments.</p>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="fa fa-file-text icon-md icon-color4"></i>
                            <h4>Get Detailed Information</h4>
                            <p>Be in control of your own Assignments and Submissions. Temporarily deactivate and reactivate submissions or permanently delete them.</p>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="icon-thumbs-up icon-md icon-color5"></i>
                            <h4>Easy To Use Apis</h4>
                            <p>We provide Api to give you a wider personal control of your own AdPay.tk application and links.</p>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="fa fa-users icon-md icon-color6"></i>
                            <h4>Dedicated Support.</h4>
                            <p>Our 24/7 email and chat help, forum, online Knowledgebase and tutorials for better profits.</p>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.row-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->
    
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
