<?php

//Author: mushfeque.zihan@gmail.com
//purpose: cart page where customer can remove and update there booking


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
		    
		   
	    		<?php
	    		//calling function for total dutration of time in cart 
	    		selected_house();
	    		?>
		          House Selected - Price:
			  
			  <?php
			  //callign fucntion for total price in selected cart
			  price();
			  ?>
			   /night
			  
		      <a href="cart.php" style="color:yellow;">Go to Cart</a>
		</div><!--end of headline content-->
    		</div><!--end of headline_title-->
	    </div><!--end of headline bar-->
    		  
    		  
    	   
	    
	    <!--dispalying houses div tag on right content area-->
	    <div id="house_box">
		   <br/> 
		   <div align="center"><h2><i>Update your Booking or Checkout</i></h2></div>
	 	 	
	    <!--working on form as a cart page-->
		<form action="" method="post" enctype="multipart/form-data">
		 
		 <table align="center" width="800" bgcolor="grey" cellspacing="10">
		   
		    <tr align="center">
		    	<th>Remove</th>
			<th>House(S)</th>
			<th>Duration</th>
			<th>Price</th>
		    </tr>
		    
		    
		    <?php
	    	//local initial variable for price
	    	$total = 0;
	
	    	//getIp function on local variable
	    	$ip = getIp();
	
	    	$select_price = "select * from cart where ip_add = '$ip'";
	    	$run_price = mysqli_query($connection, $select_price);
	
	    	//working with two table in database houses and cart 
	    	while($house_price = mysqli_fetch_array($run_price)){
		
	    		$house_id = $house_price["house_id"];
		
	    		$house_price = "select * from houses where house_id = '$house_id'";
	    		$run_house_price = mysqli_query($connection, $house_price);
		
	    		while($price = mysqli_fetch_array($run_house_price)){
	    			$db_house_price = array($price["house_price"]);
				
				//needed info for the cart page from the database
				$house_title = $price["house_title"];
				$house_img = $price["house_img1"];
				$house_price = $price["house_price"];
				
	    			//calculating house price
	    			$values = array_sum($db_house_price);
			
	    			$total += $values;
	    
	
		    ?>
		  
		    
		    <!--displaying product info in cart page-->
		    <tr align="center">
		    	<td><input type="checkbox" name="remove[]" value="<?php echo $house_id; ?>"></td>
			<td><?php echo $house_title; ?><br/>
			<img src="admin_area/house_images/<?php echo $house_img; ?>" width="250px" height="120px"/>	
			</td>
			<td><input type="text" size="3" name="duration" >night</td>
			
			<?php
			//duration_qty
			if(isset($_POST["update_cart"])){
			
			    $duration = $_POST["duration"];
			    $update = "update cart set duration_qty = '$duration'";
			    $run_update = mysqli_query($connection, $update);
			    
			    //depending on duration total price is changing on house price
			    $total = $total * $duration;
			
			
			}
			?>
			
			
			<td>
				<?php
				//if updated cart with multiple nights
				if(isset($_POST["update_cart"])){
				 echo "$" . $total ;
				 }else{
				  echo "$" . $house_price;
				 } //end of ifelse
				 ?> 
			</td>
		    </tr>
		    
		    
		    
		    
		    <?php
		} //end of 2nd while
	} //end of 1st while
		    ?>
		    
		    
		    <tr align="right">
		    	<td colspan="3"><b>Sub Total:</b></td>
			<td><?php echo "$" . $total; ?></td>
		    </tr>
		    
		    
		    
		    <!--updating the cart functionality-->
		    <tr>
		    	<td><input type="submit" name="update_cart" value="Update Cart"/></td>
			<td><input type="submit" name="continue" value="Continue Booking"/></td>
			<td><button><a href="checkout.php" style="text-decoration:none">CHECKOUT</a></button></td>
		    </tr>
		 </table>	
				
		</form>
		
<?php

// functionality for update cart(remove)

$ip = getIp();

if(isset($_POST["update_cart"])){
	foreach($_POST["remove"] as $remove_id){
		
		$delete = "delete from cart where house_id = '$remove_id' AND ip_add = '$ip'";
		$run_delete = mysqli_query($connection, $delete);
		
		//redirecting and refreshing the page 
		if($run_delete){
			echo "<script>window.open('cart.php', '_self')</script>";
		} //end of if
	} //end of foreach
} //end of if


// functionality for update cart(continue shopping)
if(isset($_POST["continue"])){
	echo "<script>window.open('index.php', '_self')</script>";
}


?>
		
	    </div><!-- end of house box area-->
	    
	    
	    
	    
		
	</div> <!-- end of right side bar-->
	
    </div> <!--end of content area-->
    
    
    
    
    
    

  <?php 
  //including header
  include("../includes/layouts/footer.php");
  ?>