<?php
	$get=isset($_GET['a'])?$_GET['a']:"";
	header("Location: ../404.php?a=$get");

?>