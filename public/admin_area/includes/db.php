<?php
//Author: mushfeque.zihan@gmail.com
//purpose: database connection

//creating database connection
$connection = mysqli_connect("localhost","root","root","rentals");

//testing if connection succeeded 
if (mysqli_connect_errno()){
	die("Database connection failed: " . mysqli_connect_errno());
}
?>