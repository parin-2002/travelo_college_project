<?php
 session_start();
  if($_GET['user']=='admin'){
      session_unset();
      session_destroy();
      header("location:/college/componets/admin.php");
  }
?>