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


    <?php
    include __DIR__ . '/../DAL/Repository/CategoryRepository.php';

    $categories = getActiveCategories();
    $ingredients = getIngredients();

    ?>
    <main>

        <section id="menu-page-controls">
            <form id="menu-search" action="search-menu.php" method="POST">
                <div id="top-row-controls-menu">
                    <div id="search-bar">
                        <input type="text" name="search-input" id="search-input" placeholder="Search">
                        <button id="search-button"><i class="fa fa-search"></i></button>
                        <button id="button-reset"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </div>
                </div>
                <div id="bottom-row-controls-menu">
                    <div class="form-control-menu fcm-up">
                        <label for="sort"><i class="fa fa-sort"></i></label>
                        <select name="sort" id="sort">
                            <option value="None">None</option>
                            <option value="priceASC">Price ASC</option>
                            <option value="priceDesc">Price DESC</option>
                            <option value="rating">Rating</option>
                        </select>
                    </div>
                    <div class="form-control-menu fcm-up">
                        <label for="exclude"><i class="fa fa-wheat-awn-circle-exclamation"></i></label>
                        <select name="exclude" id="exclude">
                            <option value="None">None</option>
                            <?php
                            foreach ($ingredients as $ingredient) {
                                echo '<option value="' . $ingredient->name . '">' . $ingredient->name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="wrapper form-control-menu">
                        <ul class="tabs-box">
                            <li class="tab active" id="tab-all">All</li>
                            <?php
                            foreach ($categories as $category) {
                                echo '<li class="tab">' . $category->name . '</li>';
                            }
                            ?>
                        </ul>
                    </div>

                </div>
            </form>
        </section>

        <section id="menu-items-main">

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
        <script src="scripts/homepage.js"></script>
        <script src="scripts/input-quantity.js"></script>
    </div>


</body>

</html>