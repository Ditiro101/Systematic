$(document).ready(function(){
    $("#SavingDetails").click(function(e){
        e.preventDefault();

        
        var form = $('#picToUpload')[0];
        var file = new FormData(form);
        
        var name = $("#employeeName").val().trim();
        var surname = $("#employeeSurname").val().trim();
        var contactNumber =  $("#contactNumber").val().trim();
        //let file = $("#picToUpload").val();

        let info = {employeeName: name, employeeSurname:surname , employeeNumber: contactNumber };
            $.ajax({
                url:'../PHPcode/addEmployee-SQL.php',
                type:'post',
                data:info
            })
            .then(function(data) {
                //return success of saving the data , retuned Employee_ID
                   
                    if(data == "")
                    {
                        console.log(data + "was saved as well");
                    }
                    else if(data == "")
                    {
                        console.log(data + "was saved as well");
                    }
                    else
                    {
                        console.log(data + "was saved as well");
                        return data;
                    }
                   
                })
            .then(function(data) {
                
                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: '..PHPcode/Picture Upload/imageValidator.php',
                    response:{employee_ID:data ,picToUpload :file},
                    processData: false,
                    contentType: false,
                    //cache: false,
                    //timeout: 600000,
                    success:function(response)
                    {
    
                        console.log(response);
                        if(response=="success")
                        {
                            //window.location = "dashboard.php"; 
                            console.log(response);
                        }
                        else
                        {
                           /* $('#alert-login').empty();
                            $('#alert-login').append("<div class='alert alert-danger' role='alert'><span class='alert-inner--text'><strong>Login failed!</strong> </span></div>");  */
                            console.log("Could not upload pictures");  
                        }
                    },
            });
        
        });
    

    });
});