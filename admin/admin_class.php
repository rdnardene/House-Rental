<?php
session_start();
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}


	function save_book(){
		extract($_POST);
		
			echo "<script>alert('Wow! User reservation Completed.')</script>";
		
			$housecategory =  $_POST['housecategory'];
			$clientname = $_POST['clientname'];
			$contact =  $_POST['contact'];
			$checkin = $_POST['checkin'];
			$checkout =  $_POST['checkout'];
			$nostay =  $_POST['nostay'];
			$payment =  $_POST['tot_amount'];
		  
		
		   
			$sql = "INSERT INTO book (house_categories, client_name, contact_number, checkin, checkout, no_stay, payment, status)
			 VALUES ('$housecategory','$clientname','$contact','$checkin','$checkout ','$nostay',' $payment','Not Confirm')";
		   $result = mysqli_query($conn, $sql);
			
			if ($result) {
				echo "<script>alert('Wow! User reservation Completed.')</script>";
			
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
	}

}