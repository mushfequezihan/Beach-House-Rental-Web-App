<?php
//Author: mushfeque.zihan@gmail.com
//purpose: customer logout page logic 


//logout page
session_start();

//for logout
session_destroy();

//navigating after logout
echo"<script>window.open('index.php', '_self')</script>";
?>