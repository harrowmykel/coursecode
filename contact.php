<?php include 'php/beginn.php'; 
    $error="";

    if(isset($_POST['sendtt'])){
        
        $name = trim(stripslashes($_POST['name'])); 
        $email = trim(stripslashes($_POST['email'])); 
        $subject = trim(stripslashes($_POST['title'])); 
        $message = trim(stripslashes($_POST['topic']));

        $apiquery=new apiQuery();
        $rtt=$apiquery->contact_not_Logged($name, $email, $subject, $message);

        $body=$rtt->body[0];
        if (isset($body->success)){
            $error=$body->success_more;
            $er=false;
        }else {
            $error=$body->error_more;
            $er=true;
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="tos.php">Terms And Conditions</a></li>
                        <li class="active"><a class="logout" href="Contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>


    <div class="container">
        <div class="big-gap"></div>

      <form class="form-signin" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >
        <h4 class="form-signin-heading">Talk to us</h4>
        <?php 
            if($error!=""){
                if ($er){
                    echo "<div class='alert fade-in m-warning'>
                              <button type='button' class='close' data-dismiss='alert'>&times;</button>
                               <strong>Sorry,  An Error Occured!</strong> $error
                            </div>";                    
                }else{
                    echo "<div class='alert fade-in m-success'>
                              <button type='button' class='close' data-dismiss='alert'>&times;</button>
                               <strong>Success!</strong> $error
                            </div>";                    
                }
            }
        ?>   
        <label for="inputname" class="sr-only">Name</label>
        <input type="text" id="inputname" name="name" class="form-control" placeholder="Name" required autofocus>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputsubj" class="sr-only">Subject</label>
        <input type="text" id="inputsubj" name="title" class="form-control" placeholder="Subject" required autofocus>
        <label for="inputdesc" class="sr-only">Description</label>
        <textarea type="text" id="inputdesc" name="topic" class="form-control" placeholder="Description" required autofocus>Description</textarea>    
        <input type="hidden" name="sendtt" value="bghsbdh">
        <br>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Send Message</button>

      </form>
      <div class="form-signin rtti">
        <a href="signin.php" class="aa"><button class="btn btn-lg btn-warning btn-block">Sign In</button></a>
      </div>

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
