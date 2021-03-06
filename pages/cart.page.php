<?php if (!isset($_SESSION['vx_cart']) || count($_SESSION['vx_cart']) == 0) { ?>
	<div class="alert alert-error">
		<h4>ไม่มีสินค้าอยู่ในรายการ</h4>
	</div>
<?php } else {
		?>
		<p class="text-info">สวัสดีค่ะ ถ้าสินค้าถูกต้อง กดยืนยันได้เลยค่ะ</p>
		<?php
		$cnt = $sumprice = 0;
		$ckcat = array();
		
		// Check amount products when search product in cart.
		foreach ($_SESSION['vx_cart'] as $key => $value) {
			/* Count category */
			$cat = substr($value['ID'], 0, 1);
			if (!isset($ckcat[$cat])) {
				$ckcat[$cat] = 1;
			} // End if-else.

			/* Check searching's qty */
			if ((isset($_POST['q']) && $_POST['q'] != '') 
				&& (stripos($value['name'], $_POST['q']) !== false || stripos($value['author'], $_POST['q']) !== false))
				$cnt++;
			$sumprice += ($value['qty'] * $value['price']) - ($value['qty'] * $value['discount']);
		} // End foreach.
		
		if (@$_POST['q'] != '') {
			?>
				<div class="alert alert-success">
					<h4>สินค้าที่ค้นหามีจำนวน <?php echo $cnt; ?> รายการ</h4>
				</div>
			<?php
		} // End if.

		if ($cnt != 0 || $sumprice != 0) {
			// Show products in cart.
			foreach ($_SESSION['vx_cart'] as $key => $value) {
				if ((isset($_POST['q']) && $_POST['q'] != '') && (stripos($value['name'], $_POST['q']) === false && stripos($value['author'], $_POST['q']) === false))
					continue;
		?>
			<div class="row-fluid">
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" proc="rmfromcart" data-cindex="<?php echo $value['ID']; ?>">&times;</button>
					<!-- <img style="width: 70px; height: 70px;" src="./images/products/<?php echo $value['ID']; ?>.jpg"> -->
					<span><?php echo $value['name'] ?></span><br><br>
					<div>
						<span class="label label-info" style="width: 100%">
							จำนวน (<?php echo number_format($value['price'], 2, '.', ',') . " x " . $value['qty']; ?>) เล่ม <br>
							<?php echo $value['discount'] != 0? 'มีส่วนลด (' . number_format($value['discount'], 2, '.', ',') . " x " . $value['qty'] . ') บาท <br>': ' '; ?>
							รวมเป็นเงินจำนวน <?php echo number_format(($value['qty'] * $value['price']) - ($value['qty'] * $value['discount']), 2, '.', ','); ?> บาท
						</span>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="alert alert-success" id="sumprice">
			<h4>สินค้าในรถเข็นรวมเป็นเงิน <?php echo number_format($sumprice, 2, '.', ','); ?> บาท</p>
		</div>
	<?php } else { ?>
		<div class="alert alert-error">
			<h4>ไม่มีสินค้าที่ค้นหาอยู่ในรายการสินค้า</h4>
		</div>
	<?php } ?>

	<?php if (count($ckcat) < 5) { ?>
		<div class="alert alert-error" id="ckcat">
			<h4>กรุณาซื้อหนังสือไม่ต่ำกว่า 5 หมวด ก่อนชำระเงินที่แคชเชียร์ค่ะ</h4>
		</div>
	<?php } ?>
<?php } ?>