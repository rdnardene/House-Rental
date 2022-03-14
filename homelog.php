 <!-- Masthead-->
 <header class="masthead">
            <div class="container h-100">
			<div class="home__data">
                    <span class="home__data-subtitle">Discover Your Dream House</span>
                    <h1 class="home__data-title" style="color: white;">Explore The <br> Best, <b>Beautiful <br> Houses and Rooms</b></h1>
                    

                </div>
               
            </div>
        </header>

    <br></br>
        
	<div id="portfolio">
       
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                  
                	<?php 
                	include'admin/db_connect.php';
                	$qry = $conn->query("SELECT * FROM  tbl_houses order by rand() ");
                	while($row = $qry->fetch_assoc()):
                	?>
                     
                    <div class="col-lg-4 col-sm-6">
                    <form action="discover.php" method="POST">
                        <a class="portfolio-box" >
                            <img class="img-fluid" src="adminpage/houses/<?php echo $row['img_name'] ?>" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-30">PHP <?php echo $row['price']; ?> per day</div>
                               
                                <div class="project-name"><?php echo $row['category'] ?></div>
                               <tr><td>
                                <input type="hidden" name="id1" value="<?php echo $row['id']  ?>">
                               </td></tr>
                            
                                <button type="submit" name="discover" class="btn btn-secondary ">Discover</button>
                      
                            </div>
                        </a>
                        </form>
                    </div>
                    
                	<?php endwhile; ?>
                  
                </div>
            </div>

        </div>
