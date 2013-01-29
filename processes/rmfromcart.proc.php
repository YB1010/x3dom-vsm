<?php
	if (isset($_GET['p']) && $_GET['p'] == 'rmfromcart') {
		foreach ($_SESSION['vx_cart'] as $key => $value) {
			if ($value['ID'] == $_POST['cindex']) {
				unset($_SESSION['vx_cart'][$key]);
				break;
			} // End if.
		} // End foreach.
		$cnt = $sumprice = 0;
		foreach ($_SESSION['vx_cart'] as $key => $value) {
			$cnt += $value['qty'];
			$sumprice += ($value['qty'] * $value['price']) - ($value['qty'] * $value['discount']);
		} // End foreach.

		if ($cnt == 0) {
			$alert = "ไม่มีสินค้าที่ค้นหาอยู่ในรายการสินค้า";
		} else {
			$alert = "สินค้าในรถเข็นรวมเป็นเงิน".number_format($sumprice, 2, '.', ',')." บาท";
		} // End if.
		echo $cnt.":-:".$alert;
	} else {
		echo '-1:-:null'; // Remove from cart fail.
	} // End if-else.
?>