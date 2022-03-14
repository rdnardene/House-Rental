<?php
$date_in = isset($_POST['date_in']) ? $_POST['date_in'] : date('Y-m-d');
$date_out = isset($_POST['date_out']) ? $_POST['date_out'] : date('Y-m-d', strtotime(date('Y-m-d') . ' + 3 days'));
?>

<!-- Masthead-->
<header class="masthead">
	<div class="container h-100">
		<div class="row h-100 align-items-center justify-content-center text-center">
			<div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
				<h1 class="text-uppercase text-white font-weight-bold">Houses</h1>
				<hr class="divider my-4" />
			</div>

		</div>
	</div>
</header>

<section class="page-section bg-dark">

	<div class="container">

		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<form action="index.php?page=list" id="filter" method="POST">
						<div class="row">
						
			
			
				<div class="col-md-3">
					<label for="">House Availability</label>
			
					<select name="select" id="select">
					<option disabled selected>-- Select House ID --</option>
					<option value="40">40</option>

					<option value="45" >45</option>

					<option  value="46">46</option>
					<option  value="47">47</option>

					<?php
			$conn = new mysqli('localhost', 'root', '', 'rental');
			$i = 1;
			
						
			$cats = $conn->query("SELECT tbl_houses.id,book.checkout from tbl_houses, book");
			while ($row = $cats->fetch_assoc()) {
				
			          
 				//	echo	 "<option  value=". $row['id'] ."'>" .$row['id'] ."</option>";
			  }  ?>
					</select>
					<input type="hidden" name="res" id="res" >
											
					<button class="btn-primary Check" name="check">Check</button>

					<?php
					error_reporting(0);
		        	$conn = new mysqli('localhost', 'root', '', 'rental');
					$i = 1;
						
			            
						$id2= $_POST['res'];
	
						$cats = $conn->query("SELECT * FROM book where house_id='$id2'");
					
						while ($row = $cats->fetch_assoc()) {

							if($id2=="40"){
								?>
							<h3>Available on <?php echo $row['checkout']?></h3>
						<?php
							}else if($id2=="45"){
						?>	
						<h3>Available on <?php echo $row['checkout']?></h3>
						<?php
							}else if($id2=="46"){
						?>	
						<h3>Available on <?php echo $row['checkout']?></h3>
												<?php
							}else if($id2=="47"){
						?>		
						<h3>Available on <?php echo $row['checkout']?></h3>
			         						<?php
							}else{
						?>	
					  <h3>Available ALL houses</h3>
						<?php } ?>
						<?php }   
                      // echo "<h3>Available anaytime</h3>";

						?>

						</div>
						<script>
							$("#select").change(function(){
								var display= $("#select option:selected").text();
								$("#res").val(display);			

							});
						</script>

							<div class="col-md-3">
					
								<label for="">Check-in Date</label>
								<input type="text" class="form-control datepicker" name="date_in" autocomplete="off" value="<?php echo isset($date_in) ? date("Y-m-d", strtotime($date_in)) : "" ?>">
							</div>
							<div class="col-md-3">
								<label for="">Check-out Date</label>
								<input type="text" class="form-control datepicker" name="date_out" autocomplete="off" value="<?php echo isset($date_out) ? date("Y-m-d", strtotime($date_out)) : "" ?>">
							</div>
							<div class="col-md-3">
								<br>
								<button class="btn-btn-block btn-primary mt-3">Check Availability</button>
							</div>

						</div>
					</form>
				</div>
			</div>

			<hr>
			<?php
			$conn = new mysqli('localhost', 'root', '', 'rental');
			$i = 1;
			
						
			$cats = $conn->query("SELECT * FROM tbl_houses");
			while ($row = $cats->fetch_assoc()) :
				
			?>
				<div class="card item-rooms mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col-md-5">
								<img src="<?php echo isset($row['img_name']) ? 'adminpage/houses/' . $row['img_name'] : '' ?>" alt="">

							</div>
							<div class="col-md-5" height="100%">
								<h3><b> <b><?php echo $row['price'] ?></b><span> /Day </span><?php echo $row['pricemonth'] ?></b><span> /Month</span></h3>
								<h4><b>House ID:
										<b><?php echo $row['id'] ?>
											<b><?php echo $row['category'] ?>
											</b></h4>
								<h4><b>
										<b><?php echo $row['status1'] ?>
										</b><b><?php echo $row['status2'] ?>
										</b></h4>
								<h4><b>
										<b><?php echo $row['description'] ?>
										</b></h4>
						
							
								<div class="align-self-end mt-2">
									<button data-id1="<?php echo $row['id'] ?>" data-status1="<?php echo $row['status1']; ?>" onclick="myFunction()" class="btn btn-primary  float-right book_now">Book now</button>

									<button  data-id2="<?php echo $row['id'] ?>" data-status2="<?php echo $row['status2']; ?>" onclick="myFunction2()" class="btn btn-info  float-right reserve_now" type="button" data-id="<?php echo $row['id'] ?>">Reserve now</button>
								</div>


							</div>
						</div>

					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>


<style type="text/css">
	.item-rooms img {
		width: 23vw;
	}
</style>
<script>
	$(document).ready(function() {
		$('.book_now').click(function() {
			var val = $(this).data('status1');
			if (val == "[availableForBooking]") {


				uni_modal('Book Now', 'admin/book.php?in=<?php echo $date_in ?>&out=<?php echo $date_out ?>&cid=' + $(this).attr('data-id1'))
			} else {
				alert('Sorry the current category is not available for booking right now ..Please do reservation.')

			}
		});

	});
</script>
<script>
	$(document).ready(function() {
		$('.reserve_now').click(function() {
			var val = $(this).data('status2');
			if (val == "[availableForReservation]") {


				uni_modal('Reserve Now', 'admin/reserve.php?in=<?php echo $date_in ?>&out=<?php echo $date_out ?>&cid=' + $(this).attr('data-id2'))

			}esle
			    alert('Sorry the current category is not available for booking right now ..Please do reservation.')
 
		});
	});
</script>