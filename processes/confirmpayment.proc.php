<?php
	$orderid = mysql_real_escape_string($_POST['orderid']);
	$comment = mysql_real_escape_string($_POST['comment']);

	$query = "SELECT COUNT(OrderID) AS cnt FROM vx_order WHERE OrderID = " . $orderid . " AND OrderStatus = 0";
	$row = mysql_fetch_array(mysql_query($query));
	if ($row['cnt'] != 0) {
		$query = "UPDATE vx_order SET OrderStatus = 1, Comment = '" . $comment . "' WHERE OrderID = " . $orderid;
		$result = mysql_query($query);
		if ($result) {
			?>
				<div class="alert alert-success">
					<h3>ยืนยันการสั่งซื้อเรียบร้อย</h3>
					<p>รอการตรวจสอบใบสั่งซื้อ</p>
				</div>
			<?php
		} // End if.
	} else {
		?>
			<div class="alert alert-error">
				<h3>ไม่มีหมายเลขใบสั่งซื้อ หรือ มีการยืนยันการชำระเงินแล้ว</h3>
				<p>กรุณาตรวจสอบหมายหมายเลขใบสั่งซื้อของท่านอีกทั้ง</p>
			</div>
		<?php
	} // End if-else.

?>