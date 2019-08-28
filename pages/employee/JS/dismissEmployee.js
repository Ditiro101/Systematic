$(document).ready(function(){
    console.log("Catch all these errors");
    $("#deleteButton").click(function(e){
        e.preventDefault();


            let employeeID = $("#EMPLOYEE_ID").val();
            let dismissalReason = $("#reasonOFDismissal").val();
      
            $.ajax({
                url:'PHPcode/dismissEmployee-SQL.php',
                type:'post',
                data:{employee_ID:employeeID, reason:dismissalReason},
                success:function(data)
                {

                    console.log(data);
                    let confirmation = data.trim();
                    if(confirmation=="success")
                    {
                        $("#modal-title-defaultDismiss").text("Success!");
                        $("#modalTextDismiss").text("Employee successfully dismissed");
                        $("#btnCloseDismiss").attr('onclick',"window.location='../../employee.php'");
                        $("#dismissEmployeeSuccess").modal("show");
                    }
                    else if(confirmation == "Could not change employee status")
                    {
                        $("#modal-title-defaultDismiss").text("Error!");
                        $("#modalTextDismiss").text("Employee could not be dismissed , due to error in system , please try again");
                        $("#dismissEmployeeSuccess").modal("show");
                    }
                    else
                    {
                        $("#modal-title-defaultDismiss").text("Error!");
                        $("#modalTextDismiss").text("Employee could not be dismissed , due to error in system , please try again");
                        $("#dismissEmployeeSuccess").modal("show");
                    }
                },
            });
        
        

    });
});