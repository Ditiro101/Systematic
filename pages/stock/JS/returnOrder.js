var orderProductsArray;
var orderDetails;
var returnsArray;
var orderTotal = 0.00;

$(()=>{

	var orderProductsJSON = $("#oProducts").text();
	orderProductsArray = JSON.parse(orderProductsJSON);
	//console.log(orderProductsArray);
	buildTable(orderProductsArray);

	//var orderDetailsJSON = $("#oDetails").text();
	//orderDetails = JSON.parse(orderDetailsJSON);
	//console.log(orderDetails);

	var orderReturnsJSON = $("#oReturns").text();
	returnsArray = JSON.parse(orderReturnsJSON);
	//console.log(orderReturns);

	

	let total = orderTotal;
	let vat = total*0.15;
	
	total = total.toFixed(2);
	total = numberWithSpaces(total);

	vat = vat.toFixed(2);
	vat = numberWithSpaces(vat);

	$("#sTotal").text("R"+total);
	$("#sVAT").text("R"+vat);			

});

$("#finaliseReturn").on('click',function(e){
	e.preventDefault();
	let emptyBody=$("#tBody>tr").length;
	//console.log(emptyBody);
	if(emptyBody==0)
	{
		$("#MMessage").text("Please Select Products");
		$("#btnClose").attr("data-dismiss","modal");
		$("#displayModal").modal("show");
		e.stopPropogation();
	}
	let placeProducts=[];
	let placeProductQty=[];
	let validationQty=[];
	$("#tBody").find('tr').each(function(rowIndex,r){
		placeProducts.push($(this).attr("name"));
		placeProductQty.push(parseInt($(this).find(">:nth-last-child(1)>:nth-last-child(1)>:first-child").val()));
		//console.log($(this).find(">:nth-last-child(1)>:nth-last-child(1)>:first-child").val());

		validationQty.push(parseInt($(this).find(">:nth-last-child(1)>:nth-last-child(1)>:first-child").attr("max")));
		//console.log($(this).find(">:nth-last-child(1)>:nth-last-child(1)>:first-child").attr("max"));

	});
	var errors = 0;
	for(let k=0;k<placeProductQty.length;k++)
	{
		if(Number.isNaN(placeProductQty[k]))
		{
			
			$("#MMessage").text("One or more Input Quantities are empty");
			$("#btnClose").attr("data-dismiss","modal");
			$("#displayModal").modal("show");
			errors++;
			break;
		}
		else if(placeProductQty[k]>validationQty[k])
		{
			$("#MMessage").text("One or more quantities are too large, please check highlighted quantites.");
			$("#btnClose").attr("data-dismiss","modal");
			$("#displayModal").modal("show");
			errors++;
			break;
		}
	}
	if (errors == 0)
	{
		$("#modal-returnOrder").modal("show");
	}
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
	        	orderReturnProducts : SALERETURNPRODUCTS,
	        	orderID : ORDER_ID,
	        	reasonForReturn : reasonForReturn
		    };

		    console.log(sendDetails);

			$.ajax({
		        url:'PHPcode/returnOrder_.php',
		        type:'post',
		        data:{ 
		        	orderReturnProducts : SALERETURNPRODUCTS,
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
					$("#modalCloseButton").attr("onclick","window.location='../../stock.php'");
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

let buildTable=function(arr)
{
	for(let k=0; k<arr.length; k++)
	{
		let tableEntry=$("<tr></tr>");
		let productQuantityEntry=$("<td></td>").addClass("py-3 text-center").text(orderProductsArray[k]["QUANTITY"]);
		let productNameEntry=$("<td></td>").addClass("py-3").text(orderProductsArray[k]["PRODUCT_NAME"]);

		let productUnitPrice = parseFloat(orderProductsArray[k]["PRICE"]);
		productUnitPrice = productUnitPrice.toFixed(2);
		productUnitPrice = numberWithSpaces(productUnitPrice);
		productUnitPrice = "R"+ productUnitPrice;

		let productUnitPriceEntry=$("<td></td>").addClass("text-right py-3").text(productUnitPrice);

		let productTotalPrice = parseFloat(orderProductsArray[k]["QUANTITY"]).toFixed(2)*parseFloat(orderProductsArray[k]["PRICE"]).toFixed(2);
		orderTotal += productTotalPrice;

		productTotalPrice = productTotalPrice.toFixed(2);
		productTotalPrice = numberWithSpaces(productTotalPrice);
		productTotalPrice = "R"+ productTotalPrice;

		let productTotalEntry=$("<td></td>").addClass("text-right py-3").text(productTotalPrice);

		let productReturnQuantityEntry = '<td class="py-2 px-0 table-danger"><input type="hidden" value="'+orderProductsArray[k]["PRODUCT_ID"]+'"><div class="input-group mx-auto" style="width: 4rem"><input type="number" id="returnQuantity'+orderProductsArray[k]["PRODUCT_ID"]+'" value="0" max="'+orderProductsArray[k]["QUANTITY"]+'" min="0" step="1" data-number-stepfactor="10" class="form-control currency pr-0 returnQuantityNumber classQuantity" style="height: 2rem;" /></div> </td>';

		tableEntry.append(productQuantityEntry);
		tableEntry.append(productNameEntry);
		tableEntry.append(productReturnQuantityEntry);

		$("#tBody").append(tableEntry);
	}
}

$(document).on('change','.classQuantity',function(e){
	e.preventDefault();
	//console.log($(this).attr("max"));
	if(parseInt($(this).val())>parseInt($(this).attr("max")))
	{
		$(this).attr("style","border-color: #FF0000;height: 2rem; color: #FF0000;");
	}
	else
	{
		//console.log($(this).val());
		$(this).attr("style","border-color: #cad1d7; height: 2rem; color: #8898aa;")
	}
})