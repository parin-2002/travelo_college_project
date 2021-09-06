<?php 
 session_start();
 if(isset($_SESSION['email'])){
     echo "yes";
 }else{
    header('location:/college/');
 }
?>