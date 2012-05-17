<?php
	session_start();
	require_once("config.php");

	$strSQL = "DELETE FROM ProductType WHERE ProductTypeID = '".$_GET["ProductTypeID"]."' ";
	$objQuery = mysql_query($strSQL);

	mysql_close();
?>

<script type="text/javascript">
	<!--
	window.location = "../admin/index.php"
	//-->
</script>