<?php 
    require_once('server.php');
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Registration</title>
  <link rel="apple-touch-icon" href="pic/logo.png">
  <link rel="icon" type="ico" sizes="16x16" href="pic/logo.png">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

  <!-- Normalizer CSS -->
  <link rel="stylesheet" href="css/normalize.css" type="text/css" media="all">
  <!-- Resrt CSS -->
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
  <!-- OWL Carousel CSS -->
  <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css" media="all">
  <!-- Main CSS -->
  <link rel="stylesheet" href="style.css" type="text/css" media="all">
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="css/responsive.css" type="text/css" media="all">
</head>

<body>
  


  <!-- Header Area Strat -->
  <header class="header-area">
    <div class="container-fluid">
      <div class="row align-center">
        <div class="col-7">
          <div class="header-left">
            <a href="#" class="logo">
              <img src="img/logo.png" alt="">
            </a>
            <h2>Bangladesh Army University of Science and Technology</h2>
          </div>
        </div>
        <div class="col-5 text-right">
          <button class="mobile-nav">
            <i class="fa fa-bars"></i>
          </button>
          <div class="menu-area">
            <div class="cl-nav-area">
              <button class="close-nav">
                <i class="fa fa-close"></i>
              </button>
            </div>
            <ul>
              <li class="active"><a href="index.html">Home</a></li>
              <!--<li><a href="student_feed.php">Student feed</a></li>-->
              <li><a href="about-us.html">About Us</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
    <!-- Registration part -->
<!DOCTYPE html>
<html>
<head>
    
    <title>
    User Registration
    </title>
    <link rel="stylesheet" type="text/css" href="style(regi).css">
    </head>
    <body>
        
        <div class="main">
    <div class ="register">
        <h2> Registration
        </h2>
        
        
        <form id="register" method="post" action="reg_value.php" enctype="multipart/form-data">
            <div class="input-group">
            <label>
            Your Name :
            </label>
                 <br>
            <input type="text" name="uname"  id="name" placeholder="Enter Your user Name" required>
                <br>
            </div>
            
            
            
            <div class="input-group">
            <label>
            Father Name :
        
            </label>
                <br>
            <input type="text" name="iname" id="name" placeholder="Enter Your father name " required>
                <br>
            </div>
            

           
            <div class="input-group">
            <label>
            Department :
            </label>
                <br>
                <select name="depertment" id="" style="width: 100%; height: 34px;">
                    <option value="CSE">CSE</option>
                    <option value="EEE">EEE</option>
                    <option value="ME">ME</option>
                    <option value="IPE">IPE</option>
                    <option value="CE">CE</option>
                    <option value="BBA">BBA</option>
                    <option value="English">English</option>
                    <option value="MBA">MBA</option>
                </select>
                <br>
            </div>
            <br>
            
            

            <div class="input-group">
            <label>
            Batch :
            </label>
                <br>
                <select name="batch" id="" style="width: 100%; height: 34px;">
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                    <option value="6th">6th</option>
                    <option value="7th">7th</option>
                    <option value="8th">8th</option>
                    <option value="9th">9th</option>
                    <option value="10th">10th</option>
                    <option value="11th">11th</option>
                    <option value="12th">12th</option>
                </select>
                <br>
            </div>
            <br>
            
            
            
            
            <div class="input-group">
            <label>
            Email :
            </label>
                <br>
            <input type="text" name="email" id="name" placeholder="Enter Your Email " required>
                <br>
            </div>
            
            
            
            <div class="input-group">
            <label>
            Password :
            </label>
                <br>
            <input type="password" name="password_1" id="name" placeholder="Enter Your PassWord " required>
                <br>
            </div>
            
            
            
            
            <div class="input-group">
            <label>
            Confirm Password :
            </label>
                <br>
            <input type="password" name="password_2" id="name" placeholder="Enter Your Confirm Password " required>
                <br>
            </div>
            
            
            
           
            <div class="input-group">
            <label>
            Mobile No :
            </label>
                <br>
            <input type="mobi" name="number" id="name" placeholder="Enter Your Number " required>
                <br>
            </div>
            
            
            

            <div class="input-group">
            <label>
            Student Image :
            </label>
                <br>
                <input type="file" name="u_image" id="img" required>
                <br>
            </div>
            
            <div class="input-group">
                <button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
                
            </div>
            <br>
            <?php 
                if(isset($_REQUEST['success'])){
                   echo 'Register Success! <br>';
                   echo 'Your ID: '.$_REQUEST['u_id'];
                }
                if(isset($_REQUEST['errorchar'])){
                    echo 'Please Enter the 8 Character Password!!';
                }
            if(isset($_REQUEST['error'])){
                    echo 'Password & Confirm Password Not Match!!';
                }
             ?>
            <br>
            <p>Aready a Member? <a style="color: #3392FF" href="login.php">Log In</a> </p>
            
            
        </form>
            </div>
        </div>
    </body>
        


</html>