<input type="hidden" id="pcid" value="<?php echo $_GET['pcid']; ?>">
<?php
	$query = "SELECT ProductID FROM vx_product";
	$query .= ($_GET['q'] != '' || $_GET['pcid'] != '')?" WHERE ":"";
	$query .= ($_GET['pcid'] != '')? "ProductCategoryID = " . $_GET['pcid'] . (($_GET['q'] != '')? " AND ":"") :"";
	$query .= ($_GET['q'] != '')? "(ProductName LIKE '%" . $_GET['q'] . "%' OR Author Like '%" . $_GET['q'] . "%')" : "";

	$result = mysql_query($query);
	$i = 0; $cnt = mysql_num_rows($result);
	if ($cnt != 0) {
		if ($_GET['q'] != '') {
			?>
				<div class="alert alert-success">
					<h4>สินค้าที่ค้นหามีจำนวน <?php echo $cnt; ?> รายการ</h4>
				</div>
			<?php
		}
		while ($rows = mysql_fetch_array($result)) { ?>
			<?php if ($i%5 == 0) { ?>
			<ul class="thumbnails" id="shelf">
			<?php } ?>
				<li>
					<div class="thumbnail">
						<a href="javascript: productsdetail('<?php echo $rows['ProductID'] . "', '" . $_GET['pcid']; ?>')">
							<img src="./images/products/<?php echo $rows['ProductID']; ?>.jpg">
						</a>
					</div>
				</li>
			<?php if ($i%5 == 4) { ?>
			</ul>
		<?php } ?>
	<?php $i++; } ?>
<?php } else { ?>
	<div class="alert alert-error">
		<h4>ไม่มีสินค้าที่ค้นหาอยู่ในรายการสินค้า</h4>
	</div>
<?php } ?>