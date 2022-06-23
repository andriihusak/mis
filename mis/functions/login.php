<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
	
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

		$sql = "SELECT * FROM users WHERE user_email='$email' AND user_password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            $row['user_email'] === $email && $row['user_password'] === $pass;
            	$_SESSION['user_email'] = $row['user_email'];
            	$_SESSION['user_password'] = $row['user_password'];
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['user_role'] = $row['user_role'];
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['user_surname'] = $row['user_surname'];
            	header("Location: ../pages/home.php");
		        exit();
		}else{
			header("Location: ../pages/registration.php?error=Incorect Email or password");
	        exit();
		}
	
}else{
	header("Location: ../pages/registration.php");
	exit();
}