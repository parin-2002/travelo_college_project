<?php
include_once('./connection.php');
 $is_admin=false;
 session_start();
 if(isset($_SESSION['email'])){
     $is_admin=true;
 }
 if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['email'])){
    $result=mysqli_query($con,"SELECT email,password FROM `admin` WHERE email='". $_POST['email']."' AND password='". $_POST['password'] ."'");
    $result=mysqli_fetch_assoc($result);
    if($result){
      if($result['email']==$_POST['email'] && $result['password']==$_POST['password']){
          $is_admin=true;
          $_SESSION['email']=$_POST['email'];
      }
    }
 }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../asset/style.css"/>
    <style>
        .setimg{
            width:100%;
            height: 100vh;
            /* background: url('https://source.unsplash.com/1600x900/?nature,water');
            background-repeat: no-repeat;
            background-position: center; */
        }
    </style>
    <title>Admin</title>
  </head>
  <body>

  <?php
   if($is_admin){
       echo '<a href="./logout.php/?user=admin" class="btn btn-primary m-2">Logout</a>';
       echo '<input type="text" id="myInput" class="m-2" placeholder="Search Table Data here..." style="width:80%; outline:none; border:none; border-bottom:1px solid black;"/>';
       echo '
             <table class="container mt-5 table">
               <thead>
                 <tr>
                 <th scope="col">id</th>
                 <th scope="col">name</th>
                 <th scope="col">email</th>
                 <th scope="col">mobileno</th>
                 <th scope="col">Address</th>
                 <th scope="col">date</th>
                 <th scope="col">image</th>
                 <th scope="col">Update</th>
                 <th scope="col">Delete</th>
                 </tr>
              </thead>
              <tbody id="myTable">';
        
        $result=mysqli_query($con,"SELECT id,username,email,mobileno,address,date,img FROM `users`");
        if($result){
        $one="";
        while($one=mysqli_fetch_assoc($result)){
        ?>
        
           <tr>
              <th scope='row'><?php echo $one['id']; ?></th>
              <td><?php echo $one['username']; ?></td>
              <td><?php echo $one['email']; ?></td>
              <td><?php echo $one['mobileno']; ?></td>
              <td><?php echo $one['address'];?></td>
              <td><?php echo $one['date']; ?></td>
             <td><img style="width:120px; height:100px;" src="../<?php echo $one['img']; ?>" alt="img"/></td>
             <td><a href="#" type="button" class="btn btn-primary">Update</a></td>
             <td><a href="./delete.php?user=admin&id=<?php echo $one['id']; ?>" type="button" class="btn btn-danger">Delete</a></td>
            </tr>
         <?php   
        }
         echo  '</tbody>
          </table>';
        
        }
   }else{
   echo '<div class="container-fluid setimg row justify-content-center align-items-center">
        <div style="outline:1px solid black; outline-offset:10px; background:#ffffff70; padding:10px" class="col-6" style="height:max-content;">
        <h1 class="text-center">Admin Login</h1>
          <form method="post">
             <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleFormControlInput1" required/>
            </div> 
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required/>
            </div>
            <button class="btn btn-primary" type="submit">Login</button>
          </form>
        </div>
    </div>';
   }
?>  


    <script>
       $(document).ready(function(){
         $("#myInput").on("keyup", function() {
         var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
       });
     });
    </script>
    <script src="../asset/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></scrip>
  </body>
</html>