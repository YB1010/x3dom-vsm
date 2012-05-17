<?php session_unset(); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
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
					<li><a href="login.php"><div class="navcircle"><span class="navbar">Login</span></div></a></li>
				</ul>
			</nav>

			<header>
				<h1>OTOP3D</h1>
			</header>
			
			<section>
				<div class="signup_form">
					<form action="functions/signup_func.php" method="post">
						<fieldset>
							<input name="email" type="email" required="required" placeholder="Email" />
							<input name="password" type="password" required="required" placeholder="Password" autocomplete="off" />
							<input name="confirmpassword" type="password" required="required" placeholder="Confirm Password" autocomplete="off" />
							<input name="fullname" type="text" id="fullname" required="required" placeholder="Fullname" />
							
							<input type="submit" name="Submit" value="Sign Up" />
						</fieldset>
					</form>
				</div>
			</section>

			<footer>
				<ul>
					<li><a href="./">Copyright 2011 OTOP3D Project</a></li>
				</ul>
			</footer>

		</article>
		
		<script type="text/javascript" src="scripts/jquery-1.6.2.min.js"></script>
        <script type="text/javascript" src="scripts/jquery.easing.1.3.js"></script>

  	</body>
</html>

<!-- Our Standard Object
    <article>
    <header></header>
    <section></section>
    <footer></footer>
    </article>
-->
