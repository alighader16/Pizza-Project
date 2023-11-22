<?php
require 'connection.php';
require 'navbar2.php';

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/category-slider.css">
    <link rel="stylesheet" href="styles/menu.css">
    <link rel="stylesheet" href="styles/input-quantity.css">
    <link rel="stylesheet" href="styles/menuitem.css">
    <link rel="stylesheet" href="styles/review-card.css">
</head>

<body>

    <?php
    if (!isset($_GET['menuitemid'])) {
        header("Location: menu.php");
        exit();
    }

    include __DIR__ . '/../DAL/Repository/MenuItemRepository.php';

    $menuitem_id = $_GET['menuitemid'];
    $menuitem = getMenuItemById($menuitem_id);
    $menuitemBackUp = $menuitem;
    $menu_items = getMenuItemsByCategory($menuitem->category, $menuitem->title);

    if (!$menuitem) {
        header("Location: menu.php");
        exit();
    }
    ?>


    <main>

        <section id="menuitem-section" class="menu">
            <div id="menuitem-image">
                <img id="menuitem-image-inner" src="<?php echo $menuitem->image; ?>" alt="<?php echo $menuitem->title; ?>" >
            </div>
            <div id="menuitem-details">
                <h4 id="menuitem-category">
                    <?php echo $menuitem->category; ?>
                </h4>
                <div class="menu-text">
                    <div class="menu-left">
                        <h4>
                            <?php echo $menuitem->title; ?>
                        </h4>
                    </div>
                    <div class="menu-right">
                        <?php
                        if ($menuitem->discount > 0) {
                            echo '<h5 class="discount-h5">' . $menuitem->discount . '</h5>';
                            echo '
                                    <h5 class="cancelled-number">
                                    <?php echo $menuitem->default_price; ?>
                                    </h5>';
                        }
                        ?>
                        <h5>
                            <?php echo "$" . $menuitem->default_price; ?>
                        </h5>
                    </div>
                </div>

                <div id="menu-item-review-row" class="star">
                    <?php
                    $rating = $menuitem->rating;
                    $fullStars = floor($rating);
                    $halfStar = ($rating - $fullStars) >= 0.5;

                    // display full stars
                    for ($i = 0; $i < $fullStars; $i++) {
                        echo '<a href="#"><i class="bx bxs-star"></i></a>';
                    }

                    // display half star if needed
                    if ($halfStar) {
                        echo '<a href="#"><i class="bx bxs-star-half"></i></a>';
                        $emptyStars = 5 - $fullStars - 1; // calculate the number of empty stars needed
                    } else {
                        $emptyStars = 5 - $fullStars; // calculate the number of empty stars needed
                    }

                    // display empty stars
                    for ($i = 0; $i < $emptyStars; $i++) {
                        echo '<a href="#"><i class="bx bx-star"></i></a>';
                    }
                    ?>
                </div>
                <p id="menuitem-description">
                    <?php echo $menuitem->description; ?>
                </p>
                <p id="menuitem-ingredients">
                    <?php
                    $ingredientTitles = "";
                    for ($i = 0; $i < count($menuitem->ingredients); $i++) {
                        $ingredientTitles .= $menuitem->ingredients[$i] . ", ";
                    }
                    ?>
                    <?php echo substr($ingredientTitles, 0, strlen($ingredientTitles) - 2); ?>
                </p>
                <div id="last-row">
                    <div class="variants-row <?php
                    if (count($menuitem->variants) === 0) {
                        echo ' invisible';
                    }
                    ?>">
                        <div class="variant-row <?php
                        $has_varients = count($menuitem->variants) !== 0;
                        if (!$has_varients) {
                            echo 'invisible';
                        }
                        ?>">
                            <?php
                            if (!$has_varients) {
                                echo '<div class="variant">';
                                echo '<button class="variant-button';
                                if ($i === 0) {
                                    echo ' variant-button-active';
                                }
                                echo '">fds</button>';
                                echo '<p> fsd </p>';
                                echo '</div>';
                            }

                            for ($i = 0; $i < count($menuitem->variants); $i++) {
                                $variant = $menuitem->variants[$i];
                                echo '<div class="variant">';
                                echo '<button class="variant-button';
                                if ($i === 0) {
                                    echo ' variant-button-active';
                                }
                                echo '">' . $variant->title . '</button>';
                                echo '<p>' . $variant->price . '</p>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="last-row-menuitem">
                        <h5 class="last-row-price hidden-word">$0</h5>
                        <div class="menuitem-controls">
                            <div class='ctrl'>
                                <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                                <div class='ctrl__counter'>
                                    <input class='ctrl__counter-input' maxlength='100' type='text' value='0'>
                                    <div class='ctrl__counter-num'>0</div>
                                </div>
                                <div class='ctrl__button ctrl__button--increment'>+</div>
                            </div>
                            <a href="#" class="add-to-cart-button"><i class='bx bx-cart'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="menu" id="menu">
            <div class="main-text">
                <h2>People Also Liked</h2>
            </div>

            <div class="menu-content">
                <?php

                foreach ($menu_items as $menuitem) {
                    //display ingredient names in the same line
                    $ingredientTitles = "";
                    for ($i = 0; $i < count($menuitem->ingredients); $i++) {
                        $ingredientTitles .= $menuitem->ingredients[$i] . ", ";
                    }
                    ?>
                    <div class="featured-items-row">
                        <img src="<?php echo $menuitem->image; ?>" alt="<?php echo $menuitem->title; ?>"
                            data-menuitemid="<?php echo $menuitem->menuitem_id; ?>" class="menuitem-image">
                        <div class="menu-text">
                            <div class="menu-left">
                                <h4>
                                    <?php echo $menuitem->title; ?>
                                </h4>
                            </div>
                            <div class="menu-right">
                                <?php
                                if ($menuitem->discount > 0) {
                                    echo '<h5 class="discount-h5">' . $menuitem->discount . '</h5>';
                                    echo '
                                    <h5 class="cancelled-number">
                                    <?php echo $menuitem->default_price; ?>
                                    </h5>';
                                }
                                ?>
                                <h5>
                                    <?php echo "$" . $menuitem->default_price; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="star">
                            <?php
                            $rating = $menuitem->rating;
                            $fullStars = floor($rating);
                            $halfStar = ($rating - $fullStars) >= 0.5;

                            // display full stars
                            for ($i = 0; $i < $fullStars; $i++) {
                                echo '<a href="#"><i class="bx bxs-star"></i></a>';
                            }

                            // display half star if needed
                            if ($halfStar) {
                                echo '<a href="#"><i class="bx bxs-star-half"></i></a>';
                                $emptyStars = 5 - $fullStars - 1; // calculate the number of empty stars needed
                            } else {
                                $emptyStars = 5 - $fullStars; // calculate the number of empty stars needed
                            }

                            // display empty stars
                            for ($i = 0; $i < $emptyStars; $i++) {
                                echo '<a href="#"><i class="bx bx-star"></i></a>';
                            }
                            ?>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </section>
    </main>

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
            <a href="https://www.linkedin.com/company/acm-rhu"><img class="linkedin-image" src="img/linkedinLogo.png"
                    alt="LinkedIn Logo"></a>
        </div>
        <p class="footer-copyright">
            Copyright &copy; 2023 RHU Advanced Web Students
        </p>
    </footer>


    <!-- scroll top -->
    <a href=".navbar" class="scroll-top">
        <i class='bx bx-up-arrow-alt'></i>
    </a>

    <script src="scripts/menu.js"></script>

    <!-- custom scrollreveal link -->
    <div id="scripts">
        <script src="https://unpkg.com/scrollreveal"></script>
        <script src="scripts/main.js"></script>
        <script src="scripts/category-slider.js"></script>
        <script src="scripts/menuitem.js"></script>
        <script src="scripts/review-card.js"></script>
    </div>


</body>

</html>