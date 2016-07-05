<?php

//Author: mushfeque.zihan@gmail.com
//purpose: checkout page where customer can login or register as new or checkout for payment


//Database connection
include("../includes/db.php");

//including functions
require_once("../includes/functions.php");

//including header
include("../includes/layouts/header.php");

//to hold session and validation
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
		    
	    <?php
		    include("payment.php");
	    
	    // //working on checkout page for user to checkout either with login or paymet page
// 	    if(!isset($_SESSION["customer_email"])){
// 		    include("customer_login.php");
// 	    }else{
// 		    include("payment.php");
// 		    //echo "<script>window.open('payment.php', '_self')</script>";
// 	    }
	    ?>
		
		
	    </div><!-- end of house box area-->
	    
	    
	    
	    
		
	</div> <!-- end of right side bar-->
	
    </div> <!--end of content area-->
    
    
    
    
    
    

<?php 
//including footer
include("../includes/layouts/footer.php");
?>