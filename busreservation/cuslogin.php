<?php
	//Start session
	session_start();
	
	//Connect to mysqli server
	require "db.php";
	
	//Function to sanitize values received from the form. Prevents SQL injection
	// function clean($str) {
	// 	$str = @trim($str);
	// 	if(get_magic_quotes_gpc()) {
	// 		$str = stripslashes($str);
	// 	}
	// 	return mysqli_real_escape_string($str);
	// }
	
	//Sanitize the POST values
	$login = $_POST['username'];
	$password = $_POST['password'];
	
	$qry="SELECT * FROM customer WHERE email='$login' AND password='$password'";
	$result=mysqli_query($con,$qry);
	/////////////////////////////// 
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_EMAIL'] = $member['email'];
			session_write_close();
			header("location: customer/dashboard.php");
			exit();
		}else {
			//Login failed
			header("location: index.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>