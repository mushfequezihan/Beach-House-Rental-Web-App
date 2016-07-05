<?php
//Author: mushfeque.zihan@gmail.com
//purpose: Customer login logic page where session starts


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
		    
	    	
		<!--customer login page-->


		

		<form method="POST" action="">

		<table width="800" align="center" bgcolor="skyblue">

		<tr>
			<td colspan="2"><h1>Login or Register to Book Now!</h1></td>
		</tr>	


		 <tr align="left">
		 <td align="right"><b>Email:</b></td>
		  <td><input type="text" name="email" placeholder="enter email" required /></td>
		 </tr>

		  <tr align="left">
		    <td align="right"><b>Password:</b></td>
		    <td><input type="password" name="pass" placeholder="enter password" required /></td>
		  </tr>
  

		  <tr align="right">
		      <td><a href="chechout.php?forgot_pass">Forgot Password?</a></td>
		  </tr>

		  <tr align="center">
		     <td colspan="2"><input type="submit" name="login" value="Login" /></td>
		  </tr>
  

		</table> <!--end of table-->

		 <h2 style="float:left; padding:15px;" ><a href="customer_register.php" style="text-decoration:none;">New Customer Register Here</a></h2>


		</form> <!--end of form-->
	    </div><!-- end of house box area-->
	    
	    
	    
	    
		
	</div> <!-- end of right side bar-->
	
    </div> <!--end of content area-->
    
    
    
    
    
    

<?php 
//including header
include("../includes/layouts/footer.php");
?>