<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'rental');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$msg = array();
if (isset($_POST['btnsave'])) {
    $target_filename = $_FILES['file-ip-1']['name'];
    $image_type = $_FILES['file-ip-1']['type'];
    $image_size = $_FILES['file-ip-1']['size'];
    $image_tmp_name = $_FILES['file-ip-1']['tmp_name'];

    $target_dir = "houses/$target_filename";
    move_uploaded_file($image_tmp_name, "houses/$target_filename");


    $course = mysqli_real_escape_string($db, $_POST['category']);
    $coursecode = mysqli_real_escape_string($db, $_POST['status']);
    $courseduration = mysqli_real_escape_string($db, $_POST['price']);
    $coursetype = mysqli_real_escape_string($db, $_POST['discription']);



    $db->query("INSERT INTO tbl_houses (path, img_name, category,pricemonth,price,description,status1,status2,location) VALUES ('$target_dir','$target_filename','$course','$coursecode','$courseduration ','$coursetype','[availableForBooking]','[availableForReservation]','Genaral Luna, Siargao')");

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "danger";
    header("locstion:administrations.php");
}
if (isset($_GET['btndelete'])) {

    $id = $_GET['btndelete'];
    $db->query("DELETE FROM tbl_houses WHERE id=$id");
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("locstion:administrations.php");
}


 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include('head.php'); ?>
    <title>Online House Rental System Application for Odtojan’s Compound</title>
</head>

<body>
    <?php require_once 'administrations.php'; ?>
    <?php
    if (isset($_SESSION['message'])) :

    ?>
        <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>
    <header class="header" id="header">
        <nav class="nav container">
            <h3 href="#" class="nav__logo">Odtojan's Compound</h3>

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
            <div class="dropdown">
                <button class="dropbtn fas fa-user">Admin</button>
                <div class="dropdown-content">
                    <a href="../indexlogin.php">Log Out</a>

                </div>
            </div>
        </nav>
    </header>


    <!--==================== HOME ====================-->

    <div class="container-fluid">

        <div class="col-lg-12">
            <div class="row">
                <!-- FORM Panel -->
                <div class="col-md-4">
                    <form action="administrations.php" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                Room Category Form
                            </div>
                            <div class="card-body #cancel">



                                <label class="control-label">Category</label>
                                <input type="text" class="form-control category" name="category" required>

                                <label class="control-label">Price/month</label>
                                <input type="text" class="form-control status" name="status" required>

                                <label class="control-label">Price/day</label>
                                <input type="text" class="form-control price" name="price" required>

                                <label class="control-label">Description</label>
                                <input type="text" class="form-control discription" name="discription" required>

                                <label for="" class="control-label">Image</label>
                                <input type="file" class="form-control " id="file-ip-1" name="file-ip-1" onchange="displayImg(this,$(this))">

                                <div class="form-group">
                                    <img src="<?php echo isset($image_path) ? '../houses/' . $cover_img : '' ?>" alt="" name="cimg" id="cimg">

                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <input class="btn btn-sm btn-primary col-sm-3 offset-md-3 " type="submit" name="btnsave" value="Save">
                                        <button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('').get(0).reset()"> Cancel</button>
                                    </div>

                                </div>

                            </div>

                           

                        </div>

                    </form>

                </div>

                <!-- FORM Panel -->

                <!-- Table Panel -->
                <div class="col-md-8">
                    <form action="subimage.php" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">House</th>
                                            <th class="text-center">Details</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conn = new mysqli('localhost', 'root', '', 'rental');
                                        $i = 1;
                                        $cats = $conn->query("SELECT * FROM tbl_houses order by id asc");
                                        while ($row = $cats->fetch_assoc()) :
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i++ ?></td>


                                                <td class="text-center">
                                                    <img src="<?php echo isset($row['img_name']) ? 'houses/' . $row['img_name'] : '' ?>" alt="" id="cimg">
                                                </td>
                                                <td class="">
                                                    <p>Category: <b><?php echo $row['category'] ?></b></p>
                                                    <p>Location: <b><?php echo $row['location'] ?></b></p>
                                                    <p>Details: <b><?php echo $row['description'] ?></b></p>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-primary edit_cat" type="button" data-id="<?php echo $row['id'] ?>" data-category="<?php echo $row['category'] ?>" data-price="<?php echo $row['price'] ?>" data-img_name="<?php echo $row['img_name'] ?>"> E d i t </button>
                                            
                                                    <p> <button class="btn btn-sm btn-danger delete_cat" href="administrations.php?btndelete=<?php echo $row['id'] ?>">Delete</button>
                                        </p>
                                        <a  href="subimage.php"><button type="submit" name="addimg" class="btn btn-info">AddImg</button></a>
                                                
                                                </td>

                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
   
      <!-- Modal move -->
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

                        <input type="text" id="user" name="user" required readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="movetobook" class="btn btn-secondary ">MoveToBook</button>
                        <button type="submit" name="btnno" class="btn btn-primary">No</button>
                    </div>
                </form>
            </div>
        </div>
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
    <script>
        function displayImg(input, _this) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#cimg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#manage-category').submit(function(e) {
            e.preventDefault()
            start_load()
            $.ajax({
                url: 'ajax.php?action=save_category',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function(resp) {
                    if (resp == 1) {
                        alert_toast("Data successfully added", 'success')
                        setTimeout(function() {
                            location.reload()
                        }, 1500)

                    } else if (resp == 2) {
                        alert_toast("Data successfully updated", 'success')
                        setTimeout(function() {
                            location.reload()
                        }, 1500)

                    }
                }
            })
        })
        $('.edit_cat').click(function() {
            start_load()
            var cat = $('#manage-category')
            cat.get(0).reset()
            cat.find("[name='id']").val($(this).attr('data-id'))
            cat.find("[name='name']").val($(this).attr('data-name'))
            cat.find("[name='price']").val($(this).attr('data-price'))
            cat.find("#cimg").attr('src', '../assets/img/' + $(this).attr('data-cover_img'))
            end_load()
        })
        $('.delete_cat').click(function() {
            _conf("Are you sure to delete this category?", "delete_cat", [$(this).attr('data-id')])
        })

        function delete_cat($id) {
            start_load()
            $.ajax({
                url: 'ajax.php?action=delete_category',
                method: 'POST',
                data: {
                    id: $id
                },
                success: function(resp) {
                    if (resp == 1) {
                        alert_toast("Data successfully deleted", 'success')
                        setTimeout(function() {
                            location.reload()
                        }, 1500)

                    }
                }
            })
        }
    </script>
     <script>
            $(document).ready(function() {

                $('.addimg').on('click', function() {

                    $('#confirmmodal').modal('show');
                  

                });



            });
        </script>
</body>

</html>