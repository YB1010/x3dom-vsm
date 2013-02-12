<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="chrome=1" />
		<meta http-equiv='Content-Type' content='text/html;charset=utf-8'></meta>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Chulabook Virtual Store</title>
		
		<link rel="shortcut icon" href="styles/favicon/fav.ico" type="image/x-icon"/>
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
						<input type='text' class='search-query span2' id="hp-search" placeholder='ค้นหา'>
					</form>
					<ul class="nav pull-rifht">
						<li>
							<a href="javascript: alertLightbox('help')">ช่วยเหลือ</a>
						</li>
					</ul>
				</nav>
			</div>
		</header>

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

			             	<Inline url="scenes/shopscene.x3d"></Inline>


							<Transform translation='21 0.875 2.2' rotation='0 1 0 -1.5707963267949'>
								<LOD center="0 0 0" range="15">
									<Group>
										<Inline onclick="cartlist('')" url="scenes/avatars/seller.x3d" />
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>

							<Transform translation='23.5 0.875 2.2' rotation='0 1 0 -0.78539816339745'>
								<LOD center="0 0 0" range="15">
									<Group>
										<Inline onclick="cartlist('')" url="scenes/avatars/seller.x3d" />
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>

							<!-- Security guy -->
							<Transform translation='30 0.875 2.2' rotation='0 1 0 -2.0943951023932'>
								<LOD center="0 0 0" range="15">
									<Group>
										<Inline url="scenes/avatars/security.x3d" />
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>

							<!-- Boy -->
							<!--
							<Transform translation='27 0.975 10' rotation='0 1 0 -2.87979326579065'>
								<LOD center="0 0 0" range="15">
									<Group>
										<Inline url="scenes/avatars/boy.x3d" />
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
							-->
							
							<!-- Shelf -->
							<!-- Set all shelves y to 0.1 -->
							<Transform translation="0 0.1 0">
								<!-- C0 -->
								<Transform translation="10 0 13" rotation="0 1 0 -0.78539816339745">
									<Transform translation="0 0 0">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('1', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 1.3">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('1', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 2.6">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('1', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
								</Transform>

								<!-- C1 -->
								<Transform translation="14 0 13" rotation="0 1 0 -0.78539816339745">
									<Transform translation="0 0 0">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('2', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 1.3">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('2', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 2.6">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('2', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
								</Transform>

								<!-- C2 -->
								<Transform translation="17 0 13" rotation="0 1 0 -0.78539816339745">
									<Transform translation="0 0 0">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('3', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 1.3">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('3', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 2.6">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('3', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
								</Transform>

								<!-- C3 -->
								<Transform translation="20 0 13" rotation="0 1 0 -0.78539816339745">
									<Transform translation="0 0 0">
										<LOD center="0 0 0" range="15">
											<Group>
												<Inline onClick="productslist('4', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 1.3">
										<LOD center="0 0 0" range="15">
											<Group>
												<Inline onClick="productslist('4', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 2.6">
										<LOD center="0 0 0" range="15">
											<Group>
												<Inline onClick="productslist('4', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
								</Transform>

								<!-- C4 -->
								<Transform translation="31.5 0 13" rotation="0 1 0 0.78539816339745">
									<Transform translation="0 0 0">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('5', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 1.3">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('5', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 2.6">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('5', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
								</Transform>

								<!-- C5 -->
								<Transform translation="34 0 13" rotation="0 1 0 0.78539816339745">
									<Transform translation="0 0 0">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('6', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 1.3">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('6', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 2.6">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('6', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
								</Transform>

								<!-- C6 -->
								<Transform translation="37 0 13" rotation="0 1 0 0.78539816339745">
									<Transform translation="0 0 0">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('7', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 1.3">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('7', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 2.6">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('7', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
								</Transform>

								<!-- C7 -->
								<Transform translation="41.25 0 13.25" rotation="0 1 0 0.78539816339745">
									<Transform translation="0 0 0">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('8', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 1.3">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('8', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 2.6">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('8', '', 1)" url='scenes/shelf.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
								</Transform>
							</Transform>

						</Scene>
					</X3D>

		<aside class="help-sidebar rt">
			<section class="help-container">
				<h1>ช่วยเหลือ</h1>
				<h2>การควบคุม</h2>
				<ul>
					<li>เดินหน้า</li>
					<li>หันซ้าย</li>
					<li>หันขวา</li>
					<li>ถอยหลัง</li>
					<li>หมุน</li>
				</ul>
				<h1>ติดต่อ</h1>
				<p>วันและเวลาเปิด-ปิดร้าน</p>
			</section>
		</aside>

		<footer class='navbar navbar-fixed-bottom'>
			<div class='navbar-inner'>
				<div class='container'>
					<ul class='nav'>
						<li>
							<a href="http://hassadee.com">&copy; 2013 AUPPA GROUP</a>
						</li>
					</ul>
				</div>
			</div>
		</footer>

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