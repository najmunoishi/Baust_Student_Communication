<?php 
require_once('server.php');
if(isset($_REQUEST['login'])){
$mail = $_REQUEST['email'];
$log_id = $_REQUEST['log_id'];
$pass = $_REQUEST['passpass'];

if(empty($mail) AND empty($log_id)){
    $error = 'Please Filup Your Email or ID!';
}elseif(empty($pass)){
    $error = 'Please Filup Your Password!';
}else {

    if(!empty($mail)){
        $sql = "SELECT * FROM registration WHERE email='$mail'";
    }elseif(!empty($log_id)){
        $sql = "SELECT * FROM registration WHERE st_user='$log_id'";
    }
    $query = $conn->query($sql);
    $data = mysqli_fetch_assoc($query);

    if(mysqli_num_rows($query) == 0){
        if(!empty($mail)){
        $error = 'Email Wrong!';
        }elseif(!empty($log_id)){
        $error = 'ID Wrong!';
        }
    }else {
        $data_pass = $data['password1'];
        $data_id = $data['st_user'];
        $now_pass = md5($pass);

        if($now_pass == $data_pass ){
            session_start();
            $_SESSION['login'] = $data['id'];
            header('location:student_feed.php');
        }else {
            $error = 'Wrong Password!';
        }
    }
}
}

?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Log In</title>
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
</body>
</html>
    
    
    <!--login part-->
<!DOCTYPE html>
<html>
<head>

<title>
User log In
</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style(login).css">
</head>
<body>

<div class="wrapper">

<h1> Log In
</h1>


<form id="login" method="post" action="login.php" >


    <div class="input-group">
    <label class="flex-betwien">
        <p class="email-label">Email</p>
        <button type="button" class="id_req">Login With ID</button>
    </label>
        <br>
    <input type="email" name="email" id="name" placeholder="Enter Your Email ">
    <input style="display: none;" type="text" name="log_id" id="log_id" placeholder="Enter Your ID ">
        <br>
    </div>
    <br>


    <div class="input-group">
    <label>
    Password
    </label>
        <br>
    <input type="password" name="passpass" id="pass" placeholder="Enter Your Password">
        <br>
    </div>


    <br>
    <div class="input-group">
        <button type="submit" name="login" class="btn btn-primary">SUBMIT</button>

    </div>
    <br>

    <?php if(isset($error)): ?>
    <p> <?php echo $error;  ?> </p>

    <?php endif; ?>

    <p>
    Not Yet a Member? <a href="register.php">Registration</a>
    </p>



</form>
    </div>


  <!-- Normalizer Js -->
  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <!-- Jquery -->
  <script src="js/vendor/jquery-3.4.1.min.js"></script>
  <!-- Plugins Js -->
  <script type="text/javascript" src="js/plugins.js"></script>
  <!-- Pooper Js -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap Js -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- Main Js -->
  <script type="text/javascript" src="js/script.js"></script>

</body>
</html>