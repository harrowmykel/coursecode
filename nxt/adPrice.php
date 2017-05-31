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
					<a class="navbar-brand" href="index.php">CourseCode</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">            
						<li><a href="index.php?page=1">Submitted Assignments</a></li><li><a href="crt.php?page=1">Created Assignments</a></li>
						<li class="active"><a href="profile.php">Profile</a></li>
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
						<li><a href="index.php?page=1">Submitted Assignments</a></li>
            			<li><a href="crt.php?page=1">Created Assignments</a></li>
						<li class="active"><a href="profile.php">Profile</a></li>
						<li><a href="edit.php">Edit Profile</a></li>
					</ul>
					<hr/>
					<ul class="nav nav-sidebar">
						<li><a class="logout" href="logout.php">Logout</a></li>
					</ul>
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header">Advertisement Price</h1>
				<?php 
					$erto=new apiQuery();
					$Response=$erto->fetchprof(getUser(), getPass());
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
					<table class="table table-condensed table-striped table-hover table-bordered">\
								<thead>	 			 			
								 <tr><th class="ratesDescr">Package Description / Country</th>
								 	<th>Short Code</th>
								 	<th  class="ratesPrice">Price per 1,000</th></tr> 
								</thead><tbody>	 			 			 
								<tr  class="even"><td dad2><div><span  class="floatLeft"><b>World wide Deal</b><br>Traffic from all over the world.</span><span  class="floatRight btn highAvailabilit"> HIGH AVAILABILITY!</span></div></td><td></td><td  class="textToRight">$1.00</td></tr>
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">United Kingdom</span></div></td><td>GB</td><td  class="textToRight">$4.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">United States</span><span></td><td>US</td><td  class="textToRight">$5.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Australia</span></div></td><td>AU</td><td  class="textToRight">$3.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Belgium</span></div></td><td>BE</td><td  class="textToRight">$3.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Canada</span></div></td><td>CA</td><td  class="textToRight">$3.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Cyprus</span></div></td><td>CY</td><td  class="textToRight">$3.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Germany</span></div></td><td>DE</td><td  class="textToRight">$3.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Ireland</span></div></td><td>IE</td><td  class="textToRight">$3.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Korea, Republic Of</span></div></td><td>KR</td><td  class="textToRight">$3.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Netherlands</span></div></td><td>NL</td><td  class="textToRight">$3.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">New Zealand</span></div></td><td>NZ</td><td  class="textToRight">$3.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Singapore</span></div></td><td>SG</td><td  class="textToRight">$3.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">South Africa</span></div></td><td>ZA</td><td  class="textToRight">$3.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">United Arab Emirates</span></div></td><td>AE</td><td  class="textToRight">$3.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">France</span><span  class="floatRight btn highAvailabilit"> REDUCED!</span></div></td><td>FR</td><td  class="textToRight">$2.50</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Austria</span></div></td><td>AT</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Czech Republic</span></div></td><td>CZ</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Denmark</span></div></td><td>DK</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Finland</span></div></td><td>FI</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Greece</span></div></td><td>GR</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Hong Kong</span></div></td><td>HK</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Hungary</span></div></td><td>HU</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Iceland</span></div></td><td>IS</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Iraq</span></div></td><td>IQ</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Italy</span></div></td><td>IT</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Japan</span></div></td><td>JP</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Latvia</span></div></td><td>LV</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Norway</span></div></td><td>NO</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Palestine, Stateof</span></div></td><td>PS</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Poland</span></div></td><td>PL</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Portugal</span></div></td><td>PT</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Qatar</span></div></td><td>QA</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Romania</span></div></td><td>RO</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Saudi Arabia</span></div></td><td>SA</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Slovakia</span></div></td><td>SK</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Spain</span></div></td><td>ES</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Sudan</span></div></td><td>SD</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Sweden</span></div></td><td>SE</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Switzerland</span></div></td><td>CH</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Venezuela</span></div></td><td>VE</td><td  class="textToRight">$2.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Albania</span></div></td><td>AL</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Argentina</span></div></td><td>AR</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Armenia</span></div></td><td>AM</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Bahrain</span></div></td><td>BH</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Bangladesh</span></div></td><td>BD</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Bolivia</span></div></td><td>BO</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Bosnia And Herzegovina</span></div></td><td>BA</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Bulgaria</span></div></td><td>BG</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Cameroon</span></div></td><td>CM</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Chile</span></div></td><td>CL</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">China</span></div></td><td>CN</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Colombia</span></div></td><td>CO</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Costa Rica</span></div></td><td>CR</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Cote D'ivoire</span></div></td><td>CI</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Croatia</span><span  class="floatRight btn highAvailabilit"> REDUCED!</span></div></td><td>HR</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Dominican Republic</span></div></td><td>DO</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Ecuador</span></div></td><td>EC</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Estonia</span></div></td><td>EE</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Georgia</span></div></td><td>GE</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Ghana</span></div></td><td>GH</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Guatemala</span></div></td><td>GT</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Honduras</span></div></td><td>HN</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">India</span><span  class="floatRight btn highAvailabilit"> HIGH AVAILABILITY!</span></div></td><td>IN</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Iran, Islamic Republic Of</span></div></td><td>IR</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Israel</span></div></td><td>IL</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Jamaica</span></div></td><td>JM</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Jordan</span></div></td><td>JO</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Kenya</span></div></td><td>KE</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Kuwait</span></div></td><td>KW</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Lebanon</span></div></td><td>LB</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Libya</span></div></td><td>LY</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Lithuania</span></div></td><td>LT</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Luxembourg</span></div></td><td>LU</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Macao</span></div></td><td>MO</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Macedonia, The Former Yugoslav Republic Of</span></div></td><td>MK</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Malaysia</span><span  class="floatRight btn highAvailabilit"> HIGH AVAILABILITY!</span></div></td><td>MY</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Mexico</span></div></td><td>MX</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Moldova, RepublicOf</span></div></td><td>MD</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Montenegro</span></div></td><td>ME</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Myanmar</span></div></td><td>MM</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Nigeria</span></div></td><td>NG</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Oman</span></div></td><td>OM</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Pakistan</span></div></td><td>PK</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Panama</span></div></td><td>PA</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Peru</span></div></td><td>PE</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Philippines</span></div></td><td>PH</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Russian Federation</span></div></td><td>RU</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Serbia</span><span  class="floatRight btn highAvailabilit"> REDUCED!</span></div></td><td>RS</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Slovenia</span></div></td><td>SI</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Sri Lanka</span></div></td><td>LK</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Taiwan</span></div></td><td>TW</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Tanzania, United Republic Of</span></div></td><td>TZ</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Tunisia</span></div></td><td>TN</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Turkey</span><span  class="floatRight btn highAvailabilit"> REDUCED!</span></div></td><td>TR</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Ukraine</span></div></td><td>UA</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Uruguay</span></div></td><td>UY</td><td  class="textToRight">$1.00</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Algeria</span></div></td><td>DZ</td><td  class="textToRight">$0.80</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Brazil</span><span  class="floatRight btn highAvailabilit"> REDUCED!</span></div></td><td>BR</td><td  class="textToRight">$0.80</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Egypt</span></div></td><td>EG</td><td  class="textToRight">$0.80</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Morocco</span></div></td><td>MA</td><td  class="textToRight">$0.80</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Thailand</span><span  class="floatRight btn highAvailabilit"> HIGH AVAILABILITY!</span></div></td><td>TH</td><td  class="textToRight">$0.80</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Cambodia</span></div></td><td>KH</td><td  class="textToRight">$0.50</td></tr> 
	 			 			 <tr  class="even"><td><div><span  class="floatLeft">Indonesia</span><span  class="floatRight btn highAvailabilit"> HIGH AVAILABILITY!</span></div></td><td>ID</td><td  class="textToRight">$0.40</td></tr> 
	 			 			 <tr  class="odd"><td><div><span  class="floatLeft">Vietnam</span><span  class="floatRight btn highAvailabilit"> HIGH AVAILABILITY!</span></div></td><td>VN</td><td  class="textToRight">$0.40</td></tr> 

	 			 			 <tr  class="breaker"><td dad>&nbsp;</td></tr> 
					</tbody></table>


        <i>Your order may be subject to VAT if your country of residence is in the European Union (EU).</i>

        <p> There is a minimum <b>PayPal</b> deposit of <b>$5.00</b> and all sites/banners are allowed, except when they contain: </p>

        <div id="rules"><ul>
          <li>Frame breaking script</li>
          <li>Popup any windows on entry or exit of any kind</li>
          <li>Automatically attempt to download software or change any user settings</li>
          <li>Adult or Pornographic related</li>
          <li>Hate, Bigotry, and/or Intolerance</li>
          <li>Warez or Software Piracy related</li>
          <li>Music Piracy Related</li>
          <li>Hacking Related</li>
          <li>Anything related to illegal activity</li>
          <li>An adf.ly link, you cannot advertise adf.ly links on adf.ly</li>
        </ul></div>

        <p>Please <a href="../index.php#contact">contact us</a> first if you are unsure whether your advertising would be suitable.</p>
					
				</div>     <!-- Bootstrap core JavaScript
================================================== -->     <!-- Placed at the
end of the document so the pages load faster -->     <script
src="../assets/js/jquery.js"></script>     <script
src="../assets/js/bootstrap.min.js"></script>     <script
src="../assets/js/docs.min.js"></script>     <!-- IE10 viewport hack for
Surface/desktop Windows 8 bug -->     <script src="../../assets/js/ie10
-viewport-bug-workaround.js"></script>         </div>   </div>     </div>
</body> </html>
