$(document).ready(function() {
    $('form').submit(function(event) {
        var valid = true;
        event.preventDefault();

        if ($('#password').val() !== $('#cpassword').val()) {
            $('#error').text("Unmatching Passwords!!");
            $('#error').removeClass('hide');
            valid = false;
        } else {
            $('#error').text("");
            $('#error').addClass('hide');
        }

        var dob = new Date($("#dob").val());
        var currentDate = new Date();
        var eighteenYearsAgo = new Date(currentDate.getFullYear() - 18, currentDate.getMonth(), currentDate.getDate());

        if (dob > currentDate) {
            $("#message").text("Please enter a date in the past.");
            $('#message').removeClass('hide');
            valid = false;
        } else if (dob > eighteenYearsAgo) {
            $("#message").text("You must be at least 18 years old.");
            $('#message').removeClass('hide');
            valid = false;
        } else {
            $("#message").text("");
            $('#message').addClass('hide');
        }

        if (valid) {
            var formData = new FormData($('form')[0]);

            $.ajax({
                url: 'process_signup.php',
                method: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response === "Success") {
                        
                        alert("Registration successful!");
                        
                        window.location.href = 'login.php';
                    } else {
                        $('#error').text("Please enter a Unique name or email");
                        $('#error').removeClass('hide');
                    }
                }
            });
        }
    });
});
