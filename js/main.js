/* $(document).ready(function () {
    $.ajax({
        type: "post",
        url: "main.php",
        data: ({name: "Jekh", number: 5}),
        dataType: "html",
        beforeSend: function () {
             $('.message_error').html("<p>wait please...</p>");
         },
        success: function (data) {
         $('.message_error').html("<p>sending was success!!!</p>");
         // $(".data").text(data);
         if (data == "success")
             $(".data").text("success");
             else 
             $(".data").text("fail");
        }
    }); 
 }); */