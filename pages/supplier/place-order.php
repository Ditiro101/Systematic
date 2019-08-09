<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Place Order - Stock Path</title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Place Order</a>
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
          <div class="card shadow col sm-6">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Order Details</h3>
            </div>
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-6 sm-12">
                  <div class="card card-stats" id="myTabContent" >
                    <div class="card-header" style="background-color: #81b69d">
                        <h5 class="card-title mb-0">Supplier Details</h5>
                    </div>
                    <div class="card-body px-3">
                      <table class="table align-items-center table-flush table-borderless table-responsive">
                        <tbody class="list">
                          <tr>
                            <div class="input-group input-group-rounded input-group-merge mb-3">
                                <button class="btn btn-default dropdown-toggle btn-block col" type="button" id="dropdown_suppliers" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    Add Supplier
                                </button>
                                <div id="menu" class="dropdown-menu col px-4 mb-4" aria-labelledby="dropdown_suppliers">
                                    <form class="px-1 py-2">
                                      <div class="input-group input-group-rounded input-group-merge">
                                        <input type="search" class="form-control form-control-rounded form-control-prepended" id="searchSupplier" placeholder="Enter Supplier Name" autofocus="true">
                                        <div class="input-group-prepend">
                                          <div class="input-group-text">
                                            <span class="fa fa-search"></span>
                                          </div>
                                        </div>
                                      </div>
                                    </form>
                                    <div id="menuItems-suppliers"></div>
                                    <div id="emptySuppliers" class="dropdown-header" style="color: black">
                                      No supplier found
                                    </div>
                                </div>
                              </div>
                            </tr>            
                            <tr>
                              <th style="width: 12rem">
                                  Supplier ID
                              </th>
                              <td >
                                  4
                              </td>
                            </tr>                               
                            <tr>
                              <th>
                                  Name
                              </th>
                              <td >
                                  Caines Foods
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
                            <tr>
                              <th>
                                  Email
                              </th>
                              <td >
                                  caines.foods@gmail.com
                              </td>
                            </tr>                 
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
                <div class="col-6">
                  <div class="card card-stats" id="myTabContent" >
                    <div class="card-body px-3" style="height: 22rem">
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
                                Order #
                              </th>
                              <td >
                                321
                              </td>
                            </tr> 
                            <tr>
                              <th>
                                Sales Manager
                              </th>
                              <td >
                                Matthew
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
                  <div class="card-header border-0">
                    <div class="input-group input-group-rounded input-group-merge">
                        <button class="btn btn-default dropdown-toggle btn-block col" type="button" id="dropdown_products" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            Add Product
                        </button>
                        <div id="menu" class="dropdown-menu col px-4 mb-4" aria-labelledby="dropdown_products">
                            <form class="px-1 py-2">
                              <div class="input-group input-group-rounded input-group-merge">
                                <input type="search" class="form-control form-control-rounded form-control-prepended" id="searchProduct" placeholder="Enter Product Name" autofocus="true">
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
                      <th class="text-center"> Quantity</th>
                      <th> Item Name</th>
                      <th class="pl-4 text-right"> Unit Price</th>
                      <th class="text-right"> Total </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="py-2 px-0">
                        <div class="input-group mx-auto" style="width: 4rem">
                          <input type="number" value="30" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                        </div> 
                      </td>
                      <td class="py-2">All Gold Tomato Sauce (6x350ml) Case</td>
                      <td class="text-right py-2">R83.00</td>
                      <td class="text-right py-2">R2 490.00</td>
                    </tr>
                    <tr>
                      <td class="py-2 px-0">
                        <div class="input-group mx-auto" style="width: 4rem">
                          <input type="number" value="30" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                        </div> 
                      </td>
                      <td class="py-2">Apple Munch (96x50ml) Pallet</td>
                      <td class="text-right py-2">R81.00</td>
                      <td class="text-right py-2">R2 430.00</td>
                    </tr>
                    <tr>
                      <td class="py-2 px-0">
                        <div class="input-group mx-auto" style="width: 4rem">
                          <input type="number" value="80" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                        </div> 
                      </td>
                      <td class="py-2">Kingsley Cola (6x2l) Case</td>
                      <td class="text-right py-2">R47.00</td>
                      <td class="text-right py-2">R3 760.00</td>
                    </tr>
                    <tr>
                      <td class="py-2 px-0">
                        <div class="input-group mx-auto" style="width: 4rem">
                          <input type="number" value="20" min="0" step="10" data-number-to-fixed="00.10" data-number-stepfactor="10" class="form-control currency pr-0" id="c2" style="height: 2rem;" />
                        </div> 
                      </td>
                      <td class="py-1">Monster Energy Drink (24x500ml) Case</td>
                      <td class="text-right py-2">R130.00</td>
                      <td class="text-right py-2">R2 600.00</td>
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
            </div>
            <br>

              <div class="col mt-4">
                <button class="btn btn-icon btn-2 btn-success mt-0" type="button" data-toggle="modal" data-target="#modal-creditlimit">
                  <span class="btn-inner--text">Place Order</span>
                </button>
              </div>
                <div class="modal fade" id="modal-creditlimit" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure you want to place the order?</p>
                    </div>
                    <div class="modal-footer">
                      
                    <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#modal-succ">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
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
                          <p>Order placed successfully. An email has been sent to the supplier. Printing order invoice...</p>
                            
                        </div>
                        
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-link  ml-auto" onclick="window.location='../../supplier.html'">Close</button> 
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
      let names = ["All Gold Tomato Sauce (6x350ml) Case", "All Gold Tomato Sauce (6x700ml) Case", "Apple Munch (96x50ml) Pallet", "Ariel Washing Powder (6x500g) Case", "Bakers Toppers (12x125g) Case","Coca Cola (6x2l) Case","Dragon Energy Drink (24x500ml) Case","Kingsley Cola (6x2l) Case","Kingsley Iron Brew (6x2l) Case","Kingsley Ginger Bear (6x2l) Case","Kingsley Granadila (6x2l) Case", "Kingsley Orange (6x2l) Case", "Kingsley Pineapple (6x2l) Case", "Kingsley Cream Soda (6x2l) Case", "Kingsley Apple (6x2l) Case", "Monster Energy Drink (24x500ml) Case"];

      let suppliers = ["Better Bulk","Bulk Bounty","Coca Cola","Caines Food","Makro","Wholesale Market"]

      //Find the input search box
      let searchProduct = document.getElementById("searchProduct");

      let searchSupplier = document.getElementById("searchSupplier");

      //Find every item inside the dropdown
      let items = document.getElementsByClassName("dropdown-product");

      let supplierNames = document.getElementsByClassName("dropdown-supplier");


      function buildDropDown(values) 
      {
          let contents = []
          for (let name of values) 
          {
          contents.push('<input type="button" class="dropdown-item dropdown-product" id="dropdownItem" type="button" value="' + name + '"/>')
          }
          $('#menuItems').append(contents.join(""))

          //Hide the row that shows no items were found
          $('#empty').hide()
      }

      function buildDropDownSuppliers(values) 
      {
          let contents = []
          for (let name of values) 
          {
          contents.push('<input type="button" class="dropdown-item dropdown-supplier" id="dropdownItemSuppliers" type="button" value="' + name + '"/>')
          }
          $('#menuItems-suppliers').append(contents.join(""))

          //Hide the row that shows no items were found
          $('#emptySuppliers').hide()
      }

      //Capture the event when user types into the search box
      searchProduct.addEventListener('input', function () 
      {
          filter(searchProduct.value.trim().toLowerCase())
      });

      searchSupplier.addEventListener('input', function () 
      {
          filterSupplier(searchSupplier.value.trim().toLowerCase())
      });

      document.getElementById("dropdown_products").addEventListener('click', function (){
          document.getElementById("searchProduct").focus();
      },false);

      document.getElementById("dropdown_suppliers").addEventListener('click', function (){
          document.getElementById("searchSupplier").focus();
      },false);

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
          if (hidden == length) 
          {
            $('#empty').show()
          }
          else 
          {
            $('#empty').hide()
          }
      }

      function filterSupplier(supplierN) 
      {
          let suppliersLength = supplierNames.length
          let collection = []
          let hidden = 0

          for (let i = 0; i < suppliersLength; i++) 
          {
            if (supplierNames[i].value.toLowerCase().startsWith(supplierN)) 
            {
                $(supplierNames[i]).show()
            }
            else {
                $(supplierNames[i]).hide()
                hidden++
            }
          }

          //If all items are hidden, show the empty view
          if (hidden == suppliersLength) 
          {
            $('#emptySuppliers').show()
          }
          else 
          {
            $('#emptySuppliers').hide()
          }
      }

      //If the user clicks on any item, set the title of the button as the text of the item

      $('#menuItems').on('click', '.dropdown-item', function()
      {
          $("#dropdown_products").dropdown('toggle');
          $('#searchProduct').val("");
          filter("");
      })

      $('#menuItems-suppliers').on('click', '.dropdown-supplier', function()
      {
          $("#dropdown_suppliers").dropdown('toggle');
          $('#searchSupplier').val("");
          filterSupplier("");
      })

      buildDropDown(names);
      buildDropDownSuppliers(suppliers);
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