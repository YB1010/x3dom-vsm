<?php
	if (isset($_GET['p']) && $_GET['p'] == 'addtocart') {
		$key = $found = 0;
		if (isset($_SESSION['vx_cart'])) {
			foreach ($_SESSION['vx_cart'] as $key => $value) {
				if ($value['ID'] == $_POST['pid']) {
					$found = 1;
					break;
				}
			} // End foreach.
		} // End if.

		if (!$found) { // not found product.
			/*
			$query = "SELECT ProductName, Author, Price, Discount FROM vx_product WHERE ProductID = '" . $_POST['pid'] . "'";
			$row = mysql_fetch_array(mysql_query($query));
			*/
			$i = isset($key)? $key+1 : 0;

			$_SESSION['vx_cart'][$i]['ID'] = $_POST['pid'];
			$_SESSION['vx_cart'][$i]['name'] = $_POST['pname'];
			$_SESSION['vx_cart'][$i]['author'] = $_POST['pauthor'];
			$_SESSION['vx_cart'][$i]['qty'] = $_POST['qty'];
			$_SESSION['vx_cart'][$i]['price'] = $_POST['pprice'];
			$_SESSION['vx_cart'][$i]['discount'] = $_POST['pdiscount'];
		} else {
			$_SESSION['vx_cart'][$key]['qty'] += $_POST['qty'];
		} // End if-else.
		
		$qty = 0;
		foreach ($_SESSION['vx_cart'] as $key => $value) { $qty += $value['qty']; }
		echo $qty; // Add to cart success.
	} else {
		echo -1; // Add to cart fail.
	} // End if-else.
?>