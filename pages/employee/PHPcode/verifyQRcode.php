<?php 


$url ='mysql://lf7jfljy0s7gycls:qzzxe2oaj0zj8q5a@u0zbt18wwjva9e0v.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/c0t1o13yl3wxe2h3';

$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');
$DBConnect;

$DBConnect = mysqli_connect($hostname, $username, $password, $database);

if($DBConnect === false)
{
die("ERROR: Could not connect. " . mysqli_connect_error());
}
else
{

    
    $employeeID = $_POST["qrCode"];

    $day = date("Y-m-d");

    $firstQuery = "SELECT * FROM EMPLOYEE_HOUR
    WHERE  `DATE` = '$day' and `EMPLOYEE_ID`= '$employeeID'";

    $submitCheckQuery = mysqli_query($DBConnect,$firstQuery);

    if($submitCheckQuery)
    {
        $row= mysqli_fetch_assoc($submitCheckQuery);
        if(mysqli_num_rows($submitCheckQuery))
        {
            echo "Already Checked-in!";
        }
        else
        {

            $realCheckin;
            $realCheckout;
            $get_query="SELECT * FROM CHECKIN_CHECKOUT_TIME
            WHERE CHECKIN_CHECKOUT_TIME_ID = '0'";
            $get_result=mysqli_query($DBConnect,$get_query);
        
            if(mysqli_num_rows($get_result)>0)
            {
                if($row= mysqli_fetch_assoc($get_result))
                {
                                $realCheckin = $row["ARRIVAL_TIME"];
                                $realCheckout = $row["DEPATURE_TIME"];
        
        
        
                               
                    
                
                
                   
                                $sql = "SELECT HASH FROM EMPLOYEE_QR WHERE (EMPLOYEE_ID='$employeeID')";
                                $query_QR = mysqli_query($DBConnect , $sql);
                            
                                //$request ="SELECT * FROM `chats` WHERE ((receiver_id='$receiver' and sender_id='$sender') or (receiver_id='$sender' and sender_id='$receiver'))
                                //ORDER BY date_order Asc" ;
                                //echo $request;
                                //$submit = mysqli_query($conn,$request);
                            
                                $time = new DateTime();
                                $currentTime = $time->format("H:i:s");//checkin/checkout time.
                            
                            
                                $addedTime = "";//flag
                            
                                //date("H:i:s");
                                $time = new DateTime();
                                $currentTime = $time->format("Y-m-d H:i:s");//checkin/checkout time.
                                
                                
                                $addedTime = "";//flag
                            
                                //date("H:i:s");
                                
                                $setCheckinTime = new DateTime($realCheckin);
                                $setCheckinTime = $setCheckinTime->format("Y-m-d H:i:s");
                                
                                $checkoutTime = new DateTime($realCheckout);
                                $checkoutTime = $checkoutTime->format("Y-m-d H:i:s");
                            
                                if($query_QR)
                                {
                                    if($currentTime <= $setCheckinTime)
                                    {
                                        $currentTime = $setCheckinTime;
                                        
                                        
                                        $query = "INSERT INTO `EMPLOYEE_HOUR`(`DATE`, `CHECK_IN_TIME`, `CHECK_OUT_TIME`, `EMPLOYEE_ID`) VALUES ('$day','$currentTime','NULL','$employeeID')";
                                    
                                        $submitQuery = mysqli_query($DBConnect,$query);
                                        
                                        if($submitQuery)
                                        {
                                            $addedTime = "Time SQL works";
                                        }
                            
                                    }
                                    else if($currentTime >= $setCheckinTime && $currentTime <= $checkoutTime)
                                    {
                                        
                                        $query = "INSERT INTO `EMPLOYEE_HOUR`(`DATE`, `CHECK_IN_TIME`, `CHECK_OUT_TIME`, `EMPLOYEE_ID`) VALUES ('$day','$currentTime','NULL','$employeeID')";
                                        $submitQuery = mysqli_query($DBConnect,$query);
                                        if($submitQuery)
                                        {
                                            $addedTime = "Time SQL works";
                                        }
                                    }
                                    else
                                    {
                                        echo "Over checkout time";
                                    }
                            
                            
                                }
                                else
                                {
                                    echo "Employee does not exist on system";
                                }
                                $verifyID = sha1($employeeID);
                                //var_dump($verifyID);
                                while($correctHash = mysqli_fetch_assoc($query_QR))
                                {
                                    if($correctHash["HASH"]== $verifyID && $addedTime == "Time SQL works" )
                                    {
                                    $success = "success";
                                        echo $success;
                                        break;
                                    }
                                }
                            
                            
                                //Used for search
                                /*$obj = array();
                                while($looper = mysqli_fetch_assoc($query_QR))
                                {
                                    $obj[] = $looper;
                                }*/
        
                }
                else
                {
                    echo "No checkin/checkout times";
                }
            }
            else
            {
                echo "No checkin/checkout times";
            }
        
        


        }

    }
    else
    {
        echo "Error";
    }


   


              
            
        
            mysqli_close($DBConnect);
    }

   
//$conn->close();


/*$request = "UPDATE FriendRequest SET sender_id ='$sender' WHERE confirmedFriend = 'yes' and user_id ='$sender' and otherUser ='$receiver'";
$yeah=mysqli_query($conn,$request);



$query = "UPDATE FriendRequest SET receiver_id='$receiver' WHERE confirmedFriend = 'yes' and user_id ='$sender' and otherUser ='$receiver'";
$submit=mysqli_query($conn,$query);*/

?>