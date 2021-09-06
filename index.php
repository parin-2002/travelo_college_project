<?php 
 include_once('./componets/connection.php');
  $popup=false;
  $username=""; $email=""; $mo=""; $pass=""; $address=""; $file=""; $file_store=""; $account_info="";
  if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['register'])){
    if(empty($_POST['username'])){
      $popup=true;
      $username="username required";
    }
     if(empty($_POST['email'])){
      $popup=true;
      $email="email required";
    }
     if(empty($_POST['mo'])){
      $popup=true;
      $mo="Mobile Number required";
    }
     if(empty($_POST['password'])){
      $popup=true;
      $pass="password required";
    }
     if(empty($_POST['address'])){
      $popup=true;
      $address="address required";
    } if(empty($_FILES['com_img']['name'])){
      $popup=true;
      $file="File required";
    }

    if($popup===false){
       $file_name=basename($_FILES['com_img']['name']);
       $file_type=$_FILES['com_img']['type'];
       $file_location=$_FILES['com_img']['tmp_name'];
       $file_size=$_FILES['com_img']['size'];
       $file_store="uploads/" .rand(). $file_name;
       $type=strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
      
       $check=getimagesize($file_location);
       if($check){
         if(file_exists($file_store)){
           $popup=true;
           $file="Sorry! file already exists";
         }
         else{
          if($type!='jpg' && $type!='png' && $type!='jpeg'){
            $popup=true;
            $file="jpeg, jpg, png only allowed";
          }
          else{
            if(!$popup){
               $today=date("Y-m-d");
               $password=password_hash(trim($_POST['password']),PASSWORD_DEFAULT);
               //echo $_POST['mo'];
               $query="INSERT INTO users(`username`, `email`, `mobileno`, `password`, `address`, `date`, `verify`, `img`) VALUES ('". trim($_POST['username']) ."','". trim($_POST['email']) ."','". trim($_POST['mo']) ."','". $password."','".trim($_POST['address']) ."','". $today ."',0,'". $file_store ."')";
               $result=mysqli_query($con,$query);
               if(!$result){
                  $account_info=false;
                  //echo mysqli_error($con);
                  echo $account_info;
               }else{
                  $account_info=true;
                  echo $account_info;
               }
            }
         if($account_info){
             if(!move_uploaded_file($file_location,$file_store)){
               $popup=true;
               $file="please try agian!";
           }
         }
        }
       }
       }else{
         $popup=true;
         $file="check your file please!";
       }
    }
   
    // if(!$popup){
    //   $today=date("Y-m-d");
    //   $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    //   $query="INSERT INTO users(`username`, `email`, `mobileno`, `password`, `address`, `date`, `verify`, `img`) VALUES ('". $_POST['username'] ."','". $_POST['email'] ."',". $_POST['mo'] .",'". $password."','". $_POST['address'] ."','". $today ."',0,'". $file_store ."')";
    //   $result=mysqli_query($con,$query);
    //   if(!$result){
    //     echo "no". mysqli_error($con);
    //   }else{
    //     echo "yes";
    //   }
    // }

  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./asset/style.css" />
    <title>Travelo</title>
  </head>

  <body>

  <?php
   if($account_info===false){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Sorry!</strong> You might enter wrong information try again please.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
   }
   elseif($account_info===true){
     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Thank you so much for connecting with us!</strong> We got your informations, we will contact you soon.
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
   }
  ?>

   <?php include_once('./componets/navbar.php')?>
   <?php include_once('./componets/carousal.html')?>
   <?php include_once('./componets/card.html')?>
   <?php include_once('./componets/review.html')?>
   <?php include_once('./componets/footer.html')?>



    <script src="asset/main.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
