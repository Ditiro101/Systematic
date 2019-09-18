var addressData;
var chooseAddressID;
var coordinates=[];
var lat;
var long;
let preLoadAddress=function(arr)
{
	let dW=$("#inputAddress");
	for(let k=0;k<addressData.length;k++)
	{
		let wOption=$("<option></option>").addClass("classAddress");
		let id="d"+addressData[k]["ADDRESS_ID"];
		wOption.attr("id",id);
		wOption.attr("name",addressData[k]["ADDRESS_ID"]);
		let final=addressData[k]["ADDRESS_LINE_1"]+","+addressData[k]["NAME"]+","+addressData[k]["ZIPCODE"]+","+addressData[k]["CITY_NAME"]+",South Africa";
		wOption.text(final);
		dW.append(wOption);
	}
	
}
$(()=>{
	let customerData=JSON.parse($("#cData").text());
	let saleID=$("#sID").text();
	$("#saleID").text("Sale No. #"+saleID+": ");
	$("#CustomerName").text(customerData["NAME"]+" "+customerData["SURNAME"]);
	$("#delDate").val($("#sDate").text());
	//customerAddress=JSON.parse($("#cAddress").text());
	addressData=JSON.parse($("#addData").text());
	//suburbData=JSON.parse($("#subData").text());
	//cityData=JSON.parse($("#citData").text());
	preLoadAddress(addressData);

	chooseAddressID=$("#inputAddress option:selected").attr("name");

	$("#inputAddress").on('change',function(e){
		e.preventDefault();
		chooseAddressID=$(this).children(":selected").attr("name");
	});

	$("#btnSave").on('click',function(e){
		e.preventDefault();
		let deliveryDate=$("#delDate").val();
		console.log(deliveryDate);
		console.log(chooseAddressID);
		let chooseAddress=addressData.find(function(element){
			if(element["ADDRESS_ID"]==chooseAddressID)
			{
				return element;
			}
		});
		let chooseAddressName=chooseAddress["ADDRESS_LINE_1"]+", "+chooseAddress["CITY_NAME"]+", "+chooseAddress["ZIPCODE"]+", South Africa";
		console.log(chooseAddressName);
		$.getJSON("https://geocoder.api.here.com/6.2/geocode.json?searchtext="+chooseAddressName+"&gen=9&app_id=4ubUBkg0ecyvqIcmRpJw&app_code=R1S3qwnTFxK3FbiK1ucSqw",{
			format:"json"
		})
		.done(data=>{
			coordinates=data;
			lat=coordinates["Response"]["View"][0]["Result"][0]["Location"]["DisplayPosition"]["Latitude"];
			long=coordinates["Response"]["View"][0]["Result"][0]["Location"]["DisplayPosition"]["Longitude"];
			$.ajax({
				url: 'PHPcode/deliverycode.php',
				type: 'POST',
				data:{choice:1,SALE_ID:saleID,ADDRESS_ID:chooseAddressID,dDate:deliveryDate,latitude:lat,longitude:long}
				})
				.done(data=>{
					let doneData=data.split(",");
					console.log(doneData);
					if(doneData[0]=="T")
					{
						//alert("True");
						$("#MMessage").text(doneData[1]);
						$("#btnClose").attr("onclick","window.location='../../delivery_collection.php'");
						$("#displayModal").modal("show");
					}
					else
					{
						//alert(doneData[1]);
						$("#MMessage").text(doneData[1]);
						$("#btnClose").attr("data-dismiss","modal");
						$("#displayModal").modal("show");
					}
				});
		});
					
	});


});