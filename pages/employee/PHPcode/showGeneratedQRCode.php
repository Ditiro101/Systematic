<?php
$employeeID;
if(isset($_GET["employeeID"]))
{
    $employeeID = $_GET["employeeID"];
   // $employeeID = intval($employeeID)
    //var_dump($employeeID);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Employee QR Code - Stock Path</title>
  <!-- Favicon -->
  <link href="../../../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../../../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../../../assets/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body>
    <div class="text-center">
        <h1>Employee Tag to be Printed</h1></br>
        <img src="userQr/<?php echo $employeeID; ?>.png"  alt="person"><br/>
        <button type="button" class="btn btn-link  text-center"   onclick="window.location='../../../employee.php'">Close</button>
    </div>
    
</body>
</html>





