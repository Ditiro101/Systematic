<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Admin - Stock Path</title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">
</head>
<body>
  <?php include_once("header.php");?>
   <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Administration</a>
        <?php include_once("usernavbar.php");?>
        
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
              <h3 class="mb-0">Administration Functions</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
                <div class="col-lg-4 col-md-6">
                  <button type="button" onclick="scanImage();" class="btn btn-primary btn-lg">Scan</button>
<div id="selectedFiles" class="row" style="padding: 3px"></div>
<div class="modal fade scandetail" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div style="max-height:1200px;overflow:scroll;">
                <canvas id="myCanvas"></canvas>
            </div>
        </div>
    </div>
</div>


<div class="modal fade dalert" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Connection Failed
            </div>
            <div class="modal-body">
                No Scan app application found in your machine please download,install and open first then refresh the browser.
                <a href="~/SrcFile/Scan_App_SetUp.msi" download>Download Files</a>
            </div>
        </div>
    </div>
</div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <button type="button" class="btn-icon-clipboard"  href="#">
                    <a href="pages/admin/maintain-employee-type.php">
                      <div>
                        <i class="far fa-edit"></i>
                        <span>Maintain Employee Type</span>
                      </div>
                    </a>
                  </button>
                </div>
                <div class="col-lg-4 col-md-6">
                  <button type="button" class="btn-icon-clipboard"  href="#">
                    <a href="pages/admin/search-employee-type.php">
                      <div>
                        <i class="fas fa-search"></i>
                        <span>Search Employee Type</span>
                      </div>
                    </a>
                  </button>
                </div>
                <div class="col-lg-4 col-md-6">
                  <button type="button" class="btn-icon-clipboard"  href="#">
                    <a href="pages/admin/view-audit-log.php">
                      <div>
                        <i class="far fa-eye"></i>
                        <span>View Audit Log</span>
                      </div>
                    </a>
                  </button>
                </div>
                <div class="col-lg-4 col-md-6">
                  <button type="button" class="btn-icon-clipboard"  href="#">
                    <a href="pages/admin/backup.php">
                      <div>
                        <i class="far fa-save"></i>
                        <span>Backup</span>
                      </div>
                    </a>
                  </button>
                </div>
                <div class="col-lg-4 col-md-6">
                  <button type="button" class="btn-icon-clipboard"  href="#">
                    <a href="pages/admin/restore.php">
                      <div>
                        <i class="fas fa-undo"></i>
                        <span>Restore</span>
                      </div>
                    </a>
                  </button>
                </div>
                <div class="col-lg-4 col-md-6">
                  <button type="button" class="btn-icon-clipboard"  href="#">
                    <a href="pages/admin/delete-user.php">
                      <div>
                        <i class="fas fa-user-times"></i>
                        <span>Delete User</span>
                      </div>
                    </a>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include_once("footer.php");?>
    </div>
  </div>
  
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.0.0"></script>
  <script type="text/javascript">
       var selDiv = "";
       var storedFiles = [];

       $(document).ready(function () {
           selDiv = $("#selectedFiles");
           $("body").on("click", ".selFile", editFiles);
       });

       var start = function () {
           var i = 0;

           var wsImpl = window.WebSocket || window.MozWebSocket;

           window.ws = new wsImpl('ws://localhost:8181/');
           ws.onmessage = function (e) {
               if (typeof e.data === "string") {
                   //IF Received Data is String
               }
               else if (e.data instanceof ArrayBuffer) {
                  //IF Received Data is ArrayBuffer
               }
               else if (e.data instanceof Blob) {

                   i++;

                   var f = e.data;

                   f.name = "File" + i;

                   storedFiles.push(f);

                   var reader = new FileReader();

                   reader.onload = function (e) {
                       var html = "<div class=\"col-sm-2 text-center\" style=\"border: 1px solid black; margin-left: 2px;\"><img height=\"200px\" width=\"200px\" src=\"" + e.target.result + "\" data-file='" + f.name + "' class='selFile' title='Click to remove'><br/>" + i + "</div>";
                       selDiv.append(html);

                   }
                   reader.readAsDataURL(f);
               }
           };
           ws.onopen = function () {
               //Do whatever u want when connected succesfully
           };
           ws.onclose = function () {
               $('.dalert').modal('show');
           };
       }
       window.onload = start;

       function scanImage() {
           ws.send("1100");
       };

       function editFiles(e) {
           var file = $(this).data("file");
           for (var i = 0; i < storedFiles.length; i++) {
               if (storedFiles[i].name === file) {
                   $('.scandetail').modal('show');
                   var c = document.getElementById("myCanvas");
                   var ctx = c.getContext("2d");
                   var img = new Image();
                   img.src = window.URL.createObjectURL(storedFiles[i]);
                   img.onload = function () {
                       c.width = img.width ;
                       c.height = img.height;
                       ctx.drawImage(img, 0, 0, img.width, img.height);
                   }
                   break;

               }
           }
       };
  </script>
</body>

</html>