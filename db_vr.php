<?php  

	define("dbhost", "localhost");
	define("dbpass", "08036660086");
	define("dbuser", "courseco_admin");
	define("dbname", "courseco_database");
	$webs="adpay.tk/";
 	$connection = new mysqli(dbhost, dbuser, dbpass, dbname);
  	if ($connection->connect_error) die($connection->connect_error);
?>