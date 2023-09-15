<?php
$exist=0;
$unexist=0;
$invalid=0;
if($_SERVER['REQUEST_METHOD']=="POST"){
include 'conn.php';
$username=$_POST['user_name'];
$password=$_POST['user_password'];
$confirm_password=$_POST['confirm_password'];
$email=$_POST['user_email'];

$sql="Select * from `registration` where user_name='$username'";
$result=mysqli_query($conn,$sql);
if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
        $exist=1;
    }else{
      if($password===$confirm_password){
        $sql="insert into `registration` (user_name,user_password,confirm_password,user_email) 
        values('$username','$password','$confirm_password','$email')";
        $result=mysqli_query($conn,$sql);
        if($result){
        $unexist=1;
        }
        }else{
          $invalid=1;
        }

    }
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Sign Up</title>
    <style>
        .container{
            border:1px solid #212529;
        }
        body{
            background-color:#F5F5DC;
        }
        h1{
            font-family:serif;
        }

    </style>
  </head>
  <body>
    <?php
      if($exist){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> User Already Exist.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
     <?php
    if($unexist){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Welcome</strong> You Are Successfully Signed Up .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
      <?php
    if($invalid){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> Password Does not Match .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
  <h1 class="mt-5 text-center">Sign Up</h1>
    <div class="container mt-5 col-md-4 text-center mx-auto">
        <form action="signUp.php" method="post">
        <div class="input-group mb-3 mt-3">
         <span class="input-group-text bg-dark" id="basic-addon1">
         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" 
         class="bi bi-person-fill" viewBox="0 0 16 16">
         <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
        </svg>
       </span>
      <input type="text" class="form-control" placeholder="Enter Your Username" name="user_name">
       </div>
       <div class="input-group mb-3">
      <span class="input-group-text bg-dark" id="basic-addon1">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white"
         class="bi bi-lock-fill" viewBox="0 0 16 16">
         <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
        </svg>
      </span>
      <input type="password" class="form-control" placeholder="Enter Your Password" name="user_password">
     </div>
     <div class="input-group mb-3">
      <span class="input-group-text bg-dark" id="basic-addon1">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white"
         class="bi bi-lock-fill" viewBox="0 0 16 16">
         <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
        </svg>
      </span>
      <input type="password" class="form-control" placeholder="Confirm Your Password" name="confirm_password">
     </div>
     <div class="input-group mb-3">
      <span class="input-group-text bg-dark" id="basic-addon1">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-envelope-fill" viewBox="0 0 16 16">
         <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
        </svg>
      </span>
      <input type="email" class="form-control" placeholder="Enter Your Email" name="user_email">
     </div>
     <div class="form-group">
     <a href="logIn.php">Do You Have An Account ?</a>
     </div>
      <button type="submit" class="btn btn-dark mx-auto">Sign Up</button>
     </div>
  </body>
</html>