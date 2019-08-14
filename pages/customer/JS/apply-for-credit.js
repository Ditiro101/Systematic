$(document).on('change', '.custom-file-input', function (event) {
    $(this).next('.custom-file-label').html(event.target.files[0].name);
})

$(document).ready(function(){

    $("#uploadForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "PHPcode/apply_for_credit_.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                console.log(data);
            }           
        });
    }));
});