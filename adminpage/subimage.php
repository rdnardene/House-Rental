<?php 

session_start();


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'rental');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


if (isset($_POST['uploadImageBtn'])) {
    $uploadFolder = 'houses/';
    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
        $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
        $imageName = $_FILES['imageFile']['name'][$key];
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);
        $cid = mysqli_real_escape_string($db, $_POST['CommonId']);
  
        // save to database
        $query = "INSERT INTO subimages SET cid='$cid', subimages='$imageName' " ;
        $run = $db->query($query) or die("Error in saving image".$db->error);
    }
    if ($result) {
        echo '<script>alert("Images uploaded successfully !")</script>';
        echo '<script>window.location.href="administrations.php";</script>';
    }
}


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sub Picture</title>
</head>
<body>

<form action="subimage.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <div class="row">
               <div class="col-md-4">
                   <div class="form-group">
                   <label class="control-label">Common ID</label>
                              
                   <input type="text" class="form-control price" name="CommonId" required>

                       <input type="file" name="imageFile[]" required multiple class="form-control">
                   </div>
               </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="submit" name="uploadImageBtn" id="uploadImageBtn" value="Upload Images" class="btn btn-success">
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>
</html>