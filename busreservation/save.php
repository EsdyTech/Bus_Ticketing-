<?php
include('db.php');
function createRandomPassword() {
	$chars = "abcdefghijkmnopqrstuvwxyz023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {
		$num = rand() % 33;
		$tmp = substr($chars, $num, 1);
		$pass = $pass . $tmp;
		$i++;
	}
	return $pass;
}
$confirmation = createRandomPassword();
$fname=$_POST['fname'];
$qty=$_POST['qty'];
$lname=$_POST['lname'];
$busnum=$_POST['busnum'];
$setnum=$_POST['setnum'];
$date=$_POST['date'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$email=$_POST['email'];
$pword=$_POST['password'];
$result = mysqli_query("SELECT * FROM route WHERE id='$busnum'");
while($row = mysqli_fetch_array($result))
	{
	$price=$row['price'];
	}
	$payable=$qty*$price;

	$qry="SELECT * FROM customer WHERE email='$email'";
	$result=mysqli_query($qry);
	
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			
			echo "<script type = \"text/javascript\">
			alert(\"Email Address already exist! Try another email\");
			window.location = (\"index.php\")
			</script>";

			exit();
		}else {

$qrys="INSERT INTO customer (fname, lname, address, contact, email, password)
VALUES ('$fname', '$lname', '$address', '$contact','$email','$pword')";
$resultt=mysqli_query($qrys);

if($resultt) {

		$qry1="SELECT * FROM customer WHERE email='$email'";
	$result1=mysqli_query($qry1);
	
	if($result1) {
		if(mysqli_num_rows($result1) > 0) {
			$roww = mysqli_fetch_assoc($result1);
			$customerId = $roww['id'];
	

mysqli_query("INSERT INTO reserve (cusId, date, bus, seat_reserve, transactionnum, seat, payable, status)
VALUES ('$customerId', '$date', '$busnum', '$qty', '$confirmation','$setnum','$payable','')");
header("location: print.php?id=$confirmation&setnum=$setnum");
				}
			}
		}
	}
}

	
?>