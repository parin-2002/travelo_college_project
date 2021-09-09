<?php 
include_once('./connection.php');
 session_start();
 if(isset($_SESSION['email'])){
     if(isset($_GET['user'])&&isset($_GET['id'])&& $_GET['user']=='admin'){
         $img=mysqli_query($con,'select img from users where id='.$_GET['id'].'');
         $img=mysqli_fetch_assoc($img);
         $img="../".$img['img'];
         unlink($img);
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