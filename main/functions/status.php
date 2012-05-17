<?php
	require_once("config.php");
	
	$strSQL = "UPDATE accept_pro";
	$strSQL .=" SET status = 'YES' ";
	$strSQL	.="	WHERE pro_id = '".$_GET["pro_id"]."' AND user_id ='".$_GET["user_id"]."' AND code ='".$_GET["code"]."' ";
	$objQuery = mysql_query($strSQL);
	
?>
<script type="text/javascript">
	<!--
	window.location = "../shopkeeper/shopkeeper_manage.php"
	//-->
</script>
