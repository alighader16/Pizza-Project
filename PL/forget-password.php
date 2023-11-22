<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Palace - Forgot Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/login.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .show {
            display: block;
        }

        .hide {
            display: none;
        }

        .container {
            max-width: 400px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-reset {
            background-color: #FF5733;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            cursor: pointer;
            font-size: 20px;
        }

        .btn-reset:hover {
            background-color: #E2492E;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class= "login-container">
            <div class="login-form">
                <h1>Forgot Password</h1>
                <form method="post" id="reset-form">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-reset btn-block">Reset Password</button>
                </form>
                <div class="alert alert-danger hide" id="error">
                </div>
                <p><a href="login.php">Back to Login</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                
                event.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    url: 'process_password.php',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                       if(response==='success'){

                       }
                       else{
                        $('#error').text(response);
                        $('#error').removeClass('hide')
                        $('#error').addClass('show')
                       }
                    }
                });
            });
        });
    </script>
</body>
</html>
