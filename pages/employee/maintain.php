<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Maintain Employee - Stock Path</title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Maintain Employee</a>
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
              <h3 class="mb-0">Updated Employee Details:</h3>
            </div>
            <div class="card-body">

              <div class="row mt-3">
                <div class="tab-content col" id="myTabContent">
                  <div class="tab-pane fade show active" id="home"  aria-labelledby="home-tab">
                    <div class="col">
                      <form>
                        <div class="form-row">
                          <div class="form-group col-6">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="John">
                            
                          </div>
                          <div class="form-group col-6">
                            <label for="exampleInputPassword1">Surname</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Smith">
                          </div>
                        </div>
                        <div class="form-row ">
                          <div class="form-group col-2">
                            <label for="bane">Title</label>
                            <select class="form-control">
                              <option>Ms</option>
                              <option>Mr</option>
                              <option>Mrs</option>
                            </select>
                          </div>
                          <div class="form-group col-10">
                            <label for="exampleInputPassword1">Contact Number</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="076 6673 0125">
                          </div>
                        </div>
                        <div class="form-row ">
                          <div class="form-group col-6">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" id="exampleInputPassword1" placeholder="john@gmail.com">
                          </div>
                          <div class="form-group col-6">
                            <label for="exampleInputPassword1">SA ID or Passport number</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="982522 224 148462">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputAddress">Address line 1</label>
                          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                          <label for="inputAddress2">Address line 2</label>
                          <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputCity">Suburb</label>
                            <input type="text" class="form-control" id="inputCity" placeholder="Hatfield">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputState">City</label>
                            <select id="inputState" class="form-control">
                              <option selected>Pretoria</option>
                              <option>...</option>
                            </select>
                          </div>
                          <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" id="inputZip">
                          </div>
                          <div class="form-group col-12">
                            <label for="bane">Employee Type</label>
                            <select class="form-control">
                              <option>Driver</option>
                              <option>Bookeeper</option>
                              <option>Warehouse Manager</option>
                            </select>
                          </div>
                        </div> 
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-default">Save</button>
                        <div class="form-group col-md-2">
                            
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
                                          <p>Employee details successfully updated</p>
                                          
                                      </div>
                                      
                                      <div class="modal-footer">
                                          
                                          <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal" onclick="window.location='../../employee.html'">Close</button> 
                                      </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </form>
                  </div>
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