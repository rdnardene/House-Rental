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
  
                    <button onclick="window.print();" class="btn btn-success" id="print-btn"><a href="print.php" class="fa fa-print"></a> Print</button>
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