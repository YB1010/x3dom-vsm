<?php 
	session_start();
	require_once("functions/session_alive_func.php");
	is_session_alive();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="OTOP3D" />
		<meta name="keywords" content="OTOP3D"/>
		<meta itemprop="description" content="OTOP3D">

		<title>Chamchuree Sqaure Virtual Mall Project</title>
		<link rel="shortcut icon" href="styles/favicon/favicon.ico" type="image/x-icon"/>
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link type="text/css" rel="stylesheet" href="styles/reset.css" />
		<link type="text/css" rel="stylesheet" href="styles/text.css" />
		<link type="text/css" rel="stylesheet" href="styles/styles.css" />
  	</head>
  	<body>
		<article id="container">
			
			<section>
				<div class="login_form">
					<form action="functions/login_func.php" method="post">
						<fieldset>
							<input type="email" name="email" placeholder="Email" required="required" />
							<input type="password" name="password" placeholder="Password" required="required" />
							
							<input type="submit" value="Login" />
						</fieldset>
					</form>
				</div>
			</section>

			<footer>
				<ul>
					<li><a href="./">Copyright 2011 Hassadee Pimsuwan</a></li>
				</ul>
			</footer>

		</article>

  	</body>
</html>
