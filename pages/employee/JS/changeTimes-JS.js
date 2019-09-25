$(document).ready(function(){
    $("#saveChangedTime").click(function(e){
        e.preventDefault();


            let user_id = $("#user_id").val();
            let arrival = $("#checkin").val();
            let depature = $("#checkout").val();

            console.log(arrival);
            console.log(depature);
        
            
            $.ajax({
                url:'PHPcode/changeTime-SQL.php',
                type:'post',
                data:{userID:user_id,checkin:arrival,checkout:depature},
                success:function(data)
                {

                    console.log(data);
                    let confirmation = data.trim();
                    if(confirmation != "Failure")
                    {
                        $("#modal-title-default").text("Success!");
                        $("#modalText").text(confirmation);
                        $("#btnClose").attr("onclick","window.location='../../employee.php'");
                        $("#changeTimeSuccess").modal("show");
                    }
                    else
                    {
                        $("#modal-title-default").text("Error!");
                        $("#modalText").text("Database Error , please try again or contact help");
                       
                        $("#changeTimeSuccess").modal("show");
                    }
                },
            });
      

    });
});