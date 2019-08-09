<?php


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
