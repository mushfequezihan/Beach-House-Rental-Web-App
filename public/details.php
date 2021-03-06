<?php
//Author: mushfeque.zihan@gmail.com
//purpose: details information about houses where customer can see details about the house while booking


//Database connection
include("../includes/db.php");

//including functions
require_once("../includes/functions.php");

//including header
include("../includes/layouts/header.php");
?>

    
    
    
    
    

    <!--content area-->
    <div class="content_wrapper">
	    
	    
	<!--left side bar-->
	<div id="left_sidebar">
		
		
    <div class="sidebar_title">States</div>
    
    <ul class="state">
         
       <?php
       //calling functions for displaying all states
       getStates();
   
       ?>  
    </ul>
	
	
	    
	    <div class="sidebar_title">Categories</div>
	    
	    <ul class="cats">
	         
	       <?php
	       //calling functions for displaying all categories
	       getCats();
	       ?>  
	    </ul>
		
	</div> <!--end of left side bar-->
	
	
		
	<!--right side bar-->
	<div id="right_content">
	    
   	    <!--headline bar-->
   	    <div id="headline">
   	<div id="headline_title">    
           Welcome Guest!
		
   		<!--headline bar content-->
   		<div id="headline_content">
   		    <b style="color:yellow;">Booking Cart:</b>
		    
   		    <span>
   	    		<?php
   	    		//calling function for total dutration of time in cart 
   	    		selected_house();
   	    		?>
   		          House Selected - Price:
			  
   			  <?php
   			  //callign fucntion for total price in selected cart
   			  price();
   			  ?>
   			   /night</span> 
			  
   		      <a href="cart.php" style="color:yellow;">Go to Cart</a>
   		</div><!--end of headline content-->
       		</div><!--end of headline_title-->
   	    </div><!--end of headline bar-->
	    
	    
	    <!--dispalying houses div tag on right content area-->
	    <div id="house_box">
		    
	    	<?php
		//details page
		
		if(isset($_GET["house_id"])){
			
			$house_details = $_GET["house_id"];
		
		//displaying houses on the index page from the database
	
		$get_houses = "select * from houses where house_id ='$house_details'";
	
		$run_houses = mysqli_query($connection, $get_houses);
	
		while($row_houses = mysqli_fetch_array($run_houses)){
		
			$house_id = $row_houses["house_id"];
			$house_state = $row_houses["state_id"];
			$house_cat = $row_houses["cat_id"];
			$house_title = $row_houses["house_title"];
			$house_img1 = $row_houses["house_img1"];
			$house_img2 = $row_houses["house_img2"];
			$house_price = $row_houses["house_price"];
			$house_desc = $row_houses["house_desc"];
			
		 
			//displaying houses individually 
			echo "
				<!--individual house box design-->
				<div id='single_house'>
			
				<h3>$house_title</h3><br />
				<img src='admin_area/house_images/$house_img1' width='350px' height='180px' /> 
				<img src='admin_area/house_images/$house_img2' width='350px' height='180px' /> <br />
			
				<p><b>$$house_price /night</b></p><br />
				<p style='float:right;'><b>Description: </b>$house_desc</p><br />
			
				<a href='index.php' style='float:left;'>Go Back</a>
				<a href='index.php?book_cart=$house_id'><button style='float:right;'>Book Now</button></a>
				</div><!--end of individual house box design-->
		
			
			"; //end of displaying echo!
		
		} //end of while loop

	} // end of if
	
	    	?>
		
		
	    </div><!-- end of house box area-->
	    
	    
	    
	    
		
	</div> <!-- end of right side bar-->
	
    </div> <!--end of content area-->
    
    
    
    
    
    

<?php 
//including header
include("../includes/layouts/footer.php");
?>