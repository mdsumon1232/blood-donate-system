<?php 
session_start();

if(!isset($_SESSION['admin'])){
  header('location: admin.php');
}
 
?>

<?php require('header.php'); ?>
<?php require('../connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create blog</title>
    <link rel="stylesheet" href="blog_post.css"> 
</head>


<?php
 
 if(isset($_POST['post'])){

  $title = $_POST['title'];
  $article = $_POST['article'];
  $image_name = $_FILES['cover_photo']['name'];
  $tmp_name = $_FILES['cover_photo']['tmp_name'];
  $folder = '../images/'.$image_name;
  
move_uploaded_file($tmp_name , $folder);

  $author_email = $_SESSION['admin']['email'];

  if(empty($title) || empty($article) || empty($image_name)){
    echo 'fill all the flied';
  }
  else{
    
   $insert_data = "INSERT INTO  blog (title,article,	author_email,	cover_photo)
                   VALUES ('$title' , '$article' , '$author_email' , '$folder') ";
   $conn -> query($insert_data);

  }
 

 }


?>

<body>
    <div class="container">
      <div class="left_menu">
        <?php require('left_navigation.php') ?>
      </div>
      <div class="right_side">
         <form action="blog_post.php" method="POST" enctype="multipart/form-data">
           
         <div class="form_group">
          <label class="flied_name">Cover Photo</label>
          <input type="file" id="cover" name="cover_photo" hidden>
          <label for="cover">Browse</label>
         </div>
         <div class="form_group">
          <label for="" class="flied_name">Title</label>
          <input type="text" placeholder="title" name="title">
         </div>
          <div class="text-area">
            <textarea name="article" placeholder="create a post" rows="20" id="post_box"></textarea>
          </div>
          <input type="submit" class="post_btn" value="post" name="post">
         </form>
      </div>
    </div>
</body>
</html>