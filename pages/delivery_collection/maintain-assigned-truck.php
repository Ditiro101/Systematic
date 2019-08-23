<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Maintain Assigned Truck - Stock Path</title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Maintain Assigned Truck</a>
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
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="form-group col-12">
                <label>Truck</label>
                <select class="form-control btn-default">
                  <option>BBC 123 NW  |  2015 Isuzu NPR          | 10 Tonnes</option>
                  <option>DSM 032 NW  |  2017 GMC Savana G33903  | 25 Tonnes</option>
                  <option>CAD 347 NW  |  2017 Freightliner M2    | 40 Tonnes</option>
                  <option>ADW 586 NW  |  2016 Volvo VNL84430     | 50 Tonnes</option>
                </select>
              </div>

          </div>
          <div class="tab-content" id="myTabContent">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col-2">Qty</th>
                    <th scope="col-4">Delivery ID</th>
                    <th scope="col">Product Name</th>
            
                  </tr>
                </thead>
                <tbody>
                  <tr>
<td class="py-2 px-0" id="quantityCol"><div class="input-group mx-auto" style="width: 4rem"><input type="number" value="0" min="0" step="1" data-number-to-fixed="00.10" data-number-stepfactor="1" class="form-control currency pr-0 quantityBox" onchange="calculateRowTotalQuantity(this)" id="quantity2" style="height: 2rem;"></div> </td>
                    <td>1</td>
                    <td>
                      Coke
                    </td>
                    
                  </tr>
                  <tr>
<td class="py-2 px-0" id="quantityCol"><div class="input-group mx-auto" style="width: 4rem"><input type="number" value="0" min="0" step="1" data-number-to-fixed="00.10" data-number-stepfactor="1" class="form-control currency pr-0 quantityBox" onchange="calculateRowTotalQuantity(this)" id="quantity2" style="height: 2rem;"></div> </td>
                    <td>1</td>
                    <td>
                      Coke
                    </td>
                
                  </tr>
                <tr>
<td class="py-2 px-0" id="quantityCol"><div class="input-group mx-auto" style="width: 4rem"><input type="number" value="0" min="0" step="1" data-number-to-fixed="00.10" data-number-stepfactor="1" class="form-control currency pr-0 quantityBox" onchange="calculateRowTotalQuantity(this)" id="quantity2" style="height: 2rem;"></div> </td>
                    <td>1</td>
                    <td>
                      Coke
                    </td>
                    
                  </tr>
             
                    <tr>
<td class="py-2 px-0" id="quantityCol"><div class="input-group mx-auto" style="width: 4rem"><input type="number" value="0" min="0" step="1" data-number-to-fixed="00.10" data-number-stepfactor="1" class="form-control currency pr-0 quantityBox" onchange="calculateRowTotalQuantity(this)" id="quantity2" style="height: 2rem;"></div> </td>
                    <td>1</td>
                    <td>
                      Coke
                    </td>
                    
                  </tr>
          

                </tbody>
              </table>
            </div>

              <hr class="mt-0">
              <div class="col text-center mt-4">
                <button class="btn btn-icon btn-2 btn-primary mt-0 mb-3" type="button" data-dismiss="modal" data-toggle="modal" data-target="#select">
                  <span class="btn-inner--text">Remove Assignment</span>
                </button>
              </div>
              <div class="modal fade" id="select" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure you want to remove the assignment of the selected delivery(ies)/collection(s) form the selected truck?</p>
                    </div>
                    <div class="modal-footer">
                      
                    <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#success">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Success!</h5>
                    </div>
                    <div class="modal-body">
                      <p>The selected delivery(ies)/collection(s) have been unassigned from the selected truck successfully</p>
                    </div>
                    <div class="modal-footer">
                      
                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal"  onclick="window.location='../../delivery_collection.php'">Close</button> 
                  </div>
                </div>
              </div>
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
                console.log("Zero");
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
</body>

</html>