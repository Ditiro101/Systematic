$(()=>{
	var CUSTOMER_ID=$('#ID').attr('value');
	console.log(CUSTOMER_ID);
	$.ajax({
		url: 'PHPcode/customerAccount.php',
		type: 'POST',
		data: {customerID:CUSTOMER_ID} 
	})
	.done(data=>{
		if(data!="False")
		{
			let arr=JSON.parse(data);
			console.log(arr);
			$('#acc').append("<td>"+arr["ACCOUNT_NO"]+"</td>");
			$('#balance').append("<td class='text-right'>"+arr["BALANCE"]+"</td>");
			$('#limit').append("<td class='text-right'>"+arr["CREDIT_LIMIT"]+"</td>");

			//$("#tBody").append(tableEntries);
			
		}
		else
		{
			alert("Error");
		}
	});




	

    $("#limit-form").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "PHPcode/updateLimit.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                console.log(data);
                if(data=="success"){
                	console.log("success");
                	$("#modal-succ").modal("show");
                }
                else{
               
                	console.log("failed");
                }
       
              }           
        });
    }));
    
	




});