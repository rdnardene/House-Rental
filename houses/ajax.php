<?php
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'rental');

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
 
$userid = $_POST['userid'];
 
$sql = "select * from tbl_houses where id=".$userid;
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<table border='0' width='100%'>
<tr>
    <td width="300"><img src="houses/<?php echo $row['path']; ?>">
    <td style="padding:20px;">
    <p>Name : <?php echo $row['category']; ?></p>
    <p>Position : <?php echo $row['location']; ?></p>
    <p>Office : <?php echo $row['pricemont']; ?></p>
    <p>Age : <?php echo $row['description']; ?></p>
    <p>Salary : <?php echo $row['status']; ?></p>
    </td>
</tr>
</table>
 
<?php } ?>