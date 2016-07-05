<?php
//Author: mushfeque.zihan@gmail.com
//purpose: information about this web app and project


//Database connection
include("../includes/db.php");

//including functions
require_once("../includes/functions.php");

//including header
include("../includes/layouts/header.php");

session_start();
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
		<?php
		//calling cart function to add value in the cart
		cart();
		?>
	    
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
		
		
		<!--contact us page!-->
		<br/>    
	<h1> System Analysis and Design Class<br>
	     
	         Professor: Kate Hollis <br><br>
	         
	         Beach House Rental Web Application   </h1>

	<p>This web application allows customers and owners put their own individual information about inserting houses and booking them. Then while as a new customer register for an account the booking information goes as order information ask customer for their payment and generate a order summary in their account.</p>
	    </div><!-- end of house box area-->
	    
	    
	    
	    
		
	</div> <!-- end of right side bar-->
	
    </div> <!--end of content area-->
    
    
    
    
    
    

<?php 
//including header
include("../includes/layouts/footer.php");
?>