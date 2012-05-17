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
					$ProductTypeSQL = "SELECT * FROM ProductType";
					$ProductTypeQuery = mysql_query($ProductTypeSQL) or die ("Error Query [" . $ProductTypeSQL . "]");
                ?>
				
				<div class="catnameline">
					<span class="textincat">Add Product</span>
				</div>
                
				<div class="fileform">
					<form name="edit_form" method="post" action="../functions/product_func.php?url=../admin/index.php" enctype="multipart/form-data">
						
                        <input type="hidden" name="func" value="insert" />
                        
						<h4>Product Name</h4>
						<input type="text" name="ProductName" required="required" />
						
						<h4>Product Detail</h4>
						<textarea name="ProductText" ></textarea>
						
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
						<input type="number" name="ProductPrice" />
						
						<h4>Product Image</h4>
						<input type="file" name="ProductImage" />
						
						<h4>Product 3D File</h4>
						<input type="file" name="Product3DFile" />
                        
						<input name="btSubmit" type="submit" value="Add" />
					</form>
				</div>
				
			</section>
            
		</article>
        
  	</body>
</html>
