<?php 

	function queryMysql($query){
	    global $connection;
	    $conn=$connection;
	    $result = $conn->query($query);
	    if (!$result) die($conn->error);
	    return $result;
	}	

	function queryNum($query){
	  	$result=queryMysql($query);
	  	$num=$result->num_rows;
	  	return $num;
  	}

  	function fetch_assoc($query){
  		$roww=array();
		$res=queryMysql($query);
		$nurm=querynum($query);
		if ($nurm>0){
			for ($i=0; $i<$nurm; $i++){
				$arr=$res->fetch_array(MYSQLI_ASSOC);
				array_push($roww, $arr);
			}
			return $roww;
		} 
		return emptyArray();
	}

	

  function sanitizeString($var)
  {
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }

	function getValue(){
	// 	$row=$this->arry;
	// 	$result=;
	// 	return $result;
	}

	function setConnection($var){
		// $this->connection=$var;
	}

	function getConnection(){
		// return $this->connection;
	}

	function connect(){
	  	$connection = new mysqli(dbhost, dbuser, dbpass, "urlshrtnr");	
		if ($connection->connect_error) die($connection->connect_error);
	  	setUp();
	  	return $connection;
	}

	function setUp(){
		//1 ->banner ; 2-> grid;
		$query= "id int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				username text NOT NULL,
  				ass_code text NOT NULL,
  				time int(16) NOT NULL";
		createTable("assignment", $query);
		$query= "id int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				username text NOT NULL,
  				ass_code text NOT NULL,
  				method_ text NOT NULL,
  				deleted_ text NOT NULL,
  				deleted_time int(16) NOT NULL,
  				deactivated_ text NOT NULL,
  				deactivated_time int(16) NOT NULL,
  				deactivation_time int(16) NOT NULL,
  				time int(16) NOT NULL";
		createTable("assign_teach", $query);	
		$query= "id int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				username text NOT NULL,
  				ip_add text NOT NULL,
  				type_ text NOT NULL,
  				time int(16) NOT NULL";
		createTable("iptable", $query);
		$query= "id int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				username text NOT NULL,
  				pass text NOT NULL,
  				current_ int(16) NOT NULL,
  				time int(16) NOT NULL";
		createTable("passtable", $query);
		$query= "id int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name text NOT NULL,
				username text NOT NULL,
				matric_no text NOT NULL,
				dob int(16) NOT NULL,
				school text NOT NULL,
				email text NOT NULL,
				country text NOT NULL,
  				teacher int(16) NOT NULL,
  				time int(16) NOT NULL";
		createTable("profile", $query);
		$query= "id int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name text NOT NULL,
				email text NOT NULL,
				title text NOT NULL,
				message text NOT NULL,
  				time int(16) NOT NULL";
		createTable("contacttable", $query);
	}

	function createTable($name, $query){
	    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
	}
?>