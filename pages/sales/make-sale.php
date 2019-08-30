<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Make Sale - Stock Path</title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Make Sale</a>
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

                <div class="card shadow col-lg-8">
                    <div class="card-header border-0">
                      <div class="input-group input-group-rounded input-group-merge">
                        <input type="search" class="form-control form-control-rounded form-control-prepended" id="searchProduct" placeholder="Enter Product Name" autofocus="true" onchange="focusSearch()">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <span class="fa fa-search"></span>
                          </div>
                        </div>
                      </div>
                  </div>
                <div class="table-responsive col-12">

                  <table id="productsTable" class="table align-items-center table-flush">
                     <thead class="thead-light">
                    <tr class="header">
                      <th> Quantity</th>
                      <th class="pl-0"> Item Name</th>
                      <th class="pl-4" style="text-align: center;"> Unit Price</th>
                      <th class="text-right pr-1"> Total </th>
                      <th class="text-right pr-1 pl-2"> Guide Price</th>
                      <th class="text-right pr-1"> Cost Price</th>
                      <th class="text-right pr-1"> Profit </th>
                      <th class="text-left px-0" style="width: 0.5rem"></th>
                    </tr>
                  </thead>
                  <tbody>
                 
                      
                    
                    </tbody>
                    <tfoot class="tfoot-light">
                    <tr class="footer">
                      <td></td>
                      <td></td>
                      <th class="text-right pr-1"><b>TOTAL</b></th>
                      <td class="text-right pr-1" id="totalOfSale"><b>R11 280.00</b></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                     <tr class="footer">
                      <td></td>
                      <td></td>
                      <th class="text-right pr-1"><b>VAT (15%)</b></th>
                      <td class="text-right pr-1" id="vatOfSale"><b>R2 820.00</b></td>
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
                    table = document.getElementById("productsTable");
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


                <div class="col-sm-6 col-lg-4 bg-transparent ">
                  <div class="card card-stats table" id="myTabContent" >
                    <div class="card-header bg-default">
                      <div class="row">
                       
                        
                        <span class="">
                            <button class="btn btn-primary float-right"> Add Customer</button>
                         </span>
                      </div>
                    </div>
                    <div class="card-body px-3" style="height: 18rem">
                      

                      <table class="table align-items-center table-flush table-borderless table-responsive" id= "customerCard">
                        <tbody class="list">    
                            <tr>
                              <div class="mx-2">
                                <div class="input-group input-group-rounded input-group-merge mx-2">
                                  <input type="text" id="customerSearchInput" placeholder="Search Customer ID" title="Type in a name" class="form-control form-control-rounded form-control-prepended" aria-label="Search">
                                  <div class="input-group-prepend mr-3">
                                    <button class="input-group-text" onclick="populateCustomer()">
                                    <span class="fa fa-search"></span>
                                    </button>
                                  </div>
                                </div>
                            </div>
                          </tr>
                          <tr>
                              <th> No Customer Added</th>
                              <td >
                                  
                              </td>
                            </tr>                  
                        </tbody>
                      </table>

  


                    </div>
                    <div class="card-header bg-secondary">
                      <div class="row">
                       
                        
                        <span class="">
                           <div class="custom-control custom-checkbox mb-3">
                            
                            <input class="custom-control-input" style="font-size: 5rem" id="customCheck2" type="checkbox" checked>
                            <label class="custom-control-label" for="customCheck2">Add Sale Delivery</label>
                          
                          </div>
                         </span>
                      </div>
                    </div>
                    <div class="card-body px-3" style="height: 5rem">

                    </div>
                    <div class="card-footer px-3" style="height: 5rem">
                        <span class="">
                            <button class="btn btn-primary ">Finalise Sale</button>
                         </span>
                    </div>
                  </div>
                </div>


 <!--          <div class="card shadow col">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Sale Details</h3>
            </div>
            <div class="card-body">
              <div class="row mb-3"> -->
                


<!--                 <div class="col-sm-6 col-lg-6 mt-3 mt-sm-0 table">
                  <div class="card card-stats table light" id="myTabContent" >
                    <div class="card-body px-3" style="height: 21.7rem">
                      <table class="table align-items-center table-flush table-borderless table-responsive">
                        <tbody class="list">    
                            <tr>
                              <th style="width: 12rem">
                                Date 
                              </th>
                              <td >
                                25/07/2019
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
                                Alana
                              </td>
                            </tr>      
                        </tbody>
                      </table>
                  </div>
                </div>
              </div> -->
<!--             </div>
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
                            <div id="empty" class="dropdown-header table-danger" style="color: black">
                              No product found
                            </div>
                        </div>
                      </div>
                  </div>
                <div class="table-responsive">

                  <table id="productsTable" class="table align-items-center table-flush">
                     <thead class="thead-light">
                    <tr class="header">
                      <th> Quantity</th>
                      <th class="pl-0"> Item Name</th>
                      <th class="pl-4" style="text-align: center;"> Unit Price</th>
                      <th class="text-right pr-1"> Total </th>
                      <th class="text-right pr-1 pl-2"> Guide Price</th>
                      <th class="text-right pr-1"> Cost Price</th>
                      <th class="text-right pr-1"> Profit </th>
                      <th class="text-left px-0" style="width: 0.5rem"></th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      
                    
                    </tbody>
                    <tfoot class="tfoot-light">
                    <tr class="footer">
                      <td></td>
                      <td></td>
                      <th class="text-right pr-1"><b>TOTAL</b></th>
                      <td class="text-right pr-1" id="totalOfSale"><b>R11 280.00</b></td>
                    </tr>
                     <tr class="footer">
                      <td></td>
                      <td></td>
                      <th class="text-right pr-1"><b>VAT (15%)</b></th>
                      <td class="text-right pr-1" id="vatOfSale"><b>R2 820.00</b></td>
                    </tr>
                    </tfoot>
                  </table> -->

                  <script>
                  function myFunction() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("productsTable");
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
<!--                 </div>
              </div>
            </div>
            <br>

              <div class="col mt-4">
                <button class="btn btn-icon btn-2 btn-success mt-0" type="button" data-toggle="modal" data-target="#modal-creditlimit">
                  <span class="btn-inner--text">Finalise Sale</span>
                </button>
              </div>
                <div class="modal fade" id="modal-creditlimit" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                    <div class="modal-content">
                      
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-default">Finalise Sale</h6>
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
                            
                            <button type="button" class="btn btn-success  ml-auto" data-dismiss="modal" data-toggle="modal" data-target="#modal-succ">Approve Sale</button> 
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
                          <p>Sale successful. Printing invoice...</p>
                            
                        </div>
                        
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal" onclick="callTwo()">Close</button> 
                        </div>
                        
                    </div>
                </div>
              </div>
          </div> -->
          
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

      function numberWithSpaces(x) {
		    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
		}

      //Initialize with the list of symbols
      //let names = ["All Gold Tomato Sauce (6x350ml) Case", "All Gold Tomato Sauce (6x700ml) Case", "Apple Munch (96x50ml) Pallet", "Ariel Washing Powder (6x500g) Case", "Bakers Toppers (12x125g) Case","Coca Cola (6x2l) Case","Dragon Energy Drink (24x500ml) Case","Kingsley Cola (6x2l) Case","Kingsley Iron Brew (6x2l) Case","Kingsley Ginger Bear (6x2l) Case","Kingsley Granadila (6x2l) Case", "Kingsley Orange (6x2l) Case", "Kingsley Pineapple (6x2l) Case", "Kingsley Cream Soda (6x2l) Case", "Kingsley Apple (6x2l) Case", "Monster Energy Drink (24x500ml) Case"];

      let productDetails = [
        {productName:"All Gold Tomato Sauce (6x350ml) Case", up:70.00, gp:65.00, cp:55.00}, 
        {productName:"All Gold Tomato Sauce (6x700ml) Case", up:85.00, gp:81.00, cp:80.00}, 
        {productName:"Apple Munch (96x50ml) Pallet", up:121.00, gp:110.00, cp:105.50}, 
        {productName:"Ariel Washing Powder (6x500g) Case", up:167.20, gp:154.50, cp:149.10}, 
        {productName:"Bakers Toppers (12x125g) Case", up:121.10, gp:115.00, cp:110.00},
        {productName:"Coca Cola (6x2l) Case", up:70.00, gp:65.00, cp:55.00},
        {productName:"Dragon Energy Drink (24x500ml) Case", up:70.00, gp:65.00, cp:55.00},
        {productName:"Kingsley Cola (6x2l) Case", up:70.00, gp:65.00, cp:55.00},
        {productName:"Kingsley Iron Brew (6x2l) Case", up:70.00, gp:65.00, cp:55.00},
        {productName:"Kingsley Ginger Bear (6x2l) Case", up:70.00, gp:65.00, cp:55.00},
        {productName:"Kingsley Granadila (6x2l) Case", up:70.00, gp:65.00, cp:55.00}, 
        {productName:"Kingsley Orange (6x2l) Case", up:70.00, gp:65.00, cp:55.00}, 
        {productName:"Kingsley Pineapple (6x2l) Case", up:70.00, gp:65.00, cp:55.00},
        {productName:"Kingsley Cream Soda (6x2l) Case", up:70.00, gp:65.00, cp:55.00}, 
        {productName:"Kingsley Apple (6x2l) Case", up:70.00, gp:65.00, cp:55.00},
        {productName:"Monster Energy Drink (24x500ml) Case", up:70.00, gp:65.00, cp:55.00},
        {productName:"Surprise Product", up:46.00, gp:34.00, cp:30.00}
        ];

      //Find the input search box
      let search = document.getElementById("searchProduct");

      //Find every item inside the dropdown
      let items = document.getElementsByClassName("dropdown-item");

      function buildDropDown(arrayOfProducts) 
      {
          let contents = []
          let ind = 0;
          for (let product of arrayOfProducts) 
          {
          	contents.push('<input type="button" class="dropdown-item" id="dropdownItem" type="button" value="' + product.productName + '" name="'+ind+'"/>');
          	ind++;

          }
          $('#menuItems').append(contents.join(""))

          //Hide the row that shows no items were found
          $('#empty').hide()
          console.log(productDetails);
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
        //document.getElementById("searchProduct").focus();
      }

		$('#menuItems').on('click', '.dropdown-item', function()
		{
			$("#dropdown_coins").dropdown('toggle');
			$('#searchProduct').val("");
			filter("");
		});

		buildDropDown(productDetails);

		function callTwo(){

			var URL = "invoice/invoice.html";
			window.open(URL, '_blank');
			location.reload();
		}

    // Adding Rows
    $(document).ready(function(){
        var i=1;

		$("input[id='dropdownItem']").click(function(element)
		{
			console.log(this.name);
			let productIndex = this.name;

      let theProductName = productDetails[productIndex].productName;

      console.log(theProductName);

      let theUnitPrice = productDetails[productIndex].up;
      theUnitPrice = theUnitPrice.toFixed(2);

      let theGuidePrice = productDetails[productIndex].gp;
      theGuidePrice = theGuidePrice.toFixed(2);
      theGuidePrice = numberWithSpaces(theGuidePrice);
      theGuidePrice = "R"+ theGuidePrice;

      let theCostPrice = productDetails[productIndex].cp;
      theCostPrice = theCostPrice.toFixed(2);
      theCostPrice = numberWithSpaces(theCostPrice);
      theCostPrice = "R"+ theCostPrice;

      let theProfit = productDetails[productIndex].up - productDetails[productIndex].cp;
      theProfit = theProfit.toFixed(2);
      theProfit = numberWithSpaces(theProfit);
      theProfit = "R"+ theProfit;

			$('#productLine'+i).html("<td class='py-2 px-0' id='quantityCol'><div class='input-group mx-auto' style='width: 4rem'><input type='number' value='0' min='0' step='1' data-number-to-fixed='00.10' data-number-stepfactor='1' class='form-control currency pr-0 quantityBox' onchange='calculateRowTotalQuantity(this)' id='quantity"+productIndex+"' style='height: 2rem;' /></div> </td><td class='py-2 pl-0'>"+ theProductName +"</td><td class='py-2 px-0 float-center unitPrice'><div class='input-group mx-auto' style='width: 6.4rem'> <div class='input-group-prepend'><span class='input-group-text' id='inputGroupFileAddon01' style='height: 2rem; font-size: 0.9rem'>R</span></div><input type='number' value='"+theUnitPrice+"' min='0' step='.10' data-number-to-fixed='00.10' data-number-stepfactor='10' class='form-control currency pr-0' onchange='calculateRowTotalUnitPrice(this)' id='unitPrice"+productIndex+"2' style='height: 2rem;' onchange='setTwoNumberDecimal(this)' /></div> </td><td class='text-right py-2 pr-1 price'>R0.00</td><td class='text-right py-2 pr-1'>"+theGuidePrice+"</td><td class='text-right py-2 pr-1 pl-2'>"+theCostPrice+"</td><td class='text-right py-2 pr-1 pl-2'>"+theProfit+"</td><td class='px-0 py-2'><a class='btn py-0 px-2' id='deleteRow' onclick='removeRow(this)'><i class='fas fa-times-circle' style='color: red;'></i></a></td>");

			let productsTable = $('#productsTable');
			productsTable.append('<tr id="productLine'+(i+1)+'"></tr>');
			i++;

			calculateVATandTotal();
		});

		if (i == 1) {
			console.log(this.name);
			let productIndex = this.name;

			let productsTable = $('#productsTable');
			productsTable.append('<tr id="productLine'+(i+1)+'"></tr>');
			i++;
			calculateVATandTotal();
		};



		   

	});

  function calculateRowTotalQuantity(element)
  {
    
    var thisQuantity = element.value;
    var unitPrice = element.parentNode.parentNode.nextSibling.nextSibling.childNodes[0].childNodes[2].value;

    var rowTotal = thisQuantity * unitPrice;
    rowTotal = rowTotal.toFixed(2);
    rowTotal = numberWithSpaces(rowTotal);
    rowTotal = "R"+ rowTotal;

    element.parentNode.parentNode.nextSibling.nextSibling.nextSibling.innerHTML = rowTotal;
    calculateVATandTotal();
  }

  function calculateRowTotalUnitPrice(element)
  {
    var thisUnitPrice = element.value;
    var quantity = element.parentNode.parentNode.previousSibling.previousSibling.childNodes[0].childNodes[0].value;

    var rowTotal2 = thisUnitPrice * quantity;
    rowTotal2 = rowTotal2.toFixed(2);
    rowTotal2 = numberWithSpaces(rowTotal2);
    rowTotal2 = "R"+ rowTotal2;

    element.parentNode.parentNode.nextSibling.innerHTML = rowTotal2;
    calculateVATandTotal();

    var costPrice = element.parentNode.parentNode.nextSibling.nextSibling.nextSibling.innerHTML.replace("R","").replace(/\s/g, "");

    var newProfit = thisUnitPrice - costPrice;
    newProfit = newProfit.toFixed(2);
    newProfit = numberWithSpaces(newProfit);
    newProfit = "R"+ newProfit;

    element.parentNode.parentNode.nextSibling.nextSibling.nextSibling.nextSibling.innerHTML = newProfit;

    setTwoNumberDecimal(element);
  }

 	function calculateVATandTotal()
 	{
 		var sum = 0;
		// iterate through each td based on class and add the values
		$(".price").each(function() {

		    var value = $(this).text().replace("R","").replace(/\s/g, "");
		    // add only if the value is number
		    if(!isNaN(value) && value.length != 0) {
		        sum += parseFloat(value);
		    }
		});
		var vat = (sum*0.15).toFixed(2);
		sum = sum.toFixed(2);

		sum = numberWithSpaces(sum);	
		vat = numberWithSpaces(vat);

		$('#totalOfSale').html('<b>R'+sum+'</b>');
		$('#vatOfSale').html('<b>R'+vat+'</b>');
 	}

	function removeRow(src)
	{
	    /* src refers to the input button that was clicked. 
	       to get a reference to the containing <tr> element,
	       get the parent of the parent (in this case <tr>)
	    */   
	    var oRow = src.parentElement.parentElement;  
	    
	    //once the row reference is obtained, delete it passing in its rowIndex   
	    document.all("productsTable").deleteRow(oRow.rowIndex);  
	    calculateVATandTotal();
	} 

	function populateCustomer()
	{
		let custtomerID = $('#customerSearchInput').val();

		if (custtomerID == 12) 
		{
			let customerCard = $('#customerCard');
			customerCard.html('<tr><th style="width: 12rem">Customer ID</th><td >12</td></tr><tr><th>Name</th><td>Dr</td></tr><tr><th>Surname</th><td >Weilbach</td></tr><tr><th>Contact No</th><td >012 420 3376</td></tr>');
			$('#customerSearchInput').val("");
		}
		else
		{
			let customerCard = $('#customerCard');
			customerCard.html('<tr><th>No Customer Found</th><td></td></tr>');
			$('#customerSearchInput').val("");
		}
		
	}

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