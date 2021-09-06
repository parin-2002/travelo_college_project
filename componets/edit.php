<?php 
include_once('./connection.php');
$id=""; $data="";

 session_start();
 if(isset($_SESSION['email'])){
     if($_SERVER['REQUEST_METHOD']=="POST"){
         if($_FILES['com_img']['name']){
           $img=mysqli_query($con,'select img from users where id='.$_POST['id'].'');
           $img=mysqli_fetch_assoc($img);
           $img="../".$img['img'];
           $check=getimagesize($_FILES['com_img']['tmp_name']);
           if($check!==false){
              $file_store="uploads/".rand().$_FILES['com_img']['name'];
              //print_r($_FILES);
             // move_uploaded_file($_FILES['com_img']['tmp_name'],"../".$file_store);
              $sql="UPDATE `users` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`mobileno`='".$_POST['mo']."',`password`='".$_POST['password']."',`address`='".$_POST['address']."',`verify`=".$_POST['verify'].", `img`='".$file_store."' WHERE `id`=".$_POST['id']."";
              if(mysqli_query($con,$sql)){
                   move_uploaded_file($_FILES['com_img']['tmp_name'],"../".$file_store);
                   unlink($img);
              };              
            }
         }else{
          // $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
           $sql="UPDATE `users` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`mobileno`='".$_POST['mo']."',`password`='".$_POST['password']."',`address`='".$_POST['address']."',`verify`=".$_POST['verify']." WHERE `id`=".$_POST['id']."";
           mysqli_query($con,$sql);
         }
       //exit('post');
     }
 }
 if(isset($_SESSION['email'])){
     if(isset($_GET['user'])&&isset($_GET['id'])&& $_GET['user']=='admin'){
       ///////////
       $id=$_GET['id'];
       $data=mysqli_query($con,"SELECT * FROM `users` WHERE id=$id;");
       $data=mysqli_fetch_assoc($data);
      // print_r($data);
     }
     else{
         header('location:/college/componets/admin.php');
     }
 }else{
    header('location:/college/');
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
    <link rel="stylesheet" href="../asset/style.css" />
    <title>Travelo</title>
  </head>

  <body>


     <div class="container mt-3">
     <h1 class="text-center">Edit User & verify user</h1>
     <form action="?" method="POST" enctype="multipart/form-data">
         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">id</label>
            <input
              type="number"
              name="id"
              value="<?php echo $data['id']; ?>"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
            />
            <div id="" class="form-text" style="color:red;"></div>
          </div> 
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input
              type="text"
              name="username"
              value="<?php echo $data['username']; ?>"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
            />
            <div id="" class="form-text" style="color:red;"></div>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"
              >Email address</label
            >
            <input
              type="email"
              name="email"
              value="<?php echo $data['email']; ?>"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
            />
            <div id="" class="form-text" style="color:red;"></div>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mobile No</label>
            <input
              type="number"
              name="mo"
              value="<?php echo $data['mobileno']; ?>"
              class="form-control"
            />
              <div id="" class="form-text" style="color:red;"></div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"
              >Password</label
            >
            <input
              type="password"
              name="password"
              value="<?php echo $data['password']; ?>"
              class="form-control"
              id="exampleInputPassword1"
            />
              <div id="" class="form-text" style="color:red;"></div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"
              >Address of your company</label
            >
            <textarea
              class="form-control"
              name="address"
              id="exampleInputPassword1"
            ><?php echo $data['address']; ?></textarea>
              <div id="" class="form-text" style="color:red;"></div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"
              >Verify User</label
            >
            <input
              type="number"
              name="verify"
              value="<?php echo $data['verify']; ?>"
              class="form-control"
              id="exampleInputPassword1"
            />
              <div id="" class="form-text">replace 0 to 1 if user is valid and trustable!</div>
          </div>
             <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Upload card or picture of your company</label>
            <input
              type="file"
              name="com_img"
              value="<?php echo $data['img']; ?>"
              class="form-control"
            />
            <img style="width:100px; height:100px; margin:2px" src="<?php echo "../".$data['img']; ?>"/>
              <div id="" class="form-text" ></div>
          </div>
          <button type="submit" name="edit" id="nav-button" href="#" class="btn btn-dark">
            Submit
          </button>
        </form>
     </div>



    <script src="../asset/main.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
