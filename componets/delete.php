<?php 
include_once('./connection.php');
 session_start();
 if(isset($_SESSION['email'])){
     if(isset($_GET['user'])&&isset($_GET['id'])&& $_GET['user']=='admin'){
         $id=$_GET['id'];
         mysqli_query($con,"delete from users where id=$id");
         header('location:/college/componets/admin.php');
     }
     else{
         header('location:/college/componets/admin.php');
     }
 }else{
    header('location:/college/');
 }
?>