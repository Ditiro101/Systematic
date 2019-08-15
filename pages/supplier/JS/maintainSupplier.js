var count=0;
let checkVals= function()
{
	let suppArr = [];
	suppArr["ID"]=$("#sID").val();
	suppArr["ADDID"]=$("#sAddID").val();
	return suppArr;
}
///////////////////////////////////////////////////
let createAddress= function(tmp){
		let formgroup = $('<div></div>').addClass('form-group col').attr('id', 'address'+tmp);;
		 formgroup.append($("<hr>").addClass('my-4'));
		let form_row1= $('<div></div>').addClass('form-row');
		form_row1.append( $('<label></label>').attr('for', 'inputAddress'+tmp).html('Address '+tmp));
		let input_group=$('<div></div>').addClass('input-group');
		input_group.append( $('<input>').addClass('form-control inputAddress').attr('id', 'inputAddress'+tmp).attr('type', 'text').attr('required','') );
		input_group.append( $('<span class="input-group-btn"><button class="btn btn-danger btn-remove-address" type="button"><span class="btn-inner--icon"><i class="ni ni-fat-delete"></i></span></button>'))
		form_row1.append(input_group);
		let form_row2=$('<div></div>').addClass('form-row');

		let suburb=$('<div></div>').addClass('form-group col-md-6');
		suburb.append( $('<label></label>').attr('for', 'inputSuburb'+tmp).html('Suburb'));
		suburb.append( $('<input></input>').addClass('form-control inputSuburb').attr('id', 'inputSuburb'+tmp));
		
		let city=$('<div></div>').addClass('form-group col-md-4');
		city.append( $('<label></label>').attr('for', 'inputCity'+tmp).html('City'));
		city.append( $('<input></input>').addClass('form-control inputCity').attr('id', 'inputCity'+tmp).attr('readonly',''));

		let zip=$('<div></div>').addClass('form-group col-md-2');
		zip.append( $('<label></label>').attr('for', 'inputZip'+tmp).html('Zip'));
		zip.append( $('<input></input>').addClass('form-control inputZip').attr('id', 'inputZip'+tmp).attr('readonly',''));

		form_row2.append(suburb);
		form_row2.append(city);
		form_row2.append(zip);
		formgroup.append(form_row1);
		formgroup.append(form_row2);
		return formgroup;
}
let prefillAddress= function(tmp,address,sub,cityName,zipcode){
		let formgroup = $('<div></div>').addClass('form-group col').attr('id', 'address'+tmp);;
		 formgroup.append($("<hr>").addClass('my-4'));
		let form_row1= $('<div></div>').addClass('form-row');
		form_row1.append( $('<label></label>').attr('for', 'inputAddress'+tmp).html('Address '+tmp));
		let input_group=$('<div></div>').addClass('input-group');
		input_group.append( $('<input>').addClass('form-control inputAddress').attr('id', 'inputAddress'+tmp).attr('type', 'text').attr('required','').val(address) );
		input_group.append( $('<span class="input-group-btn"><button class="btn btn-danger btn-remove-address" type="button"><span class="btn-inner--icon"><i class="ni ni-fat-delete"></i></span></button>'))
		form_row1.append(input_group);
		let form_row2=$('<div></div>').addClass('form-row');

		let suburb=$('<div></div>').addClass('form-group col-md-6');
		suburb.append( $('<label></label>').attr('for', 'inputSuburb'+tmp).html('Suburb'));
		suburb.append( $('<input></input>').addClass('form-control inputSuburb').attr('id', 'inputSuburb'+tmp).val(sub));
		
		let city=$('<div></div>').addClass('form-group col-md-4');
		city.append( $('<label></label>').attr('for', 'inputCity'+tmp).html('City'));
		city.append( $('<input></input>').addClass('form-control inputCity').attr('id', 'inputCity'+tmp).attr('readonly','').val(cityName));

		let zip=$('<div></div>').addClass('form-group col-md-2');
		zip.append( $('<label></label>').attr('for', 'inputZip'+tmp).html('Zip'));
		zip.append( $('<input></input>').addClass('form-control inputZip').attr('id', 'inputZip'+tmp).attr('readonly','').val(zipcode));

		form_row2.append(suburb);
		form_row2.append(city);
		form_row2.append(zip);
		formgroup.append(form_row1);
		formgroup.append(form_row2);
		return formgroup;
}
//////////////////////////////////////////////	
$(()=>{
	let addressArr=JSON.parse($("#convertAdd").text());
	let suburbArr=JSON.parse($("#convertSuburb").text());
	let cityArr=JSON.parse($("#convertCity").text());
	let supplierName=$("#suppName").text();
	let changedSupplierName=supplierName.replace("/"," ");
	$("#sName").val(changedSupplierName);
	for(let k=0;k<addressArr.length;k++)
	{
		addressArr[k]["ADDRESS_LINE_1"]=addressArr[k]["ADDRESS_LINE_1"].replace("/"," ");
	}
	count=addressArr.length;
	$("#inputAddress1").val(addressArr[0]["ADDRESS_LINE_1"]);
	$("#inputSuburb1").val(suburbArr[0]["NAME"]);
	$("#inputZip1").val(suburbArr[0]["ZIPCODE"]);
	$("#inputCity1").val(cityArr[0]["CITY_NAME"]);
	for(let k=2;k<=count;k++)
	{
		let el=prefillAddress(k,addressArr[k-1]["ADDRESS_LINE_1"],suburbArr[k-1]["NAME"],cityArr[k-1]["CITY_NAME"],suburbArr[k-1]["ZIPCODE"]);
		$("#mainf").append(el);
	}

	console.log(addressArr);
	console.log(suburbArr);
	console.log(cityArr);
	$("#btn-add-address").on('click',function(e){
		e.preventDefault();
		count++;
		console.log(count);
		if(count<=3)
		{
			let el= createAddress(count);
			$('#mainf').append(el);
			 
			if(count==3)
			{
				$("#btn-add-address").attr('disabled','');
			}
		}

		

	});
	$('#mainf').on('click','.btn-remove-address', function(event) {
		event.preventDefault();
		/* Act on the event */
		
		console.log('test');
		$('#address'+count).remove();
		count--;
		$("#btn-add-address").removeAttr('disabled','');
	
	});
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