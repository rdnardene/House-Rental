<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'rental');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../css2/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="print.css" media="print">

    <title></title>
</head>

<body>
    <header class="header" id="header">
        <nav class="nav container">
            <h1 href="#" class="nav__logo"></h1>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="dashboard.php" class="nav__link active-link">DASHBOARD</a>
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
   
    <div class="tabb">
        <div class="container-fluid">
            <div class="panel panel-default">
                <?php
                $q = $db->query("SELECT COUNT(*) as total FROM `pending`");
                $f = $q->fetch_array();
                $q_p = $db->query("SELECT COUNT(*) as total FROM `reserve`");
                $f_p = $q_p->fetch_array();
                $q_p2 = $db->query("SELECT COUNT(*) as total FROM `reserve`");
                $f_p2 = $q_p2->fetch_array();
                $q_ci = $db->query("SELECT COUNT(*) as total FROM `book`");
                $f_ci = $q_ci->fetch_array();
                $q_ci2 = $db->query("SELECT COUNT(*) as total FROM `book`");
                $f_ci2 = $q_ci2->fetch_array();
                $q_c = $db->query("SELECT COUNT(*) as total FROM `checkin`");
                $f_c = $q_c->fetch_array();
                $q_cc = $db->query("SELECT COUNT(*) as total FROM `checkout`");
                $f_cc = $q_cc->fetch_array();
                ?>
                <div class="panel-body">
                    <a class="btn btn-warning " href="pending.php"><span class="badge"><?php echo $f['total'] ?></span> Pendings</a>
                    <a class="btn btn-warning " href="transaction.php"><span class="badge"><?php echo $f_p['total'] ?></span> Reserve</a>
                    <a class="btn btn-warning " href="book.php"><span class="badge"><?php echo   $f_ci['total'] ?></span>Book</a>
                    <a class="btn btn-info" href="checked-in.php"><span class="badge"><?php echo $f_c['total'] ?></span>Check In</a>
                    <a class="btn btn-info" href="check-out.php"><span class="badge"><?php echo $f_cc['total'] ?></span> Check Out</a>
                    <a class="btn btn-success" href="print.php"><span class="badge"></span>Print</a>
          
                  <br />
                    <br />
                    <table id="table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>House ID</th>
                                <th>House Category</th>
                                <th>Client Name</th>
                                <th>Phone Number</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>No of Days </th>
                                <th>Payment</th>

                                <th>User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = $db->query("SELECT * FROM checkout");
                            while ($fetch = $query->fetch_array()) {
                            ?>
                                <tr>
                                    <td><?php echo $fetch['house_id'] ?></td>
                                    <td><?php echo $fetch['house_categories'] ?></td>
                                    <td><?php echo $fetch['client_name'] ?></td>
                                    <td><?php echo $fetch['contact_number'] ?></td>
                                    <td><?php echo $fetch['checkin'] ?></td>
                                    <td><?php echo $fetch['checkout'] ?></td>
                                    <td><?php echo $fetch['no_stay'] ?></td>
                                    <td><?php echo $fetch['payment'] ?></td>

                                    <td><?php echo $fetch['user'] ?></td>
                                    <!-- <td>
                                    <center><a class="btn btn-success" href="confirm_reserve.php?transaction_id=<?php echo $fetch['transaction_id'] ?>"><i class="glyphicon glyphicon-check"></i> Check In</a> <a class="btn btn-danger" onclick="confirmationDelete(); return false;" href="delete_pending.php?transaction_id=<?php echo $fetch['transaction_id'] ?>"><i class="glyphicon glyphicon-trash"></i> Discard</a>
                                </td> -->
                                
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br />
        <br />
        <div style="text-align:right; margin-right:10px;" class="navbar navbar-default navbar-fixed-bottom">
            <!-- <label>&copy; Copyright HOR 2017 </label> -->
        </div>

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

        <!--=============== SCROLL REVEAL===============-->
        <script src="js/scrollreveal.min.js"></script>

        <!--=============== SWIPER JS ===============-->
        <script src="js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="js/main.js"></script>



        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="../js/jquery.dataTables.js"></script>
        <script src="../js/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#table").DataTable();
            });
        </script>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>



     
</body>

</html>