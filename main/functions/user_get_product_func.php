<?php
	require_once("config.php");
	
	$q = $_GET["q"];
	
	$sql = "SELECT * FROM Product WHERE ProductTypeID = '".$q."' ORDER BY ProductName";
	
	$result = mysql_query($sql);
	$num_row = mysql_num_rows($result);
	
	echo "<div class=\"itemcontainer\">";
	echo "<ul>";

	if ($num_row <= 0) {
		echo "<li><p>Sorry, This category is have no product</p></li>";
	} else {
		while($row = mysql_fetch_array($result))
		{
			echo "<li>";
			//echo "<img height=\"100px\" width=\"100px\" src=\"../image_uploads/" . $row['ProductImage'] . "\"/>";
			echo "<img height=\"100px\" width=\"100px\" src=\"../main/image_uploads/" . $row['ProductImage'] . "\"/>";
			echo "<h1>" . $row['ProductName'] . "</h1>";
			echo "<h2>" . $row['ProductText'] . "</h2>";
			echo "<h3>Price: " . $row['ProductPrice'] . " THB</h3>";
			echo "<div class=\"itemcontainer_panel\">";
			echo "<a href=\"detail.php?ProductID=" . $row["ProductID"] . "\">Select</a>";
			echo "</div>";
			echo "</li>";
		}
	}
	echo "</ul>";
	echo "</div>";
	
	mysql_close();
?>