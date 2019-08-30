$(()=>{
	let eAddr=$("#eAddress").text();
	let changedAddress=eAddr.replace(" ","/");
	let changedSuburb=$("#eSuburb").text().replace(" ","/");
    let changedCity=$("#eCity").text().replace(" ","/");
	$("#ADDR").val(changedAddress);
    $("#SUBURB").val(changedSuburb);
    $("#CITY").val(changedCity);
    $("#EMPLOYEE_TYPE_NAME").val($("#eEmployeeTypeName").text().replace(" ","/"));



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
            if(confirmation== "success")
            {
                $("#modal-title-default").text("Success!");
                $("#modalText").text("Empoyee tag is being generated...");
                $("#btnClose").attr("onclick","window.location='../../employee.php'");
                $("#displayModal").modal("show");
            }
            else if(confirmation == "Employee Exists!")
            {
                $("#modal-title-default").text("Error!");
                $("#modalText").text("Employee Exists! , press close and try again");
               
                $("#displayModal").modal("show");
            }
            else if(confirmation == "City found suburb added but address not added.")
            {
                $("#modal-title-default").text("Error!");
                $("#modalText").text("City found suburb added but address not added.");
                $("#displayModal").modal("show");
            }
            else if(confirmation == "error in saving employee pic or generated employee tag")
            {
                $("#modal-title-default").text("Error!");
                $("#modalText").text("error in saving employee pic or generated employee tag");
                $("#displayModal").modal("show");
            }
            else if(confirmation == "Couldnt get ID of employee details")
            {
                $("#modal-title-default").text("Error!");
                $("#modalText").text("Couldnt get ID of employee details");
                $("#displayModal").modal("show");
            }
            else
            {
                
                $("#modal-title-default").text("Error!");
                $("#modalText").text("Couldnt insert details");
                $("#displayModal").modal("show");
            }
          
        });
    });
    



});