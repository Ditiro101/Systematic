<?php
    include_once("../sessionCheckPages.php");
    include_once("PHPcode/connection.php");
    include_once("PHPcode/functions.php");
    $truckData=getAllTrucks($con);
    $deliveryData=getUnassignedDeliveries($con,1);
    $addressData=getCompleteAddress($con);
    $saleData=getSalesCustomer($con);
    $saleProductData=getAllSaleProducts($con);
    $productData=getProductDetails($con);
    $truckProductData=getTruckProductData($con);
    $deliveryTruckData=getDeliveryTruckData($con);
?>
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
  <link href="../../assets/css/hummingbird-treeview.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
  <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <!-- <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script> -->
    <style type="text/css">
      .directions li span.arrow {
        display:inline-block;
        min-width:28px;
        min-height:28px;
        background-position:0px;
        background-image: url("https://heremaps.github.io/maps-api-for-javascript-examples/map-with-route-from-a-to-b/img/arrows.png");
        position:relative;
        top:8px;
      }
      .directions li span.depart  {
        background-position:-28px;
      }
      .directions li span.rightUTurn  {
        background-position:-56px;
      }
      .directions li span.leftUTurn  {
        background-position:-84px;
      }
      .directions li span.rightFork  {
        background-position:-112px;
      }
      .directions li span.leftFork  {
        background-position:-140px;
      }
      .directions li span.rightMerge  {
        background-position:-112px;
      }
      .directions li span.leftMerge  {
        background-position:-140px;
      }
      .directions li span.slightRightTurn  {
        background-position:-168px;
      }
      .directions li span.slightLeftTurn{
        background-position:-196px;
      }
      .directions li span.rightTurn  {
        background-position:-224px;
      }
      .directions li span.leftTurn{
        background-position:-252px;
      }
      .directions li span.sharpRightTurn  {
        background-position:-280px;
      }
      .directions li span.sharpLeftTurn{
        background-position:-308px;
      }
      .directions li span.rightRoundaboutExit1 {
        background-position:-616px;
      }
      .directions li span.rightRoundaboutExit2 {
        background-position:-644px;
      }
      
      .directions li span.rightRoundaboutExit3 {
        background-position:-672px;
      }
      
      .directions li span.rightRoundaboutExit4 {
        background-position:-700px;
      }
      
      .directions li span.rightRoundaboutPass {
        background-position:-700px;
      }
      
      .directions li span.rightRoundaboutExit5 {
        background-position:-728px;
      }
      .directions li span.rightRoundaboutExit6 {
        background-position:-756px;
      }
      .directions li span.rightRoundaboutExit7 {
        background-position:-784px;
      }
      .directions li span.rightRoundaboutExit8 {
        background-position:-812px;
      }
      .directions li span.rightRoundaboutExit9 {
        background-position:-840px;
      }
      .directions li span.rightRoundaboutExit10 {
        background-position:-868px;
      }
      .directions li span.rightRoundaboutExit11 {
        background-position:896px;
      }
      .directions li span.rightRoundaboutExit12 {
        background-position:924px;
      }
      .directions li span.leftRoundaboutExit1  {
        background-position:-952px;
      }
      .directions li span.leftRoundaboutExit2  {
        background-position:-980px;
      }
      .directions li span.leftRoundaboutExit3  {
        background-position:-1008px;
      }
      .directions li span.leftRoundaboutExit4  {
        background-position:-1036px;
      }
      .directions li span.leftRoundaboutPass {
        background-position:1036px;
      }
      .directions li span.leftRoundaboutExit5  {
        background-position:-1064px;
      }
      .directions li span.leftRoundaboutExit6  {
        background-position:-1092px;
      }
      .directions li span.leftRoundaboutExit7  {
        background-position:-1120px;
      }
      .directions li span.leftRoundaboutExit8  {
        background-position:-1148px;
      }
      .directions li span.leftRoundaboutExit9  {
        background-position:-1176px;
      }
      .directions li span.leftRoundaboutExit10  {
        background-position:-1204px;
      }
      .directions li span.leftRoundaboutExit11  {
        background-position:-1232px;
      }
      .directions li span.leftRoundaboutExit12  {
        background-position:-1260px;
      }
      .directions li span.arrive  {
        background-position:-1288px;
      }
      .directions li span.leftRamp  {
        background-position:-392px;
      }
      .directions li span.rightRamp  {
        background-position:-420px;
      }
      .directions li span.leftExit  {
        background-position:-448px;
      }
      .directions li span.rightExit  {
        background-position:-476px;
      }
      .directions li span.ferry  {
        background-position:-1316px;
      }

      div.progress
      {
        height: 10px !important; 
        width: 12rem !important;
      }
      </style>
</head>

<body>
  <?php include_once("../header.php");?>
   <!-- Main content -->
   <!-- <img src='http://i.imgur.com/pKopwXp.gif' hidden="true" id="loadImage" alt='loading...' style="display:block; margin:0 auto;" /> -->
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
      
        <!-- <div class="col-xl-4 mb-3" id="accordion" >
            <div class="card bg-default">
              <div class="card-body " id="headingOne">
                <div class="row">
                  <div class="col-10">
                    <label hidden="true" id="tData"><?php echo json_encode($truckData);?></label>
                    <h4 class="mb-0 text-white text-uppercas ">My Trucks</h4> 
                </div>
              </div>
              </div>
            </div>
          </div> -->
        <div class="col-12 mb-3" >
            <div class="card">
              <div class="card-header  border-0 bg-default">
                <h3 class="mb-0 text-white">
                  <i class="fas fa-truck-moving mr-2"></i>
                  Trucks Available
                </h3>
              </div>
              <div class="card-body " >
                <div class="table-responsive">
                  <table id="myTable" class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr class="header bg-primary">
                      <th style="width:1rem;"></th>
                      <th> Regstration #</th>
                      <th> Name</th>
                      <th> Capacity</th>
                      <th> Status</th>
                      <th></th>
                      <th style="width:1rem;"></th>
                    </tr>
                  </thead>
                  <tbody id="tBody">
                    <tr>
                      <td>
                        <label class="mb-0 radio">
                          <input type="radio" class="classSourceChecked" name="TruckSelect" id="0">
                        </label>
                      </td>
                      <td>LSD 310GP</td>
                      <td>Land Cruiser</td>
                      <td>20 Tonnes</td>
                      <td>
                        <i class="far fa-dot-circle text-warning"></i>
                        Packing
                      </td>
                      <td>
                        <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 70%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td>
                        <button class="btn btn-icon btn-2 btn-warning btn-sm"  data-toggle="modal" data-target="#trucModal1">
                          <span class="btn-inner--icon">
                            <i class="fas fa-eye"></i>
                          </span>
                          <span class="btn-inner--text">View</span>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade lg" id="trucModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg-default">
                                <h3 class="modal-title text-white" id="exampleModalCenterTitle">
                                  <i class="fas fa-truck-moving mr-2"></i>
                                  LSD 310GP - Land Cruiser (Assignments)
                                </h3>
                              </div>
                              <div class="modal-body">
                                <div class="nav-wrapper">
                                    <ul class="nav nav-pills nav-fill flex-column flex-md-row " id="tabs-icons-text" role="tablist">
                                        <li class="nav-item">
                                          <a class="nav-link mb-sm-3 mb-md-0 active" id="tab-table-link1" data-toggle="tab" href="#tabs-table1" role="tab" aria-controls="tabs-table" aria-selected="true">
                                              <i class="fas fa-table mr-2"></i>
                                            Table
                                          </a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link mb-sm-3 mb-md-0" id="tab-tree-link1" data-toggle="tab" href="#tabs-tree1" role="tab" aria-controls="tabs-tree1" aria-selected="false">
                                            <i class="fas fa-sitemap mr-2"></i>
                                            Tree View
                                          </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent1">
                                            <div class="tab-pane fade show active" id="tabs-table1" role="tabpanel" aria-labelledby="tab-table1">
                                                <h4 class="mb-3">Item(s) Assigned :</h4>
                                                <div class="table-responsive">
                                                  <div>
                                                    <table class="table align-items-center">
                                                      <thead class="thead-dark text-white">
                                                        <tr>
                                                          <th class="text-white" ="col">DeliveryID#</th>
                                                          <th class="text-white" ="col">Product Name</th>
                                                          <th class="text-white" ="col">Quantity</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody class="list" id="tB0">
                                                        <tr>
                                                          <td>18</td>
                                                          <td>Coca Cola (24 x 330ml) Case</td>
                                                          <td>10</td>
                                                        </tr>
                                                        <tr>
                                                          <td>18</td>
                                                          <td>Coca Cola (12 x 2L) Case</td>
                                                          <td>10</td>
                                                        </tr>
                                                        <tr>
                                                          <td>18</td>
                                                          <td>Fanta Orange (12 x 330ml) Case</td>
                                                          <td>10</td>
                                                        </tr>
                                                      </tbody>
                                                    </table>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tabs-tree1" role="tabpanel" aria-labelledby="tab-tree1">
                                              <h4 class="mb-2">Item(s) Assigned :</h4>
                                              <div class="p-3">
                                                <ul id="treeview1">
                                                <li> 
                                                  <i class="fa fa-truck mr-1"></i>
                                                  <label>LSD 310GP - Land Cruiser</label>
                                                  <ul>
                                                    <li> 
                                                      <i class="fa fa-plus mr-1"></i>
                                                      <label>Delvery #18</label>
                                                      <ul>
                                                        <li>
                                                          <label>10 x Coca Cola (24 x 330ml) Case</label>
                                                        </li>
                                                        <li>
                                                          <label>10 x Coca Cola (12 x 2L) Case</label>
                                                        </li>
                                                        <li>
                                                          <label>10 x Fanta Orange (12 x 330ml) Case</label>
                                                        </li>
                                                      </ul>
                                                    </li>
                                                  </ul>
                                                </li>
                                              </ul>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label class="mb-0 radio">
                          <input type="radio" class="classSourceChecked" name="TruckSelect" id="0">
                        </label>
                      </td>
                      <td>JGX675NW</td>
                      <td>Opel GV</td>
                      <td>90 Tonnes</td>
                      <td>
                        <i class="far fa-dot-circle text-warning"></i>
                        Packing
                      </td>
                      <td>
                        <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td>
                        <button class="btn btn-icon btn-2 btn-warning btn-sm"  data-toggle="modal" data-target="#trucModal2">
                          <span class="btn-inner--icon">
                            <i class="fas fa-eye"></i>
                          </span>
                          <span class="btn-inner--text">View</span>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade lg" id="trucModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg-default">
                                <h3 class="modal-title text-white" id="exampleModalCenterTitle">
                                  <i class="fas fa-truck-moving mr-2"></i>
                                  JGX675NW - Opel GV (Assignments)
                                </h3>
                              </div>
                              <div class="modal-body">
                                <div class="nav-wrapper">
                                    <ul class="nav nav-pills nav-fill flex-column flex-md-row " id="tabs-icons-text" role="tablist">
                                        <li class="nav-item">
                                          <a class="nav-link mb-sm-3 mb-md-0 active" id="tab-table-link2" data-toggle="tab" href="#tabs-table2" role="tab" aria-controls="tabs-table2" aria-selected="true">
                                              <i class="fas fa-table mr-2"></i>
                                            Table
                                          </a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link mb-sm-3 mb-md-0" id="tab-tree-link2" data-toggle="tab" href="#tabs-tree2" role="tab" aria-controls="tabs-tree2" aria-selected="false">
                                            <i class="fas fa-sitemap mr-2"></i>
                                            Tree View
                                          </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent2">
                                            <div class="tab-pane fade show active" id="tabs-table2" role="tabpanel" aria-labelledby="tab-table2">
                                                <h4 class="mb-3">Item(s) Assigned :</h4>
                                                <div class="table-responsive">
                                                  <div>
                                                    <table class="table align-items-center">
                                                     <thead class="thead-dark text-white">
                                                        <tr>
                                                          <th class="text-white" ="col">DeliveryID#</th>
                                                          <th class="text-white" ="col">Product Name</th>
                                                          <th class="text-white" ="col">Quantity</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody class="list" id="tB0">
                                                        <tr>
                                                          <td>25</td>
                                                          <td>Cola (24 x 330ml) Pallet</td>
                                                          <td>10</td>
                                                        </tr>
                                                        <tr>
                                                          <td>25</td>
                                                          <td>Heinz Baked Beans (6 x 200g) Pallet</td>
                                                          <td>10</td>
                                                        </tr>
                                                      </tbody>
                                                    </table>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tabs-tree2" role="tabpanel" aria-labelledby="tab-tree2">
                                              <h4 class="mb-2">Item(s) Assigned :</h4>
                                              <div class="p-3">
                                                <ul id="treeview2">
                                                  <li> 
                                                    <i class="fa fa-truck mr-1"></i>
                                                    <label>JGX675NW - Opel GV</label>
                                                    <ul>
                                                      <li> 
                                                        <i class="fa fa-plus mr-1"></i>
                                                        <label>Delvery #25</label>
                                                        <ul>
                                                          <li>
                                                            <label>25 x Cola (24 x 330ml) Pallet</label>
                                                          </li>
                                                          <li>
                                                            <label>25 x Heinz Baked Beans (6 x 200g) Pallet</label>
                                                          </li>
                                                        </ul>
                                                      </li>
                                                    </ul>
                                                  </li>
                                                </ul>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
        <div class="row">
          <div class="col-12">
            <div class="car shadow border-0">
               <!-- <div id="map">Hello</div> -->
               <div id="map" style="height: 35rem; width: 100%; top: 0px; left: 0px; background-color: rgb(229, 227, 223); border: 3px solid white"></div>
            </div>
          </div>

        </div>
        
        <div class="row mt-3">
        <div class="col-xl-7 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0 bg-primary">
              <div class="row align-items-center">
                <div class="col ">
                  <label hidden="true" id="dData"><?php echo json_encode($deliveryData);?></label>
                  <label hidden="true" id="aData"><?php echo json_encode($addressData);?></label>
                  <!-- <label hidden="true" id="subData"><?php echo json_encode($suburbData);?></label>
                  <label hidden="true" id="citData"><?php echo json_encode($cityData);?></label> -->
                   <label hidden="true" id="sData"><?php echo json_encode($saleData);?></label>
                    <label hidden="true" id="spData"><?php echo json_encode($saleProductData);?></label>
                    <label hidden="true" id="pData"><?php echo json_encode($productData);?></label>
                    <label hidden="true" id="tpData"><?php echo json_encode($truckProductData);?></label>
                    <label hidden="true" id="dtData"><?php echo json_encode($deliveryTruckData);?></label>
                  <h3 class="mb-0 text-white"><i class="fas fa-truck-loading mr-2"></i>Deliveries Pending</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Invoice NO#</th>
                    <th scope="col">Date</th>
                    <th scope="col">City</th>
                    
                  </tr>
                </thead>
                <tbody id="dBody">
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-5">
          
          <div class="card shadow">
            <div class="card-header  border-0 bg-default">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0 text-white">
                    <i class="fas fa-truck-moving mr-2"></i>
                    LSD 310GP - Land Cruiser (Selected)
                  </h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <div>
                <table class="table align-items-center">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Del #</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Quantity</th>
                    </tr>
                  </thead>
                  <tbody class="list" id="tB0">
                    <tr>
                      <td>18</td>
                      <td>Coca Cola (24 x 330ml) Case</td>
                      <td>10</td>
                    </tr>
                    <tr>
                      <td>18</td>
                      <td>Coca Cola (12 x 2L) Case</td>
                      <td>10</td>
                    </tr>
                    <tr>
                      <td>18</td>
                      <td>Fanta Orange (12 x 330ml) Case</td>
                      <td>10</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card shadow mt-4">
            <div class="card-header  border-0 bg-primary">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0 text-white"><i class="fas fa-truck-loading mr-2"></i>Delivery #25 Item(s)</h3>
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
                <tbody id="enterProducts">
                </tbody>
                <tfoot>
                  <td></td>
                  <td>
                    <a href="#!" class="btn btn-lg btn-success py-2 float-right" id="btnAssign">
                      <i class="fas fa-plus mr-2"></i>
                      Assign
                    </a>
                  </td>
                </tfoot>
              </table>
            </div>
          </div>
          <button type="button" class="btn btn-info mt-4" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-directions mr-2"></i>
          Show Directions
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel">Route Directions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="panel"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
      <?php include_once("../footer.php");?>
    </div>
 </div>
 <label hidden="true" id="tData"><?php echo json_encode($truckData);?>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="../../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../../assets/js/argon.js?v=1.0.0"></script>
  <!-- <script type="text/javascript" src="JS/assignTruckMap.js"></script> -->
  <script type="text/javascript" src="../../assets/js/hummingbird-treeview.js"></script>
  <script type="text/javascript" src="JS/assignTruck.js"></script>
</body>

</html>