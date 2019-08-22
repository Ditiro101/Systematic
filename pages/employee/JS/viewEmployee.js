$(()=>{
	let eAddr=$("#eAddress").text();
	let changedAddress=eAddr.replace(" ","/");
	console.log(eAddr);
	console.log(changedAddress);
	$("#ADDR").val(changedAddress);
});