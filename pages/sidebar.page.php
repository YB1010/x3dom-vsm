<nav class="well span3">
	<ul class="nav nav-list">
		<li class="nav-header">
			<h4>เมนู</h4>
		</li>
		<li><a href="home.php">หน้าแรก</a></li>
		<li><a href="home.php?p=payment">วิธีการชำระเงิน</a></li>
		<li><a href="home.php?p=checkout">สั่งซื้อสินค้า</a></li>
		<li><a href="home.php?p=confirmpayment">ยืนยันการชำระเงิน</a></li>
		<li><a href="home.php?p=orderstatus">ตรวจสอบสถานะใบสั่งซื้อ</a></li>

		<li class="nav-header">
			<h4>ประเภทหนังสือ</h4>
		</li>
		<?php
			$query = "SELECT ProductCategoryID AS pcid, ProductCategoryName AS pcname FROM vx_category";
			$result = mysql_query($query);
			while ($rows = mysql_fetch_array($result)) {
		?>
			<li>
				<!-- <a href="home.php?p=products&pcid=<?php echo $rows['pcid']; ?>"><?php echo $rows['pcname']; ?></a> -->
				<a onClick="productslist(<?php echo $rows['pcid']; ?>, '')">
					<?php echo $rows['pcname']; ?>
				</a>
			</li>
		<?php } ?>
	</ul>
</nav>