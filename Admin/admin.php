<?php 

session_start();
require('../connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/db1fd23933.js"
      crossorigin="anonymous"
    ></script>
</head>
<?php
 if(isset($_POST['submit'])){
  $admin_email = $_POST['email'];
  $password = md5($_POST['password']);
  echo $password;
  
  if(empty($admin_email) || empty($password)){
    echo "fill all the flied required";
  }
 
  else{
    $select_data = "SELECT * FROM admin WHERE email = '$admin_email' AND password = '$password'";

    $query = $conn -> query($select_data);

    if($query -> num_rows > 0){
      header('location:dashboard.php?login="success"');
      $admin_data = mysqli_fetch_array($query);

      $_SESSION['admin'] = $admin_data;

    }
    else{
      echo "not found";
    }
  }

 }

?>
<body>
    <div class="container">
      <form action="admin.php" method="POST" class="form">
        <h3>Login Admin</h3>
      <div class="input-group">
            <div class="icon-container">
              <i class="fa-solid fa-envelope"></i>
            </div>
            <input type="email" placeholder="Enter your email"  name="email"/>
          </div>
          <div class="input-group">
            <div class="icon-container"><i class="fa-solid fa-lock"></i></div>
            <input type="password" placeholder="Enter password" name="password"/>
          </div>
          <input type="submit" value="login" name="submit" class="user-btn" />
      </form>
    </div>
</body>
</html>