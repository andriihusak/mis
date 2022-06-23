<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['surname'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);
    $name = validate($_POST['name']);
    $sname = validate($_POST['surname']);

    $curr = $_SESSION['user_id'];


    if (empty($email)) {
		header("Location: ../pages/profile.php?error=Email is required&");
	    exit();
	}else if(empty($pass)){
        header("Location: ../pages/profile.php?error=Password is required&");
	    exit();
	}
	else if(empty($name)){
        header("Location: ../pages/profile.php?error=Enter name&");
	    exit();
	}

	else if(empty($sname)){
        header("Location: ../pages/profile.php?error=Enter Surname&");
	    exit();
	}

	else{

            $sql2 = "UPDATE `users` SET `user_email` = '$email', `user_password` = '$pass', `user_name` = '$name', `user_surname` = '$sname' WHERE `users`.`id` = '$curr'";
            $result2 = mysqli_query($conn, $sql2);
			$row = mysqli_fetch_assoc($result2);
            if ($result2) {
                    $_SESSION['user_email'] = $row['user_email'];
                    $_SESSION['user_password'] = $row['user_password'];
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['user_surname'] = $row['user_surname'];
                    header("Location: ../pages/profile.php?success=Your personal data has been edited");
                exit();
            }
        }
	
}else{
	header("Location: ../pages/profile.php");
	exit();
}