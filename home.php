<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="chrome=1" />
		<meta http-equiv='Content-Type' content='text/html;charset=utf-8'></meta>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Chulabook Virtual Store</title>
		<link rel="shortcut icon" href="styles/favicon/fav.ico" type="image/x-icon"/>
		<!-- Bootstrap -->
		<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

		<?php include './connect.php'; ?>
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
							<a href="scene.php" class="btn btn-large btn-block btn-primary">เข้าสู่ร้านค้าเสมือน</a>
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