<?php

  $url ='mysql://lf7jfljy0s7gycls:qzzxe2oaj0zj8q5a@u0zbt18wwjva9e0v.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/c0t1o13yl3wxe2h3';

  $dbparts = parse_url($url);

  $hostname = $dbparts['host'];
  $username = $dbparts['user'];
  $password = $dbparts['pass'];
  $database = ltrim($dbparts['path'],'/');

  $DBConnect = mysqli_connect($hostname, $username, $password, $database);

  if($DBConnect === false)
  {
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  else
  {

    $userID = $_POST["userID"];  
    $checkInTime = $_POST["checkin"];
    $checkOutTime = $_POST["checkout"];



     $sql = "UPDATE CHECKIN_CHECKOUT_TIME 
     SET `ARRIVAL_TIME` = '$checkInTime',`DEPATURE_TIME` = '$checkOutTime' , `USER_ID` = '$userID'";
     $query_QR = mysqli_query($DBConnect , $sql);
     
     $success = "success";
     if($query_QR)
     {
         echo $success;
     }
     else
     {
         echo "not found";
     }
        
 
     mysqli_close($DBConnect); 
    //Close database connection
   
  }
?>