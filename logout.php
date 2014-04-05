<?php 

	session_start();
	$_SESSION["User"] = "";
	session_unset();
	session_destroy();
	header("location:index.php");
			
?>