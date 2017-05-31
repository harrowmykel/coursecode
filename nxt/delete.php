<?php include 'beginn.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../nxt/../assets/ico/favicon.png">

    <title>Delete | CourseCode</title>

    <!-- Bootstrap core CSS -->
    <link href="../nxt/../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../nxt/../assets/css/styles.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

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
          <a class="navbar-brand" href="../nxt/index.php">CourseCode</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">            
            <li><a href="../nxt/index.php?page=1">Links</a></li>
            <li><a href="../nxt/profile.php">Profile</a></li>
            <li><a href="../nxt/edit.php">Edit Profile</a></li>
            <li><a class="logout" href="../nxt/logout.php">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right" action="search.php" method="POST">
            <input type="text" class="form-control" name="search" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>
  
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="../nxt/index.php">Links</a></li>
            <li class="active"><a href="#">View Link</a></li>
            <li><a href="../nxt/profile.php">Profile</a></li>
            <li><a href="../nxt/edit.php">Edit Profile</a></li>
          </ul>
          <hr/>
          <ul class="nav nav-sidebar">
            <li><a class="logout" href="../nxt/logout.php">Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        	<?php 
        		$link=isset($_GET['link']) ? urldecode($_GET['link']) : "";?>
          <h1 class="page-header"><?php echo $link ?></h1>
	    	<?php 
	    		$ert=new apiQuery();

	    		if (isset($_POST['acction'])){
	    			$act=$_POST['acction'];
	    			if ($act=="delete") {
	    				//delete	    				
	    				$linko=isset($_POST['ghy']) ? $_POST['ghy'] : "";
	    				$serv=$_SERVER['PHP_SELF'];
	    				echo "<div class='alert fade-in m-warning'>
						            <button type='button' class='close' data-dismiss='alert'>&times;</button>
						            <strong>Delete this link? </strong> Are you sure You would like to delete this link? This can not be undone! deactivate instead.  
						            <p> 
					        		<form method='POST' action=' $serv"."?link=$link'; ?>
					        			<input type= 'hidden' name='acction' value='confirm'/>
					        			<input type= 'hidden' name='ghy' value='$linko'/>
							        	<input type='submit' class='btn btn-sm btn-danger' value='Delete'/>
							    	</form></p>
						          </div>";
	    				
	    			} else if ($act=="confirm"){
	    				$linko=isset($_POST['ghy']) ? $_POST['ghy'] : "";
	    				$resp=$ert->delete_frm_del($linko);
	    				if(isset($resp->body[0]->success)){
	    					echo "<div class='alert fade-in m-success'>
						            <button type='button' class='close' data-dismiss='alert'>&times;</button>
						            <strong>Deleted!</strong>
						          </div>";
	    				}else{
	    					echo "<div class='alert fade-in m-warning'>
						            <button type='button' class='close' data-dismiss='alert'>&times;</button>
						            <strong>Sorry,  An Error Occured!</strong>
						          </div>";
	    				}
	    			}
	    		}

	    		$erto=new apiQuery();
	    		$Response=$erto->getUrlFromDel($link);
	    		$body=$Response->body;
	    		if (isset($body[0]->error)){
	          		$erot=false;
                  	$error=$body[0]->error_more;
	          		//error
	    		}else{
	    			$words=$body[0];
	    			$numm=count($words);
	          		$erot=true;
	    		}
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
	              		$gen_url=getLink($words->gen_url);
	              		$del_code=getLink($words->del_code);
	              		$deactivated=$words->deactivated;
	              		$del_time=formatThisForHr($words->del_time);
	              		$lastview=formatThisForHr($words->lastview);
	              		$view=$words->views;
	              		$url=getLink($words->url);
	              		$time=formatThisForHr($words->time);
	              		$deleted=$words->deleted;
	              		$deactivatedtime=formatThisForHr($words->deactivatedtime);
	              		if($deactivated!=0){
	              			$deact="Reactivate";
	              		}else{
	              			$deact="Deactivate";
	              		}

	              		echo "<tr><td>Short Link</td><td><a href='$gen_url'>$gen_url</a>
	              		</td></tr>";
	              		echo "<tr><td>Orignal link</td><td><a href='$url'>$url</a>
	              		</td></tr>";
	              		echo "<tr><td>Last View</td><td>$lastview
	              		</td></tr>";
	              		echo "<tr><td>Total Views</td><td>$view
	              		</td></tr>";
	              		echo "<tr><td>Time</td><td>$time
	              		</td></tr>";
	              		echo "<tr><td>Deactivated</td><td>$deactivated
	              		</td></tr>";
	              		echo "<tr><td>Deactivation time</td><td>$deactivatedtime
	              		</td></tr>";
	              		echo "<tr><td>Deleted</td><td>$deleted
	              		</td></tr>";
	              		echo "<tr><td>Delete code</td><td><a href='$del_code'>$del_code</a>
	              		</td></tr>";
	              		echo "<tr><td>Deleted Time</td><td>$del_time
	              		</td></tr>";
	              	}else{
                      echo "<tr>
                              <td>1</td>
                              <td>$error</td>
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
	        		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']."?link=$link"; ?>">
	        			<input type= "hidden" name="acction" value="delete"/>
	        			<input type= "hidden" name="ghy" value="<?php echo $gen_url; ?>"/>
			        	<input type="submit" class="btn btn-sm btn-warning" value="Delete"/>
			        	
			    	</form>
	        	</td>
	        </tr></table>
	        <?php }?>
	        
        </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
		</div>
  </div>
	</div>
  </body>
</html>
