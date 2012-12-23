<?php
	require "vivo3d.php"
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html;charset=utf-8'></meta>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>VIVO3D Framework -- EXAMPLE</title>
		
		<link rel="shortcut icon" href="styles/favicon/favicon.ico" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="styles/x3dom.css" />
		<link rel="stylesheet" type="text/css" href="styles/reset.css" />
		<!--
		<link rel="stylesheet" type="text/css" href="styles/text.css" />
		-->

		<link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.min.css' />
		<script type='text/javascript' src='bootstrap/js/bootstrap.min.js'></script>
		
		<link rel="stylesheet" type="text/css" href="styles/styles.css" />

	
		<script type='text/javascript' src='./scripts/x3dom.js'></script>
		<script type="text/javascript" src="scripts/nav_runtime.js"></script>
	</head>
	<body>

		<header class='navbar navbar-fixed-top'>
			<div class='navbar-inner'>
				<nav class='container'>
					<a class="brand" href="#">
						VIVO3D Framework
					</a>
					<ul class='nav'>
						<li><a href="../index.php">About</a></li>
						<li><a href="../index.php">Contact</a></li>
					</ul>

					<form class='navbar-search pull-right'>
						<input type='text' class='search-query span2' placeholder='Search'>
					</form>
				</nav>

				<nav class='container'>
					<ul class="breadcrumb">
						<li>
							<a href="#">Home</a> <span class="divider">/</span>
						</li>
						<li>
							<a href="#">Library</a> <span class="divider">/</span>
						</li>
						<li class="active">Test case</li>
					</ul>
				</nav>

			</div>
		</header>


		<div class='container-fluid'>

			<div class='row-fluid'>
		
				<section class='span10'>
					
					<!--
					<div class='navbar'>
						<div class='navbar-inner'>
							<div class='container'>
								<ul class="breadcrumb">
									<li>
										<a href="#">Home</a> <span class="divider">/</span>
									</li>
									<li>
										<a href="#">Library</a> <span class="divider">/</span>
									</li>
									<li class="active">Data</li>
								</ul>
							</div>
						</div>
					</div>
					-->

					<x3d id='x3dom-scene' showStat='true'>
						<scene>
							<?php
				
								$transparency = $degree = $x = $y = $z = 0;
								for($i = 0; $i < 5; $i++, $x += 3, $transparency = $degree = $y = 0) {
									for($n = 0; $n < 5; $n++, $degree += 18, $y += 3, $transparency += 0.05) {
										/*genOctagonPillar($position, $conf, $degree, $diffuseColor, $specularColor, $transparency, $width, $height, $creaseAngle)*/
										genOctagonPillar("$x $y $z", "xy", $degree, "#0399FF", "#03B1FF", $transparency, 1, 1, 1.57);
									}
								}
								
								$transparency = $degree = $y = $z = 0;
								$x = 15;
								for($i = 0; $i < 5; $i++, $x += 4, $transparency = $degree = $y = 0) {
									for($n = 0; $n < 5; $n++, $degree += 18, $y += 3, $transparency += 0.05) {
									/* genTrapezoid($position, $conf, $degree, $diffuseColor, $specularColor, $transparency, $direction, $x, $y, $z, $creaseAngle) */
										genTrapezoid("$x $y $z", "xy", $degree, "#C7F25F", "#03B1FF", $transparency, 1, 1, 1, 1, 1.57);
									}
								}
								
								$transparency = $degree = $y = $z = 0;
								$x = 35;
								for($i = 0; $i < 5; $i++, $x += 4, $transparency = $degree = $y = 0) {
									for($n = 0; $n < 5; $n++, $degree += 18, $y += 3, $transparency += 0.05) {
									/* genTrapezoid($position, $conf, $degree, $diffuseColor, $specularColor, $transparency, $direction, $x, $y, $z, $creaseAngle) */
										genTrapezoid2("$x $y $z", "xy", $degree, "#22C6B5", "#03B1FF", $transparency, 1, 1, 1, 1, 1.57);
									}
								}
								
								$transparency = $degree = $y = $z = 0;
								$x = 55;
								for($i = 0; $i < 5; $i++, $x += 3, $transparency = $degree = $y = 0) {
									for($n = 0; $n < 5; $n++, $degree += 18, $y += 3, $transparency += 0.05) {
										/*genCube($position, $conf, $degree, $diffuseColor, $specularColor, $transparency, $x, $y, $z, $creaseAngle)*/
										genCube("$x $y $z", "xy", $degree, "#FF9100", "#FFF", $transparency, 1, 1, 1, 1.57);
									}
								}
							?>
			
			
							<?php
						
						 genOctagonPillar("0 0 10", "xyz", 0, "#0399FF", "#03B1FF", 0.0, 1, 1, 1.57);
						 genOctagonPillar("0 3 10", "z", 45, "#0399FF", "#03B1FF", 0.0, 1, 1, 1.57);
						 genOctagonPillar("0 6 10", "y", 45, "#0399FF", "#03B1FF", 0.0, 1, 1, 1.57);
						 genOctagonPillar("0 9 10", "yz", 45, "#0399FF", "#03B1FF", 0.0, 1, 1, 1.57);
						 genOctagonPillar("0 12 10", "x", 45, "#0399FF", "#03B1FF", 0.0, 1, 1, 1.57);
						 genOctagonPillar("0 15 10", "xz", 45, "#0399FF", "#03B1FF", 0.0, 1, 1, 1.57);
						 genOctagonPillar("0 18 10", "xy", 45, "#0399FF", "#03B1FF", 0.0, 1, 1, 1.57);
			
						 genCube("3 0 10", "xyz", 0, "#06C6C0", "#06F0EA", 0.0, 1, 1, 1, 0);
						 genCube("3 3 10", "z", 45, "#06C6C0", "#06F0EA", 0.0, 1, 1, 1, 0);
						 genCube("3 6 10", "y", 45, "#06C6C0", "#06F0EA", 0.0, 1, 1, 1, 0);
						 genCube("3 9 10", "yz", 45, "#06C6C0", "#06F0EA", 0.0, 1, 1, 1, 0);
						 genCube("3 12 10", "x", 45, "#06C6C0", "#06F0EA", 0.0, 1, 1, 1, 0);
						 genCube("3 15 10", "xz", 45, "#06C6C0", "#06F0EA", 0.0, 1, 1, 1, 0);
						 genCube("3 18 10", "xy", 45, "#06C6C0", "#06F0EA", 0.0, 1, 1, 1, 0);
			 
						 genTrapezoid("6 0 10", "xyz", 0, "#F9990C", "#FF9F06", 0.0, -1, 1, 1, 1, 0);
						 genTrapezoid("6 3 10", "z", 45, "#F9990C", "#F9E10C", 0.0, -1, 1, 1, 1, 0);
						 genTrapezoid("6 6 10", "y", 45, "#F9990C", "#F9E10C", 0.0, -1, 1, 1, 1, 0);
						 genTrapezoid("6 9 10", "yz", 45, "#F9990C", "#F9E10C", 0.0, -1, 1, 1, 1, 0);
						 genTrapezoid("6 12 10", "x", 45, "#F9990C", "#F9E10C", 0.0, -1, 1, 1, 1, 0);
						 genTrapezoid("6 15 10", "xz", 45, "#F9990C", "#F9E10C", 0.0, -1, 1, 1, 1, 0);
						 genTrapezoid("6 18 10", "xy", 45, "#F9990C", "#F9E10C", 0.0, -1, 1, 1, 1, 0);
			 
						 genTrapezoid2("9 0 10", "xyz", 0, "#F9990C", "#FFFFFF", 0.0, 1, 1, 1, 1, 0);
						 genTrapezoid2("12 0 10", "xyz", 0, "#F9990C", "#FFFFFF", 0.0, -1, 1, 1, 1, 0);
						 
						?>
			
						</scene>
					</x3d>
			
				</section>

				<aside class='span2'>
					<div class='sidebar-nav'>
						<p>span2</p>
						<p>span2</p>
						<p>span2</p>
						<p>span2</p>
						<p>span2</p>
					</div>
				</aside>
			
				<footer class='navbar navbar-fixed-bottom'>
					<div class='navbar-inner'>
						<div class='container'>
							<ul class='nav'>
								<li>
									<a href="http://hapztron.wordpress.com">&copy; 2012 Hassadee Pimsuwan</a>
								</li>
							</ul>
						</div>
					</div>
				</footer>

			</div>
		</div>

	</body>
</html>