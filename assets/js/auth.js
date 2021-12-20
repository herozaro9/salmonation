$(document).ready(function(){
    $("#loader").fadeOut();
    $("#authform").submit(function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "https://salmonation.io/Authorized/login",
            data: {email : $("#email").val(), password : $("#password").val(),},
            success: function(response) {
                if(response == true){
                    window.location.href = "https://salmonation.io/administrator";
                }else{
                    swal("Oops!", "Account Not Found!", "error");
                }
            }
        });
    });
});