$(()=>{
	let eAddr=$("#eAddress").text();
	let changedAddress=eAddr.replace(" ","/");
	let changedSuburb=$("#eSuburb").text().replace(" ","/");
    let changedCity=$("#eCity").text().replace(" ","/");
	$("#ADDR").val(changedAddress);
    $("#SUBURB").val(changedSuburb);
    $("#CITY").val(changedCity);
    $("#EMPLOYEE_TYPE_NAME").val($("#eEmployeeTypeName").text().replace(" ","/"));

    let wageEarning=$("#wager").val();
    console.log(wageEarning);
    if(wageEarning)
    {
        $("#ShowDiv").attr("hidden",false);
    }
    else
    {
        $("#ShowDiv").attr("hidden",true);
    }

	$("#btnClick").click(function(e)
    {//use ID of the form
        e.preventDefault();
		let id = $("#employee_ID").text().trim();
		let employeeID=parseInt(id);
		
        console.log(employeeID);
        $.ajax({
            url:'PHPcode/regenerateEmployeeTag-SQL.php',
            type:'POST',
            data: {employee_ID:employeeID} 
        })
        .done(data=>{
            console.log(data);
            let confirmation = data.trim();
            $("#displayModal").modal("hide");
            
            if(confirmation.includes("Employee does not earn wage"))
            {
                $("#modal-title-default").text("Error!");
                $("#modalText").text("Employee does not earn wage , thus an employee tag is not generated.");
               
                $("#displayModal").modal("show");

                $("#btnClose").click(function(e) {

                                    e.preventDefault();
                                   
                                    window.location=`../../employee.php`;
                                });

            }
            else if(confirmation.includes("success") && !confirmation.includes("Employee does not earn wage"))
            {
                let id = confirmation.split(",");
                let employeeID = parseInt(id[0]);
                console.log(id[0]);

                $("#modal-title-default").text("Success!");
                $("#modalText").text("Generating empoyee tag...");
                $("#displayModal").modal("show");

                setTimeout(function(){
                    $('#displayModal').modal("hide");
                    callTwo(employeeID);
                }, 2000);

                  

                
               // window.open(`PHPcode/showGeneratedQRCode.php?employeeID=${employeeID}`, '_blank');
            }
            else if(confirmation.includes("Couldnt regenerate employee tag!"))
            {
                $("#modal-title-default").text("Error!");
                $("#modalText").text("Couldnt regenerate employee tag! , press close and try again");
               
                $("#displayModal").modal("show");
            }
            else if(confirmation.includes("Could not find name and surname of worker"))
            {
                $("#modal-title-default").text("Error!");
                $("#modalText").text("Database Error.");
                $("#displayModal").modal("show");
            }
            else
            {
                
                $("#modal-title-default").text("Error!");
                $("#modalText").text("Database Error");
                $("#displayModal").modal("show");
            }
          
        });
    });




    $("#checkIn").click(function(e)
    {//use ID of the form
        e.preventDefault();
		let id = $("#employee_ID").text().trim();
		let employeeID=parseInt(id);
		
        console.log(employeeID);
        $.ajax({
            url:'PHPcode/verifyQRcode.php',
            type:'POST',
            data: {qrCode:employeeID}
        })
        .done(data=>{
            console.log(data);
            let confirmation = data.trim();
            if(confirmation.includes("success"))
            {
                $("#modal-title-default").text("Success!");
                $("#modalText").text("Employee Successfully checked-in");
                $("#btnClose").attr("onclick","window.location='../../employee.php'");
                $("#displayModal").modal("show");
            }
            else if(confirmation.includes("Over checkout time"))
            {
                $("#modal-title-default").text("Error!");
                $("#modalText").text("Cannot check-in , checkout time has passed");
               
                $("#displayModal").modal("show");
            }
            else if(confirmation.includes("Already Checked-in!"))
            {
              $('#modal-title-default').text("Warning!");
              $('#modalText').text("Already Checked-in!!");
              $('#displayModal').modal("show");
            }
            else
            {
              $('#modal-title-default').text("Error!");
              $('#modalText').text("Database Error!");
              $('#displayModal').modal("show");
            }
           
        });
    });


    $("#checkOUT").click(function(e)
    {//use ID of the form
        e.preventDefault();
		let id = $("#employee_ID").text().trim();
		let employeeID=parseInt(id);
		
        console.log(employeeID);
        $.ajax({
            url:'PHPcode/checkOut-SQL.php',
            type:'POST',
            data: {qrCode:employeeID}
        })
        .done(data=>{
            console.log(data);
            let confirmation = data.trim();
            if(confirmation.includes("success"))
            {
                $("#modal-title-default").text("Success!");
                $("#modalText").text("Employee Successfully checked out");
                $("#btnClose").attr("onclick","window.location='../../employee.php'");
                $("#displayModal").modal("show");
            }
            else if(confirmation.includes("Too early to checkout"))
            {
              $('#modal-title-default').text("Error!");
              $('#modalText').text("Check in first");
              $('#displayModal').modal("show");
            }
            else 
            {
              $('#modal-title-default').text("Error!");
              $('#modalText').text("Database Error!");
              $('#displayModal').modal("show");
            }
           
        });
    });


    $("#wageCalc").click(function(e)
    {//use ID of the form
        e.preventDefault();
		let id = $("#employee_ID").text().trim();
		let employeeID=parseInt(id);
		
        console.log(employeeID);
        $.ajax({
            url:'PHPcode/collect_wage_scanner.php',
            type:'POST',
            data: {qrCode:employeeID}
        })
        .done(data=>{
            console.log(data);
            let confirmation = data.trim();
            if(confirmation.includes("success"))
            {
                $("#modal-title-default").text("Success!");
                $("#modalText").text("Employee found , wage will be calculated on next screen...");
                //$("#btnClose").attr("onclick",`window.location=wage_calc.php?employeeID='${employeeID}'`);
                $("#displayModal").modal("show");

                   $("#btnClose").click(function(e) {

                                    e.preventDefault();
                                   
                                    window.location=`wage_calc.php?employeeID='${employeeID}'`;
                                });
            }
            else if(confirmation != "success")
            {
              $('#modal-title-default').text("Error!");
              $('#modalText').text(confirmation);
              $('#scannerSearch').modal("show");
            }
           
        });
    });
    




function callTwo(EMPLOYEE_ID){
    
        //var URL = "invoice/invoice.php";
        //window.open(URL, '_blank');
        var form="<form target='_blank' action='PHPcode/showGeneratedQRCode.php' id='sendTagInfo' method='GET'><input type='hidden' name='employeeID' value='"+EMPLOYEE_ID+"'>"+"</form>";
    
        $("body").append(form);
        $( "#sendTagInfo" ).submit();
        location.reload();

      
    }


});


