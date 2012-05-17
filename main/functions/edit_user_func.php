<?php
	session_start();
	require_once("config.php");

	$strSQL = "UPDATE Account ";
	$strSQL .=" SET AccountName = '".$_POST["AccountName"]."' ";
	$strSQL .=" ,AccountEmail = '".$_POST["AccountEmail"]."' ";
	$strSQL .=" ,AccountAddress = '".$_POST["AccountAddress"]."' ";
	$strSQL .=" ,AccountZipcode = '".$_POST["AccountZipcode"]."' ";
	$strSQL .=" ,AccountProvince = '".$_POST["AccountProvince"]."' ";
	$strSQL	.="	WHERE AccountID = '".$_GET["AccountID"]."' ";
	$objQuery = mysql_query($strSQL);		
?>

<script type="text/javascript">
	<!--
	window.location = "../admin/index.php"
	//-->
</script>