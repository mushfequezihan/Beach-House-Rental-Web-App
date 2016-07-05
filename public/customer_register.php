<?php
//Author: mushfeque.zihan@gmail.com
//purpose: registration form for customer where data are saving on database


//Database connection
include("../includes/db.php");

//including functions
require_once("../includes/functions.php");

//including header
include("../includes/layouts/header.php");

//starting session 
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
		   
		   
		   
		   
		    <br/>
		    <!--register page for customer registration-->
	  <form action="customer_register.php" method="POST" enctype="multipart/form-data">

		  <table align="center" width="800" bgcolor="pink">
		  	
			<tr><h2>Create an Account</h2></tr>
			
			<tr align="left">
				<td align="right">Customer Name:</td>
				<td><input type="text" name="c_name" required></td>
			</tr>
			
			<tr align="left">
				<td align="right">Customer Email:</td>
				<td><input type="text" name="c_email" required></td>
			</tr>
			
			<tr align="left">
				<td align="right">Customer Password:</td>
				<td><input type="password" name="c_pass" required></td>
			</tr>
			
			<tr align="left">
				<td align="right">Customer State:</td>
				<td><select name="c_state">
					<option>Select a State</option>
					<option>New York</option>
					<option>New Jersy</option>
					<option>Pensylvenia</option>
					<option>California</option>
					<option>Chicago</option>
					<option>Ohio</option>
					<option>Florida</option>
					<option>Texas</option>
					<option>Washington</option>
					<option>Michigan</option>
				</select></td>
			</tr>
			
			<tr align="left">
				<td align="right">Customer City:</td>
				<td><input type="text" name="c_city" required></td>
			</tr>
			
			<tr align="left">
				<td align="right">Customer Contact:</td>
				<td><input type="text" name="c_contact" required></td>
			</tr>
			
			<tr align="left">
				<td align="right">Customer Address:</td>
				<td><input type="text" name="c_add" required></td>
			</tr>
			
			<tr align="left">
				<td align="right">Customer Image:</td>
				<td><input type="file" name="c_img" required></td>
			</tr>
			
			<tr align="center">
				<td colspan="6"><input type="submit" name="register" value="Register"></td>
			</tr>
			
			
		  </table> <!--end of table-->

	  </form> <!--end of form-->
	  
		
		
	    </div><!-- end of house box area-->
	    
	    
	    
	    
		
	</div> <!-- end of right side bar-->
	
    </div> <!--end of content area-->
    
    
    
    
    
    <?php
    //working on insert customer registration value in the database from the form
    if(isset($_POST["register"])){
    	
	    //getting ip from user 
	    $ip = getIp();
	    
	    //getting values from the form
	    $name = $_POST["c_name"];
	     $email = $_POST["c_email"];
	      $pass = $_POST["c_pass"];
	       $state = $_POST["c_state"];
	        $city = $_POST["c_city"];
		 $contact = $_POST["c_contact"];
		  $add = $_POST["c_add"];
		 
		  //file type images
		  $img = $_FILES["c_img"]["name"];
		  $img_tmp = $_FILES["c_img"]["tmp_name"];
		  
		  //moving images to the saving folder
		  move_uploaded_file($img_tmp,"customer/customer_images/$img");
		  
		  //query to database
		  $insert_reg = "insert into customers (customer_ip, customer_name, customer_email, customer_pass, customer_state, customer_city, customer_contact, customer_add, customer_img) values ('$ip', '$name', '$email', '$pass', '$state', '$city', '$contact', '$add', '$img')";
    	      		
		  //running the query
		  $run_insert_reg = mysqli_query($connection, $insert_reg);
		  
		  //validating registration
                  if ($run_insert_reg){

                  echo "<script>alert('You are now registered! Thanks.')</script>";
                  echo "<script>window.open('index.php','_self')</script>";
                  }


// //detecting ip address as user from the cart
// $user_cart = "select * from cart where ip_add = '$ip'";
//
// $run_user_cart = mysqli_query($connection, $user_cart);
//
// $check_cart = mysqli_num_rows($run_user_cart);
//
// //checking if user has order in the cart while creating account
// if($check_cart == 0){
//
// 	//if the customer is registered or not
// 	$_SESSION["customer_email"] = $email;
//
// 	echo "<script>alert('You are now registered! Thanks.)</script>";
// 	echo "<script>window.open('customer/my_account.php', '_self')</script>";
// } else{
//
// 	//if the customer is registered or not
// 	$_SESSION["customer_email"] = $email;
//
// 	echo "<script>alert('You are now registered! Thanks.)</script>";
// 	echo "<script>window.open('checkout.php', '_self')</script>";
//
// }

    
    
    } //end of main if
    ?>
    
    
    
    
    
    

<?php 
//including footer
include("../includes/layouts/footer.php");
?>