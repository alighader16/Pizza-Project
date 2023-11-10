<?php

session_start();
if(isset($_SESSION['username'])){
    header("Location:index.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .show{
            display:block;
        }
        .hide{
            display:none;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
         
            <div class="login-form">
                <h1>Welcome to Pizza Palace</h1>
                <form method="post" id="login-form">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php
                            if(isset($_COOKIE['username'])) echo $_COOKIE['username'];?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                            <span class="input-group-text eye-icon" id="eye-icon">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group remember-me">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="remember" id="rememberMe" value="yes">
                            <span class="checkmark"></span>
                            Remember Me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-login btn-block">Login</button>
                </form>
                <p><a href="forget-password.php">Forgot Password?</a></p>
                <div class="alert alert-danger hide" id="error">

                </div>
                <p>You don't have an account? <a href="signup.php">Sign up</a></p>
                
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".eye-icon").click(function () {
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
          
            $('#login-form').submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                console.log(formData)
                $.ajax({
                    url: 'process_login.php',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response)
                        if (response === 'success') {
                            alert("Login Successfully");
                            console.log(response); 
                            window.location.href = 'index.php';
                        } else {
                            $('#error').removeClass('hide');
                            $('#error').addClass('show');
                            $('#error').html(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("AJAX error: " + error);
                    }
                });
            });
        });
    </script>
</body>
</html>
