<?php
include 'db_conn.php';

if(isset($_GET['deleteid']))

    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `records` WHERE `records`.`record_id` = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../pages/calendar.php");
        exit();
    }


if(isset($_GET['deletedoc']))

    $id = $_GET['deletedoc'];

    $sql = "DELETE FROM `doctors` WHERE `doctors`.`id` = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../pages/doctors.php");
        exit();
    }

?>