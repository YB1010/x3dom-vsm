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
		<script src="./js/jquery-1.8.2.min.js"></script>
		<script type='text/javascript' src='bootstrap/js/bootstrap.min.js'></script>
		<script type='text/javascript' src='./js/javascript.js'></script>
		
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
		
				<section class='span10'>

					<X3D id='x3dom-scene' showStat='true'>
						<Scene>

							<Transform translation='21 0.875 2.2' rotation='0 1 0 -1.5707963267949'>
								<Inline onclick="cartlist('')" url="scenes/avatars/seller.x3d" />
							</Transform>

							<Transform translation='23.5 0.875 2.2' rotation='0 1 0 -0.78539816339745'>
								<Inline onclick="cartlist('')" url="scenes/avatars/seller.x3d" />
							</Transform>
							
							<Transform translation="0 0 0">
								<Inline onClick="productslist('1', '')" url='scenes/shelf.x3d' />
							</Transform>

							<Transform translation="2 0 0">
								<Inline onClick="productslist('2', '')" url='scenes/shelf.x3d' />
							</Transform>

							<Transform translation="4 0 0">
								<Inline onClick="productslist('3', '')" url='scenes/shelf.x3d' />
							</Transform>

							<Transform translation="6 0 0">
								<Inline onClick="productslist('4', '')" url='scenes/shelf.x3d' />
							</Transform>

							<Transform translation="8 0 0">
								<Inline onClick="productslist('5', '')" url='scenes/shelf.x3d' />
							</Transform>

							<Transform translation="10 0 0">
								<Inline onClick="productslist('6', '')" url='scenes/shelf.x3d' />
							</Transform>

							<Transform translation="12 0 0">
								<Inline onClick="productslist('7', '')" url='scenes/shelf.x3d' />
							</Transform>

							<Transform translation="14 0 0">
								<Inline onClick="productslist('8', '')" url='scenes/shelf.x3d' />
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
									<a href="http://hassadee.com">&copy; 2013 Chulabook Virtual Store</a>
								</li>
							</ul>
						</div>
					</div>
				</footer>

			</div>
		</div>

		<!-- Modal -->
		<div id="products" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">รายการสินค้า</h3>
				<div class="input-append">
					<input type="text" id="p_search">
					<button type="button" class="btn" onClick="productslist($('#pcid').val(), $('#p_search').val())">Search</button>
				</div>
			</div>
			
			<div class="modal-body">
			</div>

			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">กลับหน้าหลัก</button>
			</div>
		</div>

		<!-- Modal -->
		<div id="cart" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">สินค้าในรถเข็น</h3>
				<div class="input-append">
					<input type="text" id="c_search">
					<button type="button" class="btn" onClick="cartlist($('#c_search').val())">Search</button>
				</div>
			</div>
			
			<div class="modal-body">
			</div>

			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">ปิด</button>
				<a href="home.php?p=checkout" class="btn btn-primary">สั่งซื้อ</a>
			</div>
		</div>

	</body>
</html>