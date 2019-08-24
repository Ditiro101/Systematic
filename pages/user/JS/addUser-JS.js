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
                if ($('#inputPassword1').val() == $('#inputPassword2').val()) {
                  $('#alert-message').html('Passwords match').css('color', 'green');
                } else 
                  $('#alert-message').html('Passwords do not match').css('color', 'red');
              });

            $("#addUserSave").on('submit',function(e)
                {
                    $.ajax({
                        url:"PHPcode/addUser-SQL.php",
                        type:'POST',
                        data:{choice:1}
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

                });


});