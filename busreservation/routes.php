<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Online Bus Reservation Ticketing System</title>
<link rel="stylesheet" type="text/css" href="xres/css/style.css" />
<link rel="icon" type="image/png" href="xres/images/favicon.png" />
<link type="text/css" href="css/styles.css" rel="stylesheet" media="all" />
</head>

<body>
<div id="wrapper">
	<div id="header">
		<div style="font-size:40px;margin-top:20px;margin-left:80px;">ODAFE TRANSPORT COMPANY LIMITED</div>

    <!-- <h1><a href="index.php"><img src="xres/images/logo.png" class="logo" alt="James Buchanan Pub and Restaurant" /></a></h1> -->
        <ul id="mainnav">
			<li class="current"><a href="index.php">Home</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <!-- <li><a href="history.php">History</a></li> -->
            <li><a href="routes.php">Routes</a></li>
            <!-- <li><a href="location.php">location</a></li> -->
            <!-- <li><a href="contact.php">Contact Us</a></li> -->
    	</ul>
	</div>
    <div id="content">
	<h2 align="center"><b>AVAILABLE ROUTES</b></h2>
    	<div id="gallerycontainer">
			<div class="portfolio-area" style="margin:0 auto; padding:140px 20px 20px 20px; width:820px;">	
					<table cellspacing="0" cellpadding="0" border="0" style="width: 449px;"><colgroup><col width="136"> <col width="179"> <col width="134"> </colgroup>

			<tr>
			<th width="136" height="22" class="xl66"><span style="color: #000000;"><b>ROUTE</b></span></th>
			<th width="136" height="22" class="xl66"><span style="color: #000000;"><b>TYPE</b></span></th>
			<th width="136" height="22" class="xl66"><span style="color: #000000;"><b>SEATS</b></span></th>
			<th width="136" height="22" class="xl66"><span style="color: #000000;"><b>TIME</b></span></th>
			<th width="136" height="22" class="xl66"><span style="color: #000000;"><b>PRICE</b></span></th>
			</tr>
			</thead>
			<tfoot>
			<tr>
			<th width="136" height="22" class="xl66"><span style="color: #000000;"><b>ROUTE</b></span></th>
			<th width="136" height="22" class="xl66"><span style="color: #000000;"><b>TYPE</b></span></th>
			<th width="136" height="22" class="xl66"><span style="color: #000000;"><b>SEATS</b></span></th>
			<th width="136" height="22" class="xl66"><span style="color: #000000;"><b>TIME</b></span></th>
			<th width="136" height="22" class="xl66"><span style="color: #000000;"><b>PRICE</b></span></th>
			</tr>
			</tfoot>
			<tbody>
		<?php

			include('db.php');
			$result = mysqli_query($con,"SELECT * FROM route");
			while($row = mysqli_fetch_array($result))
				{
					echo"<tr>
					<td width='134' class='xl67'><span style='color: #000000'>".$row['route']."</span></td>
					<td width='134' class='xl67'><span style='color: #000000'>".$row['type']."</span></td>
					<td width='134' class='xl67'><span style='color: #000000'>".$row['numseats']."</span></td>
					<td width='134' class='xl67'><span style='color: #000000'>".$row['time']."</span></td>
					<td width='134' class='xl67'><span style='color: #000000'>".$row['price']."</span></td>
					</tr>";
				}
		?>
</tr>
</tbody>
</table>
				<div class="column-clear"></div>
            </div>
			<div class="clearfix"></div>
        </div>
    </div>
    



<!-- <div id="footer">
	<h4>+63(2)3525393 &bull; <a href="contact-us.php">Barangay West Kamias, Cubao, Quezon City, Metro Manila  </a></h4>
	<p>Hours of Operation&nbsp;&nbsp;&bull;&nbsp;&nbsp;Mon - Sun: 10:00 am - 12:00 am</p>
	<a href="index.php"><img src="xres/images/footer-logo.jpg" alt="James Buchanan Pub and Restaurant" /></a>
	<p>&copy; Copyright 2013 Florida Bus | All Rights Reserved <br /></p>
</div> -->
<div id="footer">
	<h4><a href="#">Odafe Transport Company Limited</a></h4>
	<p>Hours of Operation&nbsp;&nbsp;&bull;&nbsp;&nbsp;Mon - Sun: 10:00 am - 12:00 am</p>
	<!-- <a href="index.php"><img src="xres/images/footer-logo.jpg" alt="James Buchanan Pub and Restaurant" /></a> -->
	<p>&copy; Copyright 2020 Odafe Transport Company Limited | All Rights Reserved <br /></p>
</div>

</div>
</body>
</html>
