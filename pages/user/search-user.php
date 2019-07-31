<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Search User - Stock Path</title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Search User</a>
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
               <div class="input-group input-group-rounded input-group-merge">
                 
                 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by employee name" title="Type in a name" class="form-control form-control-rounded form-control-prepended" aria-label="Search">
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
                <th>User ID</th>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Access Level</th>
                <th style="width:1rem;"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>3</td>
                <td>Alfreds</td>
                <td>Futterkiste</td>
                <td>Level 1 - Administration 1</td>
                <td>
                  <button class="btn btn-icon btn-2 btn-primary btn-sm" type="button" onclick="window.location='maintain-user.html'">
                    <span class="btn-inner--icon"><i class="fas fa-wrench"></i>
                    </span>
                    <span class="btn-inner--text">Edit</span>
                  </button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>6</td>
                <td>Benny</td>
                <td>Haynes</td>
                <td>Level 2 - Sales 1</td>
                <td>
                  <button class="btn btn-icon btn-2 btn-primary btn-sm" type="button" onclick="window.location='maintain-user.html'" >
                    <span class="btn-inner--icon"><i class="fas fa-wrench"></i>
                    </span>
                    <span class="btn-inner--text">Edit</span>
                  </button>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>12</td>
                <td>Annie</td>
                <td>Saynes</td>
                <td>Level 3 - Sales 2</td>
                <td>
                  <button class="btn btn-icon btn-2 btn-primary btn-sm" type="button" onclick="window.location='maintain-user.html'">
                    <span class="btn-inner--icon"><i class="fas fa-wrench"></i>
                    </span>
                    <span class="btn-inner--text">Edit</span>
                  </button>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>17</td>
                <td>David</td>
                <td>Cooper</td>
                <td>Level 4 - Warehouse Manager</td>
                <td>
                  <button class="btn btn-icon btn-2 btn-primary btn-sm" type="button" onclick="window.location='maintain-user.html'">
                    <span class="btn-inner--icon"><i class="fas fa-wrench"></i>
                    </span>
                    <span class="btn-inner--text">Edit</span>
                  </button>
                </td>
              </tr>
              <tr id="emptySearch" style="display: none;" class="table-danger mb-3">
                <td><b>No User Found</b></td>
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