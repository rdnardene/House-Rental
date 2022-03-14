
<header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                    	 <h1 class="text-uppercase text-white font-weight-bold">DASHBOARD</h1>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
        </header>

    <section class="page-section">
    
        <div class="card">
    <div class="card-body">

   
     
        <table class="table table-dark">
         
            <tr>
              <th scope="col">House Category</th>
              <th scope="col">Client Name</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Check In</th>
              <th scope="col">Check Out</th>
              <th scope="col">No of Days </th>
              <th scope="col">Payment</th>
              <th scope="col">Status</th>


            </tr>
        
            <?php

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'rental');
 $user= $_SESSION['email'];
$query = "SELECT * FROM book where user='$user'";
$query_run = mysqli_query($connection, $query);

?>
          <?php
          if ($query_run) {
            foreach ($query_run as $row) {

          ?>


              <tbody>
                <tr>
                  <td><?php echo $row['house_categories']; ?></td>
                  <td><?php echo $row['client_name']; ?></td>
                  <td><?php echo $row['contact_number']; ?></td>
                  <td><?php echo $row['checkin']; ?></td>
                  <td><?php echo $row['checkout']; ?></td>
                  <td><?php echo $row['no_stay']; ?></td>
                  <td><?php echo $row['payment']; ?></td>
                  <td><?php echo $row['status']; ?></td>
               
                   
                  </td>
                  
                </tr>
              </tbody>

          <?php
            }
          } else {
            echo "No Record Found!";
          }

          ?>
      <?php

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'rental');
 $user= $_SESSION['email'];
$query = "SELECT * FROM reserve where user='$user'";
$query_run = mysqli_query($connection, $query);


          if ($query_run) {
            foreach ($query_run as $row) {

          ?>


              <tbody>
                <tr>
                  <td><?php echo $row['house_categories']; ?></td>
                  <td><?php echo $row['client_name']; ?></td>
                  <td><?php echo $row['contact_number']; ?></td>
                  <td><?php echo $row['checkin']; ?></td>
                  <td><?php echo $row['checkout']; ?></td>
                  <td><?php echo $row['no_stay']; ?></td>
                  <td><?php echo $row['payment']; ?></td>
                  <td><?php echo $row['status']; ?></td>
               
                   
                  </td>
                  
                </tr>
              </tbody>

          <?php
            }
          } else {
            echo "No Record Found!";
          }

          ?>
  <?php

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'rental');
 $user= $_SESSION['email'];
$query = "SELECT * FROM pending where user='$user'";
$query_run = mysqli_query($connection, $query);


          if ($query_run) {
            foreach ($query_run as $row) {

          ?>


              <tbody>
                <tr>
                  <td><?php echo $row['house_categories']; ?></td>
                  <td><?php echo $row['client_name']; ?></td>
                  <td><?php echo $row['contact_number']; ?></td>
                  <td><?php echo $row['checkin']; ?></td>
                  <td><?php echo $row['checkout']; ?></td>
                  <td><?php echo $row['no_stay']; ?></td>
                  <td><?php echo $row['payment']; ?></td>
                  <td><?php echo $row['status']; ?></td>
               
                   
                  </td>
                  
                </tr>
              </tbody>
              <?php
            }
          } else {
            echo "No Record Found!";
          }

          ?>

        </table>
      </div>

    </div>

       
        </section>