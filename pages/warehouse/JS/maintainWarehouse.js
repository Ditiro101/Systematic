let getVals=function()
{
	let arr=[];
	arr["ID"]=$("#wID").text();
	arr["name"]=$("#warehouseName").val();
	arr["des"]=$("#wDes").val();
	arr["max"]=$("#wMax").val();
	return arr;
}
///////////////////////
$(()=>{
	jQuery.validator.setDefaults({
  		debug: true,
  		success: "valid"
	});
	let wName=$('#wName').text();
	let wDes=$("#des").text();
	$("#wDes").attr("value",wDes);
	$("#warehouseName").attr("value",wName);
	$("#btnSave").on('click',function(e){
		e.preventDefault();
		let form=$("#mainf");
		form.validate();
		if(form.valid()===false)
		{
			e.stopPropagation();
		}
		else
		{
			let arr=getVals();
			$.ajax({
				url:'PHPcode/warehousecode.php',
				type:'POST',
				data:{choice:2,ID:arr["ID"],name:arr["name"],description:arr["des"],max:arr["max"]}
			})
			.done(data=>{
				let doneData=data.split(",");
				if(doneData[0]=="T")
				{
					$("#MMessage").text(doneData[1]);
					$("#btnClose").attr("onclick","window.location='../../warehouse.php'");
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