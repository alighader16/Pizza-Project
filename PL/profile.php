<?php
require 'connection.php';
session_start();


if (isset($_SESSION['username'])) {
   
    $username = $_SESSION['username'];
    $query=$conn->prepare("Select password,email,phone,Address,image from customer where username=?");
    $query->bind_param('s',$username);
    $query->execute();
    $result=$query->get_result();
    $row=$result->fetch_assoc();
    $hashedpassword=$row['password'];
    $email=$row['email'];
    $phone=$row['phone'];
    $address=$row['Address'];
    $image=$row['image'];

} else {
   
    $username = "Guest";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .hide{
            display:none;
        }
        .show{
            display:block;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        header {
            background-color: #FF5733;
            color: #fff;
            padding: 10px 0;
            border-radius: 10px 10px 0 0;
            font-size: 24px;
        }

        .profile {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            position: relative;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-image-button {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background-color: #FF5733;
            color: #fff;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .profile-details {
            text-align: left;
            margin-left: 20px;
        }

        h2 {
            font-size: 24px;
            color: #FF5733;
            margin: 10px 0;
        }

        p {
            margin: 5px 0;
        }

        .orders {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #FF5733;
            color: #fff;
        }

        .update-profile, .update-password {
            margin: 20px 0;
        }

        .input-group {
            margin: 10px 0;
        }

        .input-group-text {
            background-color: #FF5733;
            color: #fff;
            border: none;
            border-radius: 4px 0 0 4px;
        }

        .input-group input {
            border-radius: 0 4px 4px 0;
        }

        .btn {
            background-color: #FF5733;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #E2492E;
        }

        .logout-link {
            color: #FF5733;
            font-size: 18px;
            text-decoration: none;
        }

        .logout-link:hover {
            text-decoration: underline;
        }
        .back-home {
            background-color: #FF5733;
            color: #fff;
            border-radius: 50%;
            padding: 10px;
            display: inline-block;
        }
        header a{
            text-decoration:none;
        }
         header a:hover{
            color:blue;

         }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to Pizza Palace</h1>
            <a href="homepage.php" class="back-home"><i class="fas fa-home bg-orange"></i><span>Home</span></a>
            
        </header>

        <?php if (isset($_SESSION['username'])) { ?>
  
        <section class="profile">
            <div class="profile-image">
                <img src="<?php echo $image; ?>" alt="Profile Picture" class="img-fluid rounded-circle">
                <label for="profile-image-upload" class="profile-image-button">Change Profile Picture</label>
                <input type="file" id="profile-image-upload" accept="image/*" style="display: none;">
            </div>
            <div class="profile-details">
    <h2 id="profile-username"><?php echo $username; ?></h2>
    <p>Email: <span id="profile-email"><?php echo $email; ?></span></p>
    <p>Phone: <span id="profile-phone"><?php echo $phone; ?></span></p>
    <p>Address: <span id="profile-address"><?php echo $address; ?></span></p>
</div>

        </section>
        <section class="orders">
            <h2>Order History</h2>
            <table class="table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>2023-03-15</td>
                        <td>$25.00</td>
                        <td>Delivered</td>
                    </tr>
                    <!-- Add more order rows here -->
                </tbody>
            </table>
        </section>
        <section class="update-profile">
            <h2>Update Profile</h2>
            <form method="post" id="update-profile">
                <div class="mb-3 input-group">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="text" id="username" name="username" value="<?php echo $username; ?>" required class="form-control">
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required class="form-control">
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text">
                        <i class="fas fa-phone"></i>
                    </span>
                    <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>" required class="form-control">
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text">
                        <i class="fas fa-home"></i>
                    </span>
                    <input type="text" id="address" name="address" value="<?php echo $address; ?>" required class="form-control">
                </div>
                <button type="submit" class="btn btn-orange">Update</button>
            </form>
            <div class="alert alert-danger hide" id="update_error" role="alert">
            
        </div>
        </section>
        
<section class="update-password">
    <h2>Change Password</h2>
    <form method="post" id="change-password">
        <div class="mb-3 input-group">
            <span class="input-group-text">
                <i class="fas fa-lock"></i>
            </span>
            <input type="password" id="current-password" name="current-password" required class="form-control" placeholder="Current Password">
            
            <span class="input-group-text toggle-password" id="toggle-current-password">
                <i class="fas fa-eye"></i>
            </span>
        </div>
        <div class="mb-3 input-group">
            <span class="input-group-text">
                <i class="fas fa-key"></i>
            </span>
            <input type="password" id="new-password" name="new-password" required class="form-control" placeholder="New Password">
           
            <span class="input-group-text toggle-password" id="toggle-new-password">
                <i class="fas fa-eye"></i>
            </span>
        </div>
        <div class="mb-3 input-group">
            <span class="input-group-text">
                <i class="fas fa-key"></i>
            </span>
            <input type="password" id="confirm-password" name="confirm-password" required class="form-control" placeholder="Confirm Password">
        
            <span class="input-group-text toggle-password" id="toggle-confirm-password">
                <i class="fas fa-eye"></i>
            </span>
        </div>
        <button type="submit" class="btn btn-orange">Change Password</button>
    </form>
    <div class="alert alert-danger hide" id="password_error" role="alert"></div>
</section>
        </section>
        <section class="pizza-reviews">
            <h2>Pizza Reviews</h2>
            <div class="review-form">
                <h3>Add a Review</h3>
                <form method="post" id="add-review">
                    <div class="mb-3">
                        <input type="text" id="pizza-name" name="pizza-name" placeholder="Pizza Name" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <textarea id="review-text" name="review-text" placeholder="Your Review" required class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-orange">Submit Review</button>
                </form>
            </div>
            <div class="user-reviews">
                <h3>Your Reviews</h3>
                <ul id="review-list">
                    <!-- User reviews will be added here dynamically using JavaScript -->
                </ul>
            </div>
      </section>






        <section class="logout">
            <a href="logout.php" class="logout-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </section>
        <?php } else { ?>

        <section class="partial-profile">
            <h2>Profile</h2>
            <div class="profile-details">
                <h2><?php echo $username; ?></h2>
                <p>You are not logged in. Please <a href="login.php">Login</a> or <a href="signup.php">Sign Up</a> to access more features.</p>

            </div>
        </section>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    
    <script>
    $(document).ready(function () {
        $('.toggle-password').click(function () {
        const passwordField = $(this).prev('input');
        const passwordFieldType = passwordField.attr('type');

        if (passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
            $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            passwordField.attr('type', 'password');
            $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });







        let username = "<?php echo $username; ?>";
        let address = "<?php echo $address; ?>";
        let phone = "<?php echo $phone; ?>";

        $('#update-profile').submit(function (event) {
            event.preventDefault();

            let newUsername = $('#username').val();
            let newAddress = $('#address').val();
            let newPhone = $('#phone').val();
            let newEmail = $('#email').val(); 

            if (username === newUsername && address === newAddress && phone === newPhone && email === newEmail) {
                $('#update_error').removeClass("hide");
                $('#update_error').addClass("show");
                $('#update_error').text("Please make changes before requesting an update!");
                return;
            }

            $.ajax({
                url: 'update_profile.php',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response === 'success') {
                        username = newUsername;
                        address = newAddress;
                        phone = newPhone;
                        email = newEmail; 

                        $('#profile-username').text(newUsername);
                        $('#profile-email').text(newEmail); 
                        $('#profile-phone').text(newPhone);
                        $('#profile-address').text(newAddress);

                        $('#update_error').removeClass("show");
                        $('#update_error').addClass("hide");

                        alert('Profile updated successfully');
                    } else {
                        $('#update_error').removeClass("hide");
                      $('#update_error').addClass("show");
                    $('#update_error').text(response);
                    }
                }
            });
        });
        


        
        let password= "<?php echo $hashedpassword; ?>";
        console.log(password);
        $('#change-password').submit(function (event) {
    event.preventDefault();
    if ($('#new-password').val() !== $('#confirm-password').val()) {
        $('#password_error').removeClass("hide");
        $('#password_error').addClass("show");
        $('#password_error').text("The two passwords aren't matching");
        return; 
    } else {
        $('#password_error').addClass("hide");
        $('#password_error').removeClass("show");
    }

    
    let formData = new FormData(this);
    formData.append('old_password', password);

    $.ajax({
        url: 'update_password.php',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          if(response==='success'){
           
            alert('Password has been updated!!')

            $('#new-password').val('');
            $('#current-password').val('');
            $('#confirm-password').val('');
            $('#password_error').addClass("hide");
            $('#password_error').removeClass("show");
            location.reload()
           
          }
          else{
            $('#password_error').removeClass("hide");
            $('#password_error').addClass("show");
            $('#password_error').text(response);

          }
        }
    });
});




// Change Profile
$('#profile-image-upload').on('change', function () {
    console.log('hello')
    const imageUploadInput = this;
    if (imageUploadInput.files.length > 0) {
        const formData = new FormData();
        formData.append('profileImage', imageUploadInput.files[0]);

        $.ajax({
            url: 'update_profile_image.php', 
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response === 'success') {
                    
                    location.reload();
                } else {
                    
                    alert('Failed to upload profile picture. Please try again.');
                }
            }
        });
    }
});





    });
</script>


</body>
</html>
