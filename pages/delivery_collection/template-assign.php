<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Assign Truck - Stock Path</title>
  <!-- Favicon -->
  <link href="../../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
  <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <!-- <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script> -->
</head>

<body>
  <?php include_once("../header.php");?>
   <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
      <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
          <!-- Brand -->
          <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Assign Truck</a>
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

        <div class="row">
          
          <div class="col-xl-4 " id="accordion" >
            <div class="card bg-default">
              <div class="card-body " id="headingOne">
                <div class="row">
                  <div class="col-10">
                    <h4 class="mb-0 text-white text-uppercas ">My Trucks</h4> 
                </div>
              </div>
              </div>
            </div>
            <div class="card ">
              <div class="card-header bg-secondary" id="headingOne">
                <div class="row">
                  <div class="col-10">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <h5 class="mb-0 ">BBC 123 NW GP- 2015 Isuzu NPR</h5> 
                    <h6>Capacity : 20 Pallets</h6>
                    <h6><i class="far fa-dot-circle text-warning"></i> Status : Packing</h6>
                  </button>
                </div>
                <div class="col-2 mt-2">
                   <label class="custom-toggle">
                    <input type="checkbox" >
                    <span class="custom-toggle-slider  rounded-circle"></span>
                  </label>
                </div>
              </div>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <p>Item(s) Assigned :</p>
                    <div class="table-responsive">
                      <div>
                      <table class="table align-items-center">
                          <thead class="thead-light">
                              <tr>
                                  <th scope="col">
                                      DeliveryID#
                                  </th>
                                  <th scope="col">
                                      Product Name
                                  </th>
                                  <th scope="col">
                                      Quantity
                                  </th>
                              </tr>
                          </thead>
                          <tbody class="list">  
                            <tr>
                              <td>3</td>
                              <td > Coke</td>
                              <td > 50</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td > Coke</td>
                              <td > 50</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td > Coke</td>
                              <td > 50</td>
                            </tr>
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <div class="card ">
              <div class="card-header bg-secondary" id="headingOne">
                <div class="row">
                  <div class="col-10">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                      <h5 class="mb-0 ">CNN 123 NW GP- 2015 Volvo Frieghtliner</h5> 
                      <h6>Capacity : 20 Pallets</h6>
                      <h6><i class="far fa-dot-circle text-success"></i> Status : Empty</h6>
                    </button>
                  </div>
                  <div class="col-2 mt-2">
                     <label class="custom-toggle">
                      <input type="checkbox" >
                      <span class="custom-toggle-slider  rounded-circle"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div id="collapseTwo" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <p>Item(s) Assigned :</p>
                    <h6><i class="far fa-dot-circle text-warning"></i> Status : Packing</h6>
                    <div class="table-responsive">
                      <div>
                      <table class="table align-items-center">
                          <thead class="thead-light">
                              <tr>
                                  <th scope="col">
                                      DeliveryID#
                                  </th>
                                  <th scope="col">
                                      Product Name
                                  </th>
                                  <th scope="col">
                                      Quantity
                                  </th>
                              </tr>
                          </thead>
                          <tbody class="list">  
                            <tr>
                              <td>3</td>
                              <td > Coke</td>
                              <td > 50</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td > Coke</td>
                              <td > 50</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td > Coke</td>
                              <td > 50</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="card ">
              <div class="card-header bg-secondary" id="headingOne">
                <div class="row">
                  <div class="col-10">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <h5 class="mb-0 ">BBC 123 NW GP- 2015 Isuzu NPR</h5> 
                    <h6>Capacity : 20 Pallets</h6> 
                    <h6><i class="far fa-dot-circle text-success"></i> Status : Empty</h6>
                  </button>

                </div>
                <div class="col-2 mt-2">
                   <label class="custom-toggle">
                    <input type="checkbox" >
                    <span class="custom-toggle-slider  rounded-circle"></span>
                  </label>
                </div>
              </div>
              </div>

              <div id="collapseThree" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <p>Item(s) Assigned : Empty</p>    
              </div>
            </div>
          </div>
          </div>
          <div class="col-8">
            <div class="car shadow border-0">
               <div id="map" style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"></div>

            <!-- <script type="text/javascript">
              var locations = [
                ['Bondi Beach', -33.890542, 151.274856, 4],
                ['Coogee Beach', -33.923036, 151.259052, 5],
                ['Cronulla Beach', -34.028249, 151.157507, 3],
                ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
                ['Maroubra Beach', -33.950198, 151.259302, 1]
              ];

              var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: new google.maps.LatLng(-33.92, 151.25),
                mapTypeId: google.maps.MapTypeId.ROADMAP
              });

              var infowindow = new google.maps.InfoWindow();

              var marker, i;

              for (i = 0; i < locations.length; i++) {  
                marker = new google.maps.Marker({
                  position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                  map: map
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                  return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                  }
                })(marker, i));
              }
            </script> -->

            </div>
          </div>

        </div>

          <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0 bg-default">
              <div class="row align-items-center">
                <div class="col ">
                  <h3 class="mb-0 text-white">Deliveries Pending</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Nearest/Furthest</a>
                  <a href="#!" class="btn btn-sm btn-primary">Newest/Oldest</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Order/Inv NO#</th>
                    <th scope="col">Date</th>
                    <th scope="col">City</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><button class="btn btn-sm btn-warning">Select</button>
                    <th scope="row">
                     321
                    </th>
                    <td>
                      25/07/2019
                    </td>
                    <td>
                      Pretoria
                    </td>

                  </tr>
                  <tr>
                    <td><button class="btn btn-sm btn-warning">Select</button>
                    <th scope="row">
                     321
                    </th>
                    <td>
                      25/07/2019
                    </td>
                    <td>
                      Pretoria
                    </td>

                  </tr>
                  <tr>
                    <td><button class="btn btn-sm btn-warning">Select</button>
                    <th scope="row">
                     321
                    </th>
                    <td>
                      25/07/2019
                    </td>
                    <td>
                      Pretoria
                    </td>

                  </tr>
                  <tr>
                    <td><button class="btn btn-sm btn-warning">Select</button>
                    <th scope="row">
                     321
                    </th>
                    <td>
                      25/07/2019
                    </td>
                    <td>
                      Pretoria
                    </td>

                  </tr>
                  <tr>
                    <td><button class="btn btn-sm btn-warning">Select</button>
                    <th scope="row">
                     321
                    </th>
                    <td>
                      25/07/2019
                    </td>
                    <td>
                      Pretoria
                    </td>

                  </tr>
                  <tr>
                    <td><button class="btn btn-sm btn-warning">Select</button>
                    <th scope="row">
                     321
                    </th>
                    <td>
                      25/07/2019
                    </td>
                    <td>
                      Pretoria
                    </td>

                  </tr>
                  <tr>
                    <td><button class="btn btn-sm btn-warning">Select</button>
                    <th scope="row">
                     321
                    </th>
                    <td>
                      25/07/2019
                    </td>
                    <td>
                      Pretoria
                    </td>

                  </tr>
                  <tr>
                    <td><button class="btn btn-sm btn-warning">Select</button>
                    <th scope="row">
                     321
                    </th>
                    <td>
                      25/07/2019
                    </td>
                    <td>
                      Pretoria
                    </td>

                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header  border-0 bg-gradient-succes">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0 s">Delivery Item(s)</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-lg btn-success">Assign</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Qty</th>
                    <th scope="col">Product Name</th>
            
                  </tr>
                </thead>
                <tbody>
                  <tr>
<td class="py-2 px-0" id="quantityCol"><div class="input-group mx-auto" style="width: 4rem"><input type="number" value="0" min="0" step="1" data-number-to-fixed="00.10" data-number-stepfactor="1" class="form-control currency pr-0 quantityBox" onchange="calculateRowTotalQuantity(this)" id="quantity2" style="height: 2rem;"></div> </td>
                    <td>
                      Coke
                    </td>
                    
                  </tr>
                  <tr>
<td class="py-2 px-0" id="quantityCol"><div class="input-group mx-auto" style="width: 4rem"><input type="number" value="0" min="0" step="1" data-number-to-fixed="00.10" data-number-stepfactor="1" class="form-control currency pr-0 quantityBox" onchange="calculateRowTotalQuantity(this)" id="quantity2" style="height: 2rem;"></div> </td>
                    <td>
                      Coke
                    </td>
                
                  </tr>
                <tr>
<td class="py-2 px-0" id="quantityCol"><div class="input-group mx-auto" style="width: 4rem"><input type="number" value="0" min="0" step="1" data-number-to-fixed="00.10" data-number-stepfactor="1" class="form-control currency pr-0 quantityBox" onchange="calculateRowTotalQuantity(this)" id="quantity2" style="height: 2rem;"></div> </td>
                    <td>
                      Coke
                    </td>
                    
                  </tr>
             
                    <tr>
<td class="py-2 px-0" id="quantityCol"><div class="input-group mx-auto" style="width: 4rem"><input type="number" value="0" min="0" step="1" data-number-to-fixed="00.10" data-number-stepfactor="1" class="form-control currency pr-0 quantityBox" onchange="calculateRowTotalQuantity(this)" id="quantity2" style="height: 2rem;"></div> </td>
                    <td>
                      Coke
                    </td>
                    
                  </tr>
          

                </tbody>
              </table>
            </div>
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
  <script type="text/javascript" src="JS/assignTruckMap.js"></script>
</body>

</html>