let NotValid = function()
{
	alert("Data is not valid, please try again");
}

let getInput= function()
{
	let name=$("#supplierName").val().trim();
	let VatNum=$("#VATNumber").val().trim();
	let contact=$("#ContactNo").val().trim();
	let email=$("#supplierEmail").val().trim();
	let address1=$("#inputAddress").val().trim();
	let address2=$("#inputAddress2").val().trim();
	let suburb=$("#inputSuburb").val().trim();
	let city=$("#inputCity").val().trim();
	let zip=$("#inputZip").val().trim();
	let addSupplierArr=[];
	addSupplierArr["name"]=name;
	addSupplierArr["VATNumber"]=VatNum;
	addSupplierArr["con"]=contact;
	addSupplierArr["email"]=email;
	addSupplierArr["address"]=address1+" "+address2;
	addSupplierArr["suburb"]=suburb;
	addSupplierArr["city"]=city;
	addSupplierArr["zip"]=zip;
	return addSupplierArr;


}

$(()=>{
	
	jQuery.validator.setDefaults({
  		debug: true,
  		success: "valid"
	});
	$("#addSave").on('click',function(e){
		e.preventDefault();
		let form=$('#mainf');
		form.validate();
		//element.valid();
		if(form.valid()===false)
		{
			e.stopPropagation();
		}
		else
		{
			let arr=getInput();
			console.log(arr);
			$.ajax({
				url: 'PHPcode/addSupplierCode.php',
				type: 'POST',
				data:{name:arr["name"]}
			})
			.done(data=>{
				alert(data);
			});
		}
	});
});