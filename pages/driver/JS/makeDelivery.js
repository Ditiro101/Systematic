var assignments;
var assignmentProducts;

let buildProduct=function(tmp,arr)
{
	let tableEntry=$("<tr></tr>");
	let quantityEntry=$("<td></td>")
	let innerDivP=$("<div></div>").addClass("input-group mx-auto");
	innerDivP.css("width","4rem");
	let inputQuantity=$("<input type='number' min='1' step='1' data-number-to-fixed='00.10' data-number-step-factor='1'></input>").addClass("form-control currency pr-0 quantityBox");
	inputQuantity.css("height","2rem");
	inputQuantity.attr("max",arr[tmp]["QUANTITY"]);
	inputQuantity.attr("name",arr[tmp]["PRODUCT_ID"]);
	inputQuantity.val(arr[tmp]["QUANTITY"]);
	innerDivP.append(inputQuantity);
	quantityEntry.append(innerDivP);
	tableEntry.append(quantityEntry);
	let quantityVisible=$("<td></td>").addClass("py-3 text-center");
	quantityVisible.text(arr[tmp]["QUANTITY"]);
	tableEntry.append(quantityVisible);
	let nameEntry=$("<td></td>").addClass("py-3");
	nameEntry.text(arr[tmp]["PRODUCT_NAME"]);
	tableEntry.append(nameEntry);
	$("#tBody").append(tableEntry);
}

$(()=>{
	assignments=JSON.parse($("#aData").text());
	assignmentProducts=JSON.parse($("#apData").text());
	let assignProductQtys=[];
	let assignProductIDs=[];
	console.log(assignments);
	console.log(assignmentProducts);
	$("#invNo").text("Invoice #"+assignments[0]["SALE_ID"]);
	$("#delA").text(" "+assignments[0]["ADDRESS_NAME"]);
	for(let k=0;k<assignmentProducts.length;k++)
	{
		buildProduct(k,assignmentProducts);
	}
	$("#btnSave").on('click',function(e){
		e.preventDefault();
		$("#tBody input").each(function(){
			assignProductIDs.push($(this).attr("name"));
			assignProductQtys.push($(this).val());
		});
		console.log("here");
		let image=new Image();
		let canvas=document.getElementById("canvas");
		image.src=canvas.toDataURL("image/png");
		let d=canvas.toDataURL("image/png");
		console.log(assignProductIDs);
		console.log(assignProductQtys);
		let sendAssignment=JSON.stringify(assignments);
		let sendAssignmentP=JSON.stringify(assignmentProducts);
		$.ajax({
			url:'PHPcode/makedeliverycode.php',
			type:'POST',
			data:{image:d,num:assignProductIDs.length,assignment:sendAssignment,productIDs:assignProductIDs,productQty:assignProductQtys}
		})
		.done(data=>{
			console.log(data);
		});
	});
});