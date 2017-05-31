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
            <li><a href="index.php?page=1">Submitted Assignments</a></li>
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
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="index.php?page=1">Submitted Assignments</a></li>
            <li><a href="crt.php?page=1">Created Assignments</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="edit.php">Edit Profile</a></li>
          </ul>
          <hr/>
          <ul class="nav nav-sidebar">
            <li><a class="logout" href="logout.php">Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Search</h1>

          <div class="row">
            <div class="col-xs-12 col-sm-12">
            	<?php 
            		$link=isset($_POST['search']) ? $_POST['search'] : "a";
            		$ert=new apiQuery();
            		$rtyt=isset($_GET['page']) ? $_GET['page'] : 1;
            		$Response=$ert->search_url(getUser(), getPass(), $link, $rtyt);
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
            	?>
            	
	            <table class="table table-condensed table-striped table-hover table-bordered">
	              <thead>
	                <tr>
					         <th>#</th>
	                  <th>Short Link</th>
	                  <th>Views</th>
	                  <th>Last View</th>
	                </tr>
	              </thead>
	              <tbody>
	              	<?php
                    $prv=$rtyt-1;
		              	if($erot){
		              		for($i=0, $io=($prv*50)+1; $i<$numm; $i++, $io++){
		              			$gen=$words[$i]->gen_url;
		              			$view=$words[$i]->views;
                        $lastview=$words[$i]->lastview;
                        $deactivate=$words[$i]->deactivated;
		              			$genurl=urlencode($gen);
                        if ($deactivate>0){
                          echo "<tr class='warning'>
                              <td>$io</td>
                              <td><a href='view.php?link=$genurl'>$gen</a></td>
                              <td>$view</td>
                              <td>$lastview</td>
                            </tr>";
                        }else{
  		              			echo "<tr>
  					                  <td>$io</td>
  					                  <td><a href='view.php?link=$genurl'>$gen</a></td>
  					                  <td>$view</td>
  					                  <td>$lastview</td>
  					                </tr>";
                        }
		              		}
		              	}else{
	                      echo "<tr>
	                              <td>1</td>
	                              <td>$error</td>
	                              <td>--</td>
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
                          echo "<li class='disabled'><a href='index.php?page=5'>Next</a></li></ul></div>";
                        }else{
                          echo "<li><a href='index.php?page=$nxxt'>Next</a></li></ul></div>";                      
                        }
                    }									       
						    }
				?>
          	</div>
          </div>
    	</div>


		  
		  
          
      
   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
		</div>
  </div>
	</div>
  </body>
</html>
