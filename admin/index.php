<?php
	session_start();

	if (!isset($_SESSION['UserData']['UserName'])) {
		// They didn't log in, redirect
		header("location:login.php");
		exit;
	}
?>

