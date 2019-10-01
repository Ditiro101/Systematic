$(document).ready(function(){
    $("#sendEmail").on("submit",function(e){
        e.preventDefault();

        let emailSent = $("#email").val();
        //console.log(emailSent);
            $.ajax({
                url:'../mailjet/mail_password.php',
                type:'post',
                data:{email:emailSent}
            })
            .done(function(data)
                {

                    console.log(data);
                    let confirm = data.trim(); 
                    if(confirm =="success")
                    {
                        $("#modal-title-default").text("Success!");
                        $("#modalText").text("Reset password link sent. Check your email");
                        $("#successfullyChanged").modal("show");

                      // window.location = `PHPcode/generatePasswordLink.php?email='${emailSent}'`;
                        
                       
                       
                    }
                    else if(confirm.includes("No user is registered with this email address!"))
                    {
                        $('#alert-sendEmail').empty();
                        $('#alert-sendEmail').append("<div class='alert alert-danger' role='alert'><span class='alert-inner--text'><strong>No user is registered with this email address! Error sending email!</strong> </span></div>");    
                    }
                    else if(confirm.includes("Email not inputted correctly! , please input email again!"))
                    {
                        $('#alert-sendEmail').empty();
                        $('#alert-sendEmail').append("<div class='alert alert-danger' role='alert'><span class='alert-inner--text'><strong>Email not inputted correctly! , please input email again!</strong> </span></div>");    
                    }
                    else
                    {
                        $('#alert-sendEmail').empty();
                        $('#alert-sendEmail').append("<div class='alert alert-danger' role='alert'><span class='alert-inner--text'><strong>Error sending email!</strong> </span></div>");    
                    }
                    
                
            });
     
    });
});