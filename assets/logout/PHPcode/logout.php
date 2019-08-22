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
    $response = array("error"=> "Database connection error", "sqliErrorCode"=>mysqli_connect_error());
    echo $response;
  }
  else
  {
    
    //Close database connection
    mysqli_close($DBConnect);
  }
?>


<?php

$url = 'mysql://lf7jfljy0s7gycls:qzzxe2oaj0zj8q5a@u0zbt18wwjva9e0v.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/c0t1o13yl3wxe2h3';
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

$con = mysqli_connect($hostname, $username, $password, $database);

//Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}


$email = ($_POST['email']);
$password = ($_POST['password']);


if ($email != "" && $password != ""){


      
    $sql_query ="SELECT * FROM  vineet  WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) == 1) {
        session_start();
        $_SESSION['email'] = $email;
       
        echo "success";
        
    }
    else{
         echo "failed";
    }
}

?>
