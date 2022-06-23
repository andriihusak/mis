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
	$surname = validate($_POST['surname']);


	
	    $sql = "SELECT * FROM users WHERE user_email='$email' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: ../pages/registration.php?error=The username is taken try another&");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(user_email, user_password, user_role, user_name, user_surname) VALUES('$email', '$pass', 'user', '$name', '$surname')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
				$_SESSION['user_email'] = $row['user_email'];
				$_SESSION['user_password'] = $row['user_password'];
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['user_role'] = $row['user_role'];
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['user_surname'] = $row['user_surname'];
           	 header("Location: ../pages/registration.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: ../pages/registration.php?error=unknown error occurred&");
		        exit();
           }
		}
	
}else{
	header("Location: ../pages/registration.php");
	exit();
}