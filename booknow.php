<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">


    <title>Online House Rental System Application for Buko House</title>
</head>

<body>
    <header class="header" id="header">
        <nav class="nav container">
            

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.php" class="nav__link ">Home</a>
                    </li>
                   
                   
                  
                
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
  <!--==================== EXPERIENCE ====================-->
  <section class="experience section">
        <h2 class="section__title">With Our Experience <br> We Will Serve You</h2>
        <?php
        if(isset($_POST['discover']))
        {
           
			$conn = new mysqli('localhost', 'root', '', 'rental');
			$i = 1;
            $id = isset($_POST['id1']) ? $_POST['id1'] : "";
           

      
			
						
			$cats = $conn->query("SELECT * FROM tbl_houses where id='$id'");
        }
			while ($row = $cats->fetch_assoc()) {
          
			?>
        <div class="experience__container container grid">


            <div class="experience__img grid">
                <div class="experience__overlay">
                <img src="<?php echo isset($row['img_name']) ? 'adminpage/houses/' . $row['img_name'] : '' ?>" alt="">
      
                </div>

              
            </div>
        

            <?php } ?> 
        </div>
    </section>

 
    <!--==================== DISCOVER ====================-->
    <section class="discover section" id="discover">
        <h2 class="section__title">Discover the most <br> attractive Houses</h2>
        <div class="discover__container container swiper-container">
        <?php
        if(isset($_POST['discover']))
        {
           
			$conn = new mysqli('localhost', 'root', '', 'rental');
			$i = 1;
            $id = isset($_POST['id1']) ? $_POST['id1'] : "";
               
         

      
			
						
			$cats = $conn->query("SELECT * FROM subimages where cid='$id'");
        }
			while ($row = $cats->fetch_assoc()) {
          
			?>
            
            <div class="swiper-wrapper">
                <!--==================== DISCOVER 1 ====================-->
                <div class="discover__card swiper-slide">
                    <img class="discover__img" src="adminpage/houses/<?php echo $row['subimages'] ?>" alt="" />
                                
                    <div class="discover__data">
                        <!-- <h2 class="discover__title">Pending</h2>
                        <span class="discover__description">Pending rooms available</span> -->
                    </div>
                </div>

            
        <?php } ?>
     
        </div>
        </div>
        </section>

                        <div style="text-align:center; padding: 70px">
                             <a  href="index.php"><button class="btn btn-info">Book Now</button></a>
                    </div>


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
    <script src="assets/js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>

</html>