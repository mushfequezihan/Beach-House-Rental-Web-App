<?php
//Author: mushfeque.zihan@gmail.com
//purpose: all the functions logic working behind the web app



//Database connection
include("../../includes/db.php");




//working on cart to get the user ip address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } //end of ifelse
 
    return $ip;
} //end if getIp





 
//validating visitors ip address has unique cart order and creating booking cart
function cart(){
	//making a global connection varibale for database connection in function!
	global $connection;
	
	if(isset($_GET["book_cart"])){
		//getIp function on local variable
		$ip = getIp();
		
		$house_id = $_GET["book_cart"];
		
		$check_house = "select * from cart where ip_add='$ip' AND house_id='$house_id'";
		$run_check_house = mysqli_query($connection, $check_house);
		
		//if the cart is empty then new cart order on visitors ip
		if(mysqli_num_rows($run_check_house) > 0){
			echo "";
		}else{
			$insert_house = "insert into cart (house_id, ip_add) values ('$house_id', '$ip')";
			$run_insert_house = mysqli_query($connection, $insert_house);
			
			//refreshing the page and redirecting to the index page
			echo "<script>window.open('index.php', '_self')</script>";
		} // end of ifelse
	} //end of isset
} //end of cart








//getting the house selection on page
function selected_house(){
	//making a global connection varibale for database connection in function!
	global $connection;
	
	if(isset($_GET["book_cart"])){
		//getIp function on local variable
		$ip = getIp();
		
		$get_select = "select * from cart where ip_add = '$ip'";
		$run_select = mysqli_query($connection, $get_select);
		
		$count_select = mysqli_num_rows($run_select);
	} else{
		//getIp function on local variable
		$ip = getIp();
		
		$get_select = "select * from cart where ip_add = '$ip'";
		$run_select = mysqli_query($connection, $get_select);
		
		$count_select = mysqli_num_rows($run_select);
	} //end of ifelse
	
	echo $count_select;
} // end of selected_house








//getting the price on the cart page
function price(){
	//making a global connection varibale for database connection in function!
	global $connection;
	
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
			
			//calculating house price
			$values = array_sum($db_house_price);
			
			$total += $values;
		} //end of 2nd while
	} //end of 1st while
	
	echo "$" . $total;
		
} //end of price











//function for getting houses from the database
function getHouse(){
	
	//making a global connection varibale for database connection in function!
	global $connection;
	
	//condition for states selection on index page from url get method
	if(!isset($_GET["states"])){
		//condition for categories selection on index page from url get method
		if(!isset($_GET["categories"])){
			
	
	//displaying houses on the index page from the database
	
	$get_houses = "select * from houses order by rand() LIMIT 0,4";
	
	$run_houses = mysqli_query($connection, $get_houses);
	
	while($row_houses = mysqli_fetch_array($run_houses)){
		
		$house_id = $row_houses["house_id"];
		$house_state = $row_houses["state_id"];
		$house_cat = $row_houses["cat_id"];
		$house_title = $row_houses["house_title"];
		$house_img = $row_houses["house_img1"];
		$house_price = $row_houses["house_price"];
		$house_desc = $row_houses["house_desc"];
		
	
		//displaying houses individually 
		echo "
			<!--individual house box design-->
			<div id='single_house'>
			
			<h3>$house_title</h3>
			<img src='admin_area/house_images/$house_img' width='350px' height='180px' /> <br />
			
			<b>$$house_price /night</b>
			
			<a href='details.php?house_id=$house_id' style='float:left;'>Details</a>
			<a href='index.php?book_cart=$house_id'><button style='float:right;'>Book Now</button></a>
			</div><!--end of individual house box design-->
		
			
		"; //end of displaying echo!
		
	} //end of while loop
	
} // end of categories condition
} // end of states condition

} //end of getHouse function







//functions for get states selection on index page
//targetting houses only by state ids
function selectedStateHouses(){
	
	//making a global connection varibale for database connection in function!
	global $connection;
	
	//condition for states selection on index page from url get method
	if(isset($_GET["states"])){
		
		//local varibale for state id and url get method id
		$state_id = $_GET["states"];
	
	//displaying houses on the index page from the database
	
	$get_state_houses = "select * from houses where state_id='$state_id'";
	
	$run_state_houses = mysqli_query($connection, $get_state_houses);
	
	//checking if there is no match with states
	$count = mysqli_num_rows($run_state_houses);
	if($count == 0){
		echo "<h2>No houses found in this state!</h2>";
	} //end of state count check
	
	while($row_state_houses = mysqli_fetch_array($run_state_houses)){
		
		$house_id = $row_state_houses["house_id"];
		$house_state = $row_state_houses["state_id"];
		$house_cat = $row_state_houses["cat_id"];
		$house_title = $row_state_houses["house_title"];
		$house_img = $row_state_houses["house_img1"];
		$house_price = $row_state_houses["house_price"];
		$house_desc = $row_state_houses["house_desc"];
		
	
		//displaying houses individually 
		echo "
			<!--individual house box design-->
			<div id='single_house'>
			
			<h3>$house_title</h3>
			<img src='admin_area/house_images/$house_img' width='350px' height='180px' /> <br />
			
			<b>$$house_price /night</b>
			
			<a href='details.php?house_id=$house_id' style='float:left;'>Details</a>
			<a href='index.php?book_cart=$house_id'><button style='float:right;'>Book Now</button></a>
			</div><!--end of individual house box design-->
		
			
		"; //end of displaying echo!
		
	} //end of while loop
	
} // end of states condition
} // end of selectedStateHouses













//functions for categories selection on index page
//targetting houses only by cat ids
function selectedCatsHouses(){
	
	//making a global connection varibale for database connection in function!
	global $connection;
	
	//condition for categories selection on index page from url get method
	if(isset($_GET["categories"])){
		
		//local varibale for state id and url get method id
		$cat_id = $_GET["categories"];
	
	//displaying houses on the index page from the database
	
	$get_cat_houses = "select * from houses where cat_id='$cat_id'";
	
	$run_cat_houses = mysqli_query($connection, $get_cat_houses);
	
	//checking if there is no match with categories
	$count = mysqli_num_rows($run_cat_houses);
	if($count == 0){
		echo "<h2>No houses found for this categories!</h2>";
	} //end of cat count check
	
	while($row_cat_houses = mysqli_fetch_array($run_cat_houses)){
		
		$house_id = $row_cat_houses["house_id"];
		$house_state = $row_cat_houses["state_id"];
		$house_cat = $row_cat_houses["cat_id"];
		$house_title = $row_cat_houses["house_title"];
		$house_img = $row_cat_houses["house_img1"];
		$house_price = $row_cat_houses["house_price"];
		$house_desc = $row_cat_houses["house_desc"];
		
	
		//displaying houses individually 
		echo "
			<!--individual house box design-->
			<div id='single_house'>
			
			<h3>$house_title</h3>
			<img src='admin_area/house_images/$house_img' width='350px' height='180px' /> <br />
			
			<b>$$house_price /night</b>
			
			<a href='details.php?house_id=$house_id' style='float:left;'>Details</a>
			<a href='index.php?book_cart=$house_id'><button style='float:right;'>Book Now</button></a>
			</div><!--end of individual house box design-->
		
			
		"; //end of displaying echo!
		
	} //end of while loop
	
} // end of categories condition
} // end of selectedCatHouses
















//function for getting all states from the database
function getStates(){
	
	//making a global connection varibale for database connection in function!
	global $connection;
	
        //getting categories from the database 
        $get_state = "select * from states";
        $run_state = mysqli_query($connection, $get_state);
       
        while($row_state = mysqli_fetch_array($run_state)){
	       
 	    $state_id = $row_state["state_id"];
 	    $state_name = $row_state["state_name"];
	       
     	    echo "<li><a href='index.php?states=$state_id'>$state_name</a></li>";	
        } //end of while
} //end of getStates










//function for getting all categories from the database
function getCats(){
	
	//making a global connection varibale for database connection in function!
	global $connection;
	
       //getting categories from the database 
       $get_cats = "select * from categories";
       $run_cats = mysqli_query($connection, $get_cats);
       
       while($row_cats = mysqli_fetch_array($run_cats)){
	       
	    $cat_id = $row_cats["cat_id"];
	    $cat_type = $row_cats["cat_type"];
	       
    	    echo "<li><a href='index.php?categories=$cat_id'>$cat_type</a></li>";	
       } //end of while
} //end of getCats






?>