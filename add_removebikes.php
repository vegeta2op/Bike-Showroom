<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

if($_SESSION['username']!='admin'){
  header("location: login.php");
    exit;
}
?>
<?php 
 $showAlert = false;
 $showError = false;
 include 'partials/_dbconnect.php';
 if($_SERVER["REQUEST_METHOD"]=="POST"){
   // Get image name
   $image = $_FILES['image']['name'];
   // image file directory
   $target = "images/".basename($image);
     $bikename = $_POST["bikename"];
     $compname = $_POST["company"];
     $type = $_POST["biketype"];
     $avail = $_POST["avail"];
     $bikeno = $_POST["bikeno"];
     $price = $_POST["price"];
     $description = $_POST["description"];
     $sql = "INSERT INTO `bikes`(`bike_photo`,`bike_no`,`type`,`bike_name`,`availability`,`company`,`price`,`description`) VALUES ('$image','$bikeno','$type','$bikename','$avail','$compname','$price','$description')";
       $result = mysqli_query($conn,$sql);
       if($result)
       {
          $showAlert = true;
       }
       else{
         $showError = "Bike Number already exists or the Company is not available";
       }
       if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
        }
        else{
        $msg = "Failed to upload image";
      }
      }
     $del = false;
     if(isset($_GET['delete'])){
        $sno = $_GET['delete'];
        $delete = true;
        $sql = "DELETE FROM `bikes` WHERE `bike_no` = '$sno'";
        $result = mysqli_query($conn, $sql);
        if($result){
            $del = true;
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,500&display=swap" rel="stylesheet">
    <title>Add/Remove Bikes</title>
    <style>
    .form-control{
            border-radius:25px;
          }
          .btn{
            border-radius:25px;
          }
          body{
            font-family: 'Poppins', sans-serif;
            /* The image used */
             background-image: url("ap4.jpg");

             /* Full height */
             height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
             background-repeat: no-repeat;
             background-size: cover;
            
          }
          img{
   	        float: left;
   	        margin: 5px;
   	        width: 230px;
   	        height: 150px;
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
          
          
          input[type=text],input[type=file], .form-control{
            -webkit-backdrop-filter: blur(8px);
    backdrop-filter: blur(12px);
    overflow: hidden;
    background-color: rgb(200, 225, 230, 0.3);
          }
          .dataTables_wrapper .dataTables_length,.dataTables_paginate .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    

            color: black;
          }
          .dataTables_paginate{
            background-color: whitesmoke;
            border-radius: 5px;
          }
          table{
            -webkit-backdrop-filter: blur(8px);
    backdrop-filter: blur(12px);
    overflow: hidden;
    background-color: rgb(200, 225, 230, 0.3);
          
      }
    </style>
  </head>
  <body>
  <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
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
        <a class="nav-link" href="#">Bikes<span class="sr-only">(current)</span></a>
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
        <a class="nav-link" href="welcome_admin.php">Activity</a>
      </li>
      <li class="nav-item">
        <a id="log" class="nav-link" href="logout.php">Logout</a>
      </li>';
      }
      
    
  echo'</div>
</nav>'; ?>
    
  <?php
  if($del){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Bike information deleted successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }

  if($showError){
    echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error!</strong>' .$showError.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
   </button>
   </div>';
  }

  if($showAlert){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>Bike information added successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
   </button>
   </div>';
  }
 ?>
  <h3 style="color:black" class= "text-center my-4" ><u>Add Bike Information</u></h3>
  <div class="container my-4">
  <form action ="/Bike Showroom/add_removebikes.php" method = "post" style ="display: flex;
    flex-direction: column;
    align-items: center;
    padding:15px" enctype="multipart/form-data">
  <div class="form-group col-md-6">
    <label for="bikename">Bike Name</label>
    <input type="text" class="form-control" id="bikename" name = "bikename"  maxlength = "20">
  </div>
  <div class="form-group col-md-6">
    <label for="company">Bike Company</label>
    <input type="text" class="form-control" id="company" name = "company"  maxlength = "20">
  </div>
  <div class="form-group col-md-6">
    <label for="biketype">Bike Type</label>
    <input type="text" class="form-control" id="biketype" name = "biketype" maxlength = "20">
  </div>
  <div class="form-group col-md-6">
    <label for="bikeno">Bike Number</label>
    <input type="text" class="form-control" id="bikeno" aria-describedby="emailHelp" name = "bikeno" maxlength = "20">
  </div>
  <div class="form-group col-md-6">
    <label for="avail">Availability</label>
    <input type="text" class="form-control" id="avail" name = "avail" maxlength = "20">
  </div>
  <div class="form-group col-md-6">
    <label for="price">Price</label>
    <input type="text" class="form-control" id="price" name = "price" maxlength = "20">
  </div>
  <div class="form-group col-md-6">
    <label for="exampleFormControlTextarea1">Bike Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
  </div>
  <div class="form-group col-md-6">
  <input type="hidden" name="size" value="1000000" class="form-control">
  <div class="form-group col-md-6">
  <label for="exampleFormControlTextarea1">Bike Photo</label>
  	  <input type="file" name="image">
  </div>
  </div>
  
  <button type="submit" class="btn btn-primary col-md-1">Submit</button>
</form>
</div>
<hr>
<hr><hr>

<h3  style="color:black;" class= "text-center my-4" ><u>Available Bike details</u></h3>
<div class="container my-4">


    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">Bike Photo</th>
          <th scope="col">Bike Name</th>
          <th scope="col">Company</th>
          <th scope="col">Type</th>
          <th scope="col">Bike Number</th>
          <th scope="col">Availability</th>
          <th scope="col">Price</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          
          $sql = "SELECT * FROM `bikes`";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
            <td> <img src='images/".$row['bike_photo']."' > </td>
            <td>". $row['bike_name'] . "</td>
            <td>". $row['company'] . "</td>
            <td>". $row['type'] . "</td>
            <td>". $row['bike_no'] . "</td>
            <td>". $row['availability'] . "</td>
            <td>". $row['price'] . "</td>
            <td>". $row['description'] . "</td>
            <td> <button class='delete btn btn-sm btn-primary' id=d".$row['bike_no'].">Delete</button>  </td>
          </tr>";
        } 
          ?>
       </tbody>
    </table>
  </div>
  <hr>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>

<script>
deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to remove this bike!?")) {
          console.log("yes");
          window.location = `/Bike Showroom/add_removebikes.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
  </body>
</html>