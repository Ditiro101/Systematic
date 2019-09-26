let getVals=function()
{
	let arr=[];
	arr["ID"]=$("#rTID").text();
	arr["registration"]=$("#registration").val();
	arr["name"]=$("#tName").val();
	arr["capacity"]=$("#tCapacity").val();
	if($("#activeStatus").prop("checked")==true)
	{
		arr["active"]=1;
	}
	else
	{
		arr["active"]=0;
	}
	return arr;
}
///////////////////////
$(()=>{
	jQuery.validator.setDefaults({
  		debug: true,
  		success: "valid"
	});
	let active=$("#rActive").text();
	let truckName=$('#rTName').text();
	$("#tName").attr("value",truckName);
	if(active=="1")
	{
		$("#activeStatus").attr("checked","true");
	}
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
				url:'PHPcode/truckcode.php',
				type:'POST',
				data:{choice:2,ID:arr["ID"],registration:arr["registration"],name:arr["name"],capacity:arr["capacity"],active:arr["active"]}
			})
			.done(data=>{
				let doneData=data.split(",");
				if(doneData[0]=="T")
				{
<<<<<<< HEAD

					//place changes variable her and user id here
					//initialize changes
					let changes="";
					if(beforeVals["registration"]!=arr["registration"]){
						changes=changes+"Registration:"+beforeVals["registration"];
					}
					if(beforeVals["name"]!=arr["name"]){
						changes=changes+" name:"+beforeVals["name"];
					}
					if(beforeVals["capacity"]!=arr["capacity"]){
						change=changes+" capacity:"+beforeVals["capacity"];
					}
					if(beforeVals["active"]!=arr["active"]){
						change=changes+"status:"+beforeVals["active"];
					}

					createAudit(changes);

=======
>>>>>>> parent of a18baf0... Merge branch 'feature-Rangy' into feature-Tshepo
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