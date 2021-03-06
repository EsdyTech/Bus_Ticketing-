<?php
    require_once('auth.php');
    include('../db.php');

    if(isset($_SESSION['SESS_MEMBER_ID'])){

        $results = mysqli_query($con,"SELECT * FROM customer where id = ".$_SESSION['SESS_MEMBER_ID']."");
        $rows = mysqli_fetch_array($results);

        $customerId = $_SESSION['SESS_MEMBER_ID'];
    }
?>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="febe/style.css" type="text/css" media="screen" charset="utf-8">
<link rel="icon" type="image/png" href="xres/images/favicon.png" />

<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>	
<script type="text/javascript" src="xres/js/saslideshow.js"></script>
<script type="text/javascript" src="xres/js/slideshow.js"></script>
<script src="js/jquery-1.5.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vallenato/vallenato.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="vallenato/vallenato.css" type="text/css" media="screen" charset="utf-8">

		<script type="text/javascript">
		$("#slideshow > div:gt(0)").hide();

		setInterval(function() { 
		  $('#slideshow > div:first')
			.fadeOut(1000)
			.next()
			.fadeIn(1000)
			.end()
			.appendTo('#slideshow');
		},  3000);
	</script>
	<!--sa calendar-->	
		<script type="text/javascript" src="js/datepicker.js"></script>
        <link href="css/demo.css"       rel="stylesheet" type="text/css" />
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
		//<![CDATA[

		/*
				A "Reservation Date" example using two datePickers
				--------------------------------------------------

				* Functionality

				1. When the page loads:
						- We clear the value of the two inputs (to clear any values cached by the browser)
						- We set an "onchange" event handler on the startDate input to call the setReservationDates function
				2. When a start date is selected
						- We set the low range of the endDate datePicker to be the start date the user has just selected
						- If the endDate input already has a date stipulated and the date falls before the new start date then we clear the input's value

				* Caveats (aren't there always)

				- This demo has been written for dates that have NOT been split across three inputs

		*/

		function makeTwoChars(inp) {
				return String(inp).length < 2 ? "0" + inp : inp;
		}

		function initialiseInputs() {
				// Clear any old values from the inputs (that might be cached by the browser after a page reload)
				document.getElementById("sd").value = "";
                document.getElementById("ssd").value = "";
				document.getElementById("ed").value = "";

				// Add the onchange event handler to the start date input
				datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
                datePickerController.addEvent(document.getElementById("ssd"), "change", setReservationDates);

		}

		var initAttempts = 0;

		function setReservationDates(e) {
				// Internet Explorer will not have created the datePickers yet so we poll the datePickerController Object using a setTimeout
				// until they become available (a maximum of ten times in case something has gone horribly wrong)

				try {
                    var ssd = datePickerController.getDatePicker("ssd");
						var sd = datePickerController.getDatePicker("sd");
						var ed = datePickerController.getDatePicker("ed");
				} catch (err) {
						if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
						return;
				}

				// Check the value of the input is a date of the correct format
				var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");
				var dtt = datePickerController.dateFormat(this.value, ssd.format.charAt(0) == "m");

				// If the input's value cannot be parsed as a valid date then return
				if(dt == 0) return;
                if(dtt == 0) return;

				// At this stage we have a valid YYYYMMDD date

				// Grab the value set within the endDate input and parse it using the dateFormat method
				// N.B: The second parameter to the dateFormat function, if TRUE, tells the function to favour the m-d-y date format
				var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

				// Set the low range of the second datePicker to be the date parsed from the first
				ed.setRangeLow( dt );
				
				// If theres a value already present within the end date input and it's smaller than the start date
				// then clear the end date value
				if(edv < dt) {
						document.getElementById("ed").value = "";
				}
		}

		function removeInputEvents() {
				// Remove the onchange event handler set within the function initialiseInputs
				datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
                datePickerController.removeEvent(document.getElementById("ssd"), "change", setReservationDates);

		}

		datePickerController.addEvent(window, 'load', initialiseInputs);
		datePickerController.addEvent(window, 'unload', removeInputEvents);

		//]]>
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
					<li>
						<a href="profile.php">
							<img alt="Statistics" src="img/m-users.png">
							<span>Profile</span>
						</a>
					</li>
					
					<div class="clearfix"></div>
				</ul>
                <div id="content">

<?php

if(isset($_POST['back'])){

    echo "<script type = \"text/javascript\">
    window.location = (\"cusReservation.php\")
    </script>";

}

?>

<?php

$busnum=$_POST['route'];
$date=$_POST['date'];
$qty=$_POST['qty'];

$result = mysqli_query($con,"SELECT * FROM route WHERE id='$busnum'");
while($row = mysqli_fetch_array($result))
	{
		$numofseats=$row['numseats'];
		$query = mysqli_query($con,"SELECT sum(seat_reserve) FROM reserve where date = '$date'");
							while($rows = mysqli_fetch_array($query))
							  {
							  $inogbuwin=$rows['sum(seat_reserve)'];
							  }
		$avail=$numofseats-$inogbuwin;
		$setnum=$inogbuwin+1;
	}
?>
<?php
if ($avail < $qty){

    echo "Quantity reserved exceed the number of seats available in the bus!";

}
else if($avail > 0)
{
?>
<br><br>

<form action="save2.php" method="post" style="margin-bottom:none;margin-left:320px;">
<input type="hidden" value="<?php echo $busnum ?>" name="busnum" />
<input type="hidden" value="<?php echo $date ?>" name="date" />
<input type="hidden" value="<?php echo $qty ?>" name="qty" />
    <span style="margin-right: 11px;">Seats Reserved: 
    <input type="text" name="setnum" style="width: 190px;height: 30px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;" value="
        <?php
        $N = $qty;
        for($i=0; $i < $N; $i++)
        {
        echo $i+$setnum.', ';
        } 
        ?>
        " id="name" readonly/><br><br>
    <input type="submit" id="submit" name="submit" value="Reserve" style="height: 34px; margin-left: 15px; width: 191px; padding: 5px; border: 3px double rgb(204, 204, 204);" />
    <a href="cusReservation.php" id="submit" style="height: 34px; margin-left: 15px; width: 200px; padding: 5px; border: 3px double rgb(204, 204, 204);"> Back </a>
    </form> 

<?php

}
else if($avail <= 0)
{

    echo "No Seats are available!";

}

    ?>
	
                        
               </div> </div>


               		<div id="footer" class="radius-bottom">
					2011-12 �
					<a class="afooter-link" href="">TurboAdmin 1.1</a>
					by
					<a class="afooter-link" href="">Begie</a>
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