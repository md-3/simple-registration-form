<?php 
session_start();
if(!isset($_SESSION['user_name'])){
    header('location:logIn.php');
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

    <title>Home Page</title>
  </head>
  <body>
    <h1 class="text-center">Home Page</h1>
    <h2 class="text-center">Welcome <?php echo $_SESSION['user_name']; ?></h2>
    <div class="logout">
        <a href="logOut.php"><button type="submit" class="btn btn-danger mt-5">Logout</button></a>
    </div>
  </body>
</html>