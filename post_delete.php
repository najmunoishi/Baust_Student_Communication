<?php 
	require_once('server.php');
	session_start();
	if(isset($_SESSION['login'])){
		$po_id = $_REQUEST['post_id'];
		//$sql = "DELETE * FROM posts WHERE po_id='$po_id'";
		$sql = "DELETE FROM `posts` WHERE `posts`.`po_id` = '$po_id'";
        $query = $conn->query($sql);
        echo 'Delete';
        header('location:profile.php');

	}else {
		header('location:login.php');
	}
?>