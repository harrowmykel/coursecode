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
?>