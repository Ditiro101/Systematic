<?php

session_start();
// $host = "u0zbt18wwjva9e0v.cbetxkdyhwsb.us-east-1.rds.amazonaws.com"; /* Host name */
// $user = "fc03iaews8n48gd7fc03iaews8n48gd7"; /* User */
// $password = "is56mtqaxflh6ji3";  //Password 
// $dbname = "wvkhxiwu6jiahnh9"; /* Database name */


$url ='mysql://fc03iaews8n48gd7:is56mtqaxflh6ji3@u0zbt18wwjva9e0v.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/wvkhxiwu6jiahnh9';
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

$con = mysqli_connect($hostname, $username, $password, $database);

// $con = mysqli_connect($host, $user, $password,$dbname);
//Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
else{
    echo "success";
}


$email = ($_POST['email']);
$password = ($_POST['password']);


if ($email != "" && $password != ""){

    $sql_query = "select count(*) as cntUser from users where username='".$email."' and password='".$password."'";
    $result = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_array($result);


    $count = $row['cntUser'];

    if($count > 0){
        $_SESSION['email'] = $email;
        $response_array['status'] = 'success';
        echo "success";
    
    }
    else{
         $response_array['status'] = 'error';
    }
}

?>
