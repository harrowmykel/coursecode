<?php include 'php/beginn.php'; 
    $error="";
    $user="";
    $pass="";  
    $name="";
    $dob="";
    $email="";
    $country="";
    $matric="";
    $school="";
    $post=false;

    if(isset($_POST['sendtt'])){
        $teacher=0;
        $user=$_POST['username'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $country=$_POST['country'];

        if (isset($_POST['student'])){
           $teacher=1;
        }


        $pass=$_POST['password'];  
        $dob=$_POST['dob'];
        $matric=$_POST['matric'];
        $school=$_POST['school'];

        $ert=new apiQuery();
        $result=$ert->createprof($user, $pass, $name, $dob, $email, $country, $teacher, $school, $matric);
        $body=$result->body;

        if (isset($body[0]->username)){
            save_to_db($body[0]->username, $pass);
            header("Location: nxt/index.php");

            if (isset($_POST['rmb'])){
                saveCookie__($body[0]->username, $pass);
            }
        } else{
            $errorType=$body[0]->error;
            $error=$body[0]->error_more;
        }
        $post=true;
    } else if (isset($_POST['sendtt1'])){
        //validate
        $teacher=0;
        $user=$_POST['username'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $country=$_POST['country'];

        if (isset($_POST['student'])){
           $teacher=1;
        }

        $post=true;
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

        <title>CourseCode | Sign In </title>

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
                        <li><a href="tos.php">Terms And Conditions</a></li>
                        <li><a class="logout" href="Contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>


    <div class="container">
        <div class="big-gap"></div>
      <form class="form-signin" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >        
        <h4 class="form-signin-heading">Please sign up</h4>
        <?php 
            if($error!=""){
                echo "<div class='alert fade-in m-warning'>
                          <button type='button' class='close' data-dismiss='alert'>&times;</button>
                           <strong>Sorry,  An Error Occured!</strong> $error
                        </div>";
            }
            $jhn="class='hidden'";
            $john="class=''";
            // <?php if($post){  echo $jhn; }else {echo $john;};
        ?>      
        <div <?php if($post){  echo $jhn; }else {echo $john;};?>>
            <label for="inputusername" class="sr-only">Username</label>
            <input type="text" id="inputusername" name="username" class="form-control" placeholder="Username" value="<?php echo $user?>" required autofocus >
            <label for="inputname" class="sr-only">Name</label>
            <input type="text" id="inputname" name="name" class="form-control" placeholder="Name" value="<?php echo $name?>" required autofocus>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" value="<?php echo $email?>" required autofocus>
            <label for="inputcountry" class="sr-only">Country</label>
            <input type="text" id="inputcountry" name="country" class="form-control" placeholder="Country" value="<?php echo $country?>" required autofocus>        
            <div class="checkbox">
              <label>
                <input type="checkbox" value="studentf" name="student"> I am a Teacher
              </label>   
            </div>
            <input type="hidden" name="sendtt1" value="bghsbdh">
        </div>
        <?php
        if ($post){

                ?>
                    <label for="inputcountry" class="sr-only">School</label>
                    <input type="text" id="inputcountry" name="school" class="form-control" placeholder="School" value="<?php echo $school?>" required autofocus> 
                    <label for="inputcountry" class="sr-only">Matric</label>
                    <input type="text" id="inputcountry" name="matric" class="form-control" placeholder="Matric No. or Unique School Id" value="<?php echo $matric?>" required autofocus>  
                    <label for="inputdob" class="sr-only">Date Of Birth</label>
                    <input type="text" id="inputdob" name="dob" class="form-control" placeholder="Date Of Birth dd-mm-yyyy" value="<?php echo $dob?>" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" value="<?php echo $pass?>" required>
                    <input type="hidden" name="sendtt" value="bghsbdh">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value="remember-me" name="rmb"> Remember me
                      </label>   
                    </div>
                <?php
                # code...
            }?>
        <button class="btn btn-sm btn-primary btn-block" type="submit">Sign Up</button>       
        <h5 class=""><a href="signin.php" class="aa">Have an account? sign in.</a></h5>
        <h5 class=""><a href="produkta/android.php" class="aa">Try a faster sign up, Get the Android App (beta).</a></h5>
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
