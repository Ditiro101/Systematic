$(document).ready(function(){
    $("#setPassword").on("submit",function(e){
        e.preventDefault();

        let newPassword = $("#newPassword").val();
        let confirmPassword = $("#confirmPassword").val();
        let userkey = $("#key").val();
        let user_ID = $("#userID").val();
        let user_action= $("#actionToTake").val();
        console.log(user_ID);
        console.log(newPassword);
        console.log(userkey);
        let changeInfo = {newpass:newPassword,confirmpass:confirmPassword,key:userkey, userID:user_ID,action:user_action};

        //console.log(emailSent);
            $.ajax({
                url:'PHPcode/resetPassword-SQL.php',
                type:'post',
                data:changeInfo
            })
            .done(function(data)
                {

                    console.log(data);
                    /*if(data=="success")
                    {
                       window.location = `PHPcode/generatePasswordLink.php?email='${emailSent}'`; 
                    }
                    else
                    {
                        $('#alert-password').empty();
                        $('#alert-password').append("<div class='alert alert-danger' role='alert'><span class='alert-inner--text'><strong>Error sending email!</strong> </span></div>");    
                    }*/
                
            });
     
    });
});