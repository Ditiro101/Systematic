$(document).ready(function(){

    $.ajax({
        url:'PHPcode/finalise_delivery_.php',
        type:'post',
        data:{email:email,password:password},
        success: function(response)
        {
        	console.log(response);
        	$('#alert-login').append("");
        },
    });
});
