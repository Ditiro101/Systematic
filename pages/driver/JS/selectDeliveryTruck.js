var assignments;
var assignmentProducts;
var truckID;
let buildTruck=function()
{
	for(let k=0;k<assignments.length;k++)
	{
		if(k==0)
		{
			truckID=assignments[k]["TRUCK_ID"];
		}
		let dW=$("#truckSelect");
		let wOption=$("<option></option>").addClass("classDestination");
		// let id="d"+num;
		// wOption.attr("id",id);
		wOption.attr("name",assignments[k]["TRUCK_ID"]);
		wOption.text(assignments[k]["REGISTRATION_NUMBER"]+"|"+assignments[k]["TRUCK_NAME"]+"|"+assignments[k]["CAPACITY"]+" Tonnes");
		dW.append(wOption);	
	}
}
$(()=>{
	assignments=JSON.parse($("#mTrucks").text());
	assignmentProducts=JSON.parse($("#pTrucks").text());
	buildTruck();
	let filterArr=assignmentProducts.filter(element=>element["TRUCK_ID"]==truckID);
	let filterAssignmentArr=assignments.filter(element=>element["TRUCK_ID"]==truckID);
	$("#a1").val(JSON.stringify(filterArr));
	$("#a2").val(JSON.stringify(filterAssignmentArr));

});