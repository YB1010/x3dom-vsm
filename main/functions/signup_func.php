<?php
	
	require_once("config.php");

	if(trim($_POST["email"]) == "")
	{
		echo "Please input e-mail!";
		exit();
	}
	
	if(trim($_POST["fullname"]) == "")
	{
		echo "Please input name!";
		exit();	
	}
	
	if($_POST["password"] == "")
	{
		echo "Please input Password!";
		exit();	
	}	
		
	if($_POST["password"] != $_POST["confirmpassword"])
	{
		echo "Password not Match!";
		exit();
	}
		
	$strSQL = "SELECT * FROM Accout WHERE AccountEmail = '".trim($_POST['email'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	
	if($objResult)
	{
			echo "Username already exists!";
	}
	else
	{	
		$AccountID = md5(mysql_real_escape_string($_POST["email"]));
		$AccountName = mysql_real_escape_string($_POST["fullname"]);
		$AccountPassword = md5(mysql_real_escape_string($_POST["password"]));
		$AccountEmail = mysql_real_escape_string($_POST["email"]);
		$AccountType = "User";
		$null = "null";
		
		$strSQL = "INSERT INTO Account (AccountID, AccountName, AccountPassword, AccountEmail, AccountAddress, AccountZipcode, AccountProvince, AccountType) VALUES ('".$AccountID."','".$AccountName."','".$AccountPassword."','".$AccountEmail."','".$null."','".$null."','".$null."','".$AccountType."')";
		$objQuery = mysql_query($strSQL);
	}	       

	mysql_close();
?>

<script type="text/javascript">
	<!--
	window.location = "../login.php"
	//-->
</script>