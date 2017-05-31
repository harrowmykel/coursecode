<?php include 'php/beginn.php'; 
    $error="";

    $hash_code=isset($_GET['hash'])?$_GET['hash']:"jknfjknnjgnjgnjgnjkbnbjbghb";
    $user=isset($_GET['user'])?$_GET['user']:"jknfjknn(jgnjgnjgnjkbnbjbghb";

    if(isset($_POST['sendtt'])){
        $email=$_POST['email']; 

        if (!strlen($email)>0){
            $message="<div class='alert fade-in m-success'>
                          <button type='button' class='close' data-dismiss='alert'>&times;</button>
                           <strong>An Error Occured, password too short</strong>
                        </div>";
        }else{

            queryMysql("UPDATE password_gen SET deactivated_=1 WHERE hash_code='$hash_code' AND username='$user'");
            queryMysql("UPDATE passtable SET pass='$email' WHERE username='$user'");
            $numb=queryNum("SELECT * FROM passtable WHERE username='$user' AND pass='$email'");
            
            if($numb>0){
                $message="<div class='alert fade-in m-success'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Done! Profile Saved</strong>
                      </div>";
            }else{
                $message="<div class='alert fade-in m-warning'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Sorry,  An Error Occured!</strong>
                      </div>";
            }
        }
    }else{
        $quer="SELECT * FROM password_gen WHERE hash_code='$hash_code' AND username='$user' AND deactivated_=0";

        if (queryNum($quer)<1){
            $message="<div class='alert fade-in m-success'>
                      <button type='button' class='close' data-dismiss='alert'>&times;</button>
                       <strong>An error occured, please use the link 'as' you were given.!</strong>
                    </div>";         
        }else {
            $message="<div class='alert fade-in m-success'>
                          <button type='button' class='close' data-dismiss='alert'>&times;</button>
                           <strong>Hello $user, please Input your new password</strong>
                        </div>";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>CourseCode | Password Recovery </title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/font-awesome.mn.css" rel="stylesheet">


        <!-- Custom styles for this template -->
        <link href="assets/css/signin.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/styles.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
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
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="signin.php">Sign In</a></li>
                        <li><a href="signup.php">Sign Up</a></li>
                        <li><a href="tos.php">Terms And Conditions</a></li>
                        <li><a class="logout" href="Contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>


    <div class="container">
        <div class="big-gap"></div>

      <form class="form-signin" method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?hash='.$hash_code.'&user='.$user;?>" >
        <h4 class="form-signin-heading">Please input your new password</h4>
        <?php 
            echo $message;
        ?>   
        <label for="inputEmail" class="sr-only">New password</label>
        <input type="text" id="inputEmail" name="email" class="form-control" placeholder="New Password" required autofocus>
        <input type="hidden" name="sendtt" value="bghsbdh">
        <button class="btn btn-sm btn-primary btn-block" type="submit">Send Password</button>
      </form>

    </div> <!-- /container -->

                   <!-- Bootstrap core JavaScript
================================================== -->     <!-- Placed at the
end of the document so the pages load faster -->     <script
src="assets/js/jquery.js"></script>     <script
src="assets/js/bootstrap.min.js"></script>     <script
src="assets/js/docs.min.js"></script>     <!-- IE10 viewport hack for
Surface/desktop Windows 8 bug -->     <script src="../assets/js/ie10
-viewport-bug-workaround.js"></script> 
</body> </html>
