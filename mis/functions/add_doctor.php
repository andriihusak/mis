<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['d-type'])) {

    $name = $_POST['name'];
    $sname = $_POST['surname'];
    $d_type = $_POST['d-type'];

    $sql = "INSERT INTO `doctors` (`doctor_name`, `doctor_surname`, `spec_id`) VALUES ('$name', '$sname', '$d_type');";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../pages/doctor-add.php?success=New doctor added!");
        exit();
    }

}else{
	header("Location: ../pages/doctor-add.php");
	exit();
}