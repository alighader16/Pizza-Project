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
    <link rel="stylesheet" href="styles/contact_us.css">
    <link rel="stylesheet" href="styles/about_us.css">

<body>
    <!-- header section -->
    <header>
        <a href="#" class="logo"><img src="img/logo.png" alt="logo"></a>
        <ul class="navbarNB">
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

    <main>
        <div id="contact" class="contact-area section-padding">
            <div class="container">
                <div class="section-title text-center">
                    <h1>Get in Touch</h1>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="contact">
                            <form class="form" name="enq" method="post" action="contact.php"
                                onsubmit="return validation();">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Name"
                                            required="required">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            required="required">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject"
                                            required="required">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea rows="6" name="message" class="form-control"
                                            placeholder="Your Message" required="required"></textarea>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="submit" value="Send message" name="submit" id="submitButton"
                                            class="btn btn-contact-bg" title="Submit Your Message!">Send
                                            Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!--- END COL -->
                    <div class="col-lg-5">
                        <div class="single_address">
                            <i class="fa fa-map-marker"></i>
                            <h4>Our Address</h4>
                            <p>Beirut, Tariq jdideh, Facing BAU University</p>
                        </div>
                        <div class="single_address">
                            <i class="fa fa-envelope"></i>
                            <h4>Send your message</h4>
                            <p>Info@example.com</p>
                        </div>
                        <div class="single_address">
                            <i class="fa fa-clock"></i>
                            <h4>Work Time</h4>
                            <p>Monday - Sunday <br>7:00 AM : 10:00 PM</p>
                        </div>
                        <div class="single_address">
                            <i class="fa fa-phone"></i>
                            <h4>Call us on</h4>
                            <p>+961 81 689 964</p>
                        </div>
                    </div><!--- END COL -->
                </div><!--- END ROW -->
            </div><!--- END CONTAINER -->
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