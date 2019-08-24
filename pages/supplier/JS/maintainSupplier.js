let checkVals= function()
{
	let suppArr = [];
	suppArr["ID"]=$("#sID").val();
	suppArr["ADDID"]=$("#sAddID").val();
	if ($("#sName").val()==="")
	{
		suppArr["Name"]=$("#sName").attr("placeholder");
	}
	else
	{
		suppArr["Name"]=$("#sName").val();
	}
	if($("#VATNumber").val()==="")
	{
		suppArr["VATNumber"]=$("#VATNumber").attr("placeholder");
	}
	else
	{
		suppArr["VATNumber"]=$("#VATNumber").val();
	}
	if($("#ContactNo").val()==="")
	{
		suppArr["Phone"]=$("#ContactNo").attr("placeholder");
	}
	else
	{
		suppArr["Phone"]=$("#ContactNo").val();
	}
	if($("#sEmail").val()==="")
	{
		suppArr["Email"]=$("#sEmail").attr("placeholder");
	}
	else
	{
		suppArr["Email"]=$("#sEmail").val();
	}
	if($("#inputAddress").val()==="")
	{
		suppArr["Address"]=$("#inputAddress").attr("placeholder");
	}
	else
	{
		suppArr["Address"]=$("#inputAddress").val();
	}
	if($("#sSuburb").val()==="")
	{
		suppArr["Suburb"]=$("#sSuburb").attr("placeholder");
	}
	else
	{
		suppArr["Suburb"]=$("#sSuburb").val();
	}
	if($("#sCity").val()==="")
	{
		suppArr["City"]=$("#sCity").attr("placeholder");
	}
	else
	{
		suppArr["City"]=$("#sCity").val();
	}
	if($("#inputZip").val()==="")
	{
		suppArr["Zip"]=$("#inputZip").attr("placeholder");
	}
	else
	{
		suppArr["Zip"]=$("#inputZip").val();
	}

	return suppArr;


}
	
$(()=>{
	let address=$("#convertAdd").text();
	console.log(address);
	$("#inputAddress").attr("placeholder",address);
	$("#btnSave").on('click',function(e){
		e.preventDefault();
		let arr=checkVals();
		console.log(arr);
		$.ajax({
			url: 'PHPcode/addSupplierCode.php',
			type: 'POST',
			data: {choice:2,ID:arr["ID"],ADDID:arr["ADDID"],Name:arr["Name"],VAT:arr["VATNumber"],Email:arr["Email"],Phone:arr["Phone"],Address:arr["Address"],Suburb:arr["Suburb"],City:arr["City"],Zip:arr["Zip"]} 
		})
		.done(data=>{
			if(data=="True")
			{
				alert("Success");
			}
			else
			{
				alert(data);
			}
		});
	});
});