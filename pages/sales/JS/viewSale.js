var productsArr;
var sProductsArr;

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
		if(element["PRODUCT_ID"]==sProductsArr[tmp]["PRODUCT_ID"])
		{
			return element;
		}
	});
	let pType="Individual";
	let pNumber="";
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
	let productQuantityEntry=$("<td></td>").addClass("py-3 text-center").text(sProductsArr[tmp]["QUANTITY"]);
	let productNameEntry=$("<td></td>").addClass("py-3").text(pName);

	let productUnitPrice = parseFloat(sProductsArr[tmp]["SELLING_PRICE"]);
	productUnitPrice = productUnitPrice.toFixed(2);
	productUnitPrice = numberWithSpaces(productUnitPrice);
	productUnitPrice = "R"+ productUnitPrice;

	let productUnitPriceEntry=$("<td></td>").addClass("text-right py-3").text(productUnitPrice);

	let productTotalPrice = parseFloat(sProductsArr[tmp]["QUANTITY"]).toFixed(2)*parseFloat(sProductsArr[tmp]["SELLING_PRICE"]).toFixed(2);
	productTotalPrice = productTotalPrice.toFixed(2);
	productTotalPrice = numberWithSpaces(productTotalPrice);
	productTotalPrice = "R"+ productTotalPrice;

	let productTotalEntry=$("<td></td>").addClass("text-right py-3").text(productTotalPrice);
	tableEntry.append(productQuantityEntry);
	tableEntry.append(productNameEntry);
	tableEntry.append(productUnitPriceEntry);
	tableEntry.append(productTotalEntry);
	$("#tBody").append(tableEntry);

}
///////////////////////////////////////
$(()=>{
	let deliveryCheck=$("#deliveryCheck").text();
	console.log(deliveryCheck);
	if(deliveryCheck=="")
	{
		$("#btnAddDelivery").attr("hidden",false);
	}
	else
	{
		$("#btnAddDelivery").attr("hidden",true);
	}
	let customerData=JSON.parse($("#cData").text());
	let employeeData=JSON.parse($("#eData").text());
	productsArr=JSON.parse($("#productsArr").text());
	sProductsArr=JSON.parse($("#saleproductsArr").text());
	console.log(customerData);
	console.log(employeeData);
	console.log(productsArr);
	console.log(sProductsArr);
	$("#customerName").text(customerData["NAME"]);
	if(customerData["SURNAME"]==null)
	{
		$("#customerSurname").text("Organisation");
	}
	else
	{
		$("#customerSurname").text(customerData["SURNAME"]);
	}
	$("#customerContact").text(customerData["CONTACT_NUMBER"]);
	//////////////////////
	$("#eSalesPerson").text(employeeData["NAME"]);
	for(let k=0;k<sProductsArr.length;k++)
	{
		buildTable(k);
	}
	let total=parseFloat($("#sTotal").text());
	let vat=total*0.15;

	console.log(total);
	total = total.toFixed(2);
	total = numberWithSpaces(total);
	$("#sTotal").text(total);

	vat = vat.toFixed(2);
	vat = numberWithSpaces(vat);

	$("#sTotal").text("R"+total);
	$("#sVAT").text("R"+vat);



});