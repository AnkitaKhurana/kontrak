<?php
	session_start();

	if(!isset($_SESSION['logged']))
	{
 		header("Location: login.php");
	}
	else if(isset($_SESSION['logged'])!="")
	{
 		header("Location: index.php");
	}

	if(isset($_GET['logout']))
	{
 		session_destroy();
 		unset($_SESSION['logged']);
 		header("Location: login.php");
	}
?>