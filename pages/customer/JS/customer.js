$(()=>{
	
	jQuery.validator.setDefaults({
  		debug: true,
  		success: "valid"
	});


	$("#btn-submit-register-org").on('click',function(e){
		e.preventDefault();
		let form=$('#form-register-org');
		form.validate();
		//element.valid();
		if(form.valid()===false)
		{
			e.stopPropagation();
		}
		else
		{

		console.log("working");

        var email = $("#email-rog").val().trim();
        var name = $("#name-org").val().trim();
        var vat = $("#vat").val().trim();
        var number = $("#number-org").val().trim();
        var adrress1= $("#address1-org").val().trim();
        var adrress2= $("#address2-org").val().trim();
        var suburb = $("#suburb-org").val().trim();
        var city = $("#city-org").val().trim();
        var zip = $("#zip-org").val().trim();
        


        if( email != "" && password != "" ){
           
            $.ajax({
                url:'register_.php',
                type:'post',
                data:{name:name,email:email,vat:vat,number:number,address1:address1,adrress2:adrress2,suburb:suburb,city:city,zip:zip},
                success:function(response){
                    if(response=="success"){
                       alert("success"); 
                    }
                    else{
                    	alert("failed");
                         //$("<tr></tr>").append($("<td></td>").html(`Assignment ${element['number']}`),($("<td></td>").html(element["mark"])));
                        //$('#alert-login').append("<div class='alert alert-danger' role='alert'><span class='alert-inner--text'><strong> Failed!</strong> </span></div>"); 
                        
                    }
                       
              
                }
             

            });
        }

		}
	});
});