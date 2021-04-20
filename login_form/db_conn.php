<?php

$sname = "localhost";
$usrname = "root";
$password = "admin";

$db_name = "login_db";

$conn = mysqli_connect($sname, $usrname, $password, $db_name);

if (!$conn) {
	echo "Connection to database failed!";
}