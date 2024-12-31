<?php 
	require_once('server.php');
	session_start();
	if(isset($_SESSION['login'])){
		$loged_id = $_SESSION['login'];
		$std_id = $_REQUEST['std_id'];

		$sql = "SELECT * FROM registration WHERE id='$loged_id'";
        $query = $conn->query($sql);
        $data = mysqli_fetch_assoc($query);

        if($data['st_user'] == $std_id){
        	header('location:profile.php');
        }else {
        	$std_sql = "SELECT * FROM registration WHERE st_user='$std_id'";
        	$std_query = $conn->query($std_sql);
        	$std_data = mysqli_fetch_assoc($std_query);
        }

	}else {
		header('location:login.php');
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Profile</title>
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
              <li class="active"> <a href="std_profile.php">Student_Profile</a></li>
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
<div class="userAvatar" style="background-image: url(img/userimg/<?php echo $std_data['u_image']; ?>);"></div>
<h4 class="text-center"><?php echo $std_data['uname']; ?></h4>
<!-- <p class="text-center"><?php //echo $std_data['st_user']; ?></p> -->
</div>
<div class="card-body">
<p class="card-text">
<span class="mb-2 pb-2 border-bottom" style="display: block;"><strong>Name: </strong> <?php echo $std_data['uname']; ?></span>
<span class="mb-2 pb-2 border-bottom" style="display: block;"><strong>Father Name: </strong> <?php echo $std_data['iname']; ?></span>
<span class="mb-2 pb-2 border-bottom" style="display: block;"><strong>Department: </strong> <?php echo $std_data['dep']; ?></span>
<span class="mb-2 pb-2 border-bottom" style="display: block;"><strong>Batch: </strong> <?php echo $std_data['batch']; ?></span>
<span class="mb-2 pb-2 border-bottom" style="display: block;"><strong>Email: </strong> <?php echo $std_data['email']; ?></span>
<span class="" style="display: block;"><strong>Phone: </strong> <?php echo $std_data['phonenumber']; ?></span>

</p>
</div>
</div>
</div>
<div class="col-md-8">
<div class="userProfileBody">


<div class="all-posts">
<?php 
    $sql_post = "SELECT * FROM posts WHERE u_id='$std_id' ORDER BY po_id DESC";
    $query_post = $conn->query($sql_post);
    while($row = $query_post->fetch_object()) :
  ?>
<div class="single-posts">
    <div class="post-head">
        <div class="post-avatar">
            <img src="img/userimg/<?php echo $std_data['u_image']; ?>" alt="">
        </div>
        <div class="post-head-info">
            <h5><?php echo $std_data['uname']; ?></h5>
            <p><?php echo $std_data['dep']; ?>, <?php echo $std_data['batch']; ?></p>
        </div>
    </div>
    <div class="post-body">
        <p><?php echo $row->posts_data; ?></p>
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

</body>
</html>