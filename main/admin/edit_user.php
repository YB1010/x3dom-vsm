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
				
				<?php
					$strSQL = "SELECT * FROM Account WHERE AccountID = '" . $_GET["AccountID"] . "' ";
					$objQuery = mysql_query($strSQL) or die ("Error Query [" . $strSQL . "]");
					$objResult = mysql_fetch_array($objQuery);
				?>
				
				<div class="catnameline">
					<span class="textincat">Edit Product</span>
				</div>
			
				<div class="fileform">
					<form name="edit_form" method="post" action="../functions/edit_user_func.php?AccountID=<?=$_GET["AccountID"];?>" enctype="multipart/form-data">
						
						<h4>Name</h4>
						<input type="text" name="AccountName" value="<?php echo $objResult["AccountName"]; ?>" />
						
						<h4>Email</h4>
						<input type="email" name="AccountEmail" value="<?php echo $objResult["AccountEmail"]; ?>" />
						
						<h4>Address</h4>
						<textarea name="AccountAddress"><?php echo $objResult["AccountAddress"]; ?></textarea>
						
						<h4>Province</h4>
						<input type="text" name="AccountProvince" value="<?php echo $objResult["AccountProvince"]; ?>" />
						
						<h4>Zipcode</h4>
						<input type="number" name="AccountZipcode" value="<?php echo $objResult["AccountZipcode"]; ?>" />

						<input name="Submit" type="submit" value="Edit" />
					</form>
				</div>
				
			</section>
            
		</article>
        
  	</body>
</html>
