<header class="navbar navbar-inverse navbar-static-top">
	<nav class="navbar-inner">
		<div class="container ">
			<a class="brand" href="home.php">Chulabook Virtual Store</a>
			<ul class="nav">
				<li class="active">
					<a href="home.php">หน้าแรก</a>
				</li>
				<li class="dropdown">
					<a href="javascript: cartlist('')" class="dropdown-toggle" role="button" data-toggle="modal">
					<!-- <a class="dropdown-toggle" data-toggle="dropdown"> -->
						<span>
							สินค้าในรถเข็น ( <span id="qty"><?php echo isset($_SESSION['vx_cart'])? count($_SESSION['vx_cart']): "0"; ?></span> )
						</span>
						<span class="caret"></span>
					</a>
				</li>

				<?php if (isset($_SESSION['vx_admin'])) { ?>
					<li class="dropdown">
						<a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">เมนูผู้ดูแล <b class="caret"></b></a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
							<li><a href="./home.php?p=notify">รายการยืนยันชำระเงิน</a></li>
							<li><a href="./home.php?p=wait2send">รายการรอจัดส่ง</a></li>
							<li class="divider"></li>
							<li><a href="./proc.php?p=signout">ออกจากระบบ</a></li>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div>
	</nav>
</header><br>