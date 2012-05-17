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
					<li><a href="view_order_list.php"><div class="navcircle"><span class="navbar">Order</span></div></a></li>
					<li><a href="../functions/logout_func.php"><div class="navcircle"><span class="navbar">Logout</span></div></a></li>
				</ul>
			</nav>

			<header>
				<h1>CU BOOK</h1>
			</header>
			
			<section>
				
				<?php
					$getProduct = "SELECT * FROM Product WHERE ProductID = '".$_GET["ProductID"]."' ";
					$getProductQuery = mysql_query($getProduct) or die ("Error Query [".$getProduct."]");
					$getProductResult = mysql_fetch_array($getProductQuery);
				?>
				
				<div class="catnameline">
					<span class="textincat">
						Configure |
						<a href="detail.php?ProductID=<?=$_GET["ProductID"];?>">Back to product</a>
					</span>
				</div>
				
				<div class="fileform">
					<form name="configure_form" method="post" action="../functions/user_configure_func.php?ProductID=<?=$_GET["ProductID"];?>" enctype="multipart/form-data">
						
						<h4>Product Image</h4>
						<p>File type: JPEG (.jpg) only and file size must less than 1MB</p>
						<input type="file" name="ProductImage" id="ProductImage" />
						
						<input name="ConfigureSubmit" type="submit" value="Upload" />
					</form>
				</div>

			</section>

		</article>

  	</body>
</html>
