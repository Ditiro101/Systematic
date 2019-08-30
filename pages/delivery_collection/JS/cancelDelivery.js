var dctStatus=[];
dctStatus[1]="Not Delivered";
dctStatus[2]="Truck Assigned";
dctStatus[3]="Final Assignment";
dctStatus[4]="On Delivery";
dctStatus[5]="Delivered";
$(()=>{
	let addressData=JSON.parse($("#aData").text());
	let saleData=JSON.parse($("#sData").text());
	let customerData=JSON.parse($("#cData").text());
	let suburbData=JSON.parse($("#subData").text());
	let cityData=JSON.parse($("#citData").text());
	let dctData=parseInt($("#dctData").text());
	let delID=parseInt($("#delID").text());
	$("#cDeliveryAddress").text(addressData["ADDRESS_LINE_1"]);
	$("#cDelSuburb").text(suburbData["NAME"]);
	$("#cDelCity").text(cityData["CITY_NAME"]);
	$("#cDelZip").text(suburbData["ZIPCODE"]);
	$("#cDelStatus").text(dctStatus[dctData]);
	$("#cDeliverySaleID").text("Sale No. #"+saleData["SALE_ID"]+" : ")
	if(customerData["SURNAME"]==null)
	{
		customerData["SURNAME"]="Organisation";
	}
	$("#cDeliveryCustomerName").text(customerData["NAME"]+" "+customerData["SURNAME"]);
	$("#btnYes").on('click',function(e){
		e.preventDefault();
			$.ajax({
			url:'PHPcode/deliverycode.php',
			type:'POST',
			data:{choice:2,deliveryID:delID}
			})
			.done(data=>{
				let doneData=data.split(",");
				if(doneData[0]=="T")
				{
					$("#MMessage").text(doneData[1]);
					$("#btnClose").attr("onclick","window.location='../../delivery_collection.php'");
					$("#displayModal").modal("show");
				}
				else
				{
					$("#MMessage").text(doneData[1]);
					$("#btnClose").attr("data-dismiss","modal");
					$("#displayModal").modal("show");
				}
			});
	});

});