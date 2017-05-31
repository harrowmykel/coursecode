
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
            <li><a href="#">Home</a></li>
            <li><a href="#">Messages</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Settings</a></li>
			<li>
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
            <li><a href="index.php">Links</a></li>
            <li class="active"><a href="#">View Link</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="edit.php">Edit Profile</a></li>
          </ul>
          <hr/>
          <ul class="nav nav-sidebar">
            <li><a class="logout" href="logout.php">Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Upload</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
			  <button type="button" class="btn btn-default btn-lg">
				<span class="glyphicon glyphicon-picture"></span> Picture
			  </button> 
              <span class="text-muted">view Picture</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
             
			  <button type="button" class="btn btn-default btn-lg">
					<span class="glyphicon glyphicon-headphones"></span> Music
			  </button> <span class="text-muted">view playlists</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
			  <button type="button" class="btn btn-default btn-lg">
					<span class="glyphicon glyphicon-facetime-video"></span> Videos
			  </button>  
              <span class="text-muted">view videos</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
			  <button type="button" class="btn btn-default btn-lg">
				<span class="glyphicon glyphicon-print"></span> Documents
			  </button> 
			  <span class="text-muted">view documents</span>
            </div>
			<div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
			
			  <button type="button" class="btn btn-default btn-lg">
				<span class="glyphicon glyphicon-file"></span> Files
			  </button>   <span class="text-muted">view other files</span>
            </div>
			<div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
			  <button type="button" class="btn btn-default btn-lg">
				<span class="glyphicon glyphicon-upload"></span> Uploads
			  </button> 
              <span class="text-muted">upload a file</span>
            </div>
          </div>

          <h2 class="sub-header">Timeline</h2>

		  <!-- START THE FEATURETTES -->

		  <hr class="featurette-divider">

<div class="row featurette">
			<div class="col-md-7">
			  <h2 class="featurette-heading">  <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" style="width: 70px; height: 70px;">  Aro T. Oluwaseun <span class="text-muted">marked Aro Wolfgang Micheal.</span></h2>
			  <p class="lead">I know it looks bad.. But me and Bro.</p>
			</div>
			<div class="col-md-5">
			  <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
			</div>
		  </div>
<hr class="featurette-divider">
  <div class="row featurette">
			<div class="col-md-5">
			  <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
			  <!-- Split button -->
			  <div class="btn-group">
				<button type="button" class="btn btn-primary">Like</button>
			  </div>

			  <div class="btn-group">
				<button type="button" class="btn btn-success">Comment</button>
			  </div>

			  <!-- Split button -->
			  <div class="btn-group">
				<button type="button" class="btn btn-info">Add Smiley</button>
				<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
				  <span class="caret"></span>
				  <span class="sr-only">Toggle Dropdown</span>
				</button>
				<ul class="dropdown-menu" role="menu">
				  <li><a href="#">sad</a></li>
				  <li><a href="#">happy</a></li>
				  <li><a href="#">frown</a></li>
				  <li><a href="#">angry</a></li>
				  <li><a href="#">congratulation</a></li>
				  <li class="divider"></li>
				  <li><a href="#">more...</a></li>
				</ul>
			  </div>

			  <!-- Split button -->
			  <div class="btn-group">
				<button type="button" class="btn btn-warning">Share</button>
				<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
				  <span class="caret"></span>
				  <span class="sr-only">Toggle Dropdown</span>
				</button>
				<ul class="dropdown-menu" role="menu">
				  <li><a href="#">Friends</a></li>
				  <li><a href="#">Public</a></li>
				  <li><a href="#">Community</a></li>
				  <li><a href="#">Broadcast</a></li>
				  <li class="divider"></li>
				  <li><a href="#">Create group</a></li>
				</ul>
			  </div>		
			</div>

<div class="col-md-7">
			  <h2 class="featurette-heading">  <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" style="width: 70px; height: 70px;">  Aro W. Micheal  <span class="text-muted"> marked Adekeye Adeleke.</span></h2>
			  <p class="lead"> See for yourself. After Phy114. Fragile.</p>
			</div>
	<!-- Split button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-primary">Like</button>
	</div>

	<div class="btn-group">
	  <button type="button" class="btn btn-success">Comment</button>
	</div>

	<!-- Split button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-info">Add Smiley</button>
	  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
		<span class="caret"></span>
		<span class="sr-only">Toggle Dropdown</span>
	  </button>
	  <ul class="dropdown-menu" role="menu">
		<li><a href="#">sad</a></li>
		<li><a href="#">happy</a></li>
		<li><a href="#">frown</a></li>
		<li><a href="#">angry</a></li>
		<li><a href="#">congratulation</a></li>
		<li class="divider"></li>
		<li><a href="#">more...</a></li>
	  </ul>
	</div>

	<!-- Split button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-warning">Share</button>
	  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
		<span class="caret"></span>
		<span class="sr-only">Toggle Dropdown</span>
	  </button>
	  <ul class="dropdown-menu" role="menu">
		<li><a href="#">Friends</a></li>
		<li><a href="#">Public</a></li>
		<li><a href="#">Community</a></li>
		<li><a href="#">Broadcast</a></li>
		<li class="divider"></li>
		<li><a href="#">Create group</a></li>
	  </ul>
	</div>
		  </div>

		  <hr class="featurette-divider">

	  <div class="row featurette">
			<div class="col-md-7">
			  <h2 class="featurette-heading">  <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" style="width: 70px; height: 70px;">  Aro W. Micheal <span class="text-muted">feeling Checkmate.</span></h2>
			  <p class="lead">je donne avec mes Amie.</p>
			</div>
			<div class="col-md-5">
			  <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
			</div>
			<!-- Split button -->
			<div class="btn-group">
			  <button type="button" class="btn btn-primary">Like</button>
			</div>

			<div class="btn-group">
			  <button type="button" class="btn btn-success">Comment</button>
			</div>

			<!-- Split button -->
			<div class="btn-group">
			  <button type="button" class="btn btn-info">Add Smiley</button>
			  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only">Toggle Dropdown</span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="#">sad</a></li>
				<li><a href="#">happy</a></li>
				<li><a href="#">frown</a></li>
				<li><a href="#">angry</a></li>
				<li><a href="#">congratulation</a></li>
				<li class="divider"></li>
				<li><a href="#">more...</a></li>
			  </ul>
			</div>

			<!-- Split button -->
			<div class="btn-group">
			  <button type="button" class="btn btn-warning">Share</button>
			  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only">Toggle Dropdown</span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="#">Friends</a></li>
				<li><a href="#">Public</a></li>
				<li><a href="#">Community</a></li>
				<li><a href="#">Broadcast</a></li>
				<li class="divider"></li>
				<li><a href="#">Create group</a></li>
			  </ul>
			</div>
		  </div>

		  <hr class="featurette-divider">

		  <!-- /END THE FEATURETTES -->


		  
		  
          
      
   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
		</div>
  </div>
	</div>
  </body>
</html>
