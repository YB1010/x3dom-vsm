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
				<div class="catnameline">
					<span class="textincat">Delete Product</span>
				</div>
                
                <div class="itemcontainer">
                    <ul>
                        <?php
                            $query = "SELECT ProductID, ProductName FROM Product WHERE ProductName LIKE '%" . $_GET["search"] . "%' ORDER BY ProductName";
                            $result = mysql_query($query);
                            while ($rows = mysql_fetch_array($result)) {
                        ?>
						<li><p><a href="../functions/product_func.php?func=delete&ProductID=<?php echo $rows["ProductID"]; ?>&url=../admin/index.php"><?php echo $rows["ProductName"]; ?></a></p></li>
                        <?php
                            }
                        ?>
					</ul>
                </div>
				
			</section>
            
		</article>
        
  	</body>
</html>
