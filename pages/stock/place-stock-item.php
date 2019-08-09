<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Place Stock Item - Stock Path</title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Place Stock Item</a>
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
              <h3 class="mb-0">Place Stock Details</h3>
            </div>
            <div class="card-body">
              <div class="row mb-3">
                <div class="col">
                  <div class="card card-stats py-2 px-5" id="myTabContent" >
                    <h3 class="text-center">Select Current Warehouse</h3>
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
                <div class="col-12">
                  <div class="card shadow">
                    <div class="card-header border-0">
                      <div class="input-group input-group-rounded input-group-merge">
                          <button class="btn btn-default dropdown-toggle btn-block col" type="button" id="dropdown_coins" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="focusSearch()" >
                              Add Product
                          </button>
                          <div id="menu" class="dropdown-menu col px-4 mb-4" aria-labelledby="dropdown_coins">
                              <form class="px-1 py-2">
                                <div class="input-group input-group-rounded input-group-merge">
                                  <input type="search" class="form-control form-control-rounded form-control-prepended" id="searchProduct" placeholder="Enter Product Name" autofocus="true" onchange="focusSearch()">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <span class="fa fa-search"></span>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              <div id="menuItems"></div>
                              <div id="empty" class="dropdown-header" style="color: black">
                                No products found
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                      <table id="myTable" class="table align-items-center table-flush">
                         <thead class="thead-light">
                        <tr class="header">
                          <th class="text-center"> Quantity To Place</th>
                          <th>Item Name</th>
                          <th class="text-center">Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-2 px-0">
                            <div class="input-group mx-auto" style="width: 4rem">
                              <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                            </div> 
                          </td>
                          <td class="py-2">All Gold Tomato Sauce (6x350ml) Case</td>
                          <td class="text-center">615</td>
                        </tr>
                        <tr>
                          <td class="py-2 px-0">
                            <div class="input-group mx-auto" style="width: 4rem">
                              <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                            </div> 
                          </td>
                          <td class="py-2">Apple Munch (96x50ml) Pallet</td>
                          <td class="text-center">425</td>
                        </tr>
                        <tr>
                          <td class="py-2 px-0">
                            <div class="input-group mx-auto" style="width: 4rem">
                              <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                            </div> 
                          </td>
                          <td class="py-2">Kingsley Cola (6x2l) Case</td>
                          <td class="text-center">310</td>
                        </tr>
                        <tr>
                          <td class="py-2 px-0">
                            <div class="input-group mx-auto" style="width: 4rem">
                              <input type="number" value="0" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                            </div> 
                          </td>
                          <td class="py-1">Monster Energy Drink (24x500ml) Case</td>
                          <td class="text-center">430</td>
                        </tr>  
                        </tbody>
                      </table>

                      <script>
                      function myFunction() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("myInput");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("myTable");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[1];
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
                <div class="card card-stats mt-3 py-2 px-5" id="myTabContent" >
                  <div class="form-group">
                    <h3 for="bane">Choose Destination Warehouse</h3>
                    <select class="form-control">
                      <option>Sale Warehouse</option>
                      <option>Return Warehouse</option>
                      <option>Receival Warehouse</option>
                      <option>Coke Warehouse</option>
                    </select>
                  </div>
                </div>
              </div>
              <br>

                <div class="col mt-4">
                  <button class="btn btn-icon btn-2 btn-success mt-0" type="button" data-toggle="modal" data-target="#modal-confirm">
                    <span class="btn-inner--text">Place Stock</span>
                  </button>
                </div>
                <div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
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
                          <p>Are you sure you want to place the selected products to the selected warehouse?</p>   
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#modal-success">Yes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button> 
                      </div>   
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                      <div class="modal-content">
                        
                          <div class="modal-header">
                              <h6 class="modal-title" id="modal-title-default">Success!</h6>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                              </button>
                          </div>
                          
                          <div class="modal-body text-left">
                            <p>Stock successfully placed</p>
                              
                          </div>
                          
                          <div class="modal-footer">
                              
                              <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal" onclick="window.location='../../stock.html'">Close</button> 
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

      function focusSearch() 
      {
        document.getElementById("searchProduct").focus();
      }

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