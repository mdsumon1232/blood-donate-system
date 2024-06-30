<?php
 session_start();
 
$log_out = session_destroy();

if($log_out){
    header('location:admin.php');
}


?>