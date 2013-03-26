<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="chrome=1" />
		<meta http-equiv='Content-Type' content='text/html;charset=utf-8'></meta>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Chulabook Virtual Store</title>
		
		<link rel="shortcut icon" href="./styles/favicon/fav.ico" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="./scripts/x3dom-1.5/x3dom.css" />
		<link rel="stylesheet" type="text/css" href="./styles/reset.css" />
		<!--
		<link rel="stylesheet" type="text/css" href="styles/text.css" />
		-->
		<link rel='stylesheet' type='text/css' href='./bootstrap/css/bootstrap.min.css' />
		<link rel="stylesheet" type="text/css" href="./styles/styles.css" />
		<link rel="stylesheet" type="text/css" href="./styles/component.css">
	</head>
	<body>

		<header class='navbar navbar-fixed-top'>
			<div class='navbar-inner'>
				<nav class='container'>
					<a class="brand" href="#">Chulabook Virtual Store</a>
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
						<input type='text' class='search-query span2' id="hp-search" placeholder='ค้นหาหนังสือ'>
					</form>
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
							<!-- Balloon : Say Hello -->
							<Transform translation='21 2.1 2.2' rotation='0 1 0 0'>
								<LOD center="0 0 0" range="10">
									<Group>
										<Shape DEF="Payment_SHAPE">
											<Appearance>
												<ImageTexture DEF='Payment_IMAGE' url='scenes/textures/balloons/balloon-payment-2.png' repeatS='false' repeatT='false' />
												<TextureTransform DEF='Payment_TextureTransform' scale='1 1' containerField='textureTransform'/>
											</Appearance>
											<Box size="2.45 0.7 0.001" />
										</Shape>
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
							<!-- Balloon : Say Hello -->
							<Transform translation='23.5 2 2.2' rotation='0 1 0 0.78539816339745'>
								<LOD center="0 0 0" range="10">
									<Group>
										<Shape DEF="Payment_SHAPE">
											<Appearance>
												<ImageTexture DEF='Payment_IMAGE' url='scenes/textures/balloons/balloon-hello-w.png' repeatS='false' repeatT='false' />
												<TextureTransform DEF='Payment_TextureTransform' scale='1 1' containerField='textureTransform'/>
											</Appearance>
											<Box size="2.5 0.5 0.001" />
										</Shape>
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
							<!-- Balloon : Say Hello -->
							<Transform translation='30 2.2 2.2' rotation='0 1 0 -0.5235987755983'>
								<LOD center="0 0 0" range="10">
									<Group>
										<Shape DEF="Hello_SHAPE">
											<Appearance>
												<ImageTexture DEF='Hello_IMAGE' url='scenes/textures/balloons/balloon-hello.png' repeatS='false' repeatT='false' />
												<TextureTransform DEF='Hello_TextureTransform' scale='1 1' containerField='textureTransform'/>
											</Appearance>
											<Box size="2.5 0.8 0.001" />
										</Shape>
									</Group>
									<WorldInfo info='"null node"'/>
								</LOD>
							</Transform>
							
							<!-- Shelf -->
							<!-- Set all shelves y to 0.1 -->
							<Transform translation="0 0.1 0">
								<!-- C0 -->
								<Transform translation="10 0 13" rotation="0 1 0 -0.78539816339745">
									<Transform translation="0 0 0">
										<LOD center="0 0 0" range="30">
											<Group>
												<Inline onClick="productslist('4', '', '1', 1)" url='scenes/shelf-gensci-0.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 1.3">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('4', '', '2', 1)" url='scenes/shelf-gensci-1.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 2.6">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('4', '', '3', 1)" url='scenes/shelf-gensci-2.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
								</Transform>

								<!-- C1 -->
								<Transform translation="14 0 13" rotation="0 1 0 -0.78539816339745">
									<Transform translation="0 0 0">
										<LOD center="0 0 0" range="30">
											<Group>
												<Inline onClick="productslist('3', '', '1', 1)" url='scenes/shelf-literature-0.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 1.3">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('3', '', '2', 1)" url='scenes/shelf-literature-1.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 2.6">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('3', '', '3', 1)" url='scenes/shelf-literature-2.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
								</Transform>

								<!-- C2 -->
								<Transform translation="17 0 13" rotation="0 1 0 -0.78539816339745">
									<Transform translation="0 0 0">
										<LOD center="0 0 0" range="30">
											<Group>
												<Inline onClick="productslist('1', '', '1', 1)" url='scenes/shelf-lang-0.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 1.3">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('1', '', '2', 1)" url='scenes/shelf-lang-1.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 2.6">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('1', '', '3', 1)" url='scenes/shelf-lang-2.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
								</Transform>

								<!-- C3 (6) Novel -->
								<Transform translation="20 0 13" rotation="0 1 0 -0.78539816339745">
									<Transform translation="0 0 0">
										<LOD center="0 0 0" range="30">
											<Group>
												<Inline onClick="productslist('6', '', '1', 1)" url='scenes/shelf-novel-0.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 1.3">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('6', '', '2', 1)" url='scenes/shelf-novel-1.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 2.6">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('6', '', '3', 1)" url='scenes/shelf-novel-2.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
								</Transform>

								<!-- C4 (2) Religion -->
								<Transform translation="31.25 0 13.25" rotation="0 1 0 0.78539816339745">
									<Transform translation="0 0 0">
										<LOD center="0 0 0" range="30">
											<Group>
												<Inline onClick="productslist('2', '', '1', 1)" url='scenes/shelf-religion-0.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 1.3">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('2', '', '2', 1)" url='scenes/shelf-religion-1.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 2.6">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('2', '', '3', 1)" url='scenes/shelf-religion-2.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
								</Transform>

								<!-- C5 (5) Biz -->
								<Transform translation="34 0 13" rotation="0 1 0 0.78539816339745">
									<Transform translation="0 0 0">
										<LOD center="0 0 0" range="30">
											<Group>
												<Inline onClick="productslist('5', '', '1', 1)" url='scenes/shelf-biz-0.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 1.3">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('5', '', '2', 1)" url='scenes/shelf-biz-1.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 2.6">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('5', '', '3', 1)" url='scenes/shelf-biz-2.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
								</Transform>

								<!-- C6 (7) Inno -->
								<Transform translation="37 0 13" rotation="0 1 0 0.78539816339745">
									<Transform translation="0 0 0">
										<LOD center="0 0 0" range="30">
											<Group>
												<Inline onClick="productslist('7', '', '1', 1)" url='scenes/shelf-sci-0.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 1.3">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('7', '', '2', 1)" url='scenes/shelf-sci-1.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 2.6">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('7', '', '3', 1)" url='scenes/shelf-sci-2.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
								</Transform>

								<!-- C7 (8) Com -->
								<Transform translation="41.25 0 13.25" rotation="0 1 0 0.78539816339745">
									<Transform translation="0 0 0">
										<LOD center="0 0 0" range="30">
											<Group>
												<Inline onClick="productslist('8', '', '1', 1)" url='scenes/shelf-com-0.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 1.3">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('8', '', '2', 1)" url='scenes/shelf-com-1.x3d' />
											</Group>
											<WorldInfo info='"null node"'/>
										</LOD>
									</Transform>
									<Transform translation="0 0 2.6">
										<LOD center="0 0 0" range="10">
											<Group>
												<Inline onClick="productslist('8', '', '3', 1)" url='scenes/shelf-com-2.x3d' />
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
				<img src="styles/images/chulabook_logo.png" />
				<h1>การควบคุม</h1>
				<ul>
					<li>
						<img src="styles/images/top.png" />
						<span class="text-info">เดินหน้า</span>
					</li>
					<li>
						<img src="styles/images/left.png" />
						<span class="text-info">หันซ้าย</span>
					</li>
					<li>
						<img src="styles/images/right.png" />
						<span class="text-info">หันขวา</span>
					</li>
					<li>
						<img src="styles/images/down.png" />
						<span class="text-info">ถอยหลัง</span>
					</li>
					<li>
						<img src="styles/images/left_click.png" />
						<span class="text-info">คลิ๊กซ้ายค้างไว้แล้วหมุน</span>
					</li>
				</ul>
				<h1>บริการและติดต่อ</h1>
				<p>ศูนย์หนังสือแห่งจุฬาลงกรณ์มหาวิทยาลัย</p>
				<p>สาขาจัตุรัสจามจุรี<br>อาคารจามจุรีสแควร์ ชั้น 4 ติดสถานีรถไฟฟ้า ใต้ดินสามย่าน ถ.พระราม 4</p>
				<p>โทร.0-2160-5301 แฟ็กซ์ 0-2160-5304</p>
				<p>เวลาเปิดบริการ<br>จันทร์ - ศุกร์ เวลา 11.00 - 20.00 น.<br>เสาร์ - อาทิตย์ เวลา 10.30 - 20.00 น.</p>
			</section>

			<audio controls autoplay loop>
				<source src="assets/firstlove_acoustic.ogv" type="audio/ogg">
				<source src="assets/firstlove_acoustic.mp3" type="audio/mpeg">
				Your browser does not support the audio element.
			</audio>
		</aside>

		<footer class='navbar navbar-fixed-bottom'>
			<div class='navbar-inner'>
				<div class='container'>
					<ul class='nav'>
						<li>
							<a href="https://www.facebook.com/auppapage" title="AUPPA GROUP" target="_blank">&copy; 2013 AUPPA</a>
						</li>
						<li>
							<a href="http://www.chulabook.com/" title="ศูนย์หนังสือแห่งจุฬาลงกรณ์มหาวิทยาลัย" target="_blank">ศูนย์หนังสือแห่งจุฬาลงกรณ์มหาวิทยาลัย</a>
						</li>
					</ul>
				</div>
			</div>
		</footer>

		<?php include './pages/modal.page.php'; ?>
	</body>

	<script type='text/javascript' src='./scripts/x3dom-1.5/x3dom-full.js'></script>
	<script src="./js/jquery-1.8.2.min.js"></script>
	<script type='text/javascript' src='./bootstrap/js/bootstrap.min.js'></script>
	<script type='text/javascript' src='./js/javascript.js'></script>
	<script type="text/javascript" src="./scripts/keyevents.js"></script>
	<script type="text/javascript" src="./js/modernizr.custom.js"></script>
	

	<script type='text/javascript'>
		document.onkeydown = function(e)
        {
			if(window.event) {
				keynum = e.keyCode;
			} else if(e.which) {
				keynum = e.which;
			}

			// left
			if(keynum == 37) { 
				keyPress(37);
			}
			// up
			if(keynum == 38) { 
				keyPress(38);
			}
			// right
			if(keynum == 39) { 
				keyPress(39);
			}
			// down
			if(keynum == 40) {
			    keyPress(40);
			}
		}
	</script>
</html>