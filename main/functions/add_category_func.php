<?php
	
	require_once("config.php");
		
	$strSQL = "INSERT INTO ProductType(ProductTypeName) VALUES ('".$_POST["ProductTypeName"]."')";
	$objQuery = mysql_query($strSQL);
?>

<script type="text/javascript">
	<!--
	window.location = "../admin/index.php"
	//-->
</script>