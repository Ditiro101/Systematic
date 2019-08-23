$(document).ready(function(){
    $("#login_button").click(function(e){
        e.preventDefault();


            let user_id;
            let arrival;
            let depature;
        
        
            $.ajax({
                url:'PHPcode/changeTime-SQL.php',
                type:'post',
                data:{userID:user_id,checkin:arrival,checkout:depature},
                success:function(response)
                {

                    console.log(response);
                    if(response=="success")
                    {
                        window.location = "dashboard.php"; 
                    }
                    else
                    {
                        $('#alert-login').empty();
                        $('#alert-login').append("<div class='alert alert-danger' role='alert'><span class='alert-inner--text'><strong>Login failed!</strong> </span></div>");    
                    }
                },
            });
      

    });
});