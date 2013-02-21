<link rel="stylesheet" type="text/css" href="./styles/component.css">
<?php
	$query = "SELECT p.ProductID, p.ProductName, p.Author, p.Pages, p.Price, p.Discount, p.Description, c.ProductCategoryName FROM vx_product AS p INNER JOIN vx_category AS c ON (p.ProductCategoryID = c.ProductCategoryID) WHERE p.ProductID = '" . $_GET['pid'] . "'";
	$result = mysql_query($query);
	$rows = mysql_fetch_array($result);
?>
	<ul class="breadcrumb" style="padding-left: 10px;">
		<li>
			<a href="javascript: productslist('<?php echo $_GET['pcid'] == ''? "":$_GET['pcid']; ?>', '', 1)">
				<?php echo $_GET['pcid'] == ''? "ผลการค้นหา":$rows['ProductCategoryName']; ?>
			</a>
			<span class="divider">/</span>
		</li>
		<li class="active"><?php echo $rows['ProductName']; ?></li>
	</ul><br>
	<div class="row-fluid">
		<div class="span4">
			<ul id="bk-list" class="bk-list clearfix">
				<li>
					<div class="bk-book book-1 bk-bookdefault">
						
						<div class="bk-front">
							<div class="bk-cover" style="background-image: url(images/products/<?php echo $rows['ProductID']; ?>.jpg);"></div>
							<div class="bk-cover-back"></div>
						</div>
						
						<div class="bk-page">
							<div class="bk-content bk-content-current">
								<p>Red snapper Kafue pike fangtooth humums slipmouth, salmon cutlassfish; swallower European perch mola mola sunfish, threadfin bream. Billfish hog sucker trout-perch lenok orbicular velvetfish. Delta smelt striped bass, medusafish dragon goby starry flounder cuchia round whitefish northern anchovy spadefish merluccid hake cat shark Black pickerel. Pacific cod.</p>
							</div>
							<div class="bk-content">
								<p>Whale catfish leatherjacket deep sea anglerfish grenadier sawfish pompano dolphinfish carp large-eye bream, squeaker amago. Sandroller; rough scad, tiger shovelnose catfish snubnose parasitic eel? Black bass soldierfish duckbill--Rattail Atlantic saury Blind shark California halibut; false trevally warty angler!</p>
							</div>
							<div class="bk-content">
								<p>Trahira giant wels cutlassfish snapper koi blackchin mummichog mustard eel rock bass whiff murray cod. Bigmouth buffalo ling cod giant wels, sauger pink salmon. Clingfish luderick treefish flatfish Cherubfish oldwife Indian mul gizzard shad hagfish zebra danio. Butterfly ray lizardfish ponyfish muskellunge Long-finned sand diver mullet swordfish limia ghost carp filefish.</p>
							</div>
							<div class="bk-content">
								<img src="http://www.sup.org/html/book_pages/0804758611/Introduction_pages/page-1.png">
							</div>
						</div>

						<div class="bk-back"></div>
						<div class="bk-right"></div>
						<div class="bk-left"></div>
						<div class="bk-top"></div>
						<div class="bk-bottom"></div>
					</div>
					<div class="bk-info">
						<a class="btn btn-block btn-primary bk-bookview">View inside</a>
					</div>
				</li>
			</ul>

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
				<a href="#" class="btn btn-block btn-primary" data-loading-text="กำลังโหลดขอมูล..." proc="addtocart" data-pid="<?php echo $rows['ProductID']; ?>" data-name="<?php echo $rows['ProductName']; ?>" data-author="<?php echo $rows['Author']; ?>" data-price="<?php echo $rows['Price']; ?>" data-discount="<?php echo $rows['Discountk']; ?>">หยิบลงตะกร้า</a>
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
<script src="./js/jquery-1.8.2.min.js"></script>
<script src="./js/modernizr.custom.js"></script>
<script src="./js/books1.js"></script>
<script>
	$(function() {

		Books.init();

	});
</script>