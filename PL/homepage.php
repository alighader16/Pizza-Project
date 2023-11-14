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
    <link rel="stylesheet" href="styles/input-quantity.css">
    <link rel="stylesheet" href="styles/homepage.css">



</head>

<body>

    <header>
        <a href="#" class="logo"><img src="img/logo.png" alt="logo"></a>
        <ul class="navbar">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="about_us.php">About</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="contact_us.php">Contact</a></li>
        </ul>
        <div class="h-icons">
            <a href="#"><i class='bx bx-search'></i></a>
            <a href="#"><i class='bx bx-cart'></i></a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>


    <!-- home section -->
    <section class="home" id="home">
        <div class="home-text">
            <h1>The Kingdom of <span>Irresistable</span> Pizzas</h1>
            <p>Welcome to the kingdom of irresistible pizzas, where each bite is a journey of flavor.
                We craft our pizzas with the finest ingredients and passion, ensuring every slice is a
                delightful experience. Tales of our cuisine have been told from Ireland to Cathay.
                Join us and discover the magic of pizza perfection.</p>
            <a href="#" class="btn">Order Now</a>
        </div>

        <div class="home-img">
            <img src="img/home.png" alt="home">
        </div>
    </section>


    <section id="slider-section">
        <div class="slider-area">
            <div class="wrapper">
                <div class="item"><img alt="Halal" src="img/slider-images/halalLogo.png" style="margin-right:10px;">
                    <p>100% Halal</p>
                </div>
                <div class="item"><img alt="Leaf" src="img/slider-images/organicLogo.png" style="margin-right:10px;">
                    <p>100% Organic</p>
                </div>
                <div class="item"><img alt="Cedar Tree" src="img/slider-images/cedarLogo.png">
                    <p>Lebanese Produce</p>
                </div>
                <div class="item"><img alt="Award" src="img/slider-images/awardLogo.png">
                    <p>Award-Winning</p>
                </div>
                <div class="item"><img alt="Tomato" src="img/slider-images/tomatoLogo.png" style="margin-right:10px;">
                    <p>Fresh Tomatoes</p>
                </div>
                <div class="item"><img alt="Dough" src="img/slider-images/doughLogo.png" style="margin-right:10px;">
                    <p>Delicate Dough</p>
                </div>
                <div class="item"><img alt="Cheese" src="img/slider-images/cheeseLogo.png" style="margin-right:10px;">
                    <p>Alpine Cheese</p>
                </div>
                <div class="item"><img alt="Sausage" src="img/slider-images/sausageLogo.png" style="margin-right:10px;">
                    <p>Italian Sausage</p>
                </div>
            </div>
        </div>
    </section>


    <!-- menu section -->
    <main>

        <section class="menu" id="menu">
            <div class="main-text">
                <h2>Our Best Sellers</h2>
            </div>

            <div class="menu-content">
                <?php
                include __DIR__ . '/../DAL/Repository/MenuItemRepository.php';

                $menu_items = getFeaturedMenuItems();

                foreach ($menu_items as $menuitem) {
                    //display ingredient names in the same line
                    $ingredientTitles = "";
                    for ($i = 0; $i < count($menuitem->ingredients); $i++) {
                        $ingredientTitles .= $menuitem->ingredients[$i] . ", ";
                    }
                    ?>
                    <div class="featured-items-row">
                        <img src="<?php echo $menuitem->image;
                        ; ?>" alt="<?php echo $menuitem->title; ?>">
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
                        <p class="ingredient-list">
                            <?php echo substr($ingredientTitles, 0, strlen($ingredientTitles) - 2); ?>
                        </p>
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
                <?php } ?>
            </div>

        </section>

        <section id="discount-section">
            <img src="img/twoPizzas.png" style="margin:20px 0px;" alt="Picture of a pizza">
            <h2>Buy 2 Large Pizzas Get 1 Free!</h2>
            <button class="btn-101">
                Claim
                <svg>
                    <defs>
                        <filter id="glow">
                            <fegaussianblur result="coloredBlur" stddeviation="5"></fegaussianblur>
                            <femerge>
                                <femergenode in="coloredBlur"></femergenode>
                                <femergenode in="coloredBlur"></femergenode>
                                <femergenode in="coloredBlur"></femergenode>
                                <femergenode in="SourceGraphic"></femergenode>
                            </femerge>
                        </filter>
                    </defs>
                    <rect />
                </svg>
            </button>
        </section>

        <section id="homepage-about-us">
            <h2>Crafting Perfection, One Slice at a Time</h2>
            <p>The heart and soul of our restaurant is our dedicated team of pizzaiolos who have mastered
                the art of creating the perfect pizza. Every pizza is carefully handcrafted, starting with
                our house-made dough that is allowed to rise slowly, developing a unique flavor and texture.
                Then, we top it with a delightful selection of premium ingredients, ensuring each bite is a
                burst of flavors and a celebration of tradition.</p>
            <a href="#" class="btn">Our Story</a>
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

    <!-- custom scrollreveal link -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="scripts/homepage.js"></script>
    <script src="scripts/main.js"></script>
    <script src="scripts/input-quantity.js"></script>


</body>

</html>