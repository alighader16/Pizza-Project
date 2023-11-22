<?php


session_start();
if(isset($_SESSION['username'])){
    header("Location:homepage.php");
}

if(isset($_COOKIE['username'])){
    header("Location:login.php");
}



?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Palace Sign-Up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        .fixed-header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1;
        }
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            margin-top: 20px; /* Add margin to the top */
        }

        .container h1 {
            font-size: 32px;
            color: #FF5733;
            margin-top:200px;
        }

        .container form {
            margin-top: 20px;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #FF5733;
        }

        .form-group span {
            font-size: 20px;
            margin-right: 10px;
            color: #FF5733;
        }

        .btn-signup {
            background-color: #FF5733;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            cursor: pointer;
            font-size: 20px;
        }

        .btn-signup:hover {
            background-color: #E2492E;
        }

        .already-account {
            margin-top: 20px;
        }
        .hide{
            display:none;
        }
        .alert{
            margin-top:10px;
        }
       

    </style>
</head>
<body>
    




    <div class="container">
        <h1 class="">Sign Up</h1>
        <form enctype="multipart/form-data">
            <div class="form-group">
                <span><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <span><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control" name= "email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <span><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" name="name" placeholder="Full Name" required>
            </div>
            <div class="form-group">
                <span><i class="fas fa-birthday-cake"></i></span>
                <input type="date" class="form-control" name="birthdate" id="dob" required>
            </div>
            <div class="form-group">
                <span><i class="fas fa-phone"></i></span>
                <input type="tel" class="form-control" name="phone" pattern="[0-9]*" placeholder="Phone Number" required>
            </div>
            <div class="form-group">
                <span><i class="fas fa-map-marker"></i></span>
                <input type="text" class="form-control" name="Address" placeholder="Address" required>
            </div>
            <div class="form-group">
                <span><i class="fas fa-lock"></i></span>
                <input type="password"id="password" class="form-control" name="password" placeholder="Password" required>
                
            
            </div>
            <div class="form-group">
                <span><i class="fas fa-lock"></i></span>
                <input type="password" id="cpassword" class="form-control" name="confirmPassword" placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
                <span><i class="fas fa-image"></i></span>
                <input type="file" class="form-control" name="profilePhoto" accept="image/*">
            </div>
            <button type="submit" class="btn-signup">Sign Up</button>
        </form>
        <div class="alert alert-danger hide" id="error">
            
        </div>
        <div class="alert alert-danger hide" id="message">
            
        </div>
        <p class="already-account">Already have an account? <a href="login.php">Log In</a></p>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="scripts/signup.js"></script>
   
        <script>
$(document).ready(function() {
    $("#togglePassword").on('click', function() {
        var passwordField = $("#password");
        var passwordFieldType = passwordField.attr('type');
        if (passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
        } else {
            passwordField.attr('type', 'password');
        }
    });
});
</script>

     

    </script>


    
</body>
</html>
