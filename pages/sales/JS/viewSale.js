var productsArr;
var sProductsArr;
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
	let productUnitPriceEntry=$("<td></td>").addClass("text-right py-3").text("R"+sProductsArr[tmp]["SELLING_PRICE"]);
	let productTotal=parseFloat(sProductsArr[tmp]["QUANTITY"]).toFixed(2)*parseFloat(sProductsArr[tmp]["SELLING_PRICE"]).toFixed(2);
	let productTotalEntry=$("<td></td>").addClass("text-right py-3").text("R"+productTotal);
	tableEntry.append(productQuantityEntry);
	tableEntry.append(productNameEntry);
	tableEntry.append(productUnitPriceEntry);
	tableEntry.append(productTotalEntry);
	$("#tBody").append(tableEntry);

}
///////////////////////////////////////
$(()=>{
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
	$("#sTotal").text("R"+total);
	$("#sVAT").text("R"+vat);


});