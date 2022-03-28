<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="queries.css" href="queries.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,500&display=swap" rel="stylesheet">
    <title>Welcome</title>
    <style>
      .footer-nav {
    list-style: none;
    float: left;
}
      .footer-nav li
 {
    display: inline-block;
    margin-right: 20px;
}

         section footer{
           clear: both;
           background-color:#343a40;;
             padding: 80px 0px;
               font-size: 100%;
               color: #e67e22;
               
    
    padding: 20px;
    background-position: center;
    width: 100%;
    margin: 0 auto;
                 }
                 a:link,
a:visited {
    color: #e67e22;
    text-decoration: none;
    
    padding: 1px;
}
.footer-nav li a:hover {
    color: lightblue;
}

a:hover,
a:active {
    color: #555;
    border-bottom: 1px solid transparent;
    transition: border-bottom 0.5s, color o.5s;
}
    #carouselExampleIndicators{
      background-attachment:fixed;
      background-size:100% 100%;
    }
    .carousel-inner {
         height:668px;
    }
     .carousel-caption {
    height:722px;
    }
    body{
      font-family: 'Poppins', sans-serif;
   }
   h1,p{
     color:gainsboro;
   }
   .carousel-caption {
    top: 0;
    bottom: auto;
}
.cover{
   box-sizing: border-box;
   border: #e67e22;
    margin-top:-100;
    background-color: #555;
    top:-100px;
    clear: both;
    padding: 30px;
     -webkit-backdrop-filter:blur(2px); 
    
  }
  .active{
            background-color: grey;
            color:whitesmoke;
          }
  
  .text-block {
    left:-250px;
    bottom:30px;
    position: relative;
    float:inline-start;
    max-width:400px;
    
    color: white;
    padding: 20px 20px 20px 20px;
    box-sizing: border-box;
    -webkit-backdrop-filter: blur(8px);
    backdrop-filter: blur(12px);
    overflow: hidden;
    background-color: rgb(200, 225, 230, 0.3);
    text-align:center;
    font-weight: 200;
    text-indent: 4px;
    border-radius: 8px;
    

  }
  .text-block :hover{
    
    transition: 0.2;
    
    color: lightskyblue !important;
  }
  strong:hover{
    transition: 0.2;
    
    color: lightskyblue !important;

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
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>';
      if(!$loggedin){
      echo '<li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">SignUp</a>
      </li>';
      }
      if($loggedin){
      echo'<li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_profile.php">Your Profile</a>
      </li>';
      }
      
    
  echo'</div>
</nav>'; ?>

  <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="one.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1 style="color:black;">Welcome!!!</h1>
        
        <p style="color:#343a40;">Please <strong>Login</strong> or <strong>SignUp</strong> to continue.</p>
      </div>

    </div>
    <div class="carousel-item">
      <img src="h1.jpg" class="d-block w-100 mx-auto" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Welcome</h1>
     <p>Please <strong>Login</strong> or <strong>Signup</strong> to continue.</p>
        

      </div>

    </div>
    <div class="carousel-item">
      <img src="h4.jpg" class="d-block w-100 mx-auto" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3>Welcome</h3>
        <p>Please login or signup to continue.</p>
      </div>

    </div>
    

    <div class="carousel-item">
      <img src="h2.jpg" class="d-block w-100 mx-auto" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <h3>Welcome</h3>
        <p>Please login or signup to continue.</p>
      </div>
    </div>
  </div>
  
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

 
    
  </div>
  </div>
  <div class="cover">
 
 <h4 style="color:#e67e22"><i><u>ABOUT US</u></i></h4>
 <p style="color:white;">CRED- Your Trusted  Two-Wheeler brand is a revolutionized platform that solely deals with buying, selling two-wheelers /bikes. Our mission is to offer best-in-class service with transparency, genuinity, and accuracy.

Our showrooms at the top destinations like Bangalore, Pune, Delhi NCR, Jaipur, Chittorgarh, Faridabad, Bhilwara, Ravet and many more have the foremost collection of pre-owned bikes, scrutinized based on 120+ levels of the checklist by the auto expert. Browse the top collection of branded bikes like Yamaha, Suzuki, TVS, Piaggo, KTM, Mahindra, Kawasaki, Royal Enfield, Hero, Honda, Harley Davidson, and many more. The showroom experience is now right at your fingertips by using the app.
CRED assured that you could  buy a bike online. 100% online means you can self-inspect your motorcycle. There are no hidden charges, all are transparent, and you can ultimately save more.

</p>
</div>

  <section>
  <footer>
      <div class="row">
          <div class="col span_1_of_2">
              <ul class="footer-nav">
                  <li><u>Contact us: </u><p style="color:#ccc;">Phone :  +919998887770</p><p style="color: #ccc;">Email : cred@gmail.com</p>

                  </li>
                  

              </ul>
              <p style="clear: both; margin-left:40%;color:#555 ">Copyright© 2022 by CRED ALL RIGHTS RESERVED</p>

          </div>
          
          

  </footer>

</section>

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