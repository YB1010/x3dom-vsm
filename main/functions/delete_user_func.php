<?php
	session_start();
	require_once("config.php");

	$strSQL = "DELETE FROM Account WHERE AccountID = '".$_GET["AccountID"]."' ";
	$objQuery = mysql_query($strSQL);

	mysql_close();
?>

<script type="text/javascript">
	<!--
	window.location = "../admin/index.php"
	//-->
</script>