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

		<?php include './pages/modal.page.php'; ?>

		<script src="./js/jquery-1.8.2.min.js"></script>
		<script src="./bootstrap/js/bootstrap.min.js"></script>
		<script src="./js/javascript.js"></script>
	</body>
</html>