var productsArr;
var orderProductsArray;
var orderTotal = 0.00;

$(()=>{

	$.ajax({
		url:'PHPcode/getProducts_.php',
		type:'POST',
		data:''
	})
	.done(response=>{
		if(response!="False")
		{
			productsArr=JSON.parse(response);
			console.log(productsArr);
			$.ajax({
				url:'PHPcode/getOrderProducts.php',
				type:'POST',
				data:{orderID : ORDER_ID}
			})
			.done(response=>{
				if(response!="False")
				{
					orderProductsArray=JSON.parse(response);
					console.log(orderProductsArray);
					for(let k=0;k<orderProductsArray.length;k++)
					{
						buildTable(k);
					}
					let total = orderTotal;
					let vat = total*0.15;
					
					total = total.toFixed(2);
					total = numberWithSpaces(total);

					vat = vat.toFixed(2);
					vat = numberWithSpaces(vat);

					$("#sTotal").text("R"+total);
					$("#sVAT").text("R"+vat);
				}
				else
				{
					alert("Error");
				}
			});		
		}
		else
		{
			alert("Error");
		}

	});

	$.ajax({
		url: 'PHPcode/getOrderReturns_.php',
		type: 'POST',
		data: { 
			orderID : ORDER_ID
		},
		beforeSend: function() {

    	}
	})
	.done(response => {
		
		console.log(response);
		returnsArray=JSON.parse(response);
		//console.log("RETURNS");
		//console.log(returnsArray);

		if (response != "false")
		{
			for(let k=0;k<returnsArray.length;k++)
			{
				buildReturnsTable(k);
			}
		}
		else if(response == "false")
		{
			$("#tBodyReturns").append("<tr><td class='py-3 text-left'><b>No Returns</b></td></tr>");
		}
		else if(response == "Database error")
		{
			$('#modal-title-default2').text("Database Error!");
			$('#modalText').text("Database error whilst verifying password");
			$("#modalCloseButton").attr("onclick","");
			$('#successfullyAdded').modal("show");
		}
		
		ajaxDone = true;
	});	

});

$("button#confirmSalesManagerPassword").on('click', event => {

	var password = $("#salesManagerPassword").val().trim();
	$.ajax({
        url:'PHPcode/verifySalesManagerPassword.php',
        type:'post',
        data:{ 
        	password:password
        },
        beforeSend: function(){
            $('.loadingModal').modal('show');
        },
        complete: function(){
            // $('.loadingModal').modal('hide');
        }
    })
    .done(response => {

    	console.log(response);
        if (response == "success")
		{
			var SALERETURNPRODUCTS = [];
			
			var reasonForReturn = $("#reasonForReturn").val();
			
			console.log(reasonForReturn)
			for (var i = orderProductsArray.length - 1; i >= 0; i--) 
			{
				var thisProductID = orderProductsArray[i].PRODUCT_ID;
				var thisProductReturnQuantity = $('#returnQuantity'+thisProductID).val();

				var productLine = {
				    'PRODUCT_ID': thisProductID,
				    'RETURN_QUANTITY': thisProductReturnQuantity,
				};
				SALERETURNPRODUCTS.push(productLine);
			}
			console.log("Return Quantities");
			console.log(SALERETURNPRODUCTS);

			var sendDetails = { 
	        	saleReturnProducts : SALERETURNPRODUCTS,
	        	orderID : ORDER_ID,
	        	reasonForReturn : reasonForReturn
		    };

		    console.log(sendDetails);

			$.ajax({
		        url:'PHPcode/returnSale22_.php',
		        type:'post',
		        data:{ 
		        	saleReturnProducts : SALERETURNPRODUCTS,
		        	orderID : ORDER_ID,
		        	reasonForReturn : reasonForReturn
		        },
		        beforeSend: function(){
		            //$('.loadingModal').modal('show');
		            //console.log("Longitude => "+saleDeliveryLongitude+", Latitude => "+saleDeliveryLatitude);

		        },
		        complete: function(){
		            $('.loadingModal').modal('hide');
		        }
		    })
		    .done(response => {

		    	console.log(response);

		        if (response == "success")
				{
					$('#modal-title-default2').text("Success!");
					$('#modalText').text("Correct Password. Sale return successful");
					$("#modalCloseButton").attr("onclick","window.location='../../sales.php'");
					$('#successfullyAdded').modal("show");
				}
				else if(response == "failed")
				{
					$("#reasonForReturn").val("");
					$("#salesManagerPassword").val("");
					$('#modal-title-default2').text("Error!");
					$('#modalText').text("Incorrect password entered");
					$("#modalCloseButton").attr("onclick","");
					$('#successfullyAdded').modal("show");
				}
				else if(response == "Database error")
				{
					$('#modal-title-default2').text("Database Error!");
					$('#modalText').text("Database error whilst verifying password");
					$("#modalCloseButton").attr("onclick","");
					$('#successfullyAdded').modal("show");
				}
				
				ajaxDone = true;
		    });
	
		}
		else if(response == "failed")
		{
			$("#reasonForReturn").val("");
			$("#salesManagerPassword").val("");
			$('.loadingModal').modal('hide');
			$('#modal-title-default2').text("Error!");
			$('#modalText').text("Incorrect password entered");
			$("#modalCloseButton").attr("onclick","");
			$('#successfullyAdded').modal("show");
		}
		else if(response == "Password empty")
		{
			$('.loadingModal').modal('hide');
			$('#modal-title-default2').text("Error!");
			$('#modalText').text("Please enter a password");
			$("#modalCloseButton").attr("onclick","");
			$('#successfullyAdded').modal("show");
		}
		else if(response == "Database error")
		{
			$('.loadingModal').modal('hide');
			$('#modal-title-default2').text("Database Error!");
			$('#modalText').text("Database error whilst verifying password");
			$("#modalCloseButton").attr("onclick","");
			$('#successfullyAdded').modal("show");
		}
		
		ajaxDone = true;
    });
});

function setTwoNumberDecimal(el) 
{
    el.value = parseFloat(el.value).toFixed(2);     
};

function numberWithSpaces(x) 
{
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

let buildTable=function(tmp)
{
	let tableEntry=$("<tr></tr>");
	let quantityArr=productsArr.find(function(element){
		if(element["PRODUCT_ID"]==orderProductsArray[tmp]["PRODUCT_ID"])
		{
			return element;
		}
	});
	let pType="Individual";
	let pNumber=1;
	if(quantityArr["PRODUCT_SIZE_TYPE"]==2)
	{
		pType="Case";
		pNumber=quantityArr["UNITS_PER_CASE"];
	}
	else if(quantityArr["PRODUCT_SIZE_TYPE"]==3)
	{
		pType="Pallet";
		pNumber=quantityArr["CASES_PER_PALLET"];
	}
	pName=quantityArr["NAME"]+" ("+pNumber+" x "+quantityArr["PRODUCT_MEASUREMENT"]+quantityArr["PRODUCT_MEASUREMENT_UNIT"]+")"+" "+pType;
	let productQuantityEntry=$("<td></td>").addClass("py-3 text-center").text(orderProductsArray[tmp]["QUANTITY"]);
	let productNameEntry=$("<td></td>").addClass("py-3").text(pName);

	let productUnitPrice = parseFloat(orderProductsArray[tmp]["PRICE"]);
	productUnitPrice = productUnitPrice.toFixed(2);
	productUnitPrice = numberWithSpaces(productUnitPrice);
	productUnitPrice = "R"+ productUnitPrice;

	let productUnitPriceEntry=$("<td></td>").addClass("text-right py-3").text(productUnitPrice);

	let productTotalPrice = parseFloat(orderProductsArray[tmp]["QUANTITY"]).toFixed(2)*parseFloat(orderProductsArray[tmp]["PRICE"]).toFixed(2);
	orderTotal += productTotalPrice;

	productTotalPrice = productTotalPrice.toFixed(2);
	productTotalPrice = numberWithSpaces(productTotalPrice);
	productTotalPrice = "R"+ productTotalPrice;

	let productTotalEntry=$("<td></td>").addClass("text-right py-3").text(productTotalPrice);

	let productReturnQuantityEntry = '<td class="py-2 px-0 table-danger"><input type="hidden" value="'+orderProductsArray[tmp]["PRODUCT_ID"]+'"><div class="input-group mx-auto" style="width: 4rem"><input type="number" id="returnQuantity'+orderProductsArray[tmp]["PRODUCT_ID"]+'" value="0" max="'+orderProductsArray[tmp]["QUANTITY"]+'" min="0" step="1" data-number-stepfactor="10" class="form-control currency pr-0 returnQuantityNumber" style="height: 2rem;" /></div> </td>';

	tableEntry.append(productQuantityEntry);
	tableEntry.append(productNameEntry);
	tableEntry.append(productReturnQuantityEntry);

	$("#tBody").append(tableEntry);
}