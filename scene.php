<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="chrome=1" />
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
						<li>
							<a href="javascript: cartlist('')">
								สินค้าในรถเข็น ( <span id="qty">
								<?php
									$qty = 0;
									if (isset($_SESSION['vx_cart'])) {
										foreach ($_SESSION['vx_cart'] as $key => $value) {
											$qty += $value['qty'];
										}
									}
									echo $qty;
								?>
								</span> )
							</a>
						</li>
					</ul>

					<form class='navbar-search pull-right' onSubmit="javascript: return false">
						<input type='text' class='search-query span2' id="hp-search" placeholder='Search'>
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
		
				<section class='span9'>

					<X3D id='x3dom-scene' showStat='true'>
						<Scene>

							<NavigationInfo headlight="true"
		                		visibilityLimit="20"
				                type='"lookAround"'
				                avatarSize="0.25, 1.5, 0.75"></NavigationInfo>

				             <Viewpoint id='ViewpointMarker' 
				             	jump='false'
				             	position='25, 1.5, 5'
				             	orientation='0, 1, 0, -3.141592653589793'></Viewpoint>

				            <Collision enabled="true">
								<Transform translation='21 0.875 2.2' rotation='0 1 0 -1.5707963267949'>
									<LOD center="0 0 0" range="15">
										<Group>
											<Inline onclick="cartlist('')" url="scenes/avatars/seller.x3d" />
										</Group>
										<WorldInfo info='"null node"'/>
									</LOD>
								</Transform>
							</Collision>

							<Collision enabled="true">
								<Transform translation='23.5 0.875 2.2' rotation='0 1 0 -0.78539816339745'>
									<LOD center="0 0 0" range="15">
										<Group>
											<Inline onclick="cartlist('')" url="scenes/avatars/seller.x3d" />
										</Group>
										<WorldInfo info='"null node"'/>
									</LOD>
								</Transform>
							</Collision>
							
							<Collision enabled="true">
								<Transform translation="7 0 14" rotation='0 1 0 -0.78539816339745'>
									<LOD center="0 0 0" range="15">
										<Group>
											<Inline onClick="productslist('1', '')" url='scenes/shelf.x3d' />
										</Group>
										<WorldInfo info='"null node"'/>
									</LOD>
								</Transform>
							</Collision>

							<Collision enabled="true">
								<Transform translation="13 0 14" rotation='0 1 0 -0.78539816339745'>
									<LOD center="0 0 0" range="15">
										<Group>
											<Inline onClick="productslist('2', '')" url='scenes/shelf.x3d' />
										</Group>
										<WorldInfo info='"null node"'/>
									</LOD>
								</Transform>
							</Collision>

							<Collision enabled="true">
								<Transform translation="15 0 14" rotation='0 1 0 -0.78539816339745'>
									<LOD center="0 0 0" range="15">
										<Group>
											<Inline onClick="productslist('3', '')" url='scenes/shelf.x3d' />
										</Group>
										<WorldInfo info='"null node"'/>
									</LOD>
								</Transform>
							</Collision>

							<Collision enabled="true">
								<Transform translation="17 0 14" rotation='0 1 0 -0.78539816339745'>
									<LOD center="0 0 0" range="15">
										<Group>
											<Inline onClick="productslist('4', '')" url='scenes/shelf.x3d' />
										</Group>
										<WorldInfo info='"null node"'/>
									</LOD>
								</Transform>
							</Collision>

							<Collision enabled="true">
								<Transform translation="33 0 14" rotation='0 1 0 0.78539816339745'>
									<LOD center="0 0 0" range="15">
										<Group>
											<Inline onClick="productslist('5', '')" url='scenes/shelf.x3d' />
										</Group>
										<WorldInfo info='"null node"'/>
									</LOD>
								</Transform>
							</Collision>

							<Collision enabled="true">
								<Transform translation="35 0 14" rotation='0 1 0 0.78539816339745'>
									<LOD center="0 0 0" range="15">
										<Group>
											<Inline onClick="productslist('6', '')" url='scenes/shelf.x3d' />
										</Group>
										<WorldInfo info='"null node"'/>
									</LOD>
								</Transform>
							</Collision>

							<Collision enabled="true">
								<Transform translation="37 0 14" rotation='0 1 0 0.78539816339745'>
									<LOD center="0 0 0" range="15">
										<Group>
											<Inline onClick="productslist('7', '')" url='scenes/shelf.x3d' />
										</Group>
										<WorldInfo info='"null node"'/>
									</LOD>
								</Transform>
							</Collision>

							<Collision enabled="true">
								<Transform translation="43 0 14" rotation='0 1 0 0.78539816339745'>
									<LOD center="0 0 0" range="15">
										<Group>
											<Inline onClick="productslist('8', '')" url='scenes/shelf.x3d' />
										</Group>
										<WorldInfo info='"null node"'/>
									</LOD>
								</Transform>
							</Collision>

							<!-- Start: Models -->
							<!--
							<Transform translation='25 0 14' scale='0.0013 0.0013 0.0013' rotation='0 1 0 -0.78539816339745'>
								<Inline url='scenes/models/Mus.x3d' />
							</Transform>
							-->
							<!-- End: Models -->

							<Collision enabled="true">	
								<Inline url="scenes/shopscene.x3d" />
							</Collision>

						</Scene>
					</X3D>
			
				</section>

				<aside class='span3'>
					<div class='sidebar-nav'>
						<p>
							Press 'g' for game mode, use cursor keys to move (with 'w' back to walk mode).
						</p>
						<b>Navigation:</b>
						<ul>
							<li>
								Walk forward: Left Click/Drag
							</li>
							<li>
								Walk backward: Right Click/Drag or Alt + Left Click
							</li>
						</ul>
					</div>
				</aside>
			
				<footer class='navbar navbar-fixed-bottom'>
					<div class='navbar-inner'>
						<div class='container'>
							<ul class='nav'>
								<li>
									<a href="http://hassadee.com">&copy; 2013 Chulabook Virtual Store</a>
								</li>
							</ul>
						</div>
					</div>
				</footer>

			</div>
		</div>

		<?php include './pages/modal.page.php'; ?>
	</body>

	<script src="./js/jquery-1.8.2.min.js"></script>
	<script type='text/javascript' src='bootstrap/js/bootstrap.min.js'></script>
	<script type='text/javascript' src='./js/javascript.js'></script>
	<script type="text/javascript" src="scripts/keyevents.js"></script>

	<script type='text/javascript'>
		document.onkeydown = function(e)
        {
			var keynum = 0;

			if(window.event) { keynum = e.keyCode; }
			else if(e.which) { keynum = e.which; }

			if(keynum == 37) { // left
			    keyPress(37);
			}

			if(keynum == 38) { // up
			    keyPress(38);
			}

			if(keynum == 39) { // right
			  	keyPress(39);
			}

			if(keynum == 40) { // down
			    keyPress(40);
			}
		}
	</script>
</html>