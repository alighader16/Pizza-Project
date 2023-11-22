<?php
require 'connection.php';



?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Palace</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

   

    <style>
        ul a{
            text-decoration:none;
        }
                .user-icon {
                    display: inline-block;
                    width: 24px; 
                    height: 24px; 
                }

                .user-image {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    border-radius: 50%; 
                }

    </style>
</head>


<header>
    <a href="#" class="logo"><img src="img/logo.png" alt="logo"></a>
    <ul class="navbar">
        <li><a href="homepage.php">Home</a></li>
        <li><a href="about_us.php">About</a></li>
        <li><a href="#">Menu</a></li>
        <li><a href="contact_us.php">Contact</a></li>
        <li><a href="signup.php">Sign Up</a></li>
        <li><a href="login.php">Log in</a></li>
    </ul>
    <div class="h-icons">
        <a href="#"><i class='bx bx-search'></i></a>
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $query = $conn->prepare('Select image from customer where username = ?');
            $query->bind_param('s', $username);
            $query->execute();
            $result = $query->get_result();
            $row = $result->fetch_assoc();
            
            $userImage = $row['image']; 
            if ($userImage) {
                echo '<a href="profile.php" class="user-icon"><img src="' . $userImage . '" alt="User Image" class="user-image"></a>';
            } else {
                echo '<a href="profile.php"><i class="bx bx-user"></i></a>';
            }
        } else {
            echo '<a href="profile.php"><i class="bx bx-user"></i></a>';
        }
        ?>
        <div class="bx bx-menu" id="menu-icon"></div>
    </div>
</header> 