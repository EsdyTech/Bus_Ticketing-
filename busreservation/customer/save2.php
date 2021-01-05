<?php

require_once('auth.php');
include('../db.php');

if(isset($_SESSION['SESS_MEMBER_ID'])){

    // $results = mysqli_query("SELECT * FROM customer where id = ".$_SESSION['SESS_MEMBER_ID']."");
    // $rows = mysqli_fetch_array($results);

    $customerId = $_SESSION['SESS_MEMBER_ID'];
}

if(isset($_POST['submit'])){

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


    $busnum=$_POST['busnum'];
    $date=$_POST['date'];
    $qty=$_POST['qty'];
    $confirmation = createRandomPassword();
    $setnum=$_POST['setnum'];


    $result = mysqli_query($con,"SELECT * FROM route WHERE id='$busnum'");
    while($row = mysqli_fetch_array($result))
        {
        $price=$row['price'];
        }
        $payable=$qty*$price;
    
       
    mysqli_query($con,"INSERT INTO reserve (cusId, date, bus, seat_reserve, transactionnum, seat, payable, status)
    VALUES ('$customerId', '$date', '$busnum', '$qty', '$confirmation','$setnum','$payable','')");

    echo "<script type = \"text/javascript\">
    alert(\"Seat Reservation was successfull\");
    window.location = (\"print.php?id=$confirmation&setnum=$setnum\")
    </script>";


}


    ?>