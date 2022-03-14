<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include('header.php');
include('admin/db_connect.php');

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($query as $key => $value) {
  if (!is_numeric($key))
    $_SESSION['setting_' . $key] = $value;
}
?>
<style>
  header.masthead {
    background: url(assets/images/<?php echo $_SESSION['setting_cover_img'] ?>);
    background-repeat: no-repeat;
    background-size: cover;
  }

  .dropbtn {
    font-size: 16px;
    border: none;
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-size: 14px;
  }

  .dropdown-content a:hover {
    background-color: #ddd;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  .bg-modal {
    width: 50%;
    height: 100%;
    background-color: rgbc(0, 0, 0, 0.7);
    padding: 50px 170px;
    position: absolute;
    top: 0;
    display: none;
    align-items: center;
  }

  .modal-content {
    width: 500px;
    height: 500px;
    background-color: #f9f9f9;
    padding: 100px;
    opacity: 1;
  }

  .cancel {
    position: absolute;
    top: 0;
    padding: 10px;
    right: 220px;
    font-size: 42px;
    transform: rotate(45deg);
    cursor: pointer;
  }
</style>

<body id="page-top">
  <!-- Navigation-->
  <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="./"><?php echo $_SESSION['setting_hotel_name'] ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="indexlog.php?page=homelog">Home</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="discover.php">Discover</a></li>

        </ul>
      </div>
    </div>
  </nav>

  <?php
  $page = isset($_GET['page']) ? $_GET['page'] : "homelog";
  include $page . '.php';
  ?>



  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>


      </div>
    </div>
  </div>
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Online House rental system </div>
    </div>
  </footer>

  <?php include('footer.php') ?>
</body>


</html>