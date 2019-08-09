<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>View Product - Stock Path</title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">View Product</a>
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
              <div >

              <button class="btn btn-icon btn-2 btn-primary btn-sm" type="button"  onclick="window.location='maintain.html'">
                  <span class="btn-inner--icon"><i class="fas fa-wrench"></i>
                  </span>
                  <span class="btn-inner--text">Edit</span>
              </button>
              <button class="btn btn-icon btn-2 btn-danger btn-sm" type="button"  data-toggle="modal" data-target="#del" >
                  <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i>
                  </span>
                  <span class="btn-inner--text">Delete</span>
              </button>
             </div>
             <div class="text-center">
           
                <h2>
                 Monster Energy Drink 500ml 
                </h2>
                 <hr class="h5 font-weight-300 pb-0 mt-3"></hr>

                  
                  <div class="pt-2"><b>Description : </b><p class="d-inline">The orignal 500ml Canned energy drink by monster </p></div>
                  
                  <div class="pt-3"><b>Product type :  </b><p class="d-inline">Energy drink</p></div>
               
               
                  <h3 class="text-info">Cost Price : R8 230.00</h3>
              
                </div>
            </div>
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col-sm">
                    <span><h3 class="text-primary"> Qty palette(s) on hand : 15</h3></span>
                      <button class="btn btn-icon btn-6 btn-warning btn-sm" type="button" onclick="window.location='../stock/convert.html'">
                        <span class="btn-inner--icon"><i class="fas fa-exchange-alt"></i>
                        </span>
                        <span class="btn-inner--text">Convert</span>
                    </button>
                    <button class="btn btn-icon btn-6 btn-danger btn-sm" type="button"  onclick="window.location='../stock/writeoff.html'">
                        <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i>
                        </span>
                        <span class="btn-inner--text">Write Off</span>
                    </button>
                  </div>
                  <div class="col-sm">
                    <span><h3 class="text-primary"> Qty case(s) on hand : 7 </h3></span>
                    <button class="btn btn-icon btn-6 btn-warning btn-sm" type="button"  onclick="window.location='../stock/convert.html'">
                        <span class="btn-inner--icon"><i class="fas fa-exchange-alt"></i>
                        </span>
                        <span class="btn-inner--text">Convert</span>
                    </button>
                    <button class="btn btn-icon btn-6 btn-danger btn-sm" type="button"  onclick="window.location='../stock/writeoff.html'">
                        <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i>
                        </span>
                        <span class="btn-inner--text" >Write Off</span>
                    </button>
                  </div>
                  <div class="col-sm">
                    <span><h3 class="text-primary"> Qty item(s) on hand :  52</h3></span>
                    <button class="btn btn-icon btn-6 btn-danger btn-sm" type="button"  onclick="window.location='../stock/writeoff.html'">
                        <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i>
                        </span>
                        <span class="btn-inner--text">Write Off</span>
                    </button>
                  </div>
                </div>
              </div>
              <hr class="my-2 d-flex justify-content-center mt-5">
              <div class="d-flex justify-content-center">
                 <button type="button" class="btn btn-link mx-auto" data-dismiss="modal"  onclick="window.history.go(-1); return false;">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure you want to delete the selected product?</p>
                    </div>
                    <div class="modal-footer">       
                    <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#modal-succ">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="modal-succ" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                  <div class="modal-content">
                    
                      <div class="modal-header">
                          <h6 class="modal-title" id="modal-title-default">Success!</h6>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                      </div>
                      
                      <div class="modal-body">
                          <p>Product successfully deleted</p>
                          
                      </div>
                      
                      <div class="modal-footer">
                          
                          <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal" onclick="window.location='../../product.html'">Close</button> 
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