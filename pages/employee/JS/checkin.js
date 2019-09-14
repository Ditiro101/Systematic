let scanSound = new Audio('../../assets/sounds/qr_scan-sound.mp3');

$(document).ready(function(){

  let scanner = new Instascan.Scanner({
      video: document.getElementById('videoElement')
    });

  Instascan.Camera.getCameras().then(cameras => 
  {
      if(cameras.length > 0){
          scanner.start(cameras[0]);
      } else {
          console.error("No Camera Device");
      }
  });

  scanner.addListener('scan', function(content) {
    console.log(content);
    scanSound.play();
    $.notify({
      icon: 'https://randomuser.me/api/portraits/med/men/77.jpg',
      title: '',
      message: 'Byron Morgan checked in successfully',
      
    },{
      //settings
      placement: {
        from: "bottom",
        align: "right"
      },
      animate: {
        enter: 'animated fadeInUp',
        exit: 'animated fadeOutDown'
      },
      type: 'minimalist',
      delay: 15000,
      icon_type: 'image',
      template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
        '<img data-notify="icon" class="rounded-circle pull-left d-inline">' +
        '<span data-notify="title" class="d-inline">{1}</span>' +
        '<span data-notify="message" class="d-inline">{2}</span>' +
      '</div>'
    });

      $.ajax({
        type: 'POST',
        url: 'PHPcode/verifyQRcode.php',
        data: {qrCode : content},
        beforeSend:()=>
        {
            
        }
      })
      .done(data => {
      // do something with data
        console.log(data);
        var confirmation = data.trim();
        if(confirmation.includes("success"))
        {
            //Add this when fully done.
            
            $('#modal-title-default').text("Success!");
            $('#modalText').text("Employee Successfully checked-in");
            $("#btnClose").attr("onclick","window.location='../../employee.php'");
            $('#checkedIn').modal("show");
            // alert('The scanned content is: ' + content);
           // window.open(content, "_blank");

        }
        else if(confirmation.includes("Over checkout time"))
        {
          $('#modal-title-default').text("Error!");
          $('#modalText').text("Cannot check-in , checkout time has passed");
          
          $('#checkedIn').modal("show");
        }
        else if(confirmation.includes("Already Checked-in!"))
        {
          $('#modal-title-default').text("Warning!");
          $('#modalText').text("Already Checked-in!!");
          $('#checkedIn').modal("show");
        }
        else
        {
          $('#modal-title-default').text("Error!");
          $('#modalText').text("Database Error!");
          $('#checkedIn').modal("show");
        }
        
    })
    .fail(()=>
    {
        console.log("ajax failed");
    });       
  });

});

