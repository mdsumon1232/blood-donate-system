<?php 
session_start();
if(!isset($_SESSION['admin'])){
  header('location:admin.php');
 }

require('../connection.php');

require('header.php')

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donar List</title>
    <link rel="stylesheet" href="donar_list.css">
  </head>
  <body>
    <div class="container">
      <div class="left_menu">
        <?php require('left_navigation.php'); ?>
      </div>
      <div class="right_side">
      <h2 class="donar-list-title">Donar List</h2>
      <table class="donar-table">
        <thead>
          <tr>
            <th>Serial No</th>
            <th>Name</th>
            <th>Mobile Number</th>
            <th>Email</th>
            <th>Blood Group</th>
            <th>Last Donate</th>
            <th>Area</th>
            <th colspan="3">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php   
          
          $select_data = "SELECT * FROM donar_data ";
          $query = $conn -> query($select_data);

          while($donar = mysqli_fetch_array($query)){
          
            echo "
              <tr>
            <td>1</td>
            <td>$donar[full_name]</td>
            <td><a href='tel:01747533104'>$donar[mobile]</a></td>
            <td>
              <a href='mailto:$donar[donar_email]'
                >$donar[donar_email]</a
              >
              <td>$donar[blood_group]</td>
              <td>$donar[last_donate]</td>
              <td>$donar[location]</td>
              <td>
                <a class='btn' href='donar_profile.php?id=$donar[donar_id]'>Profile</a>
                <a class='btn' href=''>Edit</a>
                <a class='btn delete' href=''>Delete</a>
              </td>
            </td>
          </tr>
            
            ";


          }

?>
        </tbody>
      </table>
      </div>
    </div>
  </body>
</html>
