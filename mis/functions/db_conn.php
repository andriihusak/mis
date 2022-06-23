<?php

$host= "localhost";
$username= "root";
$password = "root";

$db_name = "mis";

$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}