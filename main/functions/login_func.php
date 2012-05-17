<?php
	/*-------------------------------------------------------------------------------------
	 * Licensed under GNU GPLv2 (c) Hassadee Pimsuwan
	 * ------------------------------------------------------------------------------------
	 * ___ ____  _____  _______ _______  _____ _______   ______  ______   ___  ___
	 * | | | | |/ _ \ \/ ___)__) ___)__)/ _ \ \|  _ \ \ / ___)_)/ ___)_) / \_\/ \ \
	 * | |_| | | (_) |( (_(___( (_(___ | (_) | | | | | | (_(___| (_(___ (        ) )
	 * |  _  | |  _  | \___ \ \\___ \ \|  _  | | | | | |  ___)_)  ___)_) \      / /
	 * | | | | | | | | |___) ) )___) ) ) | | | | |_| | | (_(___| (_(___   \    / /
	 * |_|/|_|/|_|/|_|/(____/_/(____/_/|_|/|_|/|____/_/ \____)_)\____)_)   \__/_/
	 * Hassadee Pimsuwan - @hapztron - OTOP3D Project
	 * ------------------------------------------------------------------------------------
	 */
	
	session_start();
	require_once("config.php");
	
	$strSQL = "SELECT * FROM Account WHERE AccountEmail = '".$_POST["email"]."' AND AccountPassword = '".md5($_POST["password"])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	
	if(!$objResult) {
		header("location:../login.php");
	}
	else {
			
		$_SESSION["AccountID"] = $objResult["AccountID"];
		$_SESSION["AccountEmail"] = $objResult["AccountEmail"]; /* Email as Username */
		$_SESSION["AccountType"] = $objResult["AccountType"];
		
		if($_SESSION["AccountType"] == "User") {
			header("location:../user/index.php");
		}
		else if($_SESSION["AccountType"] == "Admin") {
			header("location:../admin/index.php");
		}
		else {
			header("location:../login.php");
		}
	}
	
	mysql_close();
?>