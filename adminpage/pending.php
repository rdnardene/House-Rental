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
   

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="css/styles.css">

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
    <!-- Modal -->
    <div class="modal fade exampleModalLabel" id="confirmmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="action.php" method="POST">
                    <div class="modal-body">

                        <h4>Do you want to confirm this request?</h4>
                        <input type="text" id="updatadata" name="updatadata" required readonly>
                        <input type="text" id="house_categories" name="house_categories" required readonly>
                        <input type="text" id="client_name" name="client_name" required readonly>
                        <input type="text" id="contact_number" name="contact_number" required readonly>
                        <input type="text" id="checkin" name="checkin" required readonly>
                        <input type="text" id="checkout" name="checkout" required readonly>
                        <input type="text" id="no_stay" name="no_stay" required readonly>
                        <input type="text" id="payment" name="payment" required readonly>
                        <input type="text" id="status" name="status" required readonly>
                        <input type="text" id="typedata" name="typedata" required readonly>
                        <input type="text" id="user" name="user" required readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="btnyes" class="btn btn-secondary ">Yes</button>
                        <button type="submit" name="btnno" class="btn btn-primary">No</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal remove -->
    <div class="modal fade exampleModalLabel" id="removemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="action.php" method="POST">
                    <div class="modal-body">

                        <h4>Do you want to remove this request?</h4>
                        <input type="text" id="rupdatadata" name="updatadata" required readonly>
                        <input type="text" id="rhouse_categories" name="house_categories" required readonly>
                        <input type="text" id="rclient_name" name="client_name" required readonly>
                        <input type="text" id="rcontact_number" name="contact_number" required readonly>
                        <input type="text" id="rcheckin" name="checkin" required readonly>
                        <input type="text" id="rcheckout" name="checkout" required readonly>
                        <input type="text" id="rno_stay" name="no_stay" required readonly>
                        <input type="text" id="rpayment" name="payment" required readonly>
                        <input type="text" id="rstatus" name="status" required readonly>

                        <input type="text" id="user" name="user" required readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="deletepending" class="btn btn-secondary ">Yes</button>
                        <button type="submit" name="btnno" class="btn btn-primary">No</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                                <th>Status</th>
                                <th>Type</th>
                                <th>User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = $db->query("SELECT * FROM pending");
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
                                    <td><?php echo $fetch['status'] ?></td>
                                    <td><?php echo $fetch['type'] ?></td>
                                    <td><?php echo $fetch['user'] ?></td>
                                    <!-- <td>
                                    <center><a class="btn btn-success" href="confirm_reserve.php?transaction_id=<?php echo $fetch['transaction_id'] ?>"><i class="glyphicon glyphicon-check"></i> Check In</a> <a class="btn btn-danger" onclick="confirmationDelete(); return false;" href="delete_pending.php?transaction_id=<?php echo $fetch['transaction_id'] ?>"><i class="glyphicon glyphicon-trash"></i> Discard</a>
                                </td> -->
                                    <td>
                                        <button type="button" class="btn btn-success confirmbtn">Confirm</button>

                                        <button type="button" class="btn btn-danger deletebtn">Reject!!!.</button>
                                    </td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>





    </div>




    <br />
    <br />
    <div style="text-align:right; margin-right:10px;" class="navbar navbar-default navbar-fixed-bottom">
        <label>&copy; Copyright HOR 2017 </label>
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

    <script>
        $(document).ready(function() {

            $('.deletebtn').on('click', function() {

                $('#removemodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#rupdatadata').val(data[0]);
                $('#rhouse_categories').val(data[1]);
                $('#rclient_name').val(data[2]);
                $('#rcontact_number').val(data[3]);
                $('#rcheckin').val(data[4]);
                $('#rcheckout').val(data[5]);
                $('#rno_stay').val(data[6]);
                $('#rpayment').val(data[7]);
                $('#rstatus').val(data[8]);
                $('#ruser').val(data[9]);
            });



        });
    </script>

    <script>
        $(document).ready(function() {

            $('.confirmbtn').on('click', function() {

                $('#confirmmodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#updatadata').val(data[0]);
                $('#house_categories').val(data[1]);
                $('#client_name').val(data[2]);
                $('#contact_number').val(data[3]);
                $('#checkin').val(data[4]);
                $('#checkout').val(data[5]);
                $('#no_stay').val(data[6]);
                $('#payment').val(data[7]);
                $('#status').val(data[8]);
                $('#typedata').val(data[9]);
                $('#user').val(data[10]);

            });



        });
    </script>
</body>

</html>