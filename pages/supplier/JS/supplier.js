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
	//let address2=$("#inputAddress2").val().trim();
	let suburb=$("#inputSuburb").val().trim();
	let city=$("#inputCity").val().trim();
	let zip=$("#inputZip").val().trim();
	let addSupplierArr=[];
	addSupplierArr["name"]=name;
	addSupplierArr["VATNumber"]=VatNum;
	addSupplierArr["con"]=contact;
	addSupplierArr["email"]=email;
	addSupplierArr["address"]=address1;
	addSupplierArr["suburb"]=suburb;
	addSupplierArr["city"]=city;
	addSupplierArr["zip"]=zip;
	return addSupplierArr;


}

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
		suburb.append( $('<input></input>').addClass('form-control').attr('id', 'inputSuburb'+tmp));
		
		let city=$('<div></div>').addClass('form-group col-md-4');
		city.append( $('<label></label>').attr('for', 'inputCity'+tmp).html('City'));
		city.append( $('<input></input>').addClass('form-control').attr('id', 'inputCity'+tmp).attr('readonly',''));

		let zip=$('<div></div>').addClass('form-group col-md-2');
		zip.append( $('<label></label>').attr('for', 'inputZip'+tmp).html('Zip'));
		zip.append( $('<input></input>').addClass('form-control').attr('id', 'inputZip'+tmp).attr('readonly',''));

		form_row2.append(suburb);
		form_row2.append(city);
		form_row2.append(zip);
		formgroup.append(form_row1);
		formgroup.append(form_row2);
		return formgroup;
	}

$(()=>{
	//APP ID: 4ubUBkg0ecyvqIcmRpJw
	//APP CODE : R1S3qwnTFxK3FbiK1ucSqw
	jQuery.validator.setDefaults({
  		debug: true,
  		success: "valid"
	});
	$("#inputAddress").on('keyup',function(e){
		e.preventDefault();
		$.getJSON("http://autocomplete.geocoder.api.here.com/6.2/suggest.json?app_id=4ubUBkg0ecyvqIcmRpJw&app_code=R1S3qwnTFxK3FbiK1ucSqw&query="+$(this).val()+"&country=ZAF",{
			format:"json",
			delay:100
		})
		.done(data=>{
			//console.log(data.suggestions);
			let viewArr=[];
			let obj={label:"",index:""};
			//console.log(data.suggestions);
			for(k=0;k<data.suggestions.length;k++)
			{
				obj={label:"",index:""};
				obj.label=data.suggestions[k].label.split(', ').reverse().join(', ');
				obj.index=data.suggestions[k].locationId;
				viewArr.push(obj);
			}
			console.log(viewArr);
			let useArr=data.suggestions;
			$("#inputAddress").autocomplete({
				source:viewArr,
				select: function(event,ui){
				// alert(ui.item.index);
				let finalObj=useArr.filter(element=>element.locationId==ui.item.index);
				//console.log(finalObj);
				$("#inputSuburb").val(finalObj[0].address.district);
				$("#inputCity").val(finalObj[0].address.city);
				$("#inputZip").val(finalObj[0].address.postalCode);
			}
			});

		});

	});

	$(document).on('keyup','#inputAddress2',function(e){
		e.preventDefault();
		console.log('test');
		$.getJSON("http://autocomplete.geocoder.api.here.com/6.2/suggest.json?app_id=4ubUBkg0ecyvqIcmRpJw&app_code=R1S3qwnTFxK3FbiK1ucSqw&query="+$(this).val()+"&country=ZAF",{
			format:"json",
			delay:100
		})
		.done(data=>{
			console.log(data.suggestions);
			let viewArr=[];
			let obj={label:"",index:""};
			//console.log(data.suggestions);
			for(k=0;k<data.suggestions.length;k++)
			{
				obj={label:"",index:""};
				obj.label=data.suggestions[k].label.split(', ').reverse().join(', ');
				obj.index=data.suggestions[k].locationId;
				viewArr.push(obj);
			}
			console.log(viewArr);
			let useArr=data.suggestions;
			$("#inputAddress2").autocomplete({
				source:viewArr,
				select: function(event,ui){
				// alert(ui.item.index);
				let finalObj=useArr.filter(element=>element.locationId==ui.item.index);
				//console.log(finalObj);
				$("#inputSuburb2").val(finalObj[0].address.district);
				$("#inputCity2").val(finalObj[0].address.city);
				$("#inputZip2").val(finalObj[0].address.postalCode);
			}
			});

		});

	});

	$(document).on('keyup','#inputAddress3',function(e){
		e.preventDefault();
		console.log('test');
		$.getJSON("http://autocomplete.geocoder.api.here.com/6.2/suggest.json?app_id=4ubUBkg0ecyvqIcmRpJw&app_code=R1S3qwnTFxK3FbiK1ucSqw&query="+$(this).val()+"&country=ZAF",{
			format:"json",
			delay:100
		})
		.done(data=>{
			console.log(data.suggestions);
			let viewArr=[];
			let obj={label:"",index:""};
			//console.log(data.suggestions);
			for(k=0;k<data.suggestions.length;k++)
			{
				obj={label:"",index:""};
				obj.label=data.suggestions[k].label.split(', ').reverse().join(', ');
				obj.index=data.suggestions[k].locationId;
				viewArr.push(obj);
			}
			console.log(viewArr);
			let useArr=data.suggestions;
			$("#inputAddress3").autocomplete({
				source:viewArr,
				select: function(event,ui){
				// alert(ui.item.index);
				let finalObj=useArr.filter(element=>element.locationId==ui.item.index);
				//console.log(finalObj);
				$("#inputSuburb3").val(finalObj[0].address.district);
				$("#inputCity3").val(finalObj[0].address.city);
				$("#inputZip3").val(finalObj[0].address.postalCode);
			}
			});

		});

	});

	var count=1;



	$("#btn-add-address").on('click',function(e){
		e.preventDefault();
		count++;
		
		if(count<=3){
		 let el= createAddress(count);
		 $('#mainf').append(el);
		 
		 if(count==3){
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

	$("#addSave").on('click',function(e){
		e.preventDefault();
		let form=$('#mainf');
		form.validate();
		//element.valid();78\6\\\\\\\\\\\\
		if(form.valid()===false)
		{
			e.stopPropagation();
		}
		else
		{
			
			
			let arr=getInput();
			let addr=arr["address"].split(",");
			let a=addr[0];
			console.log(arr["suburb"]);
			if(CheckValid(arr)!=true)
			{
				e.stopPropagation();
			}
			else
			{
				$.ajax({
				url: 'PHPcode/addSupplierCode.php',
				type: 'POST',
				data:{choice:1,name:arr["name"],vat:arr["VATNumber"],contact:arr["con"],email:arr["email"],address:a,suburb:arr["suburb"],city:arr["city"],zip:arr["zip"]}
				})
				.done(data=>{
					//alert(data);
					let doneData=data.split(",");
					console.log(doneData);
					if(doneData[0]=="T")
					{
						//alert("True");
						$("#MMessage").text(doneData[1]);
						$("#btnClose").attr("onclick","window.location='../../supplier.php'");
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
			}
			
		}
	});
	/////////////////////////////////////////////////
	

});