<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>View Audit Log - Stock Path</title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">View Audit Log</a>
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
               <div class="input-group input-group-rounded input-group-merge col">
                 
                 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter audit log search details" title="Type in a name" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fa fa-search"></span>
                    </div>
                  </div>
                  <div class="col-2" style="text-align: right;"><p class="mt-2 mb-0">Search By:</p></div>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-basic col-1" data-toggle="modal" data-target="#exampleModal" disabled>
                  Date
                  </button>
                  <button type="button" class="btn btn-primary col-1 px-2" data-toggle="modal" data-target="#exampleModal">User ID
                  </button>
            </div>

          </div>
          <div class="table-responsive">

            <table id="myTable" class="table align-items-center table-flush">
               <thead class="thead-light">
              <tr class="header">
                <th> Audit ID</th>
                <th> User ID</th>
                <th> Name</th>
                <th> Surname</th>
                <th> Function Used</th>
                <th> Date</th>
                <th> Time</th>
              </tr>
            </thead>
            <tbody>
              <tr>
      				  <td>1</td>
                <td>4</td>
                <td>Benny</td>
                <td>Haynes</td>
                <td>Add User Role </td>
                <td>12/02/2019</td>
                <td>13:46</td>
              </tr>
              <tr>
                <td>2</td>
                <td>11</td>
                <td>Janet</td>
                <td>Brooks</td>
                <td>Add Product </td>
                <td>23/02/2019</td>
                <td>10:51</td>
              </tr>
              <tr>
                <td>3</td>
                <td>9</td>
                <td>Harold</td>
                <td>Tyler</td>
                <td>Maintain Supplier</td>
                <td>13/03/2019</td>
                <td>09:24</td>
              </tr>
              <tr>
                <td>4</td>
                <td>17</td>
                <td>Melody</td>
                <td>Floyd</td>
                <td>Add Warehouse</td>
                <td>03/03/2019</td>
                <td>15:34</td>
              </tr>
              <tr>
                <td>5</td>
                <td>12</td>
                <td>Elan</td>
                <td>Diaz</td>
                <td>Maintain Product </td>
                <td>30/04/2019</td>
                <td>12:03</td>
              </tr>
              <tr>
                <td>6</td>
                <td>21</td>
                <td>Gilbert</td>
                <td>Cole</td>
                <td>Convert Stock </td>
                <td>08/05/2019</td>
                <td>08:13</td>
              </tr>
              <tr id="emptySearch" style="display: none;" class="table-danger mb-3">
                <td><b>No Audit Log Entry Found</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
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
                  td = tr[i].getElementsByTagName("td")[0];
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