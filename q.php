<?php
$er="";
	$e= 'comment_like_id;
comment_like_time;
comment_like_user;';
	 $oe=explode(';', $e);
	 foreach ($oe as $key => $value) {
	 	# code...
	 	$er='"'.$value.'",'.$er;
	 }
	 echo '{"'.'name":"", "tables":['.$er.'"]}"';


		$likn="http://coursecode.000webhostapp.com/passrecovery.php?hash=hashCode&user=uusername";
$message="Hello $uusername, \n \t \t You are receiving this message because you clicked on forgot password, please use this link $likn to login again.\n \t \t if you did not make this request, please discard this message.\n \t \t The CourseCode Team.";
wordwrap($message, 70);
	 echo wordwrap($message, 70);

?>