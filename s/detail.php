<?php
    //session_start();
	require_once("../main/functions/config.php");
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
		<link type="text/css" rel="stylesheet" href="styles/reset.css" />
		<link type="text/css" rel="stylesheet" href="styles/text.css" />
		<link type="text/css" rel="stylesheet" href="styles/styles.css" />
		<!--
		<script type="text/javascript" src="../scripts/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="../scripts/jquery.easing.1.3.js"></script>
		-->
  	</head>
  	<body>
		<article id="container">
			<!--
			<nav>
				<ul>
					<li><a href="index.php"><div class="navcircle"><span class="navbar">Home</span></div></a></li>
					<li><a href="view_order_list.php"><div class="navcircle"><span class="navbar">Order</span></div></a></li>
					<li><a href="../functions/logout_func.php"><div class="navcircle"><span class="navbar">Logout</span></div></a></li>
				</ul>
			</nav>
			-->
			<section>
				
				<?php
					$getProduct = "SELECT * FROM Product WHERE ProductID = '".$_GET["ProductID"]."' ";
					$getProductQuery = mysql_query($getProduct) or die ("Error Query [".$getProduct."]");
					$getProductResult = mysql_fetch_array($getProductQuery);
				?>
				
				<!--
				<div class="catnameline">
					<span class="textincat">Products</span>
				</div>
			-->

				<div class="product_detail">
					<img src="../main/image_uploads/<?=$getProductResult["ProductImage"];?>" />
					
					<div class="product_detail_panel">
						<p>Name: <?=$getProductResult["ProductName"];?></p>
						<p><?=$getProductResult["ProductText"];?></p>
						<p>Price: <?=$getProductResult["ProductPrice"];?> THB</p>

						<p><a href="index.php">Back</a></p>
					</div>

					<!--
					<iframe class="product_detail_visual_panel" 
						frameborder="0"
						src="../main/3d_uploads/<?=$getProductResult["Product3DFile"];?>"
						scrolling="no"

						style="background-image: url('../background_uploads/<?=$_SESSION["AccountID"]."_".$getProductResult["ProductID"];?>.jpg');
						background-repeat:no-repeat;
						background-size:100% 100%;">
					</iframe>
					-->

					<iframe class="product_detail_visual_panel" 
						frameborder="0"
						src="../main/3d_uploads/<?=$getProductResult["Product3DFile"];?>"
						scrolling="no">
					</iframe>

					<!--
					<div class="config_panel">
						<ul>
							<a href="../main/functions/user_purchase_func.php?ProductID=<?=$getProductResult["ProductID"];?>"><li style="background: #22C6B5;">Purchase</li></a>
							<a href="configure.php?ProductID=<?=$getProductResult["ProductID"];?>"><li>Configure</li></a>
						</ul>
					</div>
					-->
				</div>
			</section>

		</article>

  	</body>
</html>
