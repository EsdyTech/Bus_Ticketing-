<?php
include('db.php');
$id=$_GET['id'];
$setnum=$_GET['setnum'];

?>

<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Inel Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<div id="stylized" class="myform" style="width: 400px; margin-left:250px;">
Note: Print and present this details upon boarding the bus<br><br>

<?php

$result = mysqli_query("SELECT customer.lname, customer.fname, customer.address, customer.contact, 
route.type, route.time, route.route, reserve.id, reserve.date, reserve.seat, 
reserve.transactionnum, reserve.payable, reserve.status, reserve.seat_reserve
from reserve
inner join customer on customer.id = reserve.cusId
inner join route on route.id = reserve.bus

WHERE transactionnum='$id'");
$row = mysqli_fetch_array($result);
$date = date('yy-m-d');
echo '	
<table style="width:200%" border="1px">
<tr>
    <th colspan="6"><strong>TICKET RESERVATION DETAILS</strong><br><br></th>
  </tr>
  <tr>
  	<td><strong>Transaction Number</strong></td>
  	<td>'.$row['transactionnum'].'</td> 
  	<td><strong>Full Name</strong></td>
	<td colspan="3">'.$row['fname'].' '.$row['lname'].'</td>
  </tr>
  <tr>
  <td><strong>Address</strong></td>
  <td colspan="3">'.$row['address'].'</td> 
  <td><strong>Contact</strong></td>
	<td>'.$row['contact'].'</td>
  </tr>
  <tr>
  <td><strong>Amount Payable</strong></td>
    <td>'.$row['payable'].'</td> 
	<td><strong>Route</strong></td>
	<td>'.$row['route'].'</td>
	<td><strong>Bus Type</strong></td>
	<td>'.$row['type'].'</td>
  </tr>
  <tr>
  <td><strong>Time of Departure</strong></td>
    <td>'.$row['time'].'</td> 
	<td><strong>Seat Number</strong></td>
	<td>'.$setnum.'</td>
	<td></td>
	<td></td>
  </tr>
  <tr>
  <td><strong>Date of Travel</strong></td>
  <td colspan="3">'.$row['date'].'</td> 
  <td>Todays Date</td>
	<td>'.$date.'</td>
  </tr>

</table>';


?>
</div>
<a href="index.php">Home</a> | <a href="javascript:Clickheretoprint()">Print</a>
</body>
</html>