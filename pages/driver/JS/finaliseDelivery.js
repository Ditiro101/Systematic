var assignments;
var assignmentProducts;
$(()=>{
	assignments=JSON.parse($("#aData").text());
	//assignmentProducts=JSON.parse($("#apData").text());
	let id=assignments[0]["DELIVERY_ID"];
});