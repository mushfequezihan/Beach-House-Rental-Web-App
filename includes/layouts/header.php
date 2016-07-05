<!doctype html>

<!--Author: mushfeque.zihan@gmail.com
purpose: header area design-->

<html>
<head>
	<meta content="text/html>" charset="utf-8"/>
	<title>Beach House Rental</title>
	<link content="text/css" rel="stylesheet" href="styles/style.css" media="all"/>
</head>



	
<body>
<!--main container-->
<div class="main_wrapper">
	
	
	
	
    <!--header-->
    <div class="header_wrapper">
	<a href="index.php"><img src="images/logo.png" width="600px" height="70px" style="float:left;"></a>
	<img src="images/ad_banner.gif" style="float:right;">
    </div> <!--end of header-->
    
    
    

    <!--navigation bar-->		
    <div id="navbar">
	<ul id="menu">
	    <li><a href="index.php">Home</a></li>
	    <li><a href="all_houses.php">All Houses</a></li>
	    <li><a href="my_account.php">My Account</a></li>
	    <li><a href="customer_register.php">Sign Up</a></li>
	    <li><a href="cart.php">Shopping Cart</a></li>
	    <li><a href="about.php">About</a></li>	
	    <li><a href="customer_login.php">Log In</a></li>	
	</ul>
	
	
	<!--search engine-->
	<div id="search_form">
	    <form method="get" action="results.php" enctype="multipart/form-data">
	    	<input type="text" name="user_query" placeholder="Search for Houses"/>
		<input type="submit" name="search" value="Go"/>
	    </form>
	</div>
    </div> <!--end of navigation bar-->
    
