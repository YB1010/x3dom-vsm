<?php
	session_start();
	require_once("config.php");

	$strSQL = "UPDATE ProductType ";
	$strSQL .=" SET ProductTypeID = '".$_POST["ProductTypeID"]."' ";
	$strSQL .=" ,ProductTypeName = '".$_POST["ProductTypeName"]."' ";
	$strSQL	.="	WHERE ProductTypeID = '".$_GET["ProductTypeID"]."' ";
	$objQuery = mysql_query($strSQL);
?>

<script type="text/javascript">
	<!--
	window.location = "../admin/index.php"
	//-->
</script>