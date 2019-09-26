$(document).ready(function(){
    $("#deleteButton").click(function(e){
        e.preventDefault();


            let employeeID;
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
                        $("modal-title-default").text("Success!");
                        $("modalText").text("Employee successfully dismissed");
                        $("#btnClose").attr('onclick',"window.location='../../employee.php'");
                        $("dismissEmployeeSuccess").modal("show");
                    }
                    else if(confirmation == "Could not change employee status")
                    {
                        $("modal-title-default").text("Error!");
                        $("modalText").text("Employee could not be dismissed , due to error in system , please try again");
                        $("dismissEmployeeSuccess").modal("show");
                    }
                    else
                    {
                        $("modal-title-default").text("Error!");
                        $("modalText").text("Employee could not be dismissed , due to error in system , please try again");
                        $("dismissEmployeeSuccess").modal("show");
                    }
                },
            });
        
        

    });
});