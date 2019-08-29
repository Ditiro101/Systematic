var assignments;
var assignmentProducts;
var truckID;
var preAssignQtys;
let buildTruck=function()
{
	for(let k=0;k<assignments.length;k++)
	{
		if(k==0)
		{
			truckID=assignments[k]["TRUCK_ID"];
		}
		let dW=$("#truckSelect");
		let wOption=$("<option></option>").addClass("classDestination");
		// let id="d"+num;
		// wOption.attr("id",id);
		wOption.attr("name",assignments[k]["TRUCK_ID"]);
		wOption.text(assignments[k]["REGISTRATION_NUMBER"]+"|"+assignments[k]["TRUCK_NAME"]+"|"+assignments[k]["CAPACITY"]+" Tonnes");
		dW.append(wOption);	
	}
}

let buildProduct=function(tmp,arr)
{
	let tableEntry=$("<tr></tr>");
	let quantityEntry=$("<td></td>").addClass("py-2 px-0");
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
	let deliveryNO=$("<td></td>").addClass("classDelivery");
	deliveryNO.attr("name",arr[tmp]["DELIVERY_TRUCK_ID"]);
	deliveryNO.text(arr[tmp]["SALE_ID"]);
	tableEntry.append(deliveryNO);
	let nameEntry=$("<td></td>");
	nameEntry.text(arr[tmp]["PRODUCT_NAME"]);
	tableEntry.append(nameEntry);
	$("#enterProducts").append(tableEntry);
}
$(()=>{
	assignments=JSON.parse($("#adData").text());
	assignmentProducts=JSON.parse($("#adpData").text());
	console.log(assignments);
	console.log(assignmentProducts);
	buildTruck();
	let intialProducts=assignmentProducts.filter(element=>element["TRUCK_ID"]==truckID);
	for(let k=0;k<intialProducts.length;k++)
	{
		buildProduct(k,intialProducts);
	}
	$("#truckSelect").on('change',function(e){
		e.preventDefault();
		truckID=$(this).children(":selected").attr("name");
		$("#enterProducts").html('');
		let truckProducts=assignmentProducts.filter(element=>element["TRUCK_ID"]==truckID);
		preAssignQtys=[];
		for(let k=0;k<truckProducts.length;k++)
		{
			buildProduct(k,truckProducts);
			preAssignQtys.push(truckProducts[k]["QUANTITY"]);
		}
	});
	$("#btnYes").on('click',function(e){
		e.preventDefault();
		let assignProductIDs=[];
		let assignProductQtys=[];
		let assignProductDelIDs=[];
		let assignProductDelTruckIDs=[];
		let assignQtyRemove=[];
		$("#enterProducts input").each(function()
		{
			assignProductIDs.push($(this).attr("name"));
			assignProductQtys.push($(this).val())
		});
		$("#enterProducts td.classDelivery").each(function()
		{
			assignProductDelTruckIDs.push(parseInt($(this).attr("name")));
			assignProductDelIDs.push(parseInt($(this).text()));
		});
		for(let k=0;k<assignProductQtys.length;k++)
		{
			let qtyfinal=preAssignQtys[k]-assignProductQtys[k];
			if(qtyfinal==0)
			{
				assignQtyRemove.push(true);
			}
			else
			{
				assignQtyRemove.push(false);
			}
		}
		$.ajax({
			url:'PHPcode/assigncode.php',
			type:'POST'
			data:choice{choice:3,num:productQtys.length,productQtys:assignProductQtys,productIDs:assignProductIDs,deltruckIDs:assignProductDelTruckIDs,saleIDs:assignProductDelIDs,productremove:assignQtyRemove}
		})
		.done(data=>{
			console.log(data);
		});


	});


});