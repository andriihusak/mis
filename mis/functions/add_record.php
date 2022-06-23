<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['date']) && isset($_POST['d-type'])) {

    $date = $_POST['date'];
    $d_type = $_POST['d-type'];
    $curr = $_SESSION['user_id'];

    $sql = "INSERT INTO `records` (`user_id`, `doctor_id`, `record_date`) VALUES ('$curr', '$d_type', '$date');";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../pages/add-record.php?success=New record has created!");
        exit();
    }
    echo $result;

}else{
	header("Location: ../pages/add-record.php");
	exit();
}