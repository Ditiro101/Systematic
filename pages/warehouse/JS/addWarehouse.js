let getVals=function()
{
	let arr=[];
	arr["name"]=$("#wName").val();
	arr["des"]=$("#wDes").val();
	arr["max"]=$("#wMax").val();
	return arr;
}

$(()=>{
	jQuery.validator.setDefaults({
  		debug: true,
  		success: "valid"
	});
	$("#btnSave").on('click',function(e){
		e.preventDefault();
		let form=$('#mainf');
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
			data:{choice:1,name:arr["name"],description:arr["des"],max:arr["max"]}
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


