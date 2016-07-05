<?php
//Author: mushfeque.zihan@gmail.com
//purpose: admin area section where all the house in inventory can stored by the form input page

//Database connection
include("includes/db.php");
?>



<!doctype html>
<html>
<head>
 <meta content="text/html" charset="utf-8">
 <title>Admin Area: Insert Houses</title>
 <link content="text/css" rel="stylesheet" href="styles/admin_style.css" media="all"/>
</head>





<body bgcolor="grey">

<div id="stylized" class="myform">
	
 <form action="insert_houses.php" method="POST" enctype="multipart/form-data">


  <h2 align="center"><b>Insert New House Information</b></h2>
  
  
      <label>Title:
          <span class="small">Add House Title</span>
      </label>
  <input type="text" name="house_title" required> 
  
  <br/><br/><br/>
  
  
  
      <label>States:
          <span class="small">Add House State Area</span>
      </label>
  <select name="house_state">
      <option>Select State</option>
      <?php
      //getting states from the database 
      $get_state = "select * from states";
      $run_state = mysqli_query($connection, $get_state);
      
      while($row_state = mysqli_fetch_array($run_state)){
       
      $state_id = $row_state["state_id"];
      $state_name = $row_state["state_name"];
       
      echo "<option value='$state_id'>$state_name</option>";	
      }
      ?>
      
      
  </select>

<br/><br/><br/>




      <label>Categories:
          <span class="small">Add House Category Type</span>
      </label>
  <select name="house_cat">
      <option>Select a Type</option>
      
      <?php
      //getting categories from the database 
      $get_cats = "select * from categories";
      $run_cats = mysqli_query($connection, $get_cats);
      
      while($row_cats = mysqli_fetch_array($run_cats)){
       
      $cat_id = $row_cats["cat_id"];
      $cat_type = $row_cats["cat_type"];
       
      echo "<option value='$cat_id'>$cat_type</option>";	
      }
      ?>
      
  </select>
  
  <br/><br/>
  
  

      <label>Image One:
          <span class="small">Add First Image of the House</span>
      </label>
  <input type="file" name="house_img1" required>
  
  <br/><br/>

      <label>Image Two:
          <span class="small">Add Second Image of the House</span>
      </label>
  <input type="file" name="house_img2" required>

  <br/><br/>
  
      <label>Price:
          <span class="small">Add House Price</span>
      </label>
   <input type="text" name="house_price" required>
   
   <br/><br/>
   
      <label>Description:
          <span class="small">Add House Description:</span>
      </label>
   <textarea name="house_desc" rows="6" cols="30" ></textarea>
   
   <br/><br/>
  
     <label>Keywords:
         <span class="small">Add House Keywords:</span>
     </label>
  <input type="text" name="house_key" required>
  
      <button type="submit" name="submit" style="margin-top:22px;">Submit</button>


 </form>
</div> <!-- end of form class-->
	
</body>
</html>




<?php

//inserting new houses infromation from the admin area insert form page to database table called houses
//working on submit button 


         if(isset($_POST["submit"])){

         // getting the text data from the field
            $house_title = $_POST["house_title"];
            $house_cat = $_POST["house_cat"];
	    $house_price = $_POST["house_price"];
	    $house_desc = $_POST["house_desc"];
	    $house_key = $_POST["house_key"];
	    $house_status = "on";
	    

            // getting the images from the field
            $house_img1 = $_FILES["house_img1"]["name"];
	    $house_img2 = $_FILES["house_img2"]["name"];
	    
	    //images temp names
            $img1_tmp = $_FILES["house_img1"]["tmp_name"];
	    $img2_tmp = $_FILES["house_img2"]["tmp_name"];
	    
	    
	    //validating form before uploading to database
	    if($house_title == "" OR $house_desc == "" OR $house_img1 == ""){
		    
	       echo "<script>alert('Please fill up the all required fields!')</script>";
	       exit();
	    	
	    }
	    else{
            
		    //uploading images to admin area to its own folder
            move_uploaded_file($img1_tmp,"house_images/$house_img1");
	    move_uploaded_file($img2_tmp,"house_images/$house_img2");
            
            $insert_house = "INSERT INTO houses (cat_id,date,house_title,house_img1,house_img2,house_price,house_desc,house_key,status) VALUES ('$house_cat',NOW(),'$house_title','$house_img1','$house_img2','$house_price','$house_desc','$house_key','$house_status')";
	    
            
            $run_insert_house = mysqli_query($connection, $insert_house);

            if ($run_insert_house)  {

            echo "<script>alert('House information has been inserted successfully!')</script>";
	    exit();
            //echo "<script>window.open('index.php','_self')</script>";
    } 
            }

         }

?>