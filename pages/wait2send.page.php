<h3>รายการสินค้ารอการจัดส่ง</h3><hr>
<?php if (isset($_SESSION['vx_admin'])) {
	$query = "SELECT OrderID, CustomerName, Comment FROM vx_order WHERE OrderStatus = 2";
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
					<form action="./proc.php?p=sendorder&orderid=<?php echo $rows['OrderID']; ?>" method="post" class="form-horizontal">
						<div class="control-group">
							<label class="control-label" for="inputEMS">หมายเลข EMS</label>
							<div class="controls">
								<input name="comment" type="text" id="inputEMS" required="required" placeholder="หมายเลข EMS">
							</div>
						</div>

						<div class="control-group">
							<div class="controls">
								<button type="submit" class="btn btn-success">ยืนยันจัดส่ง</button>
							</div>
						</div>
					</form>
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