var SALECUSTOMERID;
var arr;
var cArr;
var eArr;
$(()=>{

	$.ajax({
		url: 'PHPcode/getProducts_.php',
		type: 'POST',
		data: '' 
	})
	.done(data=>{
		if(data!="False")
		{
			let arr = JSON.parse(data);
			console.log(arr);
			let options="";
			for(let k=0;k<arr.length;k++)
			{
				options+="<option value='"+arr[k]["PRODUCT_TYPE_ID"]+"' >"+arr[k]["TYPE_NAME"]+"</option>";
			}
			$("#productType").append(options);
			buildDropDown(arr);
		}
		else
		{
			alert("Error");
		}
	});



	$.ajax({
		url:'PHPcode/salecode.php',
		type:'POST',
		data:{choice:3}
	})
	.done(data=>{
		if(data!="False")
		{
			//console.log(data);
			arr=JSON.parse(data);
			$.ajax({
				url:'PHPcode/salecode.php',
				type:'POST'//,
				//data:{choice:4}

			})
			.done(cData=>{
				//cArr=JSON.parse(cData);
				$.ajax({
					url:'PHPcode/salecode.php',
					type:'POST'//,
					//data:{choice:5}
				})
				.done(eData=>{
					if(eData!="False")
					{
						eArr=JSON.parse(eData);
						let tableEntries="";
						let formView="";
						let cfound="";
						let efound="";
						let jCFound="";
						let jEFound="";
						for(let k=0;k<arr.length;k++)
						{
							cfound=cArr.find(function(element){
								if(element["CUSTOMER_ID"]==arr[k][
									"CUSTOMER_ID"])
								{
									return element;
								}
							});
							efound=eArr.find(function(element){
								if(element["EMPLOYEE_ID"]==arr[k][
									"EMPLOYEE_ID"])
								{
									return element;
								}
							});
							//console.log(cfound);
							//console.log(efound);
							jCFound=JSON.stringify(cfound);
							jEFound=JSON.stringify(efound);
							formView="<form action='view-sale.php' method='POST'><input type='hidden' name='SALE_ID' value='"+arr[k]["SALE_ID"]+"'>"+"<input type='hidden' name='USER_ID' value='"+arr[k]["USER_ID"]+"'>"+"<input type='hidden' name='EMPLOYEE_ID' value='"+arr[k]["EMPLOYEE_ID"]+"'>"+"<input type='hidden' name='CUSTOMER_ID' value='"+arr[k]["CUSTOMER_ID"]+"'>"+"<input type='hidden' name='SALE_DATE' value='"+arr[k]["SALE_DATE"]+"'>"+"<input type='hidden' name='SALE_AMOUNT' value='"+arr[k]["SALE_AMOUNT"]+"'>"+"<input type='hidden' name='SALE_STATUS_ID' value='"+arr[k]["SALE_STATUS_ID"]+"'>"+"<input type='hidden' name='CUSTOMER_DATA' value='"+jCFound+"'>"+"<input type='hidden' name='EMPLOYEE_DATA' value='"+jEFound+"'>"+"<button class='btn btn-icon btn-2 btn-success btn-sm' type='submit'><span class='btn-inner--icon'><i class='fas fa-eye'></i></span><span class='btn-inner--text'>View</span></button>"+"</form>";
							tableEntries+="<tr><td>"+arr[k]["SALE_ID"]+"</td><td>"+arr[k]["SALE_DATE"]+"</td><td>"+cfound["NAME"]+"</td><td>"+efound["NAME"]+"</td><td>R"+arr[k]["SALE_AMOUNT"]+"</td><td>"+formView+"</td></tr>";
						}
						$("#tBody").append(tableEntries);
					}
					else
					{
						alert("Error");
					}

				});
			});
		}
		else
		{
			alert("Error");
		}
		
	});
});

$("button#searchCustomerButton").on('click', event => {
	event.preventDefault();
	let form=$('#searchCustomertForm');
	form.validate();
	if(form.valid() === false)
	{
		event.stopPropagation();
	}
	else
	{
		let customerID = $("#customerSearchInput").val();

		$.ajax({
			url: 'PHPcode/getCustomer_.php',
			type: 'POST',
			data: { 
				customerID_ : customerID,
			},
			beforeSend: function() {
	
	    	}
		})
		.done(response => {
			let customerDetails = JSON.parse(response);
			SALECUSTOMERID = customerDetails["CUSTOMER_ID"];
			if (response != "false") 
			{
				$('#customerSearchInput').val("");
				customerDetails["CUSTOMER_ID"]
				let custtomerID = $('#customerSearchInput').val();
				let customerCard = $('#customerCard');
				customerCard.html('<tr><th style="width: 12rem">Customer ID</th><td >'+customerDetails["CUSTOMER_ID"]+'</td></tr><tr><th>Name</th><td>'+customerDetails["NAME"]+'</td></tr><tr><th>Surname</th><td >'+customerDetails["SURNAME"]+'</td></tr><tr><th>Contact No</th><td >'+customerDetails["CONTACT_NUMBER"]+'</td></tr>');	
			}
			else
			{
				$('#customerSearchInput').val("");
				let customerCard = $('#customerCard');
				customerCard.html('<tr><th>No Customer Found</th><td></td></tr>');
				$('#customerSearchInput').val("");
			}
			
			ajaxDone = true;
		});
	}	
});

////////////////////////////CODE FROM PHP///////////////////////////////

function setTwoNumberDecimal(el) 
{
    el.value = parseFloat(el.value).toFixed(2);     
};

function numberWithSpaces(x) 
{
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

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

$('#searchProduct').on('input', function()
{
	var dropdownShown = $("#menu").hasClass("show");
	if(dropdownShown === false);
	{
		console.log($("#menu").hasClass("show"));
		console.log("toggling");
		$("#dropdown_coins").dropdown('toggle');
	}
	//$('#searchProduct').val("");
	//filter("");
	let search = $("#searchProduct");
	let searchWord = search.val().trim().toLowerCase()
	filter(searchWord);
});

function buildDropDown(arrayOfProducts) 
{
  let contents = []
  let ind = 0;
  for (let product of arrayOfProducts) 
  {
  	let pType="Individual";
	let pNumber="";
	if(product.PRODUCT_SIZE_TYPE==2)
	{
		pType="Case";
		pNumber=product.UNITS_PER_CASE;
	}
	else if(product.PRODUCT_SIZE_TYPE==3)
	{
		pType="Pallet";
		pNumber=product.CASES_PER_PALLET;
	}
  	let productName = product.NAME+" ("+pNumber+" x "+product.PRODUCT_MEASUREMENT+product.PRODUCT_MEASUREMENT_UNIT+")"+" "+pType;
  	contents.push('<input type="button" class="dropdown-item productDropdownMenuItem" id="dropdownItem" type="button" value="' + productName + '" name="'+ind+'"/>');
  	ind++;

  }
  $('#menuItems').append(contents.join(""))

  //Hide the row that shows no items were found
  $('#empty').hide()
  //console.log(productDetails);
}

// //Capture the event when user types into the search box
// window.addEventListener('input', function () {
//   filter(search.value.trim().toLowerCase())
// })

//For every word entered by the user, check if the symbol starts with that word
//If it does show the symbol, else hide it
function filter(word) 
{
	let items = $(".dropdown-item.productDropdownMenuItem");
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

//buildDropDown(productDetails);

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
	$(".price").each(function() 
	{
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