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
						include './processes/'.$_GET['p'].'.proc.php';
					} else { ?>
						<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<h4>Error 404!</h4>
							<p>ไม่พบหน้าที่คุณต้องการ</p>
						</div>
					<?php } ?>
				</section>

			</div>
		</article>

		<script src="./js/jquery-1.8.2.min.js"></script>
		<script src="./bootstrap/js/bootstrap.min.js"></script>
		<script src="./js/javascript.js"></script>
	</body>
</html>