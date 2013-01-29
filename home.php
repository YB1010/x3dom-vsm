<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Chulabook Virtual Store</title>
		<!-- Bootstrap -->
		<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

		<?php
			include './connect.php';
		?>
	</head>
	<body>
		<?php include './pages/header.page.php'; ?>

		<article class="container">
			<div class="row-fluid">
				<?php include './pages/sidebar.page.php'; ?>

				<section class="span9">
					<?php if (isset($_GET['p'])) {
						include './pages/'.$_GET['p'].'.page.php';
					} else { ?>
						<div class="hero-unit">
							<h1>ยินดีต้อนรับ</h1><hr>
							<p>เว็บไซต์ที่รวบรวมหนังสือมากมายให้ท่านเลือกชม</p>
						</div>
					<?php } ?>
				</section>

			</div>
		</article>

		
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

		<script src="./js/jquery-1.8.2.min.js"></script>
		<script src="./bootstrap/js/bootstrap.min.js"></script>
		<script src="./js/javascript.js"></script>
	</body>
</html>