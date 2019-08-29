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



?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Search User - Stock Path</title>
  <!-- Favicon -->
  <link href="../../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../../assets/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body>
  <?php include_once("../header.php");?>
   <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Search User</a>
        <?php include_once("../usernavbar.php");?>
        
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-custom pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
               <div class="input-group input-group-rounded input-group-merge">
                 
                 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by employee name" title="Type in a name" class="form-control form-control-rounded form-control-prepended" aria-label="Search">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fa fa-search"></span>
                    </div>
                  </div>
            </div>
          </div>
          <div class="table-responsive">

            <table id="myTable" class="table align-items-center table-flush">
               <thead class="thead-light">
              <tr class="header">
                <th>User ID</th>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Access Level</th>
                <th style="width:1rem;"></th>
              </tr>
            </thead>
            <tbody id="tBody">
           <?php
                  $sql_query ="SELECT * FROM `USER`
                  WHERE `USER_STATUS_ID` = '1'";
                  $result = mysqli_query($DBConnect,$sql_query);
                //$row = mysqli_fetch_array($result);

                  if (mysqli_num_rows($result)>0) 
                  {
                      $userID;
                      $employeeID;
                      $userName;
                      $email;
                      $accessLevelID;
                      $userSurname;
                      $roleName;
                      while( $row=mysqli_fetch_assoc($result))
                      {
                        

                            //$vals = array("USER_ID" =>$row["USER_ID"],"EMPLOYEE_ID"=> $row["EMPLOYEE_ID"]);
                            //var_dump($vals);
                            $employeeID = $row["EMPLOYEE_ID"];
                            $accessLevelID = $row["ACCESS_LEVEL_ID"];
                            $userID = $row["USER_ID"];
                            $email = $row["USERNAME"];

                            ///GET NAME,SURNAME
                            $employee_query ="SELECT * FROM `EMPLOYEE`
                            WHERE `EMPLOYEE_ID` = '$employeeID'";
                            $submit = mysqli_query($DBConnect,$employee_query);
                          
                          while( $filter=mysqli_fetch_assoc($submit))
                              {
                              
                              // $temp = array("NAME" =>$filter["NAME"],"SURNAME"=>$filter["SURNAME"]);

                                $userName = $filter["NAME"];
                                $userSurname = $filter["SURNAME"];
                                
                                //GET ROLE NAME
                                $access_query ="SELECT * FROM `ACCESS_LEVEL`
                                WHERE `ACCESS_LEVEL_ID` = ' $accessLevelID'";
                                $submitAccess = mysqli_query($DBConnect,$access_query);

                                //var_dump($submitAccess);
                                $accessArray=mysqli_fetch_assoc($submitAccess);
                            
                                    //$access = array("ROLE_NAME"=>$accessArray["ROLE_NAME"]);
                                  $roleName = $accessArray["ROLE_NAME"];

                              } 
                          
                            
                              $formView="<form target='_blank' action='maintain-user.php' method='POST'><input type='hidden' name='USER_ID' value='".$userID."'>"."<input type='hidden' name='EMPLOYEE_ID' value='".$employeeID."'>"."<input type='hidden' name='NAME' value='".$userName."'>"."<input type='hidden' name='SURNAME' value='".$userSurname."'>"."<input type='hidden' name='ROLE_NAME' value='".$roleName."'>"."<input type='hidden' name='USERNAME' value='".$email."'>"."<button class='btn btn-icon btn-2 btn-success btn-sm' type='submit'><span class='btn-inner--icon'><i class='fas fa-user'></i></span><span class='btn-inner--text'>Edit</span></button>"."</form>";
                              echo "<tr><td>".$userID."</td><td>".$employeeID."</td><td>".$userName."</td><td>".$userSurname."</td><td>".$roleName."</td><td>".$formView."</td></tr>";
                  

                      
                      }
                    
                      
                  }
           
           
           ?>
            </tbody>
          </table>
            <div class="form-group col-md-2 mt-3">
              <button type="button" class="btn btn-block btn-primary mb-3" data-toggle="modal" data-target="#modal-default" onclick="window.history.go(-1); return false;">Back</button>
            </div>

            <script>
              function myFunction() 
              {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                var showCount = 0;
                for (i = 0; i < tr.length; i++) 
                {
                  td = tr[i].getElementsByTagName("td")[2];
                  if (td) 
                  {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter)> -1) 
                    {
                      tr[i].style.display = "";
                      showCount += 1;
                    } 
                    else 
                    {
                      tr[i].style.display = "none";
                    }
                  }       
                }

                if (showCount === 0)
                {
                  $("#emptySearch").show();
                } 
                else
                {
                  $("#emptySearch").hide();
                }
              }
            </script>
          </div>
        </div>
      </div>
    </div>
  

      <!-- Footer -->
      <?php 
      mysqli_close($DBConnect);
  }

      include_once("../footer.php");?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="../../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../../assets/js/argon.js?v=1.0.0"></script>
</body>

</html>