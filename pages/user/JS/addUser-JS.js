$(document).ready(function()
{
            jQuery.validator.setDefaults({
                debug: true,
                success: "valid"
            });

            
            $.ajax({
                url:"PHPcode/addUser-SQL.php",
                type:'POST',
                data:{choice:0}
            })
            .done(data=>{
                if(data!="False")
                {
                    let arr=JSON.parse(data);
                    let tableEntries="";
                    for(let k=0;k<arr.length;k++)
                    {
                    let entry=$("<option></option>").attr("name",arr[k]["ACCESS_LEVEL_ID"]);
                    entry.text(arr[k]["ROLE_NAME"]); 
                    $("#aLevel").append(entry);
                    }   
                }
                else
                {
                    alert("Error");
                }
            });

            $('#inputPassword1, #inputPassword2').on('keyup', function () {

                if($('#inputPassword2').val() != null)
                {

                        if ($('#inputPassword1').val() != $('#inputPassword2').val()) 
                        {
                            // $('#alert-message').html('Passwords match').css('color', 'green');
                            $('#alert-message').html(" <div class='alert alert-danger' role='alert' ><span class='alert-inner--text' ><strong>Passwords do not match</strong></span></div>");
                        } 
                        else 
                        {
                            $('#alert-message').html(" <div class='alert alert-success' role='alert' ><span class='alert-inner--text' ><strong>Passwords match</strong></span></div>");
                        }
                }
                  
              });

            $("#addUserSave").on('submit',function(e)
                {
                    let accessLevelID = parseInt($("#aLevel option:selected").attr("name"));;
                    let username = $("#inputUsername").val();
                    let password = $("#inputPassword1").val();
                    let employeeID = $("#employee_ID").val();
                
    
                    let userStatus = 1;//Active
                    $.ajax({
                        url:"PHPcode/addUser-SQL.php",
                        type:'POST',
                        data:{choice:1 , accessLevel:accessLevelID , email:username , pass:password , userStatusID :userStatus}
                    })
                    .done(data=>{

                        if(data=="success")
                        {
                           
                        }
                        else
                        {
                            alert("Error");
                        }
                    });

                });


});