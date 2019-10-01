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
		    beforeSend: function(){
		            $('.loadingModal').modal('show');
		     },
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                console.log(data);
                $('.loadingModal').modal('hide');
                if(data=="success"){
                	console.log("success");
            		$('#modal-title-default2').text("Success!");
					$('#modalText').text("Customer credit limit successfully updated");
					$('#animation').html('<div style="text-align:center;"><div class="checkmark-circle"><div class="background"></div><div class="checkmark draw" style="text-align:center;"></div></div></div>');
					$("#modalHeader").css("background-color", "#1ab394");
					$('#successfullyAdded').modal("show");
					$("#btnClose").attr("onclick","window.location='search.php'");
					$("#displayModal").modal("show");
                }
                else{
					$('#modal-title-default2').text("Error!");
					$('#modalText').text("Email Failed Sent, Please check email credits");
					$('#animation').html('<div class="crossx-circle"><div class="background"></div><div style="position: relative;"><div class="crossx draw" style="text-align:center; position: absolute !important;"></div><div class="crossx2 draw2" style="text-align:center; position: absolute !important;"></div></div></div>');
					$("#modalHeader").css("background-color", "red");
					$('#successfullyAdded').modal("show");
					$("#btnClose").attr("data-dismiss","modal");
					$("#displayModal").modal("show");
                	console.log("failed");
                }
       
              }           
        });
    }));
    
	




});