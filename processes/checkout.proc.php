<?php
	if (count($_SESSION['vx_cart']) > 0) {
		$orderid = rand(0, 999999).date('dmy');
		$name = mysql_real_escape_string($_POST['Name']);
		$address = mysql_real_escape_string($_POST['Address']);
		$email = mysql_real_escape_string($_POST['Email']);
		$query = "INSERT INTO vx_order (OrderID, CustomerName, CustomerAddress, CustomerEmail, UpdateDate) VALUES ('".$orderid."', '".$name."', '".$address."', '".$email."', '".date('Y-m-d')."')";
		$result = mysql_query($query);		

		$f = 1; $pids = '';
		$query = "INSERT INTO vx_orderproduct (OrderID, ProductID, Quantity, Price) VALUES ";
		foreach ($_SESSION['vx_cart'] as $key => $value) {
			if ($f) $f = 0; else $query .= ", ";
			$query .= "('".$orderid."', '".$value['ID']."', ".$value['qty'].", ".($value['qty']*$value['price']).")";
		} // End foreach.
		$result = mysql_query($query);
		print_r($_POST);

		if ($result) {
			include './processes/clearcart.proc.php';
			?>
				<div class="alert alert-success">
					<h3>บันทึกรายการสั่งซื้อสำเร็จ</h3>
					<p>
						กรุณากด <a href="logdata.php?sw=<?php echo $_POST['screenWidth']; ?>&sh=<?php echo $_POST['screenHeight']; ?>">ที่นี่</a> 
						<!-- &ww={{ echo $_POST['windowWidth']; }}&wh={{ echo $_POST['windowHeight']; }} -->
						เพื่อทำการตอบแบบสอบถาม หรือ กด <a href="home.php">ที่นี่</a> เพื่อไปยังหน้าแรก
					</p>
				</div>
				<div class="alert">
					<h3>หมายเลขใบสั่งซื้อสินค้า: <?php echo $orderid; ?></h3>
					<p>กรุณาบันทึกหมายเลขใบสั่งซื้อสินค้า เพื่อนำมาตรวจสอบสถานะของสินค้า และยืนยันการโอนเงิน</p>
				</div>
			<?php
		} else {
			?>
				<div class="alert alert-error">
					<h3>บันทึกรายการสั่งซื้อสินค้าไม่สำเร็จ</h3>
					<p>กรุณาตรวจสอบการทำรายการของท่าน</p>
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
	}
?>