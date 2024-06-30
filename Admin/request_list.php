<?php 
 session_start();
 if(!isset($_SESSION['admin'])){
    header('location:admin.php');
   }
?>

<?php require('header.php') ?>
<?php require('../connection.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood request</title>
    <link rel="stylesheet" href="request.css">
</head>
<body>
    <div class="container">
        <div class="left-menu">
            <?php require('left_navigation.php');  ?>
        </div>
        <div class="right-side">
            <h2>Blood Request list</h2>
        <div class="requests">
            <?php  
        $select_request = "SELECT * FROM blood_request ";
        $query = $conn -> query($select_request);
        if($query -> num_rows > 0){
        
          while($request_details = mysqli_fetch_array($query)){
              echo "
                <div class='request-card'> 
   
                 <h3> Blood request </h3>
                 <p> Patient Problem : $request_details[patient_problem]  </p>
                 <p> Blood  : $request_details[blood_group]  </p>
                 <p> Patient Quantity : $request_details[quantity] bag </p>
                 <p> Hospital Name : $request_details[hospital_name]  </p>
                 <p> Hospital Location : $request_details[hospital_location]  </p>
                 <p> Date : $request_details[needed_date]  </p>
                 <p> Time : $request_details[needed_time]  </p>
                 <p> Hemoglobin : $request_details[hemoglobin] g/dL  </p>
                 <p> Mobile Number : $request_details[mobile]  </p>
                  <h4> Hemoglobin report  </h4>
                 <img src='../$request_details[hemoglobin_report]'>

                </div>
                
              ";
          }

        }
        else{
            echo " <p> No blood request  </p> ";
        }
            ?>
        </div>
        </div>
    </div>
</body>
</html>