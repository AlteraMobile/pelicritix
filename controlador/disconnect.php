<?php
	unset($_SESSION['login_user']);
	session_destroy();
	header("location:../index.php");
?>