<?php include_once("../sessionCheckPages.php");?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>View Profile - Stock Path</title>
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
  <div class="main-content ">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid ">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../../index.html">My Profile</a>

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
    <div class="container-fluid mt--7 ">
      <!-- Table -->
      <div class="row">
        <div class="col d-flex justify-content-center">
          <div class="col-sm-12 col-md-12 col-lg-10 col-xl-8 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col ">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../../images/user.png" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 mt-4 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <td>

                </td>
              </div>
            </div>

            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-2 mb-0">
                  </div>
                </div>
              </div>
              <div class="text-center mt-0">
                <h2>
                  Mr David Cooper
                </h2>
                <hr class="h5 font-weight-300 pb-0 mt-3">
                   <div class="pt-2"><b>Employee ID : </b><p class="d-inline">12</p></div>
                   <div class="pt-2"><b>Employee Type : </b><p class="d-inline">Warhouse Manager</p></div>                 
                </hr>
                <hr class="h5 font-weight-300 pb-0 mt-3">

                  <div class="pt-2"><b>ID Number : </b><p class="d-inline">8312025800088</p></div>

                  <div class="pt-2"><b>Email : </b><p class="d-inline">david.cooper@gmail.com</p></div>
                  
                  <div class="pt-3"><b>Contact Number : </b><p class="d-inline">081 145 2456</p></div>
                </hr>
                <hr class="h5 font-weight-300 pb-0 mt-3 pt-0">
                  <i class="ni location_pin mr-2 text-center"></i>
                  <h3 class="text-center pt-0 mt-0"><b>Address :</b></h3>
                  <p class="mb-0">Fairview Village</p>
                  <p class="mb-0">230 Lunnon Rd</p>
                  <p class="mb-0">Hillcrest, Pretoria, 0083</p>
                  <p class="mb-0">South Africa</p>
                </div>
                <hr class="my-2 d-flex justify-content-center">
                  <div class="d-flex justify-content-center">
                     <button type="button" class="btn btn-link mx-auto" data-dismiss="modal"  onclick="window.history.go(-1); return false;">Close</button>
                  </div>
              </div>
            </div>
          </div>
        </div>
          </div>
        

  

      <!-- Footer -->
      <?php include_once("../footer.php");?>
      </div>
      </div>
      </div>
      </div>
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