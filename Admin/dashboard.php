<?php 
session_start();
require('header.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <!-- font awesome  -->
    <script
      src="https://kit.fontawesome.com/db1fd23933.js"
      crossorigin="anonymous"
    ></script>
</head>
<?php

if(isset($_GET['login'])){
    $success = $_GET['login'];
    if($success){
        echo "<script> alert('login successful')  </script>";
    }
}

 require('../connection.php');

 function donar_number ($group){
    global $conn;
    $select_data = "SELECT * FROM donar_data WHERE blood_group = '$group'";
    $query = $conn -> query($select_data);
    if($query){
     
     return $query->num_rows;
    }
    else{
        return 0;
    }
 }

if(!isset($_SESSION['admin'])){
 header('location:admin.php');
}


 
?>
<body>
    <div class="container">
       <div class="left_menu">
        <?php require('left_navigation.php');  ?>
       </div>
       <div class="right_side">

       <div class="donar_number">
       <h2>A+
        <span class="icon">  <i class="fa-solid fa-droplet"></i></span>
       </h2>
       <p><?php echo donar_number("A+") ?></p>
       </div>
       <div class="donar_number">
       <h2>A-  <span class="icon">  <i class="fa-solid fa-droplet"></i></span></h2>
       <p><?php echo donar_number("A-") ?></p>
       </div>
       <div class="donar_number">
       <h2>B+  <span class="icon">  <i class="fa-solid fa-droplet"></i></span></h2>
       <p><?php echo donar_number("B+") ?></p>
       </div>
       <div class="donar_number">
       <h2>B-  <span class="icon">  <i class="fa-solid fa-droplet"></i></span></h2>
       <p><?php echo donar_number("B-") ?></p>
       </div>
       <div class="donar_number">
       <h2>O+  <span class="icon">  <i class="fa-solid fa-droplet"></i></span></h2>
       <p><?php echo donar_number("O+") ?></p>
       </div>
       <div class="donar_number">
       <h2>O-  <span class="icon">  <i class="fa-solid fa-droplet"></i></span></h2>
       <p><?php echo donar_number("O-") ?></p>
       </div>
       <div class="donar_number">
       <h2>AB+  <span class="icon">  <i class="fa-solid fa-droplet"></i></span></h2>
       <p><?php echo donar_number("AB+") ?></p>
       </div>
       <div class="donar_number">
       <h2>Ab-  <span class="icon">  <i class="fa-solid fa-droplet"></i></span></h2>
       <p><?php echo donar_number("AB-") ?></p>
       </div>
       <div class="donar_number">
       <h2><i class="fa-solid fa-droplet"></i>
       </h2>
       <h3>Total Donar</h3>
       <p>0</p>
       </div>
       <div class="donar_number">
        <h2><i class="fa-solid fa-droplet"></i></h2>
       <h3>Total ready for donate</h3>
       <p>0</p>
       </div>
       <div class="donar_number">
       <h2><i class="fa-solid fa-droplet"></i></h2>
       <h3>Total request</h3>
       <p>0</p>
       </div>

       </div>
    </div>
</body>
</html>