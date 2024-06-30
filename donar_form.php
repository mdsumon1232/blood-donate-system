<?php 
 require('header.php');
 require('connection.php');

 $message = "";

 if(isset($_POST['submit'])){
  $full_name = $_POST['full_name'];
  $donar_email = $_POST['email'];
  $mobile	= $_POST['mobile'];
  $blood_group = $_POST['blood_group'];
  $last_donate = $_POST['last_donate'];
  $location = $_POST['location'];
  $donar_age = $_POST['age'];
  $donar_weight= $_POST['weight'];
  $password	=md5( $_POST['password']);
  $photo_name = $_FILES['profile']['name'];
  $temp_name = $_FILES['profile']['tmp_name'];
  $folder = 'images/'.$photo_name;
  move_uploaded_file($temp_name , $folder);
  
  if(empty($full_name) || empty($donar_email) || empty($mobile) || empty($blood_group) || empty($last_donate) || empty($location) || empty($donar_age) || empty($donar_weight) || empty($password) || empty($photo_name)){
    $message = "fill all the flied";
  }

 else {
    // check email already exits
  
    $check_email = "SELECT * FROM donar_data WHERE donar_email = '$donar_email'";

    $email_query =$conn -> query($check_email);

    if($email_query -> num_rows > 0){
      $message = "Email already used";
    }
    else{

      $insert_data = "INSERT INTO donar_data (full_name,donar_email,mobile,blood_group,last_donate,location,donar_age ,
                      donar_weight,password,photo)  VALUES ('$full_name' , '$donar_email' , '$mobile' , '$blood_group', 
                      '$last_donate','$location','$donar_age','$donar_weight','$password' , '$folder')";
                      
      $insert_query = $conn -> query($insert_data);

      if($insert_query){
        $message = "Registration successful";
      }
      else{
        echo "something error";
      }

    }



  }

 
 }





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donar registration</title>
    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/db1fd23933.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="user.css">
  </head>
  <body>
      <div class="container">
      <div class="form-container">
        <form action="donar_form.php" method="POST" class="form" enctype= multipart/form-data>
          <h3>Donar registration</h3>
          <div class="input-group">
            <div class="icon-container"><i class="fa-solid fa-user"></i></div>
            <input type="text" placeholder="Enter your Full Name" name="full_name" />
          </div>
          <div class="input-group">
            <div class="icon-container">
              <i class="fa-solid fa-envelope"></i>
            </div>
            <input type="email" placeholder="Enter your email"  name="email"/>
          </div>
          <div class="input-group">
            <div class="icon-container">
              <i class="fa-solid fa-mobile-screen-button"></i>
            </div>
            <input type="tel" pattern="[0-9]{11}" placeholder="Enter your mobile number" name="mobile" />
          </div>
          <div class="input-group">
            <div class="icon-container">
              <i class="fa-solid fa-droplet"></i>
            </div>
            <input type="text" placeholder="Enter your blood group" name="blood_group"/>
          </div>
          <div class="input-group">
            <div class="icon-container">
              <i class="fa-regular fa-calendar"></i>
            </div>
            <input type="date" placeholder="Enter last donate date" name="last_donate" />
          </div>
          <div class="input-group">
            <div class="icon-container">
              <i class="fa-solid fa-location-dot"></i>
            </div>
            <input type="text" placeholder="Enter your location" name="location" />
          </div>
          <div class="input-group">
            <div class="icon-container">
              <i class="fa-solid fa-calculator"></i>
            </div>
            <input type="number" placeholder="Enter your age" name="age" />
          </div>
          <div class="input-group">
            <div class="icon-container">
              <i class="fa-solid fa-weight-scale"></i>
            </div>
            <input type="number" placeholder="Enter your Weight" name="weight" />
          </div>
          <div class="input-group">
            <div class="icon-container"><i class="fa-solid fa-lock"></i></div>
            <input type="password" placeholder="Enter password" name="password"/>
          </div>
          <div class="input-group">
            <div class="icon-container"><i class="fa-solid fa-user"></i></div>
            <input type="file" id="file-input" name="profile" hidden />
            <label for="file-input" class="custom-file-label"
              >Choose file</label
            >
          </div>
          <div>
            <?php   echo isset($_POST['submit']) ? "<p>" . $message . "</p>" : "";  ?>
          </div>
          <input type="submit" value="registration" name="submit" class="user-btn" />
        </form>
      </div>
    </div>
  </body>
</html>
