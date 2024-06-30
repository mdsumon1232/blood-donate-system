<?php require('connection.php');  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blood request</title>
    <link rel="stylesheet" href="style.css" />
    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/db1fd23933.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="user.css" />
  </head>
   <?php

        if(isset($_POST['submit'])){
         
        $message = "";

          $patient_problem = $_POST['problem'];
          $blood_group = $_POST['blood_group'];
          $quantity = $_POST['blood_quantity'];
          $hospital_name = $_POST['hospital_name'];
          $hospital_location = $_POST['hospital_location'];
          $needed_date = $_POST['date'];
          $needed_time = $_POST['time'];
          $hemoglobin = $_POST['hemoglobin'];
          $mobile =  $_POST['mobile_number'];
          $report_name =  $_FILES['report']['name'];
          $tmp_name = $_FILES['report']['tmp_name'];
          $folder = 'images/'.$report_name;
          move_uploaded_file($tmp_name , $folder);

          if(empty($patient_problem) || empty($blood_group) ||empty($quantity) || empty($hospital_name) || empty($hospital_location)
           || empty($needed_date) || empty($needed_time) || empty($hemoglobin) || empty($mobile) || empty($report_name)){
          
             $message = "fill all the flied";
          }
          else{
            $check_exits = "SELECT* FROM blood_request WHERE patient_problem = '$patient_problem' AND blood_group = '$blood_group' AND 
              hemoglobin = '$hemoglobin' And mobile = '$mobile'";
            
            $query = $conn -> query($check_exits);
            if($query -> num_rows > 0){
              $message = "this request already submitted";
            }
            else{
              $insert_request = "INSERT INTO  blood_request (patient_problem,blood_group,quantity,hospital_name,hospital_location,
                                needed_date,needed_time,hemoglobin,mobile,hemoglobin_report) VALUES
                                ('$patient_problem' , '$blood_group' , '$quantity' , '$hospital_name' , '$hospital_location' , '$needed_date' ,
                                '$needed_time','$hemoglobin','$mobile', '$folder' )";
              
              $query = $conn -> query($insert_request);
              if($query){
                echo 'request successful';
              }
              else{
                echo 'something wrong';
              }
            }
          }

       
       
        }


  ?>
  <body>
    <div class="container">
      <div class="form-container">
        <form action="blood-request.php" method="POST" class="form" enctype="multipart/form-data">
          <h3>Blood request form</h3>
          <div class="input-group">
            <div class="icon-container">
              <label for="reason">Problem</label>
            </div>
            <input type="text" placeholder="What's the patient problem" name="problem" />
          </div>
          <div class="input-group">
            <div class="icon-container">
              <label for="reason">Group</label>
            </div>
            <input type="text" placeholder="Blood group" name="blood_group" />
          </div>
          <div class="input-group">
            <div class="icon-container">
              <label>Quantity</label>
            </div>
            <input type="number" placeholder="Blood Quantity" name="blood_quantity" />
          </div>
          <div class="input-group">
            <div class="icon-container">
              <label>Hospital:</label>
            </div>
            <input type="text" placeholder="Hospital name" name= "hospital_name" />
          </div>
          <div class="input-group">
            <div class="icon-container">
              <label>Hos. loca.:</label>
            </div>
            <input type="text" placeholder="Hospital location" name="hospital_location" />
          </div>
          <div class="input-group">
            <div class="icon-container">
              <label>Date</label>
            </div>
            <input type="date" placeholder="When will it be needed" name="date" />
          </div>
          <div class="input-group">
            <div class="icon-container">
              <label>Time</label>
            </div>
            <input type="time" placeholder="when will it take" name="time"/>
          </div>
          <div class="input-group">
            <div class="icon-container">
              <label>Hemo.</label>
            </div>
            <input
              type="number"
              placeholder="What is the amount of hemoglobin?"
              name="hemoglobin"
              step="any"
            />
          </div>
          <div class="input-group">
            <div class="icon-container">
              <label>Mobile</label>
            </div>
            <input type="tel" placeholder="Contact Number" name="mobile_number"/>
          </div>
          <div class="input-group">
            <div class="icon-container">
              <label>Report</label>
            </div>
            <input type="file" id="file-input" hidden name="report" />
            <label for="file-input" class="custom-file-label"
              >Hemoglobin report</label
            >
          </div>
          <div>
            <?php  echo isset($_POST['submit']) ? '<p>'. $message . '</p>' : ""; ?>
          </div>
          <input type="submit" value="Submit" name="submit" class="user-btn" />
        </form>
      </div>
    </div>
  </body>
</html>
