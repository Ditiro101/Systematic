var customerAddress;
var addressData;
var suburbData;
var cityData;
var chooseAddressID;
let preLoadAddress=function(num)
{
	let dW=$("#inputAddress");
	let wOption=$("<option></option>").addClass("classAddress");
	let id="d"+num;
	wOption.attr("id",id);
	wOption.attr("name",num);
	let address=addressData.find(function(element){
		if(element["ADDRESS_ID"]==num)
		{
			return element;
		}
	});
	let suburb=suburbData.find(function(element){
		if(element["SUBURB_ID"]==address["SUBURB_ID"])
		{
			return element;
		}
	});
	let city=cityData.find(function(element){
		if(element["CITY_ID"]==suburb["CITY_ID"])
		{
			return element;
		}
	});
	let final=address["ADDRESS_LINE_1"]+","+suburb["NAME"]+","+suburb["ZIPCODE"]+","+city["CITY_NAME"]+",South Africa";
	wOption.text(final);
	dW.append(wOption);
}
$(()=>{
	let customerData=JSON.parse($("#cData").text());
	let saleID=$("#sID").text();
	$("#saleID").text("Sale No. #"+saleID+": ");
	$("#CustomerName").text(customerData["NAME"]+" "+customerData["SURNAME"]);
	$("#delDate").val($("#sDate").text());
	customerAddress=JSON.parse($("#cAddress").text());
	addressData=JSON.parse($("#addData").text());
	suburbData=JSON.parse($("#subData").text());
	cityData=JSON.parse($("#citData").text());
	console.log(customerAddress);
	console.log(addressData);
	console.log(suburbData);
	console.log(cityData);
	for(let k=0;k<customerAddress.length;k++)
	{
		preLoadAddress(customerAddress[k]["ADDRESS_ID"]);
	}

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
		console.log(saleID);
				$.ajax({
				url: 'PHPcode/deliverycode.php',
				type: 'POST',
				data:{choice:1,SALE_ID:saleID,ADDRESS_ID:chooseAddressID,dDate:deliveryDate}
				})
				.done(data=>{
					alert(data);
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