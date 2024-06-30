<?php 
 session_start();
 if(!isset($_SESSION['admin'])){
    header('location:admin.php');
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
    <link rel="stylesheet" href="post_edit.css"> 
</head>

<?php

$title = $article = $photo = "";

$blog_id = "";
if(isset($_GET['id'])){
  $id = $_GET['id'];
    
    $select_data = "SELECT * FROM blog WHERE blog_id = '$id'";
    $query_data = $conn -> query($select_data);

    $fetch_data = mysqli_fetch_array($query_data);
    
    $title = $fetch_data['title'];
    $article = $fetch_data['article'];
    $photo = $fetch_data['cover_photo'];
    $blog_id = $fetch_data['blog_id'];
   
}

    // update data
    if(isset($_POST['post'])){

        $title = $_POST['title'];
        $article = $_POST['article'];
        $blog_id = $_POST['blog_id'];
       
      
        if(empty($title) || empty($article)){
          echo 'fill all the flied';
        }
        else{
           echo $blog_id;
         $update_data =  " UPDATE blog SET title = '$title' , article = '$article'
                            WHERE blog_id = '$blog_id'";
      $query =    $conn -> query($update_data);
      if($query){
       header('location:all_post.php');
      }
      else{
        echo"something wrong";
      }
        
        }
       
      
       }


?>

<body>
    <div class="container">
      <div class="left_menu">
        <?php require('left_navigation.php') ?>
      </div>
      <div class="right_side">
         <form action="post_edit.php" method="POST" enctype="multipart/form-data">
           
         <div class="form_group">
          <label class="flied_name">Cover Photo</label>
          <input type="file" id="cover" name="cover_photo" hidden value="<?php echo $photo ?>">
          <label for="cover">Browse</label>
         </div>
         <div class="form_group">
          <label for="" class="flied_name">Title</label>
          <input type="text" placeholder="title" name="title" value="<?php echo $title ?>">
         </div>
          <div class="text-area">
            <textarea name="article" placeholder="create a post" rows="20" id="post_box" > <?php echo  $article  ?> </textarea>
          </div>
          <input type="text" name="blog_id" hidden value="<?php echo  $blog_id ?>">
          <input type="submit" class="post_btn" value="post" name="post">
         </form>
      </div>
    </div>
</body>
</html>