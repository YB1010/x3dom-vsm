<?php
	$query = "SELECT p.ProductID, p.ProductName, p.Author, p.Pages, p.Price, p.Discount, p.Description, c.ProductCategoryName FROM vx_product AS p INNER JOIN vx_category AS c ON (p.ProductCategoryID = c.ProductCategoryID) WHERE p.ProductID = '" . $_GET['pid'] . "'";
	$result = mysql_query($query);
	$rows = mysql_fetch_array($result);
?>
<ul class="breadcrumb">
	<li>
		<a href="javascript: productslist('<?php echo $_GET['pcid'] == ''? "":$_GET['pcid']; ?>', '<?php echo $_GET['q'] == ''? "":$_GET['q']; ?>', '<?php echo $_GET['shelf'] == ''? "":$_GET['shelf']; ?>', 1)">
			<?php echo $_GET['pcid'] == ''? "ผลการค้นหา":$rows['ProductCategoryName']; ?>
		</a>
		<span class="divider">/</span>
	</li>
	<li class="active"><?php echo $rows['ProductName']; // echo mb_substr($rows['ProductName'], 0, 50,'UTF-8'); ?></li>
</ul><br>
<div class="row-fluid">
	<div class="span7">

		<ul id="bk-list" class="bk-list clearfix">
			<li>
				<div class="bk-book book-1 bk-bookdefault">
					
					<div class="bk-front">
						<div class="bk-cover" style="background-image: url(images/products/<?php echo $rows['ProductID']; ?>.jpg);"></div>
						<div class="bk-cover-back"></div>
					</div>
					
					<div class="bk-page">
						<div class="bk-content bk-content-current">
							<h3>รายละเอียดทั่วไป</h3>
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
						</div>
						<?php
							$desc = $rows['Description']? $rows['Description'] : 'ไม่มีรายละเอียด';
							$len = mb_strlen($desc, 'UTF-8');
							$maxstr = 300;
							$maxloop = $len / $maxstr;
							$maxloop = (((int)$maxloop)!=($maxloop))? (((int)$maxloop)+1):((int)$maxloop);
							for ($i = 0 ; $i < $maxloop ; $i++) {
						?>
							<div class="bk-content">
								<h3>บทคัดย่อ</h3>
								<p>
									<?php echo mb_substr($desc, ($i * $maxstr), $maxstr,'UTF-8'); ?>
								</p>
							</div>
						<?php } ?>
					</div>

					<div class="bk-back"></div>
					<div class="bk-right"></div>
					<div class="bk-left"></div>
					<div class="bk-top"></div>
					<div class="bk-bottom"></div>
				</div>
				<div class="bk-info">
					<a class="btn btn-block btn-primary bk-bookview">เปิดดูหนังสือ</a>
				</div>
			</li>
		</ul>
	</div>

	<div class="span5">

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
				<input class="span10 inputQty" type="number" value="1" min="1">
				<span class="small add-on">เล่ม</span>
			</div>
			<a href="#" class="btn btn-block btn-primary" data-loading-text="กำลังโหลดขอมูล..." proc="addtocart" data-pid="<?php echo $rows['ProductID']; ?>" data-name="<?php echo $rows['ProductName']; ?>" data-author="<?php echo $rows['Author']; ?>" data-price="<?php echo $rows['Price']; ?>" data-discount="<?php echo $rows['Discountk']; ?>">หยิบลงตะกร้า</a>
		</div>
	</div>
</div>

<script src="./js/books1.js"></script>
<script>
	$(function() {
		Books.init();
	});
</script>