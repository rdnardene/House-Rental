<?php
session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'rental');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);



if (isset($_POST['deletepending'])) {

    $id = $_POST['updatadata'];
    $db->query("DELETE FROM pending WHERE house_id=$id");
    echo "<script>alert('Successfullt Deleted.')</script>";
    header("Location:pending.php");
}


if (isset($_POST['deletereserve'])) {

    $id = $_POST['updatadata'];
    $db->query("DELETE FROM reserve WHERE house_id=$id");
    echo "<script>alert('Successfullt Deleted.')</script>";
    header("Location:transaction.php");
}



if (isset($_POST['deletebook'])) {

    $id = $_POST['updatadata'];
    $db->query("DELETE FROM book WHERE house_id=$id");
    echo "<script>alert('Successfullt Deleted.')</script>";
    header("Location:book.php");
}






if (isset($_POST['btnyes'])) {
    $id = $_POST['updatadata'];
    $type = $_POST['typedata'];
   
    if ($type == "book") {
    $sql = "UPDATE tbl_houses SET status1='[UnavailableForBooking]' WHERE id='$id'";
    if (mysqli_query($db, $sql)) {

    }
  }else{
    $sql = "UPDATE tbl_houses SET status2='[UnavailableForResevation]' WHERE id='$id'";
    if (mysqli_query($db, $sql)) {

    }

  }
}
 

if (isset($_POST['confirmcheckin'])) {
    $id = $_POST['updatadata'];
    $sql = "UPDATE tbl_houses SET status1='[availableForBooking]', status2='[availableForReservation]' WHERE id='$id'";
    if (mysqli_query($db, $sql)) {
        
    }

}

if (isset($_POST['btnyes'])) {
    $type = $_POST['typedata'];
   
    if ($type == "book") {


        $id = $_POST['updatadata'];
        $sql = "UPDATE pending SET status='Confirmed' WHERE house_id='$id'";
       
        if (mysqli_query($db, $sql)) {
          
            $id =  $_POST['updatadata'];
            $housecategory =  $_POST['house_categories'];
            $clientname = $_POST['client_name'];
            $contact =  $_POST['contact_number'];
            $checkin = $_POST['checkin'];
            $checkout =  $_POST['checkout'];
            $nostay =  $_POST['no_stay'];
            $payment =  $_POST['payment'];
            $status =  $_POST['status'];
            $user =  $_POST['user'];



            $sql = "INSERT INTO book (house_id,house_categories, client_name, contact_number, checkin, checkout, no_stay, payment, status,user)
            VALUES ('$id','$housecategory','$clientname','$contact','$checkin','$checkout ','$nostay',' $payment','Confirm','$user')";
            $result = mysqli_query($db, $sql);

            if ($result) {
              
                $id = $_POST['updatadata'];
                $db->query("DELETE FROM pending WHERE house_id=$id");
                header("Location:pending.php");
            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
        }
    } else {

        $id = $_POST['updatadata'];
        $sql = "UPDATE pending SET status='Confirmed' WHERE house_id='$id'";
        if (mysqli_query($db, $sql)) {
        
            $id =  $_POST['updatadata'];
            $housecategory =  $_POST['house_categories'];
            $clientname = $_POST['client_name'];
            $contact =  $_POST['contact_number'];
            $checkin = $_POST['checkin'];
            $checkout =  $_POST['checkout'];
            $nostay =  $_POST['no_stay'];
            $payment =  $_POST['payment'];
            $status =  $_POST['status'];
            $user =  $_POST['user'];



            $sql = "INSERT INTO reserve (house_id,house_categories, client_name, contact_number, checkin, checkout, no_stay, payment, status,user)
           VALUES ('$id','$housecategory','$clientname','$contact','$checkin','$checkout ','$nostay',' $payment','Confirm','$user')";
            $result = mysqli_query($db, $sql);

            if ($result) {
                $id = $_POST['updatadata'];
                $db->query("DELETE FROM pending WHERE house_id=$id");
                header("Location:pending.php");
            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
        }
    }
}
if (isset($_POST['movetobook'])) {

    $id =  $_POST['updatadata'];
    $sql = "SELECT * FROM book WHERE house_id='$id'";
    $result = mysqli_query($db, $sql);
    if (!$result->num_rows > 0) {

        $id =  $_POST['updatadata'];
        $housecategory =  $_POST['house_categories'];
        $clientname = $_POST['client_name'];
        $contact =  $_POST['contact_number'];
        $checkin = $_POST['checkin'];
        $checkout =  $_POST['checkout'];
        $nostay =  $_POST['no_stay'];
        $payment =  $_POST['payment'];
        $user =  $_POST['user'];



        $sql = "INSERT INTO book (house_id,house_categories, client_name, contact_number, checkin, checkout, no_stay, payment,user)
            VALUES ('$id','$housecategory','$clientname','$contact','$checkin','$checkout ','$nostay',' $payment','$user')";
        $result = mysqli_query($db, $sql);

        if ($result) {
            $id = $_POST['updatadata'];
            $db->query("DELETE FROM reserve WHERE house_id=$id");
            header("Location:book.php");
        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
    }else{

        echo "<script>alert('Woops! This category is not available for check in.')</script>";
   
    }
}

if (isset($_POST['confirmbook'])) {

    $id =  $_POST['updatadata'];
    $sql = "SELECT * FROM checkin WHERE house_id='$id'";
    $result = mysqli_query($db, $sql);
    if (!$result->num_rows > 0) {

        $id =  $_POST['updatadata'];
        $housecategory =  $_POST['house_categories'];
        $clientname = $_POST['client_name'];
        $contact =  $_POST['contact_number'];
        $checkin = $_POST['checkin'];
        $checkout =  $_POST['checkout'];
        $nostay =  $_POST['no_stay'];
        $payment =  $_POST['payment'];
        $user =  $_POST['user'];



        $sql = "INSERT INTO checkin (house_id,house_categories, client_name, contact_number, checkin, checkout, no_stay, payment,user)
            VALUES ('$id','$housecategory','$clientname','$contact','$checkin','$checkout ','$nostay',' $payment','$user')";
        $result = mysqli_query($db, $sql);

        if ($result) {
            $id = $_POST['updatadata'];
            $db->query("DELETE FROM book WHERE house_id=$id");
            header("Location:checked-in.php");
        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
    }else{

        echo "<script>alert('Woops! This category is not available for check in.')</script>";
   
    }
}

if (isset($_POST['confirmcheckin'])) {
    $id =  $_POST['updatadata'];
    $housecategory =  $_POST['house_categories'];
    $clientname = $_POST['client_name'];
    $contact =  $_POST['contact_number'];
    $checkin = $_POST['checkin'];
    $checkout =  $_POST['checkout'];
    $nostay =  $_POST['no_stay'];
    $payment =  $_POST['payment'];
    $user =  $_POST['user'];



    $sql = "INSERT INTO checkout (house_id,house_categories, client_name, contact_number, checkin, checkout, no_stay, payment,user)
    VALUES ('$id','$housecategory','$clientname','$contact','$checkin','$checkout ','$nostay',' $payment','$user')";
    $result = mysqli_query($db, $sql);

    if ($result) {
        $id = $_POST['updatadata'];
        $db->query("DELETE FROM checkin WHERE house_id=$id");
        header("Location:check-out.php");
    } else {
        echo "<script>alert('Woops! Something Wrong Went.')</script>";
    }
}
