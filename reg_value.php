<?php 
	require_once('server.php');
	if(!isset($_REQUEST['submit'])){
		header("Location: register.php");
	}else {
		$name = $_REQUEST['uname'];
		$father_name = $_REQUEST['iname'];
		$depertment = $_REQUEST['depertment'];
		$batch = $_REQUEST['batch'];
		$email = $_REQUEST['email'];
		$pass = $_REQUEST['password_1'];
		$conf_pass = $_REQUEST['password_2'];
		$phone = $_REQUEST['number'];
		$img_name = $_FILES["u_image"]["name"];
		$img_tamp = $_FILES["u_image"]["tmp_name"];
        if(strlen($conf_pass) > 7) {
            $array_name = explode('.',$img_name);
            $ext = end($array_name);
            if($ext == 'jpg' OR $ext == 'JPG' OR $ext == 'png' OR $ext == 'JPEG' OR $ext == 'jpeg'){

                $id = uniqid();
                $img_final_name = 'img'.$id.'.'.$ext;

                if($pass != $conf_pass){
                $error = 'Password Not Matched!';
                header('location: register.php?error=pass');
                }else {
                    $new_pass = md5($conf_pass);
                    $user_id = rand(100,900);
                    $user_id .= rand(100,900);
                    $user_id .= rand(100,900);

                    //$query_reg = "INSERT INTO registration(uname,dep,batch,iname,email,password1,phonenumber,st_user,u_image) VALUES('$name','$depertment','$batch',$father_name','$email','$new_pass','$phone','$user_id','$img_final_name')";
                    $query_reg = "INSERT INTO `registration` (`id`, `uname`, `dep`, `batch`, `iname`, `email`, `password1`, `phonenumber`, `st_user`, `u_image`) VALUES (NULL, '$name', '$depertment', '$batch', '$father_name', '$email', '$new_pass', '$phone', '$user_id', '$img_final_name')";
                    $entry_query = $conn->query($query_reg);

                    move_uploaded_file($img_tamp,"img/userimg/".$img_final_name);
                    header('location: register.php?success=register&u_id='.$user_id);
                }

            }else {
                echo 'Wrong';
            }
        } else { 
        
            header('location: register.php?errorchar=char');
        }

		
	}

?>