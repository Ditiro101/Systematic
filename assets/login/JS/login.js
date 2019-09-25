$(document).ready(function(){
    $("#login_button").click(function(e){
        e.preventDefault();

        var email = $("#email").val().trim();
        var password = $("#password").val().trim();

        
        if( email != "" && password != "" )
        {
            $.ajax({
                url:'assets/login/PHPcode/login.php',
                type:'post',
                data:{email:email, password:password},
                beforeSend: function(){
                    $('.loadingModal').modal('show');
                },
                complete: function(){
                    $('.loadingModal').modal('hide');
                },
                success:function(response)
                {
                    $('.loadingModal').modal('hide');
                    console.log(response);
                    if(response=="success")
                    {
                        window.location = "dashboard.php"; 
                    }
                    else if(response == "user does not exist")
                    {
                        $('#alert-login').append("<div class='alert alert-danger py-2' role='alert'><span class='alert-inner--text'>User does not exist, please re-enter email!</span></div>");    
                    }
                    else if(response == "password incorrect")
                    {
                        $('#alert-login').append("<div class='alert alert-danger py-2' role='alert'><span class='alert-inner--text'>Password incorrect!</span></div>");    
                    }
                    else
                    {
                        $('#alert-login').empty();
                        $('#alert-login').append("<div class='alert alert-danger' role='alert'><span class='alert-inner--text'><strong>Login failed!</strong> </span></div>");    
                    }
                },
            });
        }
        else
        {
            $('#alert-login').empty();
            if(password=="" && email==""){
                $('#alert-login').append("<div class='alert alert-sm alert-danger' role='alert'><span class='alert-inner--text'><strong>Please enter email & password!</strong> </span></div>"); 
            }
            else if(password==""){
                $('#alert-login').append("<div class='alert alert-sm alert-danger' role='alert'><span class='alert-inner--text'><strong>Please enter password!</strong> </span></div>"); 
            }
            else if(email==""){
                $('#alert-login').append("<div class='alert alert-danger' role='alert'><span class='alert-inner--text'><strong>Please enter email!</strong> </span></div>");
            }          
        }

    });
});