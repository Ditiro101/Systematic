<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Employee Check-in - Stock Path</title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Employee check-in</a>
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
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Check-in</h3>
            </div>
            <div class="card-body ">

              <div class="row d-flex justify-content-center">
                
                  <style>
                  #qrscan {
                  
                    width: 400px;
                    height: 400px;
                    background-image:url("../../assets/img/brand/qr.png");
                    background-size: 400px;
                  }
                  #videoElement {
                    width: 500px;
                    height: 400px;
                    
                  }
                  </style>
              
                  <div id="qrscan"  class="embed-responsive embed-responsive-16by9">
                    <video autoplay="true" id="videoElement" class="embed-responsive-item">

                    
                    </video>
                  </div>
                  <script>
                    var video = document.querySelector("#videoElement");

                      if (navigator.mediaDevices.getUserMedia) {
                        navigator.mediaDevices.getUserMedia({ video: true })
                          .then(function (stream) {
                            video.srcObject = stream;
                          })
                          .catch(function (err0r) {
                            console.log("Something went wrong!");
                          });
                      }
                  </script>
                
              </div>
              <div class="row icon-examples d-flex justify-content-center">
                <div class="col-lg-4 col-md-6">
                  <button type="button" class="btn-icon-clipboard"  data-toggle="modal" data-target="#suc">
                    <div>
                      <i class="fas fa-qrcode"></i></i>
                      <span>Scan Employee QR</span>
                    </div>
                  </button>

                        <div class="modal fade" id="suc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Success!</h5>
                              </div>
                              <div class="modal-body">
                                <p>Employee Successfully checked-in</p>
                              </div>
                              <div class="modal-footer">
                                
                                
                              <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                          
                          </div>
                        </div>
                      </div>
                  </div>

                </div>
              </div>
              <div class="row icon-examples d-flex justify-content-center">
                <div class="col-lg-4 col-md-6">
                  <button type="button" class="btn-icon-clipboard" onclick="window.location='search.html'">
                    <div>
                      <i class="fa fa-search"></i>
                      <span>Search Employee</span>
                    </div>
                  </button>
                </div>
              </div>
                
              </div>
            </div>
          </div>
        </div>
      

      <?php include_once("../footer.php");?>
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