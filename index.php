<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html;charset=utf-8'></meta>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Chulabook Virtual Store</title>
		
		<!-- 
		<link rel="shortcut icon" href="styles/favicon/favicon.ico" type="image/x-icon"/>
		-->
		<link rel="stylesheet" type="text/css" href="scripts/x3dom-1.5/x3dom.css" />
		<link rel="stylesheet" type="text/css" href="styles/reset.css" />
		<!--
		<link rel="stylesheet" type="text/css" href="styles/text.css" />
		-->

		<link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.min.css' />
		<script type='text/javascript' src='bootstrap/js/bootstrap.min.js'></script>
		
		<link rel="stylesheet" type="text/css" href="styles/styles.css" />

	
		<script type='text/javascript' src='scripts/x3dom-1.5/x3dom-full.js'></script>
		<script type="text/javascript" src="scripts/nav_runtime.js"></script>
	</head>
	<body>

		<header class='navbar navbar-fixed-top'>
			<div class='navbar-inner'>
				<nav class='container'>
					<a class="brand" href="#">
						Chulabook Virtual Store
					</a>
					<ul class='nav'>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
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
						<li class="active">Virtual Mall</li>
					</ul>
				</nav>
				
			</div>
		</header>


		<div class='container-fluid'>

			<div class='row-fluid'>
		
				<section class='span10'>

					<X3D id='x3dom-scene' showStat='true'>
						<Scene>
							<Transform translation='10 0.875 2'>
								<Inline onclick="alert('Check Out!')" url="scenes/avatars/seller.x3d" />
							</Transform>

							<Inline url="scenes/shopscene.x3d" />

						</Scene>
					</X3D>
			
				</section>

				<aside class='span2'>
					<div class='sidebar-nav'>
						<p>Test Line #1</p>
						<p>Test Line #2</p>
						<p>Test Line #3</p>
						<p>Test Line #4</p>
						<p>Test Line #5</p>
						<p>This sidebar will place by Shoping Cart</p>
					</div>
				</aside>
			
				<footer class='navbar navbar-fixed-bottom'>
					<div class='navbar-inner'>
						<div class='container'>
							<ul class='nav'>
								<li>
									<a href="http://hassadee.com">&copy; 2012-2013 Chulabook Virtual Store</a>
								</li>
							</ul>
						</div>
					</div>
				</footer>

			</div>
		</div>

	</body>
</html>