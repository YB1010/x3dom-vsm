<h3>รายการการแจ้งเตือน</h3><hr>
<?php if (isset($_SESSION['vx_admin'])) {
	$query = "SELECT OrderID, CustomerName, Comment FROM vx_order WHERE OrderStatus = 1";
	$result = mysql_query($query);
	if (mysql_num_rows($result) != 0) {
		while ($rows = mysql_fetch_array($result)) {
		?>
			<div class="row-fluid">
				<div class="alert alert-info">
					<span><?php echo 'ใบสั่งซื้อหมายเลข ' . $rows['OrderID'] . ' สั่งซื้อโดย ' . $rows['CustomerName'] ?></span><br>
					<dl class="span11 label label-info dl-horizontal">
						<dt>ข้อมูลการยืนยัน</dt>
						<dd><?php echo $rows['Comment'];?></dd>
					</dl><br>
					<div class="btn-group">
						<a href="./proc.php?p=confirmorderaddress&orderid=<?php echo $rows['OrderID']; ?>" class="btn btn-success">ยืนยัน</a>
						<a href="./proc.php?p=reconfpayment&orderid=<?php echo $rows['OrderID']; ?>" class="btn btn-danger">ยกเลิก</a>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php } else { ?>
			<div class="alert alert-block">
				<h3>ไม่มีใบสั่งซื้อที่รอการยืนยัน</h3>
			</div>
	<?php } ?>
<?php } else { ?>
	<div class="alert alert-error">
		<h3>ยังไม่มีการเข้าสู่ระบบ</h3>
	</div>
<?php } ?>