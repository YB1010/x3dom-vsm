<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
		<meta name="description" content="OTOP3D" />
		<meta name="keywords" content="OTOP3D"/>
		<meta itemprop="description" content="OTOP3D">
			
		<title>OTOP3D Project</title>
		<link rel="shortcut icon" href="styles/favicon/favicon.ico" type="image/x-icon"/>
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link type="text/css" rel="stylesheet" href="styles/reset.css" />
		<link type="text/css" rel="stylesheet" href="styles/text.css" />
		<link type="text/css" rel="stylesheet" href="styles/styles.css" />		
	</head>
	<body>
		<article id="container">
			<nav>
				<ul>
					<li><a href="index.php"><div class="navcircle"><span class="navbar">Home</span></div></a></li>
					<li><a href="signup.php"><div class="navcircle"><span class="navbar">Sign Up</span></div></a></li>
					<li><a href="help.php"><div class="navcircle"><span class="navbar">Help</span></div></a></li>
					<li><a href="login.php"><div class="navcircle"><span class="navbar">Login</span></div></a></li>
				</ul>
			</nav>
			
			<header>
				<h1>OTOP3D</h1>
			</header>
			
			<section>
				<div class="uploadform">
					<h2>Upload Page</h2>
					
					<div class="fileform">
						<form id="upload" action="upload.php" method="post" enctype="multipart/form-data">
							<h4>HTML file:</h4>
							<input type="file" name="htmlFile" id="htmlFile" />

							<h4>Image file:</h4>
							<input type="file" name="imgFile" id="imgFile" />

							<h4>Name:</h4>
							<input type="text" name="name" id="name" placeholder="Item's name" />
						
							<h4>Price:</h4>
							<input type="text" name="price" id="price" placeholder="Ex. 5000" />
						
							<h4>Description:</h4>
							<textarea name="description" rows="5" cols="42" placeholder="Item's Description"></textarea>

							<h4>Contact:</h4>
							<textarea name="contact" rows="5" cols="42" placeholder="Contact Info"></textarea>
						
							<input type="submit" value="Upload" />
						</form>
					</div>
					
					<div class="fileform">
						<form id="upload" action="uploadbackground.php" method="post" enctype="multipart/form-data">
							<p>Background image (file type must be "jpg" and file name must be "bg" only):</p>
							<input type="file" name="bgFile" id="bgFile" /><br />
							<input type="submit" value="Change background" />
						</form>
					</div>
					
				</div>
			</section>
			
			<footer>
				<ul>
					<li><a href="./">Copyright 2011 OTOP3D Project</a></li>
				</ul>
			</footer>
			
		</article>
	</body>
</html>
