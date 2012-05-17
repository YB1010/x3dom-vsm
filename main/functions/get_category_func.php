<?php
	
	function GetCategory()
	{
		require_once("config.php");
	
		$sql = "SELECT * FROM ProductType ORDER BY ProductTypeID";
	
		$result = mysql_query($sql);
		$num_row = mysql_num_rows($result);
	

		if ($num_row <= 0) {
			echo "<li><p>Sorry, This category is have no product</p></li>";
		} else {
			while($row = mysql_fetch_array($result))
			{
				echo "<li onclick=\"ShowProduct(" . $row['ProductTypeID'] . ")\">" . $row['ProductTypeName'] . "</li>";
			}
		}
	
		mysql_close();
	}
	
?>