<?php
	if (isset($_SESSION['vx_admin'])) {
		$orderid = mysql_real_escape_string($_GET['orderid']);

		$query = "SELECT COUNT(OrderID) AS cnt FROM vx_order WHERE OrderID = " . $orderid . " AND OrderStatus = 1";
		$row = mysql_fetch_array(mysql_query($query));
		if ($row['cnt'] != 0) {

			$query = "UPDATE vx_order SET OrderStatus = 0, Comment = 'ข้อมุลที่ให้มาไม่สามารถยืนยันได้' WHERE OrderStatus = 1 AND OrderID = " . $orderid;
			$result = mysql_query($query);
			if ($result) {
				?>
					<div class="alert alert-success">
						<h3>ยกเลิกการยืนยันการชำระเงินเรียบร้อย</h3>
					</div>
				<?php
			} // End if-else.
		} else {
			?>
				<div class="alert alert-error">
					<h3>ไม่มีหมายเลขใบสั่งซื้อ หรือ ใบสั่งซื้อไม่สามารถกระทำได้</h3>
					<p>กรุณาตรวจสอบหมายหมายเลขใบสั่งซื้อของท่านอีกทั้ง</p>
				</div>
			<?php
		} // End if-else.
	} else {
		?>
			<div class="alert alert-error">
				<h3>ยังไม่มีการเข้าสู่ระบบ</h3>
			</div>
		<?php
	}
?>