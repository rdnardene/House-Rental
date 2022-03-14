<?php



?>

<!DOCTYPE html>
<html lang="en">

<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="img/favicon.png" type="image/png">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="css/styles.css">

    <title>Online House Rental System Application for Odtojan’s Compound</title>
</head>

<body>
    <header class="header" id="header">
        <nav class="nav container">
            <h1 href="#" class="nav__logo ">Odtojan's Compound</h1>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="dashboard.php" class="nav__link active-link">HOME</a>
                    </li>
                    <li class="nav__item">
                        <a href="transaction.php" class="nav__link">TRANSACTION</a>
                    </li>
                    <li class="nav__item">
                        <a href="administrations.php" class="nav__link">ADMINISTRATION</a>
                    </li>
                    <li class="nav__item">
                        <a href="places.php" class="nav__link">PLACES</a>
                    </li>
                    <div class="dropdown">
                <button class="dropbtn fas fa-user">Admin</button>
                <div class="dropdown-content">
                    <a href="../indexlogin.php">Log Out</a>

                </div>
            </div>
                </ul>

                <div class="nav__dark">
                    <!-- Theme change button -->
                    <span class="change-theme-name">Dark mode</span>
                    <i class="ri-moon-line change-theme" id="theme-button"></i>
                </div>

                <i class="ri-close-line nav__close" id="nav-close"></i>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-function-line"></i>
            </div>
        </nav>
    </header>

    <main class="main">





        <!--==================== PLACES ====================-->
        <section class="place section" id="place">
            <h2 class="section__title">Choose Your Dream House</h2>

            <div class="place__container container grid">


                <?php
                define('DB_SERVER', 'localhost');
                define('DB_USERNAME', 'root');
                define('DB_PASSWORD', '');
                define('DB_DATABASE', 'rental');

                $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
                $squery = "select * from tbl_houses";
                $result = mysqli_query($db, $squery);




                while ($rows = mysqli_fetch_assoc($result)) {
                ?>

                    <div class="place__card">

                        <img src="<?php echo $rows['path']; ?>" class="place__img" alt="">
                        <div class="place__content">
                            <span class="place__rating">
                                <i class="ri-star-line place__rating-icon" style="color: yellow;"></i>
                                <span class="place__rating-number" style="color: yellow;">5.0</span>
                            </span>
                            <div class="place__data">
                                <span class="place__title"><?php echo $rows['category']; ?></span>
                                <span class="place__subtitle"> <?php echo $rows['status1']; ?></span>

                            </div>
                        </div>

                        <button class="button button--flex place__button">
                            <i class="ri-arrow-right-line"></i>
                        </button>
                    </div>
                <?php


                }
                ?>
                <!--==================== PLACES CARD 5 ====================-->
            
            </div>
        </section>

    

        <!--==================== SPONSORS ====================-->
        <section class="sponsor section">
            <div class="sponsor__container container grid">
                <div class="sponsor__content">
                    <img src="img/sponsors1.png" alt="" class="sponsor__img">
                </div>
                <div class="sponsor__content">
                    <img src="img/sponsors2.png" alt="" class="sponsor__img">
                </div>
                <div class="sponsor__content">
                    <img src="img/sponsors3.png" alt="" class="sponsor__img">
                </div>
                <div class="sponsor__content">
                    <img src="img/sponsors4.png" alt="" class="sponsor__img">
                </div>
                <div class="sponsor__content">
                    <img src="img/sponsors5.png" alt="" class="sponsor__img">
                </div>
            </div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content grid">
                <div class="footer__data">
                    <h3 class="footer__title">House Rental</h3>
                    <p class="footer__description">Try our Rooms and, <br> we offer you
                        the best relaxing <br> experience.
                    </p>
                    <div>
                        <a href="https://www.facebook.com/" target="_blank" class="footer__social">
                            <i class="ri-facebook-box-fill"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="footer__social">
                            <i class="ri-twitter-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="footer__social">
                            <i class="ri-instagram-fill"></i>
                        </a>
                        <a href="https://www.youtube.com/" target="_blank" class="footer__social">
                            <i class="ri-youtube-fill"></i>
                        </a>
                    </div>
                </div>

                <div class="footer__data">
                    <h3 class="footer__subtitle">About</h3>
                    <ul>
                        <li class="footer__item">
                            <a href="" class="footer__link">About Us</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Features</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">New & Blog</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__data">
                    <h3 class="footer__subtitle">Services</h3>
                    <ul>
                        <li class="footer__item">
                            <a href="" class="footer__link">Staff</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Pricing</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Registration</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__data">
                    <h3 class="footer__subtitle">Support</h3>
                    <ul>
                        <li class="footer__item">
                            <a href="" class="footer__link">FAQs</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Support Center</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer__rights">
                <p class="footer__copy">&#169; 2021. All rigths reserved.</p>
                <div class="footer__terms">
                    <a href="#" class="footer__terms-link">Terms & Agreements</a>
                    <a href="#" class="footer__terms-link">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line scrollup__icon"></i>
    </a>

    <!--=============== SCROLL REVEAL===============-->
    <script src="js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="js/main.js"></script>
</body>

</html>