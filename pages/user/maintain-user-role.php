<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Maintain User Role - Stock Path</title>
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

<body>
  <?php include_once("../header.php");?>
   <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Maintain User Role</a>
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
              <h3 class="mb-0">User Role Details</h3>
            </div>
            <div class="card-body">
             
              <div class="row mt-3">
                <div class="tab-content col" id="myTabContent">
                  <div class="tab-pane fade show active" id="home"  aria-labelledby="home-tab">
                    <form>
                      <div class="form-row col">
                        <div class="form-group col">
                          <label for="bane">User Role Name</label>
                          <input type="email" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Level 2 - Sales 1">
                        </div>
                      </div>
                      <div class="form-row col">
                        <div class="form-group col">
                         <label for="framework"l>User Role Functions
                         </label>
                         <select class="form-control select"  id="framework" name="framework[]" multiple  style="color: #8898aa">
                          <option value="Employee"><p>Employee</p></option>
                          <option value="User"><p>User</p></option>
                          <option value="Admin">Admin</option>
                          <option value="Suppliers">Suppliers</option>
                          <option value="Warehouse">Warehouse</option>
                          <option value="Sales">Sales</option>
                          <option value="Products">Products</option>
                          <option value="Stock">Stock</option>
                          <option value="Delivery">Delivery</option>
                          <option value="Driver">Driver</option>
                          <option value="Reports">Reports</option>
                         </select>
                        </div>
                      </div>
                     
                      <div class="col">
                        <div class="form-group mr-2">
                          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-default">Save Changes
                          </button>

                          <button type="button" class="btn btn-danger mb-3 float-right" data-toggle="modal" data-target="#modal-del">Delete User Role
                          </button>
                        </div>
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
                                  <p>User Role successfully updated</p>
                                  
                              </div>
                              
                              <div class="modal-footer">
                                  
                                  <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal" onclick="window.location='../../user.html'">Close</button> 
                              </div>
                              
                          </div>
                      </div>
                    </div>
                    <div class="modal fade" id="modal-del" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                          <div class="modal-content">
                            
                              <div class="modal-header">
                                  <h6 class="modal-title" id="modal-title-default">Warning!</h6>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                              </div>
                              
                              <div class="modal-body">
                                  <p>Are you sure you want to delete the user role? </p>
                                  
                              </div>
                              
                              <div class="modal-footer">                                 
                                  <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#success2">Yes</button>
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">No</button> 
                              </div>
                              
                          </div>
                      </div>
                    </div>
                    <div class="modal fade" id="success2" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                          <div class="modal-content">
                            
                              <div class="modal-header">
                                  <h6 class="modal-title" id="modal-title-default">Success!</h6>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                              </div>
                              
                              <div class="modal-body">
                                  <p>The User Role successfully deleted</p>
                                  
                              </div>
                              
                              <div class="modal-footer">
                                  
                                  <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal" onclick="window.location='../../user.html'">Close</button> 
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
      <!-- Footer -->
      <?php include_once("../footer.php");?>
    </div>
  </div>

  <script>
    $(document).ready(function(){
     $('#framework').multiselect({
      nonSelectedText: 'Select Functions',
      enableFiltering: false,
      enableCaseInsensitiveFiltering: true,
      buttonWidth:'100%'
     });
     
     
     $('#framework_form').on('submit', function(event){
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
       url:"insert.php",
       method:"POST",
       data:form_data,
       success:function(data)
       {
        $('#framework option:selected').each(function(){
         $(this).prop('selected', false);
        });
        $('#framework').multiselect('refresh');
        alert(data);
       }
      });
     });
     
     
    });
    </script>
  <!-- Argon Scripts -->
  <!-- Core -->

  
  <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="../../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../../assets/js/argon.js?v=1.0.0"></script>
</body>

</html>