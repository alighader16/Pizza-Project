<?php
require 'connection.php';
require 'navbar2.php';
// if (!isset($_SESSION['username'])) {
//     header("Location:login.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Palace</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/homepage.css">
    <link rel="stylesheet" href="styles/cart.css">
    <style>
        .bx-cart {
            text-decoration: none;
        }

        .bx-cart {
            text-decoration: none;
        }


        a {
            text-decoration: none;
        }
    </style>





</head>

<body>
    <?php
    $is_logged = false;
    //check if the cart session variable is set
    $is_logged = (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0);
    ?>
    <main>
        <section id="shopping-cart">

            <h2>Shopping Cart</h2>
            <?php
            if (!$is_logged) {
                echo '<p style="margin-bottom:100px">Your shopping cart is empty.</p>';
            } else {
                ?>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Final Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Loop through each item in the cart
                        foreach ($_SESSION['cart'] as $index => $cartItem) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $index + 1; ?>
                                </td>
                                <td>
                                    <img src="<?php echo $cartItem['imageLink'] ?>" alt="Item Image" width=75 height=50>
                                </td>
                                <td>
                                    <?php echo $cartItem['variantName'] . " " . $cartItem['name']; ?>
                                </td>
                                <td>
                                    <?php echo $cartItem['defaultPrice']; ?>
                                </td>
                                <td>
                                    <input type="number" name="quantity" value="<?php echo $cartItem['quantity']; ?>" min="1">
                                </td>
                                <td>
                                    <?php echo $cartItem['defaultPrice'] * $cartItem['quantity']; ?>
                                </td>
                                <td>
                                    <button onclick="removeItem(<?php echo $index; ?>)">X</button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr id="finalRow">
                            <td> </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Final Price</td>
                            <td style="color:white; background-color:#ff9100;" id="finalPrice"></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php
            }
            ?>
        </section>


        <?php 
        if ($is_logged) {?>
            <section id="order-details">
                <h2>Order Details</h2>
                <form action="" onsubmit="return submitForm()">
                    <div class="formControl">
                        <label for="name">Receiver Name</label>
                        <input type="text" name="name" id="name">
                        <p class="error-paragraph hidden"></p>
                    </div>
                    <div class="formControl">
                        <label for="address">Receiver Address</label>
                        <input type="text" name="address">
                        <p class="error-paragraph hidden"></p>
                    </div>
                    <div class="formControl">
                        <label for="phone">Receiver Phone Number</label>
                        <input type="tel" name="phone" pattern="[0-9]{8}" placeholder="961xxxxxxxx">
                        <p class="error-paragraph hidden"></p>
                    </div>
                    <input type="submit" value="Submit" id="btnSubmit">
                    <button type="button" id="clearbutton" onclick="clearForm()">Clear</button>
                </form>
        </section>
        <?php } ?>

        <footer class="contact">
            <h3>Pizza Palace Holdings LLC.</h3>
            <div class="navbar-footer">
                <a class="active" href="index.html">Home</a>
                <a href="">Menu</a>
                <a href="">About Us</a>
                <a href="">Contact Us</a>
            </div>
            <div class="image-footer-container">
                <a href="https://www.instagram.com/acm_rhu/?hl=en"><img class="instagram-image" src="img/instaLogo.png"
                        alt="Instagram Logo"></a>
                <a href="https://www.linkedin.com/company/acm-rhu"><img class="linkedin-image"
                        src="img/linkedinLogo.png" alt="LinkedIn Logo"></a>
            </div>
            <p class="footer-copyright">
                Copyright &copy; 2023 RHU Advanced Web Students
            </p>
        </footer>



        <!-- scroll top -->
        <a href=".navbar" class="scroll-top">
            <i class='bx bx-up-arrow-alt'></i>
        </a>

        <script src="https://unpkg.com/scrollreveal"></script>
        <script src="scripts/homepage.js"></script>
        <script src="scripts/main.js"></script>
        <script src="scripts/input-quantity.js"></script>
        <script src="scripts/cart.js"></script>

</body>

</html>