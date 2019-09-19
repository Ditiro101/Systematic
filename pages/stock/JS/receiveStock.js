var orderDetails;
var orderProducts;
let buildProduct=function(tmp,arr)
{
	let tableEntry=$("<tr></tr>");
	let quantityEntry=$("<td></td>")
	let innerDivP=$("<div></div>").addClass("input-group mx-auto");
	innerDivP.css("width","4rem");
	let inputQuantity=$("<input type='number' min='0' step='1' data-number-to-fixed='00.10' data-number-step-factor='1'></input>").addClass("form-control currency pr-0");
	inputQuantity.css("height","2rem");
	inputQuantity.attr("max",arr[tmp]["QUANTITY"]);
	inputQuantity.attr("name",arr[tmp]["PRODUCT_ID"]);
	inputQuantity.val(arr[tmp]["QUANTITY"]);
	innerDivP.append(inputQuantity);
	quantityEntry.append(innerDivP);
	let quantityVisible=$("<td></td>").addClass("py-3 text-center");
	quantityVisible.text(arr[tmp]["QUANTITY"]);
	tableEntry.append(quantityVisible);
	let nameEntry=$("<td></td>").addClass("py-3");
	nameEntry.text(arr[tmp]["PRODUCT_NAME"]);
	tableEntry.append(nameEntry);
	tableEntry.append(quantityEntry);
	$("#tBody").append(tableEntry);
}
$(()=>{
	orderDetails=JSON.parse($("#oDet").text());
	orderProducts=JSON.parse($("#oProd").text());
	console.log(orderDetails);
	console.log(orderProducts);
	for(let k=0;k<orderProducts.length;k++)
	{
		buildProduct(k,orderProducts);
	}

});