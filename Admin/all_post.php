<?php 
 session_start();
 if(!isset($_SESSION['admin'])){
    header('location:admin.php');
   }

   require('../connection.php');

   require('header.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Post</title>
    <link rel="stylesheet" href="all_post.css">
</head>
<body>
    <div class="container">
     <div class="left_menu">
        <?php  require('left_navigation.php');   ?>
     </div>
     <div class="right_side">
     <?php
       
       $select_post = "SELECT * FROM blog";
        
       $select_data_query = $conn -> query($select_post);
        echo "
          <table class='table'>
          <thead>
            <tr>
                <th> Cover </th>
                <th> Title </th>
                <th> Post </th>
                <th colspan='2'> Action </th>
            <tr/>
          </thead>
        ";
       while($post_array = mysqli_fetch_array($select_data_query)){
           
         echo "
           <tbody>
                <tr>
                   <td> <img src='$post_array[cover_photo]'>  </td>
                   <td>  $post_array[title] </td>
                   <td>  $post_array[created_at] </td>
                   <td> <a href='post_edit.php?id=$post_array[blog_id]'> Edit <a> </td>
                   <td> <a href=''> Delete <a> </td>
                </tr>
           </tbody>
         
         ";

       }

       echo "</table>";

       
      ?>
     </div>
    </div>
</body>
</html>