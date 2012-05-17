<?php
	function is_session_alive()
	{
		if (isset($_SESSION["user_id"])) {
			switch($_SESSION["status"]) {
				case "Admin": // If position is admin case, this case will auto link to admin site.
					header("location: admin/update.php");
					break;
				case "Shopkeeper": // If position is directer case, this case will auto link to directer site. 
					header("location: shopkeeper/shopkeeper_manage.php");
					break;
				case "User": // If position is manager case, this case will auto link to manager site.
					header("location: user/index.php");
					break;
			} // End switch-case.
		}
	}
?>