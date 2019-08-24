let getVals=function()
{
	let arr=[];
	arr["registration"]=$("#registration").val();
	arr["name"]=$("#tName").val();
	arr["capacity"]=$("#tCapacity").val();
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
			url:'PHPcode/truckcode.php',
			type:'POST',
			data:{choice:1,registration:arr["registration"],name:arr["name"],capacity:arr["capacity"]}
			})
			.done(data=>{
				let doneData=data.split(",");
				if(doneData[0]=="T")
				{
					$("#MMessage").text(doneData[1]);
					$("#btnClose").attr("onclick","window.location='../../delivery_collection.php'");
					$("#displayModal").modal("show");
				}
				else
				{
					$("#MMessage").text(doneData[1]);
					$("#btnClose").attr("data-dismiss","modal");
					$("#displayModal").modal("show");
				}
			});


			//place changes variable her and user id here
			let changes="Name/Ben,Number/079545522";
			let user_id="1";
			$.ajax({
			url:'../admin/PHPcode/audit_log.php',
			type:'POST',
			data:{Functionality_ID:10,changes:changes,user_id:user_id} //functionality id needs to be included
			})
			.done(data=>{
				if(data=="success"){
					alert("success");
				}
				else{
					alert("failure");
				}
			
			});



		}
		
	});



});