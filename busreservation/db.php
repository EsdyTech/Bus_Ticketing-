<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "ticket";
	
	$con = new mysqli($host, $user, $pass, $db);
	if($con->connect_error){
		echo "Failed To Connect to database:" . $con->connect_error;
	}
?>