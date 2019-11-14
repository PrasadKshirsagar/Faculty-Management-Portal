<?php

        //Connection =.php will be included in inncludes folder
        include("includes/connection.php");
        
        session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Faculty Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
  <link href='https://fonts.googleapis.com/css?family=Balthazar' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Stalinist One' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet'>
  <link rel="stylesheet" href="css/login.css">

  <script type="text/javascript" src = "js/login.js"></script>
  <script src = "js/jquery.min.js"></script>
  
</head>
<body>
<div class = "mynav">
	 <nav class="navbar navbar-inverse navbar-fix navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style = "color:black; font-size:1.5em" href="#">Staff portal</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <!--
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
        -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
      
     <?php if(isset($_SESSION['ID']) && ($_SESSION['post']=='faculty' ||$_SESSION['post']=='hod' ||$_SESSION['post']=='dean' ||$_SESSION['post']=='assoc_dean' ||$_SESSION['post']=='director') ){?>
     
       <li><a href="user/userprofile.php"><?php  echo $_SESSION['login_user'];?></a></li>
        
        
        <li><button type="button" onclick = "logout_page()" class="btn btn-default btn-default2" style="margin-top: 25%;margin-left:5%">Logout</button></li>
     <?php } else if(isset($_SESSION['ID']) && ($_SESSION['post']=='staff' ||$_SESSION['post']=='registrar' ||$_SESSION['post']=='assis_registrar' ||$_SESSION['post']=='dean_sec' ||$_SESSION['post']=='dept_sec')){  ?>
	 <li><a href="user/staffuserprofile.php"><?php  echo $_SESSION['login_user'];?></a></li>
        
        
        <li><button type="button" onclick = "logout_page()" class="btn btn-default btn-default2" style="margin-top: 25%;margin-left:5%">Logout</button></li>

	 <?php } else{  ?>
        <li><button type="button" class="btn btn-default btn-default2" data-toggle= "modal" data-target = "#mymodal" style="margin-top: 25%">Login</button></li>
        <?php }?>
      </ul>
      
      <script>
      
        function doctor_page(){
        
                window.location.href = "doctors/doctor.php";
 
        }
        
        function user_page(){
        
                window.location.href = "user/user.php";
 
        
        }
        function Staff_page(){
        
                window.location.href = "staff/staff.php";
 
        
        }
        
        function logout_page(){
        
                window.location.href = "logout.php";
        }
      </script>
    </div>
  </div>
</nav> 
</div>
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    
      <div class="form">
      
      <ul class="tab-group">
        
        <li class="tab active "><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="Login.php" method="post" id="LoginForm">
          <div id = "invalidLogin" style = "text-align:center;opacity:0;color:red">INVALID USERNAME/PASSWORD</div>
            <div class="field-wrap">
            <label>
              User ID<span class="req">*</span>
            </label>
            <input type="number" name = "user_id" required autocomplete="off"/>
                </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name = "password"required autocomplete="off"/>
          </div>
          
          <input type="submit" name = "Login"  value = "Log In" class="button button-block"/>
          
          </form>
       

        </div>
        
      </div><!-- tab-content -->      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/login.js"></script> 
  </div>
</div>
<!-- modal end -->
<div class = container-fluid>
    <!-- indicators -->
    <div id="carouselExampleIndicators" class="carousel slide">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
</div>
<div class="container-fluid">
  <h2>Carousel Example</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" style="width: 30px;height: 5px" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" style="width: 30px;height: 5px" data-slide-to="1"></li>
      <li data-target="#myCarousel" style="width: 30px;height: 5px" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="Images/images/iit1.jpg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="Images/images/iit2.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
        </div>
      </div>
    
      <div class="item">
        <img src="Images/images/iit3.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
<div style="text-align: center; padding-top: 3%; ">
  <h1><b>Welcome to our world class services</b></h1>
  <h4 style="letter-spacing: 3px; color: red">Welcome to iit ropar staff portal</h4>
</div>
</div>
<div class="container">
  <div class = "col-sm-6" style="padding-top:3%;text-align: justify; "><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div>
  <div class="col-sm-6" style="text-align:center;padding-right: 0%; padding-top: 3%"><img src="Images/images/gunturisir.jpg" width="80%"></div>
</div>

