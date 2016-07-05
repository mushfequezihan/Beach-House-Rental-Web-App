<?php
//Author: mushfeque.zihan@gmail.com
//purpose: setting up database connection to phpMyAdmin 

//creating database connection
$connection = mysqli_connect("localhost","root","root","rentals");

//testing if connection succeeded 
if (mysqli_connect_errno()){
	die("Database connection failed: " . mysqli_connect_errno());
}
?>