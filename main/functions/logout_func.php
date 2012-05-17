<?php
	session_start();
	
	function logout()
	{
		session_unset();
		header("location: ../index.php");
	}	
	
	logout();
?>