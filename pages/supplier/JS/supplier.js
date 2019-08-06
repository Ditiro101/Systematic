let CheckValid = function(valArr)
{
	if(valArr["con"].length!=10)
	{
		$("#MMessage").text("Contact Number must be 10 digits");
		$("#btnClose").attr("data-dismiss","modal");
		$("#displayModal").modal("show");
		return false;
	}
	else if (valArr["VATNumber"].length!=10)
	{
		$("#MMessage").text("VAT Number must be 10 digits.");
		$("#btnClose").attr("data-dismiss","modal");
		$("#displayModal").modal("show");
		return false;
	}
	else
	{
		return true;
	}
	
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
			if(CheckValid(arr)!=true)
			{
				e.stopPropagation();
			}
			else
			{
				$.ajax({
				url: 'PHPcode/addSupplierCode.php',
				type: 'POST',
				data:{choice:1,name:arr["name"],vat:arr["VATNumber"],contact:arr["con"],email:arr["email"]}
				})
				.done(data=>{
					if(data=="True")
					{
						$("#MMessage").text("Supplier Added Successfully!");
						$("#btnClose").attr("onclick","window.location='../../supplier.php'");
						$("#displayModal").modal("show");
					}
					else
					{
						$("#MMessage").text("Supplier Not Added!");
						$("#btnClose").attr("data-dismiss","modal");
						$("#displayModal").modal("show");
					}
				});	
			}
			
		}
	});
	/////////////////////////////////////////////////
	

});