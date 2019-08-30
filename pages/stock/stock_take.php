<?php include_once("../sessionCheckPages.php");?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Stock Take - Stock Path</title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Stocktake</a>
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
      <div class="row mb-3">
        <div class="col">
          <div class="card card-stats py-2 px-5" id="myTabContent" >
            <h3 class="text-center">Warehouse</h3>
            <div class="row pt-3 px-5">
              <div class="custom-control custom-radio mb-3 col-3">
                <input name="custom-radio-2" class="custom-control-input" id="customRadio1" type="radio" checked="">
                <label class="custom-control-label radio-inline" for="customRadio1">Sale Warehouse
                </label>
              </div>
              <div class="custom-control custom-radio mb-3 col-3">
                <input name="custom-radio-2" class="custom-control-input" id="customRadio2" type="radio">
                <label class="custom-control-label radio-inline" for="customRadio2">Return Warehouse </label>
              </div>
              <div class="custom-control custom-radio mb-3 col-3">
                <input name="custom-radio-2" class="custom-control-input" id="customRadio3" type="radio">
                <label class="custom-control-label radio-inline" for="customRadio3">Receival Warehouse</label>
              </div>
              <div class="custom-control custom-radio mb-3 col-3">
                <input name="custom-radio-2" class="custom-control-input" id="customRadio4" type="radio">
                <label class="custom-control-label radio-inline" for="customRadio4">Coke Warehouse</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
               <div class="input-group input-group-rounded input-group-merge">
                 
                 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Product name" title="Type in a name" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
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
                <th >Product Name</th>
                <th >Product Type</th>
                <th>Qty Pallet</th>
                <th>Qty Case</th>
                <th>Qty Individual</th>
              </tr>
            </thead>
            <tbody>
              <tr>

        				<td>
        				Monster Energy Drink 500ml
        				</td>
                <td>Beverage</td>
                <td class="py-2 px-0 table-light">
                  <div class="input-group mx-auto" style="width: 4rem">
                    <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                  </div> 
                </td>
                 <td class="py-2 px-0 table-light">
                  <div class="input-group mx-auto" style="width: 4rem">
                    <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                  </div> 
                </td>
                <td class="py-2 px-0 table-light">
                  <div class="input-group mx-auto" style="width: 4rem">
                    <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                  </div> 
                </td>
                
              </tr>
              <tr>
        				<td>
        				Ace Maze meal 3kg
        				</td>
                <td>Maze meal</td>             
                <td class="py-2 px-0 table-light">
                  <div class="input-group mx-auto" style="width: 4rem">
                    <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                  </div> 
                </td>
                 <td class="py-2 px-0 table-light">
                  <div class="input-group mx-auto" style="width: 4rem">
                    <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                  </div> 
                </td>
                <td class="py-2 px-0 table-light">
                  <div class="input-group mx-auto" style="width: 4rem">
                    <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                  </div> 
                </td>

              </tr>
              <tr>
        				<td>
        				Castle lite 350ml
        				</td>
                <td>Alcohol</td> 
                <td class="py-2 px-0 table-light">
                  <div class="input-group mx-auto" style="width: 4rem">
                    <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                  </div> 
                </td>
                 <td class="py-2 px-0 table-light">
                  <div class="input-group mx-auto" style="width: 4rem">
                    <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                  </div> 
                </td>
                <td class="py-2 px-0 table-light">
                  <div class="input-group mx-auto" style="width: 4rem">
                    <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                  </div> 
                </td>

              </tr>
              <tr>
        				<td>
        				Castle lite 750ml
        				</td>
                <td>Alcohol</td>
                <td class="py-2 px-0 table-light">
                  <div class="input-group mx-auto" style="width: 4rem">
                    <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                  </div> 
                </td>
                 <td class="py-2 px-0 table-light">
                  <div class="input-group mx-auto" style="width: 4rem">
                    <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                  </div> 
                </td>
                <td class="py-2 px-0 table-light">
                  <div class="input-group mx-auto" style="width: 4rem">
                    <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                  </div> 
                </td>

              </tr>
              <tr>
        				<td>
        				Castle lite 1 L
        				</td>
                <td>Alcohol</td>
                <td class="py-2 px-0 table-light">
                  <div class="input-group mx-auto" style="width: 4rem">
                    <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                  </div> 
                </td>
                 <td class="py-2 px-0 table-light">
                  <div class="input-group mx-auto" style="width: 4rem">
                    <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                  </div> 
                </td>
                <td class="py-2 px-0 table-light">
                  <div class="input-group mx-auto" style="width: 4rem">
                    <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                  </div> 
                </td>

              </tr>
              

              </tbody>
              <tfoot>
                
                <tr>
                  <td>
                      <button type="button" class="btn btn-primary mb-3 px-5" data-toggle="modal" data-target="#modal-default">Save</button>
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
                                        <p>Stock take saved successfully</p>
                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        
                                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal"  onclick="window.location='../../stock.html'">Close</button> 
                                    </div>
                                    
                                </div>
                            </div>
                          </div>
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>

              </tr>
              </tfoot>
            </table>

            <script>
            function myFunction() {
              var input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("myInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("myTable");
              tr = table.getElementsByTagName("tr");
              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                  txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }       
              }
            }
            </script>
          </div>
        </div>
      </div>
    </div>
  

      <?php include_once("../footer.php");?>
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