<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Reset User Password - Stock Path</title>
  <!-- Favicon -->
  <link href="../../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../../assets/css/argon.css?v=1.0.0" rel="stylesheet">
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  
  
  <script src="../../assets/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="../../assets/css/bootstrap-multiselect.css" />
</head>

<body class="bg-customGrey">
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
   $userId = ""; 
   //var_dump($userId);

      if (isset($_GET["key"]) && isset($_GET["userID"]) && isset($_GET["action"]) 
      && ($_GET["action"]=="reset") && !isset($_POST["action"])){
         
        $key = $_GET["key"];
        $userId = $_GET["userID"];
       // var_dump($userId);
        $currentDate = date("Y-m-d H:i:s");

        $queryCheck =  "SELECT * FROM `USER_TEMPORARY_PASSWORD` WHERE `KEY`='".$key."' and `USER_ID`='".$userId."'";
        $submitquery = mysqli_query($DBConnect,$queryCheck);
        //var_dump($submitquery);
        $row = mysqli_num_rows($submitquery);
        $error = "";
        if ($row==""){
        $error .= '<h2>Invalid Link</h2>
      <p>The link is invalid/expired. Either you did not copy the correct link
      from the email, or you have already used the key in which case it is 
      deactivated.</p>
      <p><a href="https://www.allphptricks.com/forgot-password/index.php">
      Click here</a> to reset password.</p>';
      }else{
        $rowArr = mysqli_fetch_assoc($submitquery);
        $expiryDate = $rowArr['EXPIRY_DATE'];
        //var_dump($expiryDate);
        if ($expiryDate >= $currentDate)
        {
  ?>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">

            </div>
          </div>  
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-customGreen py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">

          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-customGray" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--9 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7 mt-0">
          <div class="card bg-darkGrey shadow-lg border-4">
            <div class="card-header bg-transparent pb-5">
              <div class="col">
                
                  <img class="img-fluid" src="../../assets/img/brand/blue.png">
               
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Reset User Password</small>
              </div>
              <form role="form" method="POST" action="" >
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input type="hidden" name="resetPassword" value="resetPassword">
                    <input class="form-control" placeholder="New Password" type="password" maxlength="10" name="newPassword">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Confirm New Password" type="password" maxlength="10" name="confirmPassword">
                  </div>
                </div>

                <div class="text-center">
                  <button  type="submit" class="btn btn-customGreen my-4" data-toggle="modal" data-target="#modal-default">Reset Password </button>
                </div>
                <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                      <div class="modal-content">
                        
                          <div class="modal-header">
                              <h6 class="modal-title" id="modal-title-default">Success!</h6>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                              </button>
                          </div>
                          
                          <div class="modal-body">
                              <p>Password reset successfully</p>
                              
                          </div>
                          
                          <div class="modal-footer">
                              
                              <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal" onclick="window.location='login.php'">Close</button> 
                          </div>
                          
                      </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 text-center">
              <a href="login.php" class="text-dark"><small>Login</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php

        }
        else
        {
          $error = "";
          $error .= "<h2>Link Expired</h2>
          <p>The link is expired. You are trying to use the expired link which 
          as valid only 24 hours (1 days after request).<br /><br /></p>";
                      }
                }
          if($error!="")
            {
            echo "<div class='error'>".$error."</div><br />";
            } 
          } // isset email key validate end
           
          
           
          if(isset($_POST["resetPassword"]) &&
           ($_POST["resetPassword"]=="resetPassword"))
           {
            //echo "renew pass";
              $error="";
              $pass1 = mysqli_real_escape_string($DBConnect,$_POST["newPassword"]);
              $pass2 = mysqli_real_escape_string($DBConnect,$_POST["confirmPassword"]);
              //$email = $_POST["email"];
             // $currentDate = date("Y-m-d H:i:s");
            
              if ($pass1!=$pass2){
              $error.= "<p>Password do not match, both password should be same.<br /><br /></p>";
                }
                if($error!=""){
              echo "<div class='error'>".$error."</div><br />";
              }else{
                //var_dump($pass1);

                $saltedQuery =  "SELECT * FROM `USER` WHERE  `USER_ID`='".$userId."'";
                $submitSalt = mysqli_query($DBConnect,$saltedQuery);

                $rowArray = mysqli_fetch_assoc($submitSalt);

                

                $oldSalt = $rowArray["PASSWORD_SALT"];
                //var_dump($oldSalt);
              $newPassword1 = $pass1 .  $oldSalt;
              $hashedPassword = hash("sha256",$newPassword1);
              $updatePass = "UPDATE `USER` SET `USER_PASSWORD`='".$hashedPassword ."'
              WHERE `USER_ID`='".$userId."'";
              mysqli_query($DBConnect,$updatePass);
              
              $delPass = "DELETE FROM `USER_TEMPORARY_PASSWORD` WHERE `USER_ID`='".$userId."'";
              $redirect =mysqli_query($DBConnect,$delPass);
              
               
             
             } 
          } 
        //}
  mysqli_close($DBConnect);
}
?>
  <!-- Footer -->

  <?php include_once("../footer.php");?>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Argon JS -->
  <script src="../../assets/js/argon.js?v=1.0.0"></script>
</body>

</html>

