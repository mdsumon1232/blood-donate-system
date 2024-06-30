<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="left_navigation.css">
</head>
<body>
   
        
        <div class="left_navigation">
        <div class="profile">
            <div class="profile_img">
                <?php
                 if(isset($_SESSION['admin'])){
                   
                 
                    echo " <img src='../{$_SESSION['admin']['image']}' alt='profile'>";
                 }
                ?>
               
            </div>

        </div>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="donar_list.php">Donar</a></li>
            <li><a href="request_list.php">Blood Requests</a></li>
            <li><a href="all_post.php">All Post</a></li>
            <li><a href="blog_post.php">Create post</a></li>
        </ul>
    </div>
  
</body>
</html>