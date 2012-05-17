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
		
		<script type="text/javascript" src="../scripts/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="../scripts/jquery.easing.1.3.js"></script>
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
				
				<?php
					$strSQL = "SELECT * FROM Product WHERE ProductID = '" . $_GET["ProductID"] . "' ";
					$objQuery = mysql_query($strSQL) or die ("Error Query [" . $strSQL . "]");
					$objResult = mysql_fetch_array($objQuery);
					
					$ProductTypeSQL = "SELECT * FROM ProductType";
					$ProductTypeQuery = mysql_query($ProductTypeSQL) or die ("Error Query [" . $ProductTypeSQL . "]");
				?>
				
				<div class="catnameline">
					<span class="textincat">Edit Product</span>
				</div>
			
				<div class="fileform">
					<form name="edit_form" method="post" action="../functions/product_func.php?url=../admin/index.php" enctype="multipart/form-data">
                        
                        <input type="hidden" name="func" value="update" />
						
						<h4>Product ID</h4>
                        <h5><?php echo $objResult["ProductID"]; ?></h5>
						<input type="hidden" name="ProductID" value="<?php echo $objResult["ProductID"]; ?>" />
						
						<h4>Product Name</h4>
						<input type="text" name="ProductName" value="<?php echo $objResult["ProductName"]; ?>" />
						
						<h4>Product Detail</h4>
						<textarea name="ProductText"><?php echo $objResult["ProductText"]; ?></textarea>
						
						<h4>Product Type ID</h4>
						
						<?php
							echo "<select name=\"ProductTypeID\">";
							while($ProductTypeRow = mysql_fetch_array($ProductTypeQuery))
							{
								echo "<option value=\"" . $ProductTypeRow["ProductTypeID"] . "\">" . $ProductTypeRow["ProductTypeName"] . "</option>";
							}
							echo "</select>";
						?>
						
						<h4>Product Price</h4>
						<input type="number" name="ProductPrice" value="<?php echo $objResult["ProductPrice"]; ?>" />
						
						<h4>Product Image</h4>
						<p>Old Image File: <?php echo $objResult["ProductImage"]; ?></p>
                        <input type="hidden" name="OldProductImage" value="<?php echo $objResult["ProductImage"]; ?>" />
						<input type="file" name="ProductImage" />
						
						<h4>Product 3D File</h4>
						<p>Old 3D File: <?php echo $objResult["Product3DFile"]; ?></p>
                        <input type="hidden" name="OldProduct3DFile" value="<?php echo $objResult["Product3DFile"]; ?>" />
						<input type="file" name="Product3DFile" />

						<input name="btSubmit" type="submit" value="Edit" />
					</form>
				</div>
				
			</section>
            
		</article>
        
  	</body>
</html>
