<?php
    session_start();
	require_once("../functions/config.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
		<meta name="description" content="OTOP3D" />
		<meta name="keywords" content="OTOP3D"/>
		<meta itemprop="description" content="OTOP3D" />

		<title>OTOP3D Project</title>
		<link rel="shortcut icon" href="../styles/favicon/favicon.ico" type="image/x-icon"/>
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link type="text/css" rel="stylesheet" href="../styles/reset.css" />
		<link type="text/css" rel="stylesheet" href="../styles/text.css" />
		<link type="text/css" rel="stylesheet" href="../styles/styles.css" />
  	</head>
  	<body>
		<article id="container">
			<nav>
				<ul>
					<li><a href="index.php"><div class="navcircle"><span class="navbar">Home</span></div></a></li>
                    <li><a href="view_order.php"><div class="navcircle"><span class="navbar">Order</span></div></a></li>
					<li><a href="../functions/logout_func.php"><div class="navcircle"><span class="navbar">Logout</span></div></a></li>
				</ul>
			</nav>

			<header>
				<h1>OTOP3D</h1>
			</header>
			
			<section>
				<div class="catnameline"><span class="textincat">Admin</span></div>
				<div class="category_container">
					<ul>
						<a href="add_product.php"><li>Add Product</li></a>
						<a href="delete_product.php"><li>Delete Product</li></a>
						<a href="add_category.php"><li>Add Category</li></a>
					</ul>
				</div>
				
				<?php
					/* PRODUCT */
					$Product_sql = "SELECT * FROM Product ORDER BY ProductName";
					$Product_result = mysql_query($Product_sql);
					
					/* CATEGORY */
					$Category_sql = "SELECT * FROM ProductType ORDER BY ProductTypeID";
					$Category_result = mysql_query($Category_sql);
					
					/* USER */
					$User_sql = "SELECT * FROM Account WHERE AccountType = 'User'";
					$User_result = mysql_query($User_sql);
				?>
				
				<div class="catnameline"><span class="textincat">Edit Product</span></div>
				<div class="itemcontainer">
					<ul>
						<?php
							while($row = mysql_fetch_array($Product_result))
							{
								echo "<li>";
								echo "<img height=\"100px\" width=\"100px\" src=\"../image_uploads/" . $row['ProductImage'] . "\"/>";
								echo "<h1>" . $row['ProductName'] . "</h1>";
								echo "<h2>Description: " . $row['ProductText'] . "</h2>";
								echo "<h3>Price: " . $row['ProductPrice'] . " Thai Baht</h3>";
								echo "<div class=\"itemcontainer_panel\">";
								echo "<a href=\"edit_product.php?ProductID=" . $row["ProductID"] . "\">Edit</a>";
								echo "</div>";
								echo "</li>";
							}
						?>
					</ul>
				</div>
				
				<div class="catnameline"><span class="textincat">Edit Category</span></div>
				<div class="itemcontainer">
					<ul>
						<?php
							while($Category_row = mysql_fetch_array($Category_result))
							{
								echo "<li>";
								echo "<p>" . $Category_row['ProductTypeID'] . " " . $Category_row['ProductTypeName'] . "</p>";
								
								echo "<p>";
								echo "<a href=\"edit_category.php?ProductTypeID=" . $Category_row["ProductTypeID"] . "\">Edit</a> | ";
								echo "<a href=\"../functions/delete_category_func.php?ProductTypeID=" . $Category_row["ProductTypeID"] . "\">Delete</a>";
								echo "</p>";
								echo "</li>";
							}
						?>
					</ul>
				</div>
				
				<div class="catnameline"><span class="textincat">Edit User</span></div>
				<div class="itemcontainer">
					<ul>
						<?php
							while($User_row = mysql_fetch_array($User_result))
							{
								echo "<li>";
								echo "<p>" . $User_row['AccountName'] . " | Email: " . $User_row['AccountEmail'] . "</p>";
								echo "<p>" . $User_row['AccountAddress'] . " " . $User_row['AccountZipcode'] . " " . $User_row['AccountProvince'] . "</p>";
								echo "<p>";
								echo "<a href=\"edit_user.php?AccountID=" . $User_row["AccountID"] . "\">Edit</a> | ";
								echo "<a href=\"../functions/delete_user_func.php?AccountID=" . $User_row["AccountID"] . "\">Delete</a>";
								echo "</p>";
								echo "</li>";
							}
							?>
					</ul>
				</div>
				
			</section>

		</article>

  	</body>
</html>
