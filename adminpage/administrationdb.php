<style>
            <?php 
            define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'loginform');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$msg = array();
	if(isset($_POST['submitnewrecord'])){
  $target_filename = $_FILES['file-ip-1']['name'];
	$image_type = $_FILES['file-ip-1']['type'];
	$image_size = $_FILES['file-ip-1']['size'];
	$image_tmp_name= $_FILES['file-ip-1']['tmp_name'];
  
  $target_dir = "img_dir/$target_filename"; 
  move_uploaded_file($image_tmp_name,"img_dir/$target_filename");
   
     
	$course = mysqli_real_escape_string($db, $_POST['course']);
	$coursecode = mysqli_real_escape_string($db, $_POST['coursecode']);
	$courseduration = mysqli_real_escape_string($db, $_POST['courseduration']);
	$coursetype = mysqli_real_escape_string($db, $_POST['coursetype']);
	$courseauthor = mysqli_real_escape_string($db, $_POST['courseauthor']);
	$coursedescription = mysqli_real_escape_string($db, $_POST['desc']);
    
        if($db->connect_error){die("Connection Failed:" .$db->connect_error);}
        $sql = "INSERT INTO tbl_courses (path, img_name, course,coursecode,courseduration,coursetype,courseauthor,coursedescription) VALUES ('$target_dir','$target_filename','$course','$coursecode','$courseduration ','$coursetype','$courseauthor','$coursedescription')";
        $result = $db->query($sql);
      


    
        
    
    }
    ?>
	img#cimg,.cimg{
		max-height: 10vh;
		max-width: 6vw;
	}
	td{
		vertical-align: middle !important;
	}
</style>
<?php 
								$i = 1;
								$cats = $conn->query("SELECT * FROM room_categories order by id asc");
								while($row=$cats->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>

								
									<td class="text-center">
										<img src="<?php echo isset($row['cover_img']) ? '../assets/img/'.$row['cover_img'] :'' ?>" alt="" id="cimg">
									</td>
									<td class="">
										<p>Name : <b><?php echo $row['name'] ?></b></p>
										<p>Price : <b><?php echo "$".number_format($row['price'],2) ?></b></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_cat" type="button" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>" data-price="<?php echo $row['price'] ?>" data-cover_img="<?php echo $row['cover_img'] ?>">Edit</button>
										<button class="btn btn-sm btn-danger delete_cat" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>