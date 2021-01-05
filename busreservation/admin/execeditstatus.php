<?php
	include('../db.php');
	$roomid = $_POST['roomid'];
	$status=$_POST['status'];
	mysqli_query($con,"UPDATE reserve SET status='$status' WHERE id='$roomid'");
	header("location: setinventory.php");
?>