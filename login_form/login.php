<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['usrname']) && isset($_POST['password'])) {

	function validate($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$usrname = validate($_POST['usrname']);
	$password = validate($_POST['password']);

	if (empty($usrname)) {
		header("Location: index.php?error=Username is required!");
		exit();
	}
	else if (empty($password)) {
		header("Location: index.php?error=Password is required!");
		exit();
	}
	else {
		$sql = "SELECT * FROM users WHERE user_name = '$usrname' AND password = '$password'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['user_name'] === $usrname && $row['password'] === $password) {
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['id'];		
				header("Location: home.php");
				exit();
			}
			else {
				header("Location: index.php?error=Incorrect username or password, please try again!");
				exit();
			}
		}
		else {
				header("Location: index.php?error=Incorrect username or password, please try again!");
				exit();
			}
	}
}
else {
	header("Location: index.php");
	exit();
}