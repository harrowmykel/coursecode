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
            <li><a href='crt.php?page=1'><i class="icon icon-pencil"></i> Created Assignments</a></li>
            <li class="active"><a href="edit.php"><i class="fa fa-magic"></i> Create a new Assignment</a></li>
            <li><a href='profile.php'><i class="fa fa-newspaper-o"></i> Profile</a></li>
            <li><a href='edit.php'><i class='icon icon-edit'></i> Edit Profile</a></li>
          </ul>
          <hr/>
          <ul class='nav nav-sidebar'>
            <li><a class='logout' href='logout.php'><i class="fa fa-sign-out"></i> Logout</a></li>
          </ul>
        </div>
        <div class='col-sm-8 col-sm-offset-4 col-md-9 col-md-offset-3 main'>
          <h1 class="page-header"><i class="fa fa-magic"></i> Create a new Assignment</h1>
          <div class="row">
            <div class='col-md-8 col-sm-7'>
          <div class='alert fade-in m-success'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>We also support Markdown Language at the description. <a href='http://daringfireball.net/projects/markdown/'>Learn More.</a> External Link</strong>
          </div>
	    	<?php 
	    		$erto=new apiQuery();

	    		$pass="";
				$method="";
				$day="";
				$time="";
        $deact="";
        $title="";

	    		if (isset($_POST['acction'])){
	    			$act=$_POST['acction'];
	    			if ($act=="editprof"){
	    				$method=$_POST['method'];
	    				$day=$_POST['day'];
	    				$time=$_POST['time'];
	    				$deact=$day."-".$time;
              $title=$_POST['titlel'];

	    				$resp=$erto->createlock(getUser(),  getPass(), $title, $method, $deact);

	    				if(isset($resp->body[0]->username)){
	    					$rtto=$resp->body[0]->ass_code;
	    					echo "<div class='alert fade-in m-success'>
						            <button type='button' class='close' data-dismiss='alert'>&times;</button>
						            <strong>Done! Assignment Code is $rtto. <a href='assedit.php?link=$rtto'>Edit Code</a> | <a href='crtview.php?link=$rtto'>Visit Site</a> </strong>
						          </div>";
	    				}else{
	    					$errp=$resp->body[0]->error_more;
	    					echo "<div class='alert fade-in m-warning'>
						            <button type='button' class='close' data-dismiss='alert'>&times;</button>
						            <strong>Sorry,  An Error Occured!</strong> $errp
						          </div>";
	    				}
	    			}
	    		}

	          		$erot=true;
	    	?>
          <table class="table table-condensed table-striped table-hover table-bordered">
	          <thead>
	            <tr>
	              <th>Name</th>
	              <th>Value</th>
	            </tr>
	          </thead>
	          <tbody>
	          	<?php
	              	if($erot){

	              		$self=$_SERVER['PHP_SELF'];
	              		echo "<form method='POST' action='$self'>";
	              		echo "<tr><td><i class='fa fa-calendar-check-o'></i> Submission Date dd-mm-yyyy</td><td><input type='text' name='day' value='$day' class='form-control' placeholder='Submission Date'/>
	              		</td></tr>";
                    echo "<tr><td><i class='fa fa-clock-o'></i> Submission Time hh-mm</td><td><input type='text' name='time' value='$time' class='form-control' placeholder='Submission Time'/>
                    </td></tr>";
                    echo "<tr><td><i class='fa fa-clock-o'></i> Assignment Title</td><td><input type='text' name='titlel' value='$title' class='form-control' placeholder='Assignment Title'/>
                    </td></tr>";
	              		echo "<tr><td colspan=2><i class='fa fa-sticky-note-o'></i> Submission method Description e.g save file with your matric number, fullname?</td></tr><tr><td colspan=2><textarea type='text' name='method' class='form-control' placeholder='Submission method. save file with your matric number, fullname?'>$method</textarea>
	              		</td></tr>";
	              		echo "<input type= 'hidden' name='acction' value='editprof'/>";
	              	}else{
                      echo "<tr>
                              <td colspan=2>$error</td>
                            </tr>";
                    }
	             ?>
	          </tbody>
	        </table>
  	<?php
      	if($erot){
      		?>
	        <table><tr>	        	
	        	<td>
			        	<button type="submit" class="btn btn-sm btn-primary"><i class='fa fa-code'></i> Get Assignment Code</button>
			    	</form>
	        	</td>
	        </tr></table>
	        <?php }?>
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
        </div> <!-- coll-8 -->
        </div> <!-- row -->

	        
        </div>     <!-- Bootstrap core JavaScript
================================================== -->     <!-- Placed at the
end of the document so the pages load faster -->     <script
src="../assets/js/jquery.js"></script>     <script
src="../assets/js/bootstrap.min.js"></script>     <script
src="../assets/js/k.js"></script>     <script
src="../assets/js/docs.min.js"></script>     <!-- IE10 viewport hack for
Surface/desktop Windows 8 bug -->     <script src="../../assets/js/ie10
-viewport-bug-workaround.js"></script>         </div>   </div>     </div>
</body> </html>
