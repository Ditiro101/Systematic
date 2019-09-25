var count=0;
let getInput= function()
{
	let name=$("#customerName").val().trim();
	let VatNum=$("#cSurname").val().trim();
	let contact=$("#ContactNo").val().trim();
	let email=$("#customerEmail").val().trim();
	let title=$("#titleSelect option:selected").text();
	let titleID=1;
	if(title=="Ms")
	{
		titleID=2;
	}
	else if(title=="Mrs")
	{
		titleID=3
	}
	addressArr=[];
	suburbArr=[];
	zipArr=[];
	cityArr=[];
	$(".inputAddress").each(function(index,item){
		let addr=$(item).val().trim().split(",");
		let a=addr[0];
		addressArr[index]=a;
	});
	$(".inputSuburb").each(function(index,item){
		suburbArr[index]=$(item).val().trim();
	});
	$(".inputCity").each(function(index,item){
		cityArr[index]=$(item).val().trim();
	});
	$(".inputZip").each(function(index,item){
		zipArr[index]=$(item).val().trim();
	});
	let addSupplierArr=[];
	addSupplierArr["title"]=titleID;
	addSupplierArr["customer_type"]=1;
	addSupplierArr["status"]=1;
	addSupplierArr["name"]=name;
	addSupplierArr["VS"]=VatNum;
	addSupplierArr["con"]=contact;
	addSupplierArr["email"]=email;
	addSupplierArr["address"]=addressArr;
	addSupplierArr["suburb"]=suburbArr;
	addSupplierArr["city"]=cityArr;
	addSupplierArr["zip"]=zipArr;
	return addSupplierArr;
}
let createAddress= function(tmp){
		let formgroup = $('<div></div>').addClass('form-group col').attr('id', 'address'+tmp);;
		 formgroup.append($("<hr>").addClass('my-4'));
		let form_row1= $('<div></div>').addClass('form-row');
		form_row1.append( $('<label></label>').attr('for', 'inputAddress'+tmp).html('Address'));
		let input_group=$('<div></div>').addClass('input-group');
		input_group.append( $('<input>').addClass('form-control inputAddress').attr('id', 'inputAddress'+tmp).attr('type', 'text').attr('required','') );
		let delbutton=$('<span class="input-group-btn"></span>');
		let delInnerbutton=$('<button class="btn btn-danger btn-remove-address" type="button"><span class="btn-inner--icon"><i class="ni ni-fat-delete"></i></span></button>');
		delInnerbutton.attr("name",tmp);
		delbutton.append(delInnerbutton);
		input_group.append(delbutton);
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
		form_row1.append( $('<label></label>').attr('for', 'inputAddress'+tmp).html('Address'));
		let input_group=$('<div></div>').addClass('input-group');
		input_group.append( $('<input>').addClass('form-control inputAddress').attr('id', 'inputAddress'+tmp).attr('type', 'text').attr('required','').val(address) );
		let delbutton=$('<span class="input-group-btn"></span>');
		let delInnerbutton=$('<button class="btn btn-danger classRemove" type="button"><span class="btn-inner--icon"><i class="ni ni-fat-delete"></i></span></button>');
		delInnerbutton.attr("name",tmp);
		delbutton.append(delInnerbutton);
		input_group.append(delbutton);
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
//////////////////////////////////////////////////
$(()=>{
	let customerTypeID=parseInt($("#cTypeID").text());
	if(customerTypeID==1)
	{
		$("#cSurnameLabel").text("Surname");
		$("#cSurname").val($("#cSur").text());
		let preTitle=$("#eTitle").text();
		$("#titleSelect").val(preTitle);
	}
	else
	{
		$("#cSurnameLabel").text("VAT Number");
		$("#cSurname").val($("#cVat").text());
		$("#titleSelect").attr("disabled",true);
	}
	let changedName=$("#cName").text().replace("/"," ");
	$("#customerName").val(changedName);
	let cusID=$("#cID").val();
	let addressArr=JSON.parse($("#convertAdd").text());
	let suburbArr=JSON.parse($("#convertSuburb").text());
	let cityArr=JSON.parse($("#convertCity").text());
	for(let k=0;k<addressArr.length;k++)
	{
		addressArr[k]["ADDRESS_LINE_1"]=addressArr[k]["ADDRESS_LINE_1"].replace("/"," ");
		suburbArr[k]["NAME"]=suburbArr[k]["NAME"].replace("/"," ");
		cityArr[k]["CITY_NAME"]=cityArr[k]["CITY_NAME"].replace("/"," ");
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
	$(document).on('keyup','#inputAddress1',function(e){
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
			$("#inputAddress1").autocomplete({
				source:viewArr,
				select: function(event,ui){
				// alert(ui.item.index);
				let finalObj=useArr.filter(element=>element.locationId==ui.item.index);
				//console.log(finalObj);
				$("#inputSuburb1").val(finalObj[0].address.district);
				$("#inputCity1").val(finalObj[0].address.city);
				$("#inputZip1").val(finalObj[0].address.postalCode);
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
	$('#mainf').on('click','.classRemove', function(event) {
		event.preventDefault();
		let numToDelete=$(this).attr("name");
		$("#MRemove").text("Are you sure you want to remove Address?");
		$("#deleteModal").modal("show");
		$("#btnRemove").on("click",function(t){
			t.preventDefault();
			$.ajax({
				url:'PHPcode/customercode.php',
				type:'POST',
				data:{choice:5,customerID:cusID,addressID:addressArr[numToDelete-1]["ADDRESS_ID"]}
			})
			.done(data=>{
				console.log(data);
				if(data="True")
				{
					$('#address'+numToDelete).remove();
					count--;
					$("#btn-add-address").removeAttr('disabled','');
				}
			});
			
		});
	});
	$('#mainf').on('click','.btn-remove-address', function(event) {
		event.preventDefault();
		let numToDelete=$(this).attr("name");
		$('#address'+numToDelete).remove();
		count--;
		$("#btn-add-address").removeAttr('disabled','');
	});
	$("#btnSave").on('click',function(e){
		e.preventDefault();
		let arr=getInput();
		console.log(count);
		console.log(arr["title"]);
		let form=$('#mainf');
		form.validate();
		if(form.valid()===false)
		{
			e.stopPropagation();
		}
		else
		{
			let arr=getInput();
			$.ajax({
				url: 'PHPcode/customercode.php',
				type: 'POST',
				data: {choice:2,ID:cusID,num:count,name:arr["name"],vat:arr["VS"],contact:arr["con"],email:arr["email"],address:arr["address"],suburb:arr["suburb"],city:arr["city"],zip:arr["zip"],customer_type:customerTypeID,status:arr["status"],title:arr["title"]} 
			})
			.done(data=>{
				console.log(data);
				let doneData=data.split(",");
				console.log(doneData);
				if(doneData[0]=="T")
				{
					$("#MMessage").text(doneData[1]);
					$("#btnClose").attr("onclick","window.location='../../customer.php'");
					$("#displayModal").modal("show");
				}
				else
				{
					$("#MMessage").text(doneData[1]);
					$("#btnClose").attr("data-dismiss","modal");
					$("#displayModal").modal("show");
				}
			});
		}
		
	});
});