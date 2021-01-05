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
	require_once('auth.php');

	$id=$_GET['id'];
	$result = mysqli_query($con,"SELECT customer.lname, customer.fname, customer.address, route.type, route.time, route.route, reserve.id, reserve.date, reserve.seat, 
					reserve.transactionnum, reserve.payable, reserve.status, reserve.seat_reserve from reserve
						inner join customer on customer.id = reserve.cusId
						inner join route on route.id = reserve.bus
						where cusId = ".$_SESSION['SESS_MEMBER_ID']."");
		while($row = mysqli_fetch_array($result))
			{
                $date=$row['date'];
                $type=$row['type'];
				$route=$row['route'];
				$seat_reserve=$row['seat_reserve'];
				$time=$row['time'];
                $seat=$row['seat'];
                $transactionnum=$row['transactionnum'];
                $payable=$row['payable'];
                $status=$row['status'];
			}
?>
	Date:<?php echo $date ?><br><br>
	Bus Type:<?php echo $type ?><br><br>
	Route:<?php echo $route ?><br><br>
	Seats Reserved:<?php echo $seat_reserve;?><br><br>
	Time:<?php echo $time;?><br><br>
    Seats Number:<?php echo $seat;?><br><br>
    Transaction No:<?php echo $transactionnum;?><br><br>
    Total Amount:<?php echo $payable;?><br><br>
    Status:<?php echo $status;?><br><br>
