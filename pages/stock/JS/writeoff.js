$(()=>{

	$.ajax({
		url:'PHPcode/stockcode.php',
		type:'POST',
		data:{choice:1}
	})
	.done(warehouseDetails=>{
		warehouse=JSON.parse(warehouseDetails);
		console.log(warehouse);
		let arr = JSON.parse(warehouseDetails);
			//console.log(arr);
			let tableEntries="";
			let formView="";
			let formEdit="1"
			for(let k=0;k<arr.length;k++)
			{
				tableEntries+="<option name='"+arr[k]["WAREHOUSE_ID"]+"''>"+arr[k]["NAME"]+"</option>";
			}

			$('#options').append(tableEntries);
	});



});