<?php 
  require 'navbar2.php';
  
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
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/about_us.css">
    <link rel="stylesheet" href="styles/timeline.css">

<body>
 


    <!-- Main section -->
    <main>
        <!-- Main cover -->
        <section class="about_us_cover container-fluid d-flex flex-column align-items-center justify-content-center"
            id="about">
            <h1>About Our Restaurant</h1>
            <div id="about-image-container">
                <img src="img/pizzaAbout1.jpeg" alt="dsa" />
                <img src="img/pizzaAbout2.png" alt="dsas">
                <img src="img/pizzaAbout3.png" alt="dsass">
            </div>
            <div id="button_container">
                <a href="menu.html">Check Out Our Menu</a>
            </div>
        </section>
        <!--/ Main cover / -->

        <!-- working days-->
        <div class="Restaurant_Info container-fluid row">
            <div class="col-4">
                <i class="fa-solid fa-phone-volume fa-2xl" style="color: white;" class="icon"></i>
                <h4>+961 81 689 964<h4>
            </div>
            <div class="col-4">
                <i class="fa-solid fa-location-dot fa-2xl" style="color: white;"></i>
                <div class="icon_text">
                    <h4>Tariq Jdideh, Beirut</h4>
                    <p>Facing BAU University </p>
                </div>
            </div>
            <div class="col-4">
                <i class="fa-solid fa-business-time fa-2xl" style="color: white;"></i>
                <div class="icon_text">
                    <h4>Monday - Sunday</h4>
                    <p>7:00 AM : 10:00 PM</p>
                </div>
            </div>
        </div>
        <!--/ Working days-->

        <!-- Story -->
        <section class="about" id="about">
            <div class="about-img">
                <img src="img/pizza_bg.png" alt="home" />
            </div>
            <div class="about-text">
                <h2>
                    The Delicious Food for a Good Mood
                </h2>
                <p>
                    We At Pizza Palace, we are passionate about pizza.
                    Our journey began in 1995 when our founder, Tony Rossi, turned his
                    family's age-old pizza recipes into a thriving business. Since then,
                    we've been serving mouthwatering pizzas made from the finest,
                    freshest ingredients. Our mission is simple: to share the joy of
                    authentic, Italian-inspired pizza with the world.
                </p>
                <a href="#" class="btn">Choose a Pizza</a>
            </div>
        </section>
        <!-- /Story -->



        <!--Meet our team-->
        <div class="meet_our_team">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-3">Meet our team</h2>
                </div>
            </div>
            <div class="row" id="cards">
                <div class="col-lg-4 col-md-6 p-4 member_card"> <img
                        class="img-fluid d-block mb-3 mx-auto rounded-circle cardimage" alt="Card image cap" width="200"
                        src="img/Chef1.jpg">
                    <h4> <b>John Kandy</b> </h4>
                    <p class="mb-0">CEO and founder</p>
                </div>
                <div class="col-lg-4 col-md-6 p-4 member_card"> <img
                        class="img-fluid d-block mb-3 mx-auto rounded-circle cardimage" src="img/Chef2.jpg"
                        alt="Card image cap" width="200">
                    <h4> <b>Ilana Sam</b> </h4>
                    <p class="mb-0">Co-founder</p>
                </div>
                <div class="col-lg-4 p-4 member_card"> <img
                        class="img-fluid d-block mb-3 mx-auto rounded-circle cardimage" src="img/Chef3.png" width="200">
                    <h4> <b>Maria Samantha</b> </h4>
                    <p class="mb-0">Head Chef</p>
                </div>
            </div>
        </div>


        <div class="content" id="timeline-section">
            <div class="container">
                <h2 class="mb-3">Our History</h2>
                <div class="timeline">
                    <div class="timeline__stepper">
                        <div class="timeline__step is-active">
                            <svg class="timeline__icon timeline__icon--default">
                                <use href="#icon-brain" />
                            </svg>
                            <svg class="timeline__icon timeline__icon--active">
                                <use href="#icon-brain" />
                            </svg>
                            <p class="timeline__step-title">
                                The Founder
                            </p>
                        </div>
                        <div class="timeline__step">
                            <svg class="timeline__icon timeline__icon--default">
                                <use href="#icon-bulb" />
                            </svg>
                            <svg class="timeline__icon timeline__icon--active">
                                <use href="#icon-bulb" />
                            </svg>
                            <p class="timeline__step-title">
                                Mankouche Store
                            </p>
                        </div>
                        <div class="timeline__step">
                            <svg class="timeline__icon timeline__icon--default">
                                <use href="#icon-rocket" />
                            </svg>
                            <svg class="timeline__icon timeline__icon--active">>
                                <use href="#icon-rocket" />
                            </svg>
                            <p class="timeline__step-title">
                                Pizza Restaurant
                            </p>
                        </div>
                        <div class="timeline__step">
                            <svg class="timeline__icon timeline__icon--default">
                                <use href="#icon-target" />
                            </svg>
                            <svg class="timeline__icon timeline__icon--active">
                                <use href="#icon-target" />
                            </svg>
                            <p class="timeline__step-title">
                                The 2006 War
                            </p>
                        </div>
                        <div class="timeline__step">
                            <svg class="timeline__icon timeline__icon--default">
                                <use href="#icon-seo" />
                            </svg>
                            <svg class="timeline__icon timeline__icon--active">
                                <use href="#icon-seo" />
                            </svg>
                            <p class="timeline__step-title">
                                Revival
                            </p>
                        </div>
                        <div class="timeline__step">
                            <svg class="timeline__icon timeline__icon--default">
                                <use href="#icon-customers" />
                            </svg>
                            <svg class="timeline__icon timeline__icon--active">
                                <use href="#icon-customers" />
                            </svg>
                            <p class="timeline__step-title">
                                Michellin Star
                            </p>
                        </div>
                    </div>

                    <div class="timeline__slides">
                        <div class="timeline__slide">
                            <h3 class="timeline__slide-title">The Founder</h3>
                            <div class="timeline__slide-content">
                                <p>
                                    The founder is John Kandy, a humble man born to a carpenter and a teacher. Because his parents
                                    were always busy, John would always have to cook for his siblings. Later on in life, he got a job
                                    as a baker to supplement his parents salaries.
                                </p>
                            </div>
                        </div>

                        <div class="timeline__slide">
                            <h3 class="timeline__slide-title">Mankoushe Store</h3>
                            <div class="timeline__slide-content">
                                <p>Pizza Palace first started out as a humble mankoushe store in Tariq Jdide. It was renowned
                                    for having the best cheese mankoushe in Beirut. So much so that it's continued success allowed
                                    the founder the financial ability to rent out a new place and start a pizza restaurant.</p>
                            </div>
                        </div>

                        <div class="timeline__slide">
                            <h3 class="timeline__slide-title">Pizza Restaurant and Booming</h3>
                            <div class="timeline__slide-content">
                                <p>Following the success of his Mankoushe store, John decided to open a restaurant of pizzas. At first, it was
                                    a struggle as the recipes were new to him. But he later met and married an Italian woman visiting Lebanon,
                                    who taught him all the tips and tricks to become the king of pizzas in Lebanon. A boom in the restuarant followed
                                    and once again, John's restaurant became well-renowned across all of Lebanon, thereby crowning
                                    his place as the "Pizza Parlor"</p>
                            </div>
                        </div>

                        <div class="timeline__slide">
                            <h3 class="timeline__slide-title">The 2006 War</h3>
                            <div class="timeline__slide-content">
                                <p>In 2006, an actual booming occured and destroyed John's Pizza Parlor. Although the restaurant
                                    was completely destroyed, he did not hesitate to refound the restaurant from scratch.
                                </p>
                            </div>
                        </div>

                        <div class="timeline__slide">
                            <h3 class="timeline__slide-title">Revival</h3>
                            <div class="timeline__slide-content">
                                <p>The Pizza Palace was fully restored in 2007 with a new decor and theme which impressed all of its customers.
                                    In fact the entire branding of Pizza Palace changed from that of a low-end restaurant to a high-end restaurant
                                    that has survived wars and countless troubles but is still able to deliver the best pizza in all of Lebanon. 
                                    As a result, the Pizza Parlor was officially upgraded to the "Pizza Palace"
                                </p>
                            </div>
                        </div>

                        <div class="timeline__slide">
                            <h3 class="timeline__slide-title">Michelin Star</h3>
                            <div class="timeline__slide-content">
                                <p>After decades of hard work, in 2017 the Pizza Palace achieved it's very first Michelen star which it holds
                                    to this day, becoming one of the few restaurants in the MENA region to have ever done so.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- contact section -->

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
        <a href="#about" class="scroll-top">
            <i class='bx bx-up-arrow-alt'></i>
        </a>

    </main>


    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="scripts/main.js"></script>
    <script src="scripts/about_us.js"></script>
</body>

</html>