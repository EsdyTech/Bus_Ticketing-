<?php
    require_once('auth.php');
    include('../db.php');

    $results = mysqli_query($con,"SELECT * FROM customer where id = ".$_SESSION['SESS_MEMBER_ID']."");
    $rows = mysqli_fetch_array($results);
?>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="febe/style.css" type="text/css" media="screen" charset="utf-8">
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>	
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
</head>
<body>
	<div id="container">
		<div id="adminbar-outer" class="radius-bottom">
			<div id="adminbar" class="radius-bottom">
				<a id="logo" href="dashboard.php"></a>
				<div id="details">
					<a class="avatar" href="javascript: void(0)">
					<img width="36" height="36" alt="avatar" src="img/avatar.jpg">
					</a>
					<div class="tcenter">
					Hi
					<strong><?php echo $rows['lname'].' '.$rows['fname'];?></strong>
					!
					<br>
					<a class="alightred" href="../index.php">Logout</a>
					</div>
				</div>
			</div>
		</div>
		<div id="panel-outer" class="radius" style="opacity: 1;">
			<div id="panel" class="radius">
				<ul class="radius-top clearfix" id="main-menu">
					<li>
						<a class="active" href="dashboard.php">
							<img alt="Dashboard" src="img/m-dashboard.png">
							<span>Dashboard</span>
						</a>
					</li>
					<li>
						<a href="cusReservation.php">
							<img alt="Statistics" src="img/m-statistics.png">
							<span>Reservation</span>
						</a>
					</li>
					<li>
						<a href="cusBooking.php">
							<img alt="Statistics" src="img/m-statistics.png">
							<span>My Bookings</span>
						</a>
					</li>
					<!-- <li>
						<a href="profile.php">
							<img alt="Statistics" src="img/m-users.png">
							<span>Profile</span>
						</a>
					</li> -->
					
					<div class="clearfix"></div>
				</ul>
				<div id="content" class="clearfix">
					<label for="filter">Filter</label> <input type="text" name="filter" value="" id="filter" />
					<table cellpadding="1" cellspacing="1" id="resultTable">
						<thead>
							<tr>
							<th  style="border-left: 1px solid #C1DAD7"> Date </th>
								<th> Bus Type </th>
								<th> Route </th>
								<th> Seats Reserved </th>
								<th> Time </th>
								<th> Date </th>
								<th> Seat Number </th>
								<th> TransactionNo </th>
								<th> Payable </th>
								<th> Status </th>
								<th> Action </th>
							</tr>
						</thead>
						<tbody>
						<?php
							include('../db.php');

					$result = mysqli_query($con,"SELECT customer.lname, customer.fname, customer.address, route.type, route.time, route.route, reserve.id, reserve.date, reserve.seat, 
					reserve.transactionnum, reserve.payable, reserve.status, reserve.seat_reserve from reserve
						inner join customer on customer.id = reserve.cusId
						inner join route on route.id = reserve.bus
						where cusId = ".$_SESSION['SESS_MEMBER_ID']."");
				while($row = mysqli_fetch_array($result))
				{
					echo '<tr class="record">';
					echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['date'].'</td>';
					echo '<td><div align="right">'.$row['type'].'</div></td>';
					echo '<td><div align="right">'.$row['route'].'</div></td>';
					echo '<td><div align="right">'.$row['seat_reserve'].'</div></td>';
					echo '<td><div align="right">'.$row['time'].'</div></td>';
					echo '<td><div align="right">'.$row['date'].'</div></td>';
					echo '<td><div align="right">'.$row['seat'].'</div></td>';
					echo '<td><div align="right">'.$row['transactionnum'].'</div></td>';					
					echo '<td><div align="right">'.$row['payable'].'</div></td>';
					echo '<td><div align="right">'.$row['status'].'</div></td>';
					echo '<td><div align="center"><a rel="facebox" href="viewReservation.php?id='.$row['id'].'">View</a> | <a href="print.php?id='.$row['transactionnum'].'&setnum='.$row['seat'].'" class="delbutton" title="Click To Print">Print</a></div></td>';
					echo '</tr>';
				}
							?> 
						</tbody>
					</table>
				</div>
			 	<div id="footer" class="radius-bottom">
					2020
					<a class="afooter-link" href="">Odafe Transport Company Limited</a>
					<a class="afooter-link" href=""></a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
	<script src="js/jquery.js"></script>

</body>
</html>