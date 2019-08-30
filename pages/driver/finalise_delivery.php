<?php
  include_once("../sessionCheckPages.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Select Truck - Stock Path</title>
  <!-- Favicon -->
  <link href="../../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>

<style type="text/css">
  .dropdown-menu{
    transform: translate3d(0px, 2.7rem, 0px)!important;
  }
</style>

<body>
  <?php include_once("../header.php");?>
   <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Finalise Delivery</a>
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
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <label hidden="true" id="aData"><?php echo $_POST["ass"];?></label>
            <label hidden="true" id="apData"><?php echo $_POST["assP"];?></label>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Delivery Details</h5>
                      <span class="h2 font-weight-bold mb-0">Invoice# 321</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-truck"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-map-marker-alt"></i> IT Building Room 5-69</span>
                    <span class="text-nowrap">Delivery in progress</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
                <div class="col">
                  <div class="card shadow border-0 gmap_canvas">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3593.4490469424704!2d28.2303679147015!3d-25.755727452144587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e9561bcfc7569f3%3A0x956203c2d454479c!2sInformation+Technology+Building!5e0!3m2!1sen!2sza!4v1564001900087!5m2!1sen!2sza" width="500" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>
                  <style>
                    .gmap_canvas {overflow:hidden;background:none!important;}
                  </style>
                </div>
            </div>
            <br>
               <div class="row ">
                <div class="col ">
                  
                  <button type="button" class="btn btn-warning text-center" onclick="window.location='sign_off_delivery.php'">
                    
                        <i class="fas fa-truck"></i>
                        <span>Finalise Delivery</span>
                      
                  </button>
               
              </div>
              </div>
         </div>



          <!-- Page content -->
  

        
        <?php include_once("../footer.php");?>
    
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
  <script type="text/javascript" src="JS/finaliseDelivery.js"></script>
</body>

</html>