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

            $testerVariable = $_POST["exampleVariable"];
   if($testerVariable)
   {
                $day = date("Y-m-d");
    
                $counter = 0;
                $temp = array();
                $sql = "SELECT * FROM EMPLOYEE_HOUR WHERE (`DATE`='$day'and `CHECK_IN_TIME` !=NULL)";
                $query_QR = mysqli_query($DBConnect , $sql);
                if($query_QR)
                {
                    while($row = mysqli_fetch_assoc($query_QR) )
                    {
                        $temp[] = $row["EMPLOYEE_ID"];
                        $counter++;
                    }
                    if($counter < 0)
                    {
                        echo "the total workers are: " . $counter . "and the employee ID array is: " . $temp;
                    }
                    else
                    {
                        echo "No one is checked in or there is an error in the sql logic";
                    }
                    
                
                }
                else
                {
                    echo "Select SQL statement error! \n" ;
                    echo $sql;
                }
        
       
   }
   else
   {
        echo "Ajax sent empty variable";
   }

    

            mysqli_close($DBConnect);


}


?>