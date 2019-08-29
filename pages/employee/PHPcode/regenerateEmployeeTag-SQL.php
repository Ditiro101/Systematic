<?php
include "meRaviQr/qrlib.php";
  $url ='mysql://lf7jfljy0s7gycls:qzzxe2oaj0zj8q5a@u0zbt18wwjva9e0v.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/c0t1o13yl3wxe2h3';
 ///////////////////////////////////
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

        $employeeID = $_POST["employee_ID"];
        if($employeeID)
        {
            $get_query="SELECT * FROM EMPLOYEE WHERE `EMPLOYEE_ID`=$employeeID ";
            $get_result=mysqli_query($DBConnect,$get_query);
            if(mysqli_num_rows($get_result)>0)
            {
                $row= mysqli_fetch_assoc($get_result);
                $name=$row["NAME"];
                $surname = $row["SURNAME"];



                $hash = sha1($employeeID);
                
                    $qrImgName = "StockPath - ".$name ." ".$surname;
                
                
                    $final = $employeeID ; //.$dev;
                    $qrs = QRcode::png($final,"userQr/$qrImgName.png","H","3","3");
                    $qrimage = $qrImgName.".png";
                    $workDir = $_SERVER['HTTP_HOST'];
                    $qrlink = $workDir."/qrcode".$qrImgName.".png";
                    $date = date("Y-m-d H:i:s");
                    
                    $sql = "UPDATE EMPLOYEE_QR
                    SET `HASH` = '$hash', `DATE_GENERATED`= '$date' 
                    WHERE `EMPLOYEE_ID`='$employeeID'";
                    //var_dump($sql);
                    $query_QR = mysqli_query($DBConnect , $sql);
                    if($query_QR)
                    {
                        echo "success";
                    }
                    else
                    {
                        echo "Couldnt regenerate employee tag!";
                    }
            }
            else
            {
                echo "Could not find name and surname of worker";
            }
        }


    //Close database connection
    mysqli_close($DBConnect);

   }



												 
												 