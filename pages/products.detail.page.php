<?php
	$query = "SELECT p.ProductID, p.ProductName, p.Author, p.Pages, p.Price, p.Discount, p.Description, c.ProductCategoryName FROM vx_product AS p INNER JOIN vx_category AS c ON (p.ProductCategoryID = c.ProductCategoryID) WHERE p.ProductID = '" . $_GET['pid'] . "'";
	$result = mysql_query($query);
	while ($rows = mysql_fetch_array($result)) {
?>
	<ul class="breadcrumb" style="padding-left: 10px;">
		<li>
			<a href="javascript: productslist('<?php echo $_GET['pcid'] == ''? "":$_GET['pcid']; ?>', <?php echo $_GET['pcid'] == ''? "$('#hp-search').val()":"''"; ?>)">
				<?php echo $_GET['pcid'] == ''? "ผลการค้นหา":$rows['ProductCategoryName']; ?>
			</a>
			<span class="divider">/</span>
		</li>
		<li class="active"><?php echo $rows['ProductName']; ?></li>
	</ul><br>
	<div class="row-fluid">
		<div class="span4">
			<img src="./images/products/<?php echo $rows['ProductID']; ?>.jpg" style="width: 130px; height: 200px;">

			<div class="row-fluid">
				<small class="span4">ราคา</small>
				<small class="span7"><?php echo $rows['Price'] . ' บาท '; ?></small>
			</div>
			<?php if ($rows['Discount'] != '0') { ?>
				<div class="row-fluid">
					<small class="span4">มีส่วนลด</small>
					<small class="span7"><?php echo $rows['Discount'] . ' บาท '; ?></small>
				</div>
			<?php } ?>

			<div class="caption">
				<div class="input-append">
					<input class="span10 inputQty" type="number" value="1">
					<span class="small add-on">เล่ม</span>
				</div>
				<a href="#" class="btn btn-block btn-primary" data-loading-text="กำลังโหลดขอมูล..." proc="addtocart" data-pid="<?php echo $rows['ProductID']; ?>">หยิบลงตะกร้า</a>
			</div>
		</div>
		<div class="span8">
			<div class="row-fluid">
				<small class="span4">ชื่อ</small>
				<small class="span7"><?php echo $rows['ProductName']; ?></small>
			</div>

			<div class="row-fluid">
				<small class="span4">ผู้แต่ง</small>
				<small class="span7"><?php echo $rows['Author']; ?></small>
			</div>

			<div class="row-fluid">
				<small class="span4">จำนวนหน้า</small>
				<small class="span7"><?php echo $rows['Pages']; ?> หน้า</small>
			</div>

			<div class="row-fluid">
				<small class="span4">รายละเอียด</small>
				<small class="span7"><?php echo $rows['Description']? $rows['Description'] : 'ไม่มีรายละเอียด'; ?></small>
			</div>
		</div>
	</div>
<?php
	}
?>