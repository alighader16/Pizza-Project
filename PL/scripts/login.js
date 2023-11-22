$(document).ready(function () {
    console.log("heyy")
    $(".eye-icon").click(function () {
        console.log('hello')
        var passwordInput = $("#password");
        var eyeIcon = $(".eye-icon i");

        if (passwordInput.attr("type") === "password") {
            passwordInput.attr("type", "text");
            eyeIcon.removeClass("fa-eye");
            eyeIcon.addClass("fa-eye-slash");
        } else {
            passwordInput.attr("type", "password");
            eyeIcon.removeClass("fa-eye-slash");
            eyeIcon.addClass("fa-eye");
        }
    });
  
    $('#form').submit(function(event) {
        event.preventDefault(); 
        console.log("Hello")
        var formData = new FormData(this);

        $.ajax({
            url: 'process_login.php',
            method: 'post', 
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response)
                if (response === 'success') {
                    alert("Login Successfully")
                    window.location.href = 'index.php'; 
                } else {
                    $('#error').removeClass('hide')
                    $('#error').html(response); 
                }
            },
            error: function(xhr, status, error) {
                console.log("AJAX error: " + error);
            }
        });
    });
});
