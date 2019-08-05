<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Register Customer - Stock Path</title>
  <!-- Favicon -->
  <link href="../../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <!-- validation -->
  <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
</head>

<body>
  <?php include_once("../header.php");?>
   <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Register Customer</a>
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
              <h3 class="mb-0">Customer is registering as:</h3>
            </div>
            <div class="card-body">
              <div class="row">

                <ul class="nav nav-pills ml-3" id="myTab" role="tablist">
                 
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                      <i class="far fa-user mr-2"></i>
                    Individual</a>
                  </li>
             
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                    <i class="fas fa-building mr-2"></i>
                    Organisation</a>
                  </li>
                </ul>
              </div>
              <div class="row mt-3">
                <div class="tab-content col" id="myTabContent">
                  <div class="tab-pane fade show active" id="home"  aria-labelledby="home-tab">
                    <form method="POST" action="">
                      <div class="form-row">
                        <div class="form-group col-6">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" required>
                        </div>
                        <div class="form-group col-6">
                          <label for="exampleInputPassword1">Surname</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Surname" required>
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
                          <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Contact Number" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email" required>
                      </div>

                      <div class="form-group">
                        <label for="inputAddress">Address line 1</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
                      </div>
                      <div class="form-group">
                        <label for="inputAddress2">Address line 2</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" required>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputCity">Suburb</label>
                          <input type="text" class="form-control" id="inputCity" required>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputState">City</label>
                          <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="inputZip">Zip</label>
                          <input type="text" class="form-control" id="inputZip" required>
                        </div>
                      </div> 


                      <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#modal-success2">
                        Submit
                      </button>
                      <div class="modal fade" id="modal-success2" tabindex="-1" role="dialog" aria-labelledby="modal-success" aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                            <div class="modal-content">
                              
                                <div class="modal-header">
                                    <h6 class="modal-title" id="modal-title-success">Success!</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location='../../customer.html'">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body">
                                    <p>Customer added successfully</p>
                                    
                                </div>
                                
                                <div class="modal-footer">
                                    
                                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal" onclick="window.location='../../customer.html'">Close</button> 
                                </div>
                                
                            </div>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form method="POST" action="" id="form-register-org" novalidate>
                      <div class="form-row">
                        <div class="form-group col-6">
                          <label for="email-org">Name of organisation</label>
                          <input type="text" class="form-control" id="name-org" name="name-org"  placeholder="Name" required>
    
                        </div>
                        <div class="form-group col-6">
                          <label for="password-indi">Business email</label>
                          <input type="email" class="form-control" id="password-indi" name="password-indi" placeholder="Email" required>
                        </div>
                      </div>
                      <div class="form-row ">
                        <div class="form-group col-8">
                          <label for="vat">VAT Number</label>
                          <input type="number" class="form-control" id="vat" name="vat" placeholder="Vat number" required>
                        </div>
                        <div class="form-group col-4">
                          <label for="number-org">Business Contact Number</label>
                          <input type="number" class="form-control" id="number-org" name="number-org" placeholder="Contact number" required>
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="address1-org">Address line 1</label>
                        <input type="text" class="form-control" id="address1-org" name="address1-org" placeholder="1234 Main St" required>
                      </div>
                      <div class="form-group">
                        <label for="address2-org">Address line 2</label>
                        <input type="text" class="form-control" id="address2-org" name="address2-or" placeholder="Apartment, studio, or floor" required>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="suburb-org">Suburb</label>
                          <input type="text" class="form-control" id="suburb-org" name="suburb-org" required>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="city-org">City</label>
                          <select id="city-org" class="form-control">
                            <option selected>Pretoria</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="zip-org">Zip</label>
                          <input type="text" class="form-control" id="zip-org" required>
                        </div>
                      </div> 
                      <button id="btn-submit-register-org" type="button" class="btn btn-primary" >
                        Submit
                      </button>
                    </form>
                  </div>
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
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="../../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../../assets/js/argon.js?v=1.0.0"></script>
  <!-- validation scripts -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script src="JS/customer.js"></script>
</body>

</html>