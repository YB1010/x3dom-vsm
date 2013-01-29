<?php
	if (isset($_GET['orderid'])) {
		$orderid = mysql_real_escape_string($_GET['orderid']);
		$query = "SELECT COUNT(OrderID) AS cnt, OrderStatus, Comment FROM vx_order WHERE OrderID = " . $orderid;
		$row = mysql_fetch_array(mysql_query($query));

		if ($row['cnt'] != 0) {
			switch ($row['OrderStatus']) {
				case 0:
					$AlertType = "error";
					$StatusContent = "สินค้ากำลังรอการยืนยันการชำระเงิน";
					break;
				case 1:
					$AlertType = "block";
					$StatusContent = "สินค้าได้รับการยืนยันการชำระเงิน กำลังรอการตรวจสอบ";
					break;
				case 2:
					$AlertType = "block";
					$StatusContent = "สินค้าได้รับการยืนยันการชำระเงินแล้วกำลังรอการจัดส่ง";
					break;
				case 3:
					$AlertType = "success";
					$StatusContent = "สินค้าได้ทำการจัดส่งเรียบร้อยแล้ว";
					break;
			}
			?>
				<div class="alert alert-<?php echo $AlertType; ?>">
					<h3>สถานะใบสั่งซื้อหมายเลข: <?php echo $orderid; ?></h3>
					<p><?php echo $StatusContent; ?></p>
					<?php echo (isset($row['Comment']) && ($row['OrderStatus'] == 0 || $row['OrderStatus'] == 3))? '</p>** หมายเหตุ: '.$row['Comment'].'</p>':'' ?>
				</div>
			<?php
		} else {
			?>
				<div class="alert alert-error">
					<h3>ไม่พบใบสั่งซื้อหมายเลข: <?php echo $orderid; ?></h3>
					<p>กรุณาตรวจสอบหมายเลขใบสั่งซื้อของท่านอีกครั้ง</p>
				</div>
			<?php
		}
	} else {
		?>
			<div class="alert alert-block">
				<h3>แจ้งเตือน</h3>
				<p>กรุณาเรียกสินค้าก่อนที่จะทำรายการ</p>
			</div>
		<?php
	} // End if-else.
?>