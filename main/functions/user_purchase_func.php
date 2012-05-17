<?php
	session_start();
	require_once("config.php");
	require_once("order_func.php");
	
	$account_id = $_SESSION["AccountID"];
	$product_id = $_GET["ProductID"];
	$date = date('l jS \of F Y h:i:s A');
	$md5_date = md5($date);
	$order_id = $account_id . "_" . $product_id . "_" . $md5_date;
	
	insertOrder($order_id, $account_id, $product_id);
?>

<script type="text/javascript">
<!--
	window.location = "../user/index.php"
//-->
</script>