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
			<?php if ($i%3 == 0) { ?>
			<ul class="thumbnails">
			<?php } ?>
				<li class="span2">
					<div class="thumbnail">
						<a href="javascript: productsdetail('<?php echo $rows['ProductID'] . "', '" . $_GET['pcid']; ?>')">
							<img data-src="holder.js/300x200" alt="300x200" style="width: 150px; height: 170px;" src="./images/products/<?php echo $rows['ProductID']; ?>.jpg">
						</a>
						<div class="caption">
							<div class="input-append">
								<input class="span1 inputQty" type="number" value="1">
								<span class="small add-on">เล่ม</span>
							</div>
							<a href="#" class="btn btn-block btn-primary" data-loading-text="กำลังโหลดขอมูล..." proc="addtocart" data-pid="<?php echo $rows['ProductID']; ?>">หยิบลงตะกร้า</a>
						</div>
					</div>
				</li>
			<?php if ($i%3 == 2) { ?>
			</ul>
		<?php } ?>
	<?php $i++; } ?>
<?php } else { ?>
	<div class="alert alert-error">
		<h4>ไม่มีสินค้าที่ค้นหาอยู่ในรายการสินค้า</h4>
	</div>
<?php } ?>