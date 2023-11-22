<?php

session_start();
if(isset($_SESSION['username'])){
    header("Location:homepage.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
body {
    background-color: #fffbf6;
    background-image: url("img/background.jpg");
}
.btn{
    width:100%;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    max-width: 800px;
    padding: 20px;
    display: flex;
    align-items: center;
}

.image-container{
    max-width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
}

.image-container img {
    height: 100%;
    width: 100%;
    object-fit: cover;
}

.login-form {
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.75);
    flex: 1;
    padding: 40px;
}

.login-form h1 {
    text-align: center;
    color: #ff9100;
    margin-bottom: 40px;
}

.form-group {
    margin-bottom: 35px;
}

.form-group input {
    width: 100%;
    padding: 12px 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-group input:focus {
    outline: none;
    border-color: #ff9100;
    box-shadow: 0 0 3px #ff9100; /* Set a custom box shadow */
}

.form-group .input-group-text {
    background-color: #ff9100;
    color: white;
    border: none;
}

.btn-login {
    background-color: #ff9100;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    margin-bottom: 9px;
    cursor: pointer;
}

.btn-login:hover {
    background-color: #E2492E;
}

.eye-icon {
    cursor: pointer;
}

.remember-me {
    display: flex;
    align-items: center;
}

.custom-checkbox {
    display: inline-block;
    position: relative;
    padding-left: 35px;
    cursor: pointer;
}

.custom-checkbox input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.custom-checkbox input:checked ~ .checkmark:after {
    content: "";
    position: absolute;
    display: block;
    left: 7px;
    top: 3px;
    width: 5px;
    height: 10px;
    border: solid #FF5733;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}

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
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php
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
                            window.location.href = 'homepage.php';
                            $_SESSION['username'] = $("#username").val().trim();
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
