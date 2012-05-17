<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
		<meta name="description" content="OTOP3D" />
		<meta name="keywords" content="OTOP3D"/>
		<meta itemprop="description" content="OTOP3D" />

		<title>OTOP3D Project</title>
		<link rel="shortcut icon" href="styles/favicon/favicon.ico" type="image/x-icon"/>
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link type="text/css" rel="stylesheet" href="styles/reset.css" />
		<link type="text/css" rel="stylesheet" href="styles/text.css" />
		<link type="text/css" rel="stylesheet" href="styles/styles.css" />
		
		<script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="scripts/jquery.easing.1.3.js"></script>
		
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
				xmlhttp.open("GET","functions/get_product_func.php?q="+str,true);
				xmlhttp.send();
			}
		</script>
		
		<?php 
			require("functions/get_category_func.php");
		?>
		
  	</head>
  	<body>
		<article id="container">
			<nav>
				<ul>
					<li><a href="index.php"><div class="navcircle"><span class="navbar">Home</span></div></a></li>
					<li><a href="signup.php"><div class="navcircle"><span class="navbar">Sign Up</span></div></a></li>
					<li><a href="login.php"><div class="navcircle"><span class="navbar">Login</span></div></a></li>
				</ul>
			</nav>

			<header>
				<h1>OTOP3D</h1>
			</header>
			
			<section>
				<div class="catnameline"><span class="textincat">Categories</span></div>
				<div class="category_container">
					<ul>
						<?php GetCategory(); ?>
					</ul>
				</div>
				
				<div class="catnameline">
					<span class="textincat">Products</span>
				</div>
				
				<div id="ProductShow"></div>
				
			</section>

			<footer>
				<ul>
					<li><a href="./">Copyright 2011 OTOP3D Project</a></li>
				</ul>
			</footer>

		</article>

  	</body>
</html>
