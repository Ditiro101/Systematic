var dctStatus=[];
dctStatus[1]="Not Delivered";
dctStatus[2]="Truck Assigned";
dctStatus[3]="Final Assignment";
dctStatus[4]="On Delivery";
dctStatus[5]="Delivered";
$(()=>{
	let collectionData=JSON.parse($("#collectionData").text());
	console.log(collectionData);
	$("#cColID").text("Supplier Order No. #"+collectionData["ORDER_ID"]+" : ");
	$("#cColSupName").text(collectionData["SUPPLIER_NAME"]);
	$("#cColDate").text(collectionData["EXPECTED_DATE"])
	$("#cCollectionAddress").text(collectionData["ADDRESS_LINE_1"]);
	$("#cColSuburb").text(collectionData["SUBURB_NAME"]);
	$("#cColCity").text(collectionData["CITY_NAME"]);
	$("#cColZip").text(collectionData["ZIPCODE"]);
	$("#cColStatus").text(dctStatus[collectionData["COLLECTION_STATUS_ID"]]);
	$("#btnYes").on('click',function(e){
		e.preventDefault();
			$.ajax({
			url:'PHPcode/collectioncode.php',
			type:'POST',
			data:{choice:2,collectionID:collectionData["COLLECTION_ID"]}
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
})