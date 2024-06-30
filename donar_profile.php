<?php require("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donar profile</title>
    <link rel="stylesheet" href="donar_profile.css">
</head>
<body>
    <?php require('header.php'); ?>
   <div class="container">
    <div class="profile-container">

<?php
 
if(isset($_GET['id'])){
    $donar_id = $_GET['id'];

    $select_donar = "SELECT * FROM donar_data WHERE donar_id = '$donar_id'";
    $query = $conn -> query($select_donar);

    $fetch_donar_data = mysqli_fetch_array($query);
 
    $last_donate_date = $fetch_donar_data['last_donate'];

    $start_date = new DateTime($last_donate_date);
    $present_date = new DateTime();

 $interval = $present_date->diff($start_date);

         $months = $interval->m;
        $days = $interval->d;
     $hours = $interval->h;
    $minutes = $interval -> m;
    $second = $interval -> s;
    
    // if($months > 1){
    //     $to_mail = $fetch_donar_data['donar_email'];
    //     $subject = "Blood donate alert";
    //     $message = "You are ready to donate blood . You are lasted donate in";
    //     $header = "From:durbar-20.org";
    //     if(mail( $to_mail,$subject , $message , $header )){
    //         echo"mail send";
    //     }
    //     else{
    //         echo "mail not send";
    //     }

    // }

    echo "
    
     <div class='profile-img'>
       <img src='$fetch_donar_data[photo]'>
       </div>
        <div class='profile-text'>
        <h3>$fetch_donar_data[full_name]</h3>
        <p>Blood Group: $fetch_donar_data[blood_group] </p>
        <address>city: $fetch_donar_data[location]</address>
        <p>Mobile:$fetch_donar_data[mobile]</p>    
       <p>Email: $fetch_donar_data[donar_email] </p>
       <p>Last Donate :$months months $days days $hours hours $minutes minutes ago </p>
        </div>
      
    ";
}


?>

    </div>
   </div>
</body>
</html>