<?php
	if (isset($_SESSION['vx_admin'])) {
		$orderid = mysql_real_escape_string($_GET['orderid']);
		$comment = mysql_real_escape_string($_POST['comment']);

		$query = "SELECT COUNT(OrderID) AS cnt FROM vx_order WHERE OrderID = " . $orderid . " AND OrderStatus = 2";
		$row = mysql_fetch_array(mysql_query($query));
		if ($row['cnt'] != 0) {
			$query = "UPDATE vx_order SET OrderStatus = 3, Comment = 'คุณสามารถตรวจสอบสถานะการจัดส่งของ EMS จากหมายเลข ".$comment."' WHERE OrderID = " . $orderid;
			$result = mysql_query($query);
			if ($result) {
				?>
					<div class="alert alert-success">
						<h3>ยืนยันการจัดส่งเรียบร้อย</h3>
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