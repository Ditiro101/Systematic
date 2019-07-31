$(document).ready(function(){
    $("#login_button").click(function(e){
        e.preventDefault();

        var email = $("#email").val().trim();
        var password = $("#password").val().trim();

         
        if( email != "" && password != "" ){
            console.log(email);
            $.ajax({
                url:'login.php',
                type:'post',
                data:{email:email,password:password},
                success:function(response){
                        console.log("success");
                        //window.location = "dashboard.html";
              
                }

            });
        }
    });
});