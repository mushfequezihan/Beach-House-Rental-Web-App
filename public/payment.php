<!--//Author: mushfeque.zihan@gmail.com
//purpose: payment method page customer navigated to the page for pay by paypal or credit card the information will save on the database-->

<br/>
<div>
	<h2 align="center">*Pay Now*</h2>
	
	<p style="text-align:center;"><img src="images/payment.jpg"></p>
	
	 <form action="payment.php" method="POST">

	<table align="center">
		
	    <tr align ="center">
		    
	       <td> 
		       <label><b>Card Type/PayPal</b> </label> 
		       <select name="c_type">
			       <option>PayPal</option> 				
			       <option>Visa</option> 				
			       <option>MasterCard</option>
			       <option>Discover</option>
			       <option>AmericanExpress</option> 
		       </select> 
	       </td>
	       
	       <td> <label><b>Card/Acc Number</b></label> 
		       <input type="text" name="c_number" required> 
	       </td>
	       
	        <td> <label><b>Customer Name</b></label> 
			<input type="text" name="c_name" required> 
		</td>
		
	       <td> <label><b>Exp. Date</b></label> 
		       <input type="text" size="10" name="c_date" placeholder="yyyy-mm-dd" required> 
	       </td>
	       
	        <td> <label><b>Security Code</b></label>
			 <input type="text" size="3" name="c_code" required> 
		 </td>
		 
	     </tr>

	</table><!--end of apyment table-->
	
	            <br/><br/>
		    
	<center>
	     <button type="submit" name="pay" value="upload" style="margin-top:15px;"><b>Make Payment</b></button>   
     </center>
     
	  </form><!--end of form-->
</div><!--end of div-->





<?php
//script for payment table

//Database connection
include("../includes/db.php");

//including functions
require_once("../includes/functions.php");

     if(isset($_POST['pay'])){
           
           $ip = getIp();

            $c_type = $_POST['c_type'];
            $c_number = $_POST['c_number'];
            $c_name = $_POST['c_name'];
            $c_date = $_POST['c_date'];
            $c_code = $_POST['c_code'];

   $insert_card = "INSERT INTO payment (pay_ip,pay_type,pay_number,pay_name,pay_date,pay_code) VALUES ('$ip','$c_type','$c_number','$c_name','$c_date','$c_code')";
            
            $run_card = mysqli_query($connection, $insert_card);

            if ($run_card){

            echo "<script>alert('Thank You for your payment!! We will sent your confirmation shortly...')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            }
     }


?>