<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'rental');



$rid = '';

$calc_days = abs(strtotime($_GET['out']) - strtotime($_GET['in']));
$calc_days = floor($calc_days / (60 * 60 * 24));



?>

<form action="admin/savedata.php" method="POST">
	<input type="hidden" name="cid" value="<?php echo isset($_GET['cid']) ? $_GET['cid'] : '' ?>">
	<?php
	$id = $_GET['cid'];

	$cats = $conn->query("SELECT * FROM tbl_houses where id='$id'");
	while ($row = $cats->fetch_assoc()) :

	?>
		<div class="form-group">
		<input type="hidden" name="user" id="user"  value="<?php echo $_SESSION['email'] ?>" required readonly>
		
			<label for="housecategory">House Name</label>
			<input type="hidden" name="id" id="id" class="form-control id" value="<?php echo $row['id'] ?>" required readonly>

			<input type="text" name="housecategory" id="housecategory" class="form-control housecategory" value="<?php echo $row['category'] ?>" required readonly>
		</div>

		<div class="form-group">
			<label for="clientname">Client Name</label>
			<input type="text" name="clientname" id="name" class="form-control"  required>
		</div>
		<div class="form-group">
			<label for="contact">Contact #</label>
			<input type="text" name="contact" id="contact" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="date_in">Check-in Date</label>
			<input type="date" name="checkin" id="date_in" class="form-control" value="<?php echo isset($_GET['in']) ? date("Y-m-d", strtotime($_GET['in'])) : date("Y-m-d") ?>" required readonly>
		</div>
		<div class="form-group">
			<label for="date_out_time">Check-out Date</label>
			<input type="date" name="checkout" id="date_in" class="form-control" value="<?php echo isset($_GET['out']) ? date("Y-m-d", strtotime($_GET['out'])) : date("Y-m-d") ?>" required readonly>
		</div>
		<div class="form-group">
			<label for="days">Days/Months of Stay</label>
			<input type="hidden" min="1" name="days" id="days" class="form-control" onchange="calculate(this.value)" value="<?php echo isset($_GET['in']) ? $calc_days : 1 ?>" required readonly>
			<p id="month"></p>
				<p id="day"></p>

		</div>
		<div>
			<label for="days">Total Payment</label>
			<input class="form-control" type="text" name="tot_amount" id="tot_amount" required readonly>
			<p> </p>
	   </div>
		
			
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="btnsavereserve" class="btn btn-primary">Submit Form</button>
						
		
	

		
			<script>
				var val2 = <?php echo isset($_GET['in']) ? $calc_days : 1 ?>;
				var price = <?php echo $row['price'] ?>;
				var pricemonth = <?php echo $row['pricemonth'] ?>;

				if (val2 > 30) {
					var val2 = val2;
					var y = 30;
					var z = val2 % y;
					var a = val2 - z;
					var w = a / 30;
					var tot_price = (w * pricemonth) + (z * price);
					var divobj = document.getElementById('tot_amount');
					divobj.value = tot_price;

					document.getElementById('month').innerHTML = w + " Month/s";
					document.getElementById('day').innerHTML = z + " Day/s";


				} else {
					var tot_price = (val2 * price);
					var divobj = document.getElementById('tot_amount');
					divobj.value = tot_price;


					document.getElementById('day').innerHTML = val2 + " Day/s";
				}
			</script>

		
	

    </form>

<?php endwhile; ?>