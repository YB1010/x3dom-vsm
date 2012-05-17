<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset='utf-8' />
		<meta name="description" content="OTOP3D" />
		<meta name="keywords" content="OTOP3D"/>
		<meta itemprop="description" content="OTOP3D">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Cache-Control" content="no-cache" />
				
		<title>OTOP3D</title>
		<link rel="shortcut icon" href="styles/favicon/favicon.ico" type="image/x-icon"/>
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link type="text/css" rel="stylesheet" href="../styles/reset.css" />
		<link type="text/css" rel="stylesheet" href="../styles/text.css" />
		<link type="text/css" rel="stylesheet" href="../styles/styles.css" />
		<link type="text/css" rel="stylesheet" href="../css/general.css" />
		<link type="text/css" rel="stylesheet" href="../assets/fancybox/jquery.fancybox-1.3.4.css" />
				
		<script type="text/javascript" src="../js/data.js"></script>
		<script type="text/javascript" src="../js/functions.js"></script>
	</head>
	<body onload="initThumbs();">
		
		<article id="container">
			<nav>
				<ul>
					<li><a href="../index.php"><div class="navcircle"><span class="navbar">Home</span></div></a></li>
					<li><a href="../signup.php"><div class="navcircle"><span class="navbar">Sign Up</span></div></a></li>
					<li><a href="../help.php"><div class="navcircle"><span class="navbar">Help</span></div></a></li>
					<li><a href="../login.php"><div class="navcircle"><span class="navbar">Login</span></div></a></li>
				</ul>
			</nav>
			
			<header>
				<h1>OTOP3D</h1>
			</header>
			<section>
				<div class="InfoContainer">
					
					<div id="Name" class="InfoBlack">
						Theiere Calabre
					</div>
					
					<div class="InfoOrange">
						<div class="InfoDesc">
							Description
						</div>
						<div id="Place" class="InfoValue">
							Hassadee Pimsuwan
						</div>
					</div>
					
					<div class="InfoOrange">
						<div class="InfoDesc">
							Price (Thai Baht)
						</div>
						<div id="Date" class="InfoValue">
							5,000
						</div>
					</div>
					
					<div class="InfoOrange">
						<div class="InfoDesc">
							Contact
						</div>
						<div id="Artist" class="InfoValue">
							Hassadee Pimsuwan,<br /> Tel: +66(0)8-7778-7806<br /> Email: silkzter@gmail.com
						</div>
					</div>
					
				</div>
				
				<iframe id="Content3D" class="Content3D" frameborder="0" src="data/models/dcm200406072505.html" scrolling="no" marginheight="0" marginwidth="0"></iframe>
				
				<div id="HoverInfo" class="HoverInfo">
					Theiere Calabre
				</div>
				
				<div class="Slider">
					<a class="LeftArrow" href="javascript:prevThumb()">&lt;</a>
					
					<a id="Thumb0" class="Thumb" href="javascript:clickThumb(0);" onmouseover="mouseOver(0);" onmouseout="mouseOut(0);" onmousemove="mouseMove(event);"></a>
					<a id="Thumb1" class="Thumb" href="javascript:clickThumb(1);" onmouseover="mouseOver(1);" onmouseout="mouseOut(1);" onmousemove="mouseMove(event);"></a>
					<a id="Thumb2" class="Thumb" href="javascript:clickThumb(2);" onmouseover="mouseOver(2);" onmouseout="mouseOut(2);" onmousemove="mouseMove(event);"></a>
					<a id="Thumb3" class="Thumb" href="javascript:clickThumb(3);" onmouseover="mouseOver(3);" onmouseout="mouseOut(3);" onmousemove="mouseMove(event);"></a>
					<a id="Thumb4" class="Thumb" href="javascript:clickThumb(4);" onmouseover="mouseOver(4);" onmouseout="mouseOut(4);" onmousemove="mouseMove(event);"></a>
					
					<a class="RightArrow" href="javascript:nextThumb()">&gt;</a>
				</div>
				
				<form action="perchase.php">
					<label>Order : </label><br />
					<textarea name="orders" rows="5" cols="20" style="resize:none;"></textarea><br />
					<label>Name : </label><br />
					<input type="text" name="name" placeholder="Your name"/><br />
					<label>Telephone : </label><br />
					<input type="text" name="tel" placeholder="Your phone number" /><br />
					<label>E-mail : </label><br />
					<input type="text" name="email" placeholder="Your email" /><br /><br />
					<input type="submit" value="Purchase"/>
				</form>
			</section>
			
			<footer>
				<ul>
					<li><a href="./">Copyright 2011 OTOP3D Project</a></li>
				</ul>
			</footer>
			
		</article>
		
		<script src="../js/jquery-1.6.2.min.js"></script>
		<script src="../assets/fancybox/jquery.easing-1.3.pack.js"></script>
		<script src="../assets/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<script src="../assets/js/script.js"></script>
	</body>
</html>
