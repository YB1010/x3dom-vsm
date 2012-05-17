<?php
	function checkPermission($status)
	{
		if (!isset($_SESSION["AccountID"]) || ($_SESSION["AccountType"] != $status)) {
	?>
		<script type="text/javascript">
			<!--
			window.location = "../index.php"
			//-->
		</script>
	<?php
		}
	}
?>