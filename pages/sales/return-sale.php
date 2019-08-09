<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Return Sale - Stock Path</title>
  <!-- Favicon -->
  <link href="../../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<style type="text/css">
  .dropdown-menu{
    transform: translate3d(0px, 2.7rem, 0px)!important;
  }
</style>

<body>
  <?php include_once("../header.php");?>
   <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Return Sale</a>
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
      <div class="row mb-3">
          <div class="card shadow col">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Sale Return Details</h3>
            </div>
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-6">
                  <div class="card card-stats" id="myTabContent" >
                    <div class="card-header" style="background-color: #81b69d">
                        <h5 class="card-title mb-0">Customer Details</h5>
                    </div>
                    <div class="card-body px-3">
                      <table class="table align-items-center table-flush table-borderless table-responsive">
                        <tbody class="list">    
                            <tr>
                              <th style="width: 12rem">
                                  Customer ID
                              </th>
                              <td >
                                  12
                              </td>
                            </tr>                               
                            <tr>
                              <th>
                                  Name
                              </th>
                              <td >
                                  Nicolas
                              </td>
                            </tr> 
                            <tr>
                              <th>
                                  Surname
                              </th>
                              <td >
                                  Norman
                              </td>
                            </tr>
                            <tr>
                              <th>
                                  Contact No
                              </th>
                              <td >
                                  067 345 6789
                              </td>
                            </tr>              
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
                <div class="col-6">
                  <div class="card card-stats" id="myTabContent" >
                    <div class="card-body px-3" style="height: 18.5rem">
                      <table class="table align-items-center table-flush table-borderless table-responsive">
                        <tbody class="list">    
                            <tr>
                              <th style="width: 12rem">
                                Date 
                              </th>
                              <td >
                                04/07/2019
                              </td>
                            </tr>                               
                            <tr>
                              <th>
                                Invoice #
                              </th>
                              <td >
                                321
                              </td>
                            </tr> 
                            <tr>
                              <th>
                                Salesperson
                              </th>
                              <td >
                                Jabu
                              </td>
                            </tr>      
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card shadow">
                <div class="table-responsive">

                  <table id="myTable" class="table align-items-center table-flush">
                     <thead class="thead-light">
                    <tr class="header">
                      <th> Quantity</th>
                      <th> Item Name</th>
                      <th class="pl-4 text-right"> Unit Price</th>
                      <th class="text-right"> Total </th>
                      <th class="text-center">Return Quantity </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="py-2 text-center">30</td>
                      <td class="py-2">All Gold Tomato Sauce (6x350ml) Case</td>
                      <td class="text-right py-2">R83.00</td>
                      <td class="text-right py-2">R2 490.00</td>
                      <td class="py-2 px-0 table-danger">
                        <div class="input-group mx-auto" style="width: 4rem">
                          <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                        </div> 
                      </td>
                    </tr>

                    <tr>
                      <td class="py-2 text-center">30</td>
                      <td class="py-2">Apple Munch (96x50ml) Pallet</td>
                      <td class="text-right py-2">R81.00</td>
                      <td class="text-right py-2">R2 430.00</td>
                      <td class="py-2 px-0 table-danger">
                        <div class="input-group mx-auto" style="width: 4rem">
                          <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td class="py-2 text-center">80</td>
                      <td class="py-2">Kingsley Cola (6x2l) Case</td>
                      <td class="text-right py-2">R47.00</td>
                      <td class="text-right py-2">R3 760.00</td>
                      <td class="py-2 px-0 table-danger">
                        <div class="input-group mx-auto" style="width: 4rem">
                          <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td class="py-2 text-center">20</td>
                      <td class="py-1">Monster Energy Drink (24x500ml) Case</td>
                      <td class="text-right py-2">R130.00</td>
                      <td class="text-right py-2">R2 600.00</td>
                      <td class="py-2 px-0 table-danger">
                        <div class="input-group mx-auto" style="width: 4rem">
                          <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                        </div> 
                      </td>
                    </tr>

                    
                    </tbody>
                    <tfoot class="tfoot-light">
                    <tr class="footer">
                      <td></td>
                      <td></td>
                      <th class="text-right"><b>TOTAL</b></th>
                      <td class="text-right"><b>R11 280.00</b></td>
                    </tr>
                    <tr class="footer">
                      <td></td>
                      <td></td>
                      <th class="text-right"><b>VAT (15%)</b></th>
                      <td class="text-right"><b>R2 820.00</b></td>
                    </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <br>

              <div class="col mt-4">
                <button class="btn btn-icon btn-2 btn-danger mt-0" type="button" data-toggle="modal" data-target="#modal-creditlimit">
                  <span class="btn-inner--text">Finalise Return</span>
                </button>
              </div>
              <div class="modal fade" id="modal-creditlimit" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                  <div class="modal-content"> 
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default">Return</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div class="col text-left">
                        <p>Are you sure you want to return the indicated products from the sale?</p>   
                      </div>
                      <div class="form-group col">
                        <label for="bane">Reason for return</label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter reason for return">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#modal-pass">Yes</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">No</button> 
                    </div>   
                  </div>
                </div>
              </div>
              <div class="modal fade" id="modal-pass" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                  <div class="modal-content"> 
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default">Finalise Return</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group col">
                        <label for="bane">Sales Manager Password</label>
                        <input type="password" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter password">
                      </div>
                    </div>
                    <div class="modal-footer">
                          
                      <button type="button" class="btn btn-success  ml-auto" data-dismiss="modal" data-toggle="modal" data-target="#modal-succ">Approve Return</button> 
                    </div>   
                  </div>
                </div>
              </div>
              <div class="modal fade" id="modal-succ" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default">Success!</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>  
                    <div class="modal-body text-left">
                      <p>Return successful. Printing credit note...</p>   
                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal" onclick="window.location='../../sales.html'">Close</button> 
                    </div>    
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

    <script type="text/javascript">
      function setTwoNumberDecimal(el) {
        el.value = parseFloat(el.value).toFixed(2);
      };

      //Initialize with the list of symbols
      let names = ["All Gold Tomato Sauce (6x350ml) Case", "All Gold Tomato Sauce (6x700ml) Case", "Apple Munch (96x50ml) Pallet", "Ariel Washing Powder (6x500g) Case", "Bakers Toppers (12x125g) Case","Coca Cola (6x2l) Case","Dragon Energy Drink (24x500ml) Case","Kingsley Cola (6x2l) Case","Kingsley Iron Brew (6x2l) Case","Kingsley Ginger Bear (6x2l) Case","Kingsley Granadila (6x2l) Case", "Kingsley Orange (6x2l) Case", "Kingsley Pineapple (6x2l) Case", "Kingsley Cream Soda (6x2l) Case", "Kingsley Apple (6x2l) Case", "Monster Energy Drink (24x500ml) Case"]

      //Find the input search box
      let search = document.getElementById("searchProduct");

      //Find every item inside the dropdown
      let items = document.getElementsByClassName("dropdown-item");
      function buildDropDown(values) 
      {
          let contents = []
          for (let name of values) 
          {
          contents.push('<input type="button" class="dropdown-item" id="dropdownItem" type="button" value="' + name + '"/>')
          }
          $('#menuItems').append(contents.join(""))

          //Hide the row that shows no items were found
          $('#empty').hide()
      }

      //Capture the event when user types into the search box
      window.addEventListener('input', function () {
          filter(search.value.trim().toLowerCase())
      })

      //For every word entered by the user, check if the symbol starts with that word
      //If it does show the symbol, else hide it
      function filter(word) 
      {
          let length = items.length
          let collection = []
          let hidden = 0

          for (let i = 0; i < length; i++) 
          {
            if (items[i].value.toLowerCase().startsWith(word)) 
            {
                $(items[i]).show()
            }
            else {
                $(items[i]).hide()
                hidden++
            }
          }

          //If all items are hidden, show the empty view
          if (hidden === length) 
          {
            $('#empty').show()
          }
          else 
          {
            $('#empty').hide()
          }
      }

      //If the user clicks on any item, set the title of the button as the text of the item
      $('#menuItems').on('click', '.dropdown-item', function()
      {
          $("#dropdown_coins").dropdown('toggle');
          $('#searchProduct').val("");
          filter("");
      })

      buildDropDown(names);
    </script>
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