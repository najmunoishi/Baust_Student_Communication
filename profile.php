<?php 
	require_once('server.php');
	session_start();
	if(isset($_SESSION['login'])){
		$loged_id = $_SESSION['login'];
		$sql = "SELECT * FROM registration WHERE id='$loged_id'";
        $query = $conn->query($sql);
        $data = mysqli_fetch_assoc($query);
	}else {
		header('location:login.php');
	}
	$lo_id = $data['st_user'];
	require_once('server.php');
    if(isset($_POST['post_submit'])){
        $post = $_REQUEST['post'];
        $img_name = $_FILES["statusattatchmant"]["name"];
		$img_tamp = $_FILES["statusattatchmant"]["tmp_name"];

		$array_name = explode('.',$img_name);
		$ext = end($array_name);



        $loged_info = $data['dep'].','.$data['batch'];

        $lo_id = $data['st_user'];
        $lo_img = $data['u_image'];
        $lo_name = $data['uname'];
        
       
        if(empty($post) AND empty($img_name)){
            $error_post = 'Please Write the some word or sentence !';
        }else {
            if(!empty($img_name)){
                if($ext == 'jpg' OR $ext == 'JPG' OR $ext == 'png' OR $ext == 'JPEG' OR $ext == 'jpeg' OR $ext == 'pdf' OR $ext == 'docx' OR $ext == 'doc' OR $ext == 'DOCX' OR $ext == 'DOC'){
                    $id = uniqid();
                    $img_final_name = 'post_img'.$id.'.'.$ext;

                    $query = "INSERT INTO `posts` (`po_id`, `u_id`, `u_img`, `u_uname`, `u_info`, `posts_data`, `attachment`) VALUES (NULL, '$lo_id', '$lo_img', '$lo_name', '$loged_info', '$post', '$img_final_name')";
                    $entry_query = $conn->query($query);

                    move_uploaded_file($img_tamp,"img/userimg/".$img_final_name);
                }
            }else {
                $query = "INSERT INTO `posts` (`po_id`, `u_id`, `u_img`, `u_uname`, `u_info`, `posts_data`) VALUES (NULL, '$lo_id', '$lo_img', '$lo_name', '$loged_info', '$post')";
                $entry_query = $conn->query($query);
            }
        }    
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Profile</title>
    <link rel="apple-touch-icon" href="pic/logo.png">
  <link rel="icon" type="ico" sizes="16x16" href="pic/logo.png">
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
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/plugin.css" type="text/css" media="all">
	<!-- Main CSS -->
	<link rel="stylesheet" href="style.css" type="text/css" media="all">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="all">
</head>
<body style="background-color: #f1f1f1;">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="all">
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
    <ul class="home-menu">
      <li> <a href="index.html">Home</a></li>
      <li class="active"> <a href="profile.php">My_Profile</a></li>
         <li><a href="student_feed.php">Student Feed</a></li>
        <li> <a href="all-students.php">Student Panel</a></li>


        <?php if(isset($_SESSION['login'])) : ?>
          <li class="oishi">
            <a class="" href="logout.php">Log Out</a>
          </li>
          <?php else: ?>
          <li class="oishi">
            <a class="" href="login.php">Log In</a>
          </li>
          <?php endif; ?>

            </ul>

    </div>
    </div>
</div>
    </div>
  </header>
  <!-- Header Area End -->
    
<div class="profile-body mt-5">
<div class="container">
<div class="row">
<div class="col-md-4">
<div class="card mb-3 amritaCard" style="max-width: 100%;">
<div class="card-header bg-transparent">
<div class="userAvatar" style="background-image: url(img/userimg/<?php echo $data['u_image']; ?>);"></div>
<h4 class="text-center"><?php echo $data['uname']; ?></h4>
<p class="text-center"><?php echo $data['st_user']; ?></p>
</div>
<div class="card-body">
<p class="card-text">
    <span class="mb-2 pb-2 border-bottom" style="display: block;"><strong>Name: </strong> <?php echo $data['uname']; ?></span>
    <span class="mb-2 pb-2 border-bottom" style="display: block;"><strong>Father name: </strong> <?php echo $data['iname']; ?></span>
    <span class="mb-2 pb-2 border-bottom" style="display: block;"><strong>Department: </strong> <?php echo $data['dep']; ?></span>
    <span class="mb-2 pb-2 border-bottom" style="display: block;"><strong>Batch: </strong> <?php echo $data['batch']; ?></span>
    <span class="mb-2 pb-2 border-bottom" style="display: block;"><strong>Email: </strong> <?php echo $data['email']; ?></span>
    <span class="" style="display: block;"><strong>Phone: </strong> <?php echo $data['phonenumber']; ?></span>

</p>
</div>
</div>
</div>
<div class="col-md-8">
<div class="userProfileBody">
<div class="user-post-area">
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <div class="status-wraper">
            <textarea style="height: 250px;" class="form-control mb-3" placeholder="What's on your mind?" name="post" ></textarea>
            <!--post required hole faka post off hye jabe -->
            <input type="file" name="statusattatchmant" id="">
        </div>

        <?php if(isset($error_post)): ?>
        <p> <?php echo $error_post; ?> </p>
        <?php endif; ?>

        <button style="text-align: center; width: 100%;" type="submit" class="btn btn-primary" name="post_submit">Post</button>
    </div>
</form>
</div>

<div class="all-posts">
    <?php 
        $sql_post = "SELECT * FROM posts WHERE u_id='$lo_id' ORDER BY po_id DESC";
        $query_post = $conn->query($sql_post);
        while($row = $query_post->fetch_object()) :
      ?>
<div class="single-posts">
<div class="post-head">
    <div class="post-avatar">
        <img src="img/userimg/<?php echo $data['u_image']; ?>" alt="">
    </div>
    <div class="post-head-info">
        <h5><?php echo $data['uname']; ?></h5>
        <p><?php echo $data['dep']; ?>, <?php echo $data['batch']; ?></p>
    </div>
    <a onclick="return myDelete()" class="post-delete" href="post_delete.php?post_id=<?php echo $row->po_id; ?>"><i class="fa fa-trash"></i></a>
</div>
<div class="post-body">
    <p class="mb-2"><?php echo $row->posts_data; ?></p>
    <div class="post_att">
        <?php 
            $att_file = $row->attachment; 
            $array_img_name = explode('.',$att_file);
            $ext_att = end($array_img_name);
            if($ext_att == 'pdf'){
            ?>
                <a href="img/userimg/<?php echo $att_file; ?>">Download PDF File</a>
            <?php
            } 
           elseif($ext_att == 'doc' OR $ext_att == 'docx'){
            ?>
                <a href="img/userimg/<?php echo $att_file; ?>">Download DOC File</a>
            <?php
            }
        else {
            ?>
                <img src="img/userimg/<?php echo $att_file; ?>" alt="">
            <?php
            }
        ?>
    </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>
</div>
</div>
</div>
</div>
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
    
     <!-- Footer -->
<footer class="footer-area mt-5">
<div class="container">
<div class="row">
<div class="col-md-4">
  <div class="amrita-card">
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><h2>Contact With Us </h2></li>
      <li class="list-group-item"><a href="tel:05526-73403"><i class="fa fa-phone"></i>  05526-73403</a></li>
      <li class="list-group-item"><a href="mailto:info@baust.edu.bd"><i class="fa fa-envelope"></i>  info@baust.edu.bd</a></li>
      <li class="list-group-item"><i class="fa fa-fax"></i>  05526-73300</li>
      <li class="list-group-item"><i class="fa fa-map-marker"></i>  Saidpur Cantonment, Saidpur</li>
    </ul>
  </div>
  <div class="social-link mt-4">
    <ul>

      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
    </ul>
  </div>
</div>
<div class="col-md-6 offset-md-2">
  <div class="footer-map-area">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3593.2504645022304!2d88.91562851538829!3d25.762289414862906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e35189fdfbb01d%3A0x15261313ab3f22f4!2zQkFOR0xBREVTSCBBUk1ZIFVOSVZFUlNJVFkgT0YgU0NJRU5DRSBBTkQgVEVDSE5PTE9HWSAtIOCmrOCmvuCmguCmsuCmvuCmpuCnh-CmtiDgpobgprDgp43gpq7gpr8g4Kas4Ka_4Kac4KeN4Kae4Ka-4KaoIOCmkyDgpqrgp43gprDgpq_gp4HgppXgp43gpqTgpr8g4Kas4Ka_4Ka24KeN4Kas4Kas4Ka_4Kam4KeN4Kav4Ka-4Kay4Kav4Ka8!5e0!3m2!1sen!2sbd!4v1620585024425!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
</div>
</div>
</div>
</footer>



 <!--copy rights area-->
<div class="footer-bottom text-center">
            <p>© All Rights Reserved by Bangladesh Army University of Science and Technology </p>
        </div>
</html>