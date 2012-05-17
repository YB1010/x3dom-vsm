<?php
   // session_start();
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
		<script type="text/javascript">
			function ShowProduct(str)
			{
				if (str=="") {
					document.getElementById("ProductShow").innerHTML="";
					return;
				} 
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				}
				else {
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("ProductShow").innerHTML=xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","../main/functions/user_get_product_func.php?q="+str,true);
				xmlhttp.send();
			}
		</script>
		
		<?php 
			require("../main/functions/get_category_func.php");
		?>
		
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
				<!--
				<div class="catnameline"><span class="textincat">Categories</span></div>
			-->
				<div class="category_container">
					<ul>
						<?php GetCategory(); ?>
					</ul>
				</div>
				<!--
				<div class="catnameline">
					<span class="textincat">Products</span>
				</div>
				-->
				<div id="ProductShow"></div>
			</section>

		</article>

  	</body>
</html>
