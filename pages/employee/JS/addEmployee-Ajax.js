let getVals = function()
{
    let name=$("#employeeName").val().trim();
    let surname=$("#employeeSurname").val().trim();
    let title=$("#eTitle option:selected").text();
    let titleID=1;
    if(title=="Ms")
    {
        titleID=2;
    }
    else if(title=="Mrs")
    {
        titleID=3;
    }
    let contact=$("#contactNumber").val().trim();
    let email=$("#employeeEmail").val().trim();
    let addressArr=$("#inputAddress").val().trim().split(",");
    let address=addressArr[0];
    let suburb=$("#inputSuburb").val().trim();
    let city=$("#inputCity").val().trim();
    let zip=$("#inputZip").val().trim();
    let employeeType=parseInt($("#eType option:selected").attr("name"));
    let employeeIDPass=$("#eID").val().trim();

    let addEmployeeArr=[];
    addEmployeeArr["name"]=name;
    addEmployeeArr["surname"]=surname;
    addEmployeeArr["title"]=titleID;
    addEmployeeArr["email"]=email;
    addEmployeeArr["contact"]=contact;
    addEmployeeArr["employeeType"]=employeeType;
    addEmployeeArr["IDPASS"]=employeeIDPass;
    addEmployeeArr["address"]=address;
    addEmployeeArr["suburb"]=suburb;
    addEmployeeArr["city"]=city;
    addEmployeeArr["zip"]=zip;
    addEmployeeArr["status"]=1;
    return addEmployeeArr;
}

$(document).ready(function()
{
    jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
    });
    $.ajax({
        url:"PHPcode/employeecode.php",
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
               let entry=$("<option></option>").attr("name",arr[k]["EMPLOYEE_TYPE_ID"]);
               entry.text(arr[k]["NAME"]); 
               $("#eType").append(entry);
            }   
        }
        else
        {
            alert("Error");
        }
    });
    ///////////////////////////////////////////
    $("#inputAddress").on('keyup',function(e){
        e.preventDefault();
        $.getJSON("http://autocomplete.geocoder.api.here.com/6.2/suggest.json?app_id=4ubUBkg0ecyvqIcmRpJw&app_code=R1S3qwnTFxK3FbiK1ucSqw&query="+$(this).val()+"&country=ZAF",{
            format:"json",
            delay:100
        })
        .done(data=>{
            //console.log(data.suggestions);
            let viewArr=[];
            let obj={label:"",index:""};
            //console.log(data.suggestions);
            for(k=0;k<data.suggestions.length;k++)
            {
                obj={label:"",index:""};
                obj.label=data.suggestions[k].label.split(', ').reverse().join(', ');
                obj.index=data.suggestions[k].locationId;
                viewArr.push(obj);
            }
            let useArr=data.suggestions;
            $("#inputAddress").autocomplete({
                source:viewArr,
                select: function(event,ui){
                let finalObj=useArr.filter(element=>element.locationId==ui.item.index);
                $("#inputSuburb").val(finalObj[0].address.district);
                $("#inputCity").val(finalObj[0].address.city);
                $("#inputZip").val(finalObj[0].address.postalCode);
            }
            });

        });

    });
    ///////////////////////////////////////////////////////
    $("#picToUpload").on("submit",function(e)
    {//use ID of the form
        e.preventDefault();
        let arr=getVals();
        let form=new FormData();
        let pics=$("#fileUpload").get(0).files[0];
        //$("#fileUpload").prop('files')[0]
        form.append("file",pics);
        form.append("name",arr["name"]);
        form.append("surname",arr["surname"]);
        form.append("title",arr["title"]);
        form.append("email",arr["email"]);
        form.append("contact",arr["contact"]);
        form.append("employeeType",arr["employeeType"]);
        form.append("IDPASS",arr["IDPASS"]);
        form.append("address",arr["address"]);
        form.append("suburb",arr["suburb"]);
        form.append("city",arr["city"]);
        form.append("zip",arr["zip"]);
        form.append("status",arr["status"]);
        console.log(pics);
        $.ajax({
            url:'PHPcode/addEmployee-SQL.php',
            type:'POST',
            data: form,
            processData: false,
            contentType: false,
            cache: false,
        })
        .done(data=>{
            console.log(data);
            let confirmation = data.trim();
            if(confirmation== "success")
            {
                $("#modal-title-default").text("Success!");
                $("#modal-body").text("Employee added successfully");
                $("#btnClose").attr("onclick","window.location='../../employee.php'");
                $("#displayModal").modal("show");
            }
            else if(confirmation == "Employee Exists!")
            {
                $("#modal-title-default").text("Error!");
                $("#modal-body").text("Employee Exists! , press close and try again");
               
                $("#displayModal").modal("show");
            }
            else if(confirmation == "City found suburb added but address not added.")
            {
                $("#modal-title-default").text("Error!");
                $("#modal-body").text("City found suburb added but address not added.");
                $("#displayModal").modal("show");
            }
            else if(confirmation == "error in saving employee pic or generated employee tag")
            {
                $("#modal-title-default").text("Error!");
                $("#modal-body").text("error in saving employee pic or generated employee tag");
                $("#displayModal").modal("show");
            }
            else if(confirmation == "Couldnt get ID of employee details")
            {
                $("#modal-title-default").text("Error!");
                $("#modal-body").text("Couldnt get ID of employee details");
                $("#displayModal").modal("show");
            }
            else
            {
                
                $("#modal-title-default").text("Error!");
                $("#modal-body").text("Couldnt insert details");
                $("#displayModal").modal("show");
            }
          
        });
    });
    

});
