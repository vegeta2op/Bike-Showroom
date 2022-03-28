<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

if($_SESSION['username']=='admin'){
  header("location: login.php");
    exit;
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,500&display=swap" rel="stylesheet">
    <title>Welcome</title>
    <style>
    
     body {
          /* The image used */
          background-image: url("cust.jpg");

         /* Full height */
          height: 100%;

          /* Center and scale the image nicely */
          
          background-repeat: no-repeat;
          background-size: cover;
          font-family: 'Poppins', sans-serif;
         }
         .active{
            background-color: grey;
            color:whitesmoke;
          }
          
          #log{
            color:orange !important;
          }
          #log:hover{
            color: white !important;
            background-color: orange;
          }
          .form-control{
            border-radius:25px;
          }
          .btn{
            border-radius:25px;
          }
          .card{
            -webkit-backdrop-filter: blur(8px);
    backdrop-filter: blur(12px);
    overflow: hidden;
    background-color: rgb(200, 225, 230, 0.3);
          }
          .active{
            background-color: grey;
            color:whitesmoke;
          }
          
          #log{
            color:orange !important;
          }
          #log:hover{
            color: white !important;
            background-color: orange;
          }
          
    </style>
  </head>
  <body>
  <?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
    $loggedin = true;
}
else{
  $loggedin = false;
}
echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">CRED</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="welcome_cust.php">Activity <span class="sr-only">(current)</span></a>
      </li>';
      if(!$loggedin){
      echo '<li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">Signup</a>
      </li>';
      }
      if($loggedin){
      echo'
      <li class="nav-item">
        <a class="nav-link" href="cust_profile.php">Your Profile</a>
      </li>
      <li class="nav-item">
        <a id="log"class="nav-link" href="logout.php">Logout</a>
      </li>';
      }
      
    
  echo'</div>
</nav>';

?>
  
    <div class="container">
    <h3 style="color:white" class= "text-center my-4" ><u>Welcome-<?php echo $_SESSION['username']?></u></h3>
    <div class="row">
    <div class="col-md-4">
    <div class="card" style="width: 18rem;">
  <img src="images/duc.jpg" class="card-img-top" alt="...">
  <div class="card-body my-2">
    <h5 class="card-title"><u>View and Book Bikes</u></h5>
    <p class="card-text">View the Bikes available and book them.</p>
    <a href="view_bookbike.php" class="btn btn-primary">View/Book Bikes</a>
  </div>
</div>
</div>

<div class="col-md-4">
    <div class="card" style="width: 18rem;">
  <img src="dui.jpg" class="card-img-top" alt="...">
  <div class="card-body my-2">
    <h5 class="card-title"><u>View Companies</u></h5>
    <p class="card-text">View the different companies that are available.</p>
    <a href="view_comp.php" class="btn btn-primary">View Companies</a>
  </div>
</div>
</div>

<div class="col-md-4">
    <div class="card" style="width: 18rem;">
  <img src="images/bookings.jpg" class="card-img-top" alt="...">
  <div class="card-body my-2">
    <h5 class="card-title"><u>View your Bookings</u></h5>
    <p class="card-text">View the Bike Bookings done by you.</p>
    <a href="yourbookings.php" class="btn btn-primary">View your Bookings</a>
  </div>
</div>
</div>
    </div>
    </div>
   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>