<style type="text/css">
<!--
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
-->
</style>
<?php
	include('../db.php');
	$id=$_GET['id'];
	$result = mysqli_query($con,"SELECT * FROM customer where id='$id'");
		while($row = mysqli_fetch_array($result))
			{
				$fname=$row['fname'];
				$lname=$row['lname'];
				$contact=$row['contact'];
				$email=$row['email'];
				$address=$row['address'];
			}
?>
	First Name:<?php echo $fname ?><br><br>
	Last Name:<?php echo $lname ?><br><br>
	Contact:<?php echo $contact ?><br><br>
	Email Address:<?php echo $email ?><br><br>
	Address:<?php echo $address ?><br><br>
