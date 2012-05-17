<?php
	session_start();
	require_once("config.php");
	
	if ((($_FILES["ProductImage"]["type"] == "image/jpeg")
		|| ($_FILES["ProductImage"]["type"] == "image/pjpeg"))
		&& ($_FILES["ProductImage"]["size"] < 1000000))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		}
		else
		{
			$imagename = $_SESSION["AccountID"] . "_" . $_GET["ProductID"] . ".jpg";
			move_uploaded_file($_FILES["ProductImage"]["tmp_name"], "../background_uploads/" . $imagename);
			header('Location: ../user/detail.php?ProductID='.$_GET["ProductID"].'');
		}
	}
	else
	{
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
				<h1>OTOP3D</h1>
			</header>
			
			<section>
				
				<div class="catnameline">
					<span class="textincat">
						Configure |
						<a href="../user/detail.php?ProductID=<?=$_GET["ProductID"];?>">Back to product</a>
					</span>
				</div>
				
				<div class="fileform">
					<h1>Invalid file</h1>
					<p>Image file size must less than 1MB</p>
					<p>and file type must be JPG (.jpg) only</p>
					<a href="../user/configure.php?ProductID=<?=$_GET["ProductID"];?>">Go to Configure</a>
				</div>
				
			</section>
			
		</article>
		
  	</body>
</html>
		
<?php
	}
?>