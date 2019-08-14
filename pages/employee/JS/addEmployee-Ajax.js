$(document).ready(function(){
    $("#picToUpload").on("submit",function(e){//use ID of the form
        e.preventDefault();

        
        /*var form = $('#picToUpload')[0];
        var file = new FormData(form);


        jQuery.each(jQuery('#picToUpload')[0].files, function(i, f) {
            file.append('file[]', f);
        });
        
        console.log("hey");
        console.log(file);

        var name = $("#employeeName").val().trim();
        var surname = $("#employeeSurname").val().trim();
        var contactNumber =  $("#contactNumber").val().trim();
        console.log(name);
        let norMalfile = $("#UploadsPic").val();
        console.log(norMalfile);*/

        //let info = {employeeName: name, employeeSurname:surname , employeeNumber: contactNumber };
            $.ajax({
                url:'PHPcode/addEmployee-SQL.php',
                type:'post',
                data:new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success:function(data)
                {
                    console.log(data);
                }
            });
           /* .done(function(response) {
                //return success of saving the data , retuned Employee_ID
                   console.log(response);
                    if(response == "")
                    {
                        console.log(response+ "was saved as well");
                    }
                    else if(response == "")
                    {
                        console.log(response + "was saved as well");
                    }
                    else
                    {
                        console.log(response + "was saved as well");
                        //return data;
                    }
                   
                });
            /*.then(function(details) {
                
                console.log(details);
                console.log("hey");
                let fileDetails = {employeeID: details, picToUpload:norMalfile};
                $.ajax({
                    type: "POST",
                    //enctype: 'multipart/form-data',
                    url: 'PHPcode/Picture Upload/imageValidator.php',
                    data:fileDetails,
                    //
                    //timeout: 600000,
                    success:function(data)
                    {
    
                        console.log(data);
                        if(data=="successfully saved picture")
                        {
                            //window.location = "dashboard.php"; 
                            console.log(data);
                        }
                        else
                        {
                           /* $('#alert-login').empty();
                            $('#alert-login').append("<div class='alert alert-danger' role='alert'><span class='alert-inner--text'><strong>Login failed!</strong> </span></div>");  */
                         /*   console.log("Could not upload pictures");  
                        }
                    },
            });*/
        
        });
    

    });
