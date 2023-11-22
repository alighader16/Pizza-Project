<?php
require 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

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
        /* Your existing styles */
        ul a {
            text-decoration: none;
        }

        .user-icon {
            display: inline-block;
            width: 24px;
            height: 24px;
            cursor: pointer;
            position: relative;
        }

        .user-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #FF5733;
            min-width: 120px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            padding: 10px;
            right: -90px;
            top: 24px;
        }

        .dropdown-content a {
            display: block;
            text-decoration: none;
            color: #fff;
            /* Change text color to white */
            padding: 8px 16px;
            transition: all 0.3s ease;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Rest of your styles */
    </style>
</head>

<body>
    <header>
        <a href="homepage.php" class="logo"><img src="img/logo.png" alt="logo"></a>
        <ul class="navbarNB">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="about_us.php">About</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="contact_us.php">Contact</a></li>

        </ul>
        <div class="h-icons">
            <a href="cart.php"><i class='bx bx-cart'></i></a>
            <div class="dropdown user-icon">
                <a href="#" id="dropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                            echo '<img src="' . $userImage . '" alt="User Image" class="user-image">';
                        } else {
                            echo '<i class="bx bx-user"></i>';
                        }
                    } else {
                        echo '<i class="bx bx-user"></i>';
                    }
                    ?>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-content" aria-labelledby="dropdownMenu">
                    <?php if (isset($_SESSION['username'])) { ?>
                        <a href="profile.php">Profile</a>
                        <a href="logout.php">Logout</a>
                    <?php } else { ?>
                        <a href="login.php">Log in</a>
                        <a href="signup.php">Sign Up</a>
                    <?php } ?>
                </div>
            </div>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>
</body>

</html>