<?php
$conn = new mysqli('localhost', 'root', '', 'rental');

if (isset($_POST['btnsavereserve'])) {
	            $id =  $_POST['id'];
				$housecategory =  $_POST['housecategory'];
				$clientname = $_POST['clientname'];
				$contact =  $_POST['contact'];
				$checkin = $_POST['checkin'];
				$checkout =  $_POST['checkout'];
				$nostay =  $_POST['days'];
				$payment =  $_POST['tot_amount'];
				$user =  $_POST['user'];


				$sql = "INSERT INTO pending (house_id,house_categories, client_name, contact_number, checkin, checkout, no_stay, payment, status,user,type)
			 VALUES ('$id','$housecategory','$clientname','$contact','$checkin','$checkout ','$nostay',' $payment','Not Confirm','$user','Reserve')";
				$result = mysqli_query($conn, $sql);

				if ($result) {
					echo "<script>alert('Wow! User reservation Completed.')</script>";
					header("Location:../index.php");
				} else {
					echo "<script>alert('Woops! Something Wrong Went.')</script>";
				}
	}

if (isset($_POST['btnsavebook'])) {
            	$id =  $_POST['id'];
				$housecategory =  $_POST['housecategory'];
				$clientname = $_POST['clientname'];
				$contact =  $_POST['contact'];
				$checkin = $_POST['checkin'];
				$checkout =  $_POST['checkout'];
				$nostay =  $_POST['days'];
				$payment =  $_POST['tot_amount'];
				$user =  $_POST['user'];



				$sql = "INSERT INTO pending (house_id,house_categories, client_name, contact_number, checkin, checkout, no_stay, payment, status,user,type)
			 VALUES ('$id','$housecategory','$clientname','$contact','$checkin','$checkout ','$nostay',' $payment','Not Confirm','$user','book')";
				$result = mysqli_query($conn, $sql);

				if ($result) {
					echo "<script>alert('Wow! User booking Completed.')</script>";
					header("Location:../index.php");
				} else {
					echo "<script>alert('Woops! Something Wrong Went.')</script>";
		}
}
