
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

					//place changes variable her and user id here
					let changes="";
					let user_id=1;
					let Sub_Functionality_ID=10.7;
					$.ajax({
					url:'../admin/PHPcode/audit_log.php',
					type:'POST',
					data:{Sub_Functionality_ID:Sub_Functionality_ID,changes:changes} //functionality id needs to be included
					})
					.done(data=>{
						if(data=="success"){
							alert("success");
						}
						else{
							alert(data);
						}
					
					});

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






		}
		
	});



});