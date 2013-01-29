<div class="span5">
	<h3>สินค้าในรถเข็น</h3><hr>
	<?php include './pages/cart.page.php'; ?>
</div>
<div class="span7">
	<h3>รายละเอียดผู้สั่งซื้อ</h3><hr>
	<form action="./proc.php?p=checkout" method="post" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="inputName">ชื่อ - นามสกุล</label>
			<div class="controls">
				<input type="text" id="inputName" name="Name" required="required" placeholder="ชื่อ - นามสกุล">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputAddress">ที่อยู่</label>
			<div class="controls">
				<textarea id="inputAddress" name="Address" required="required" placeholder="ที่อยู่"></textarea>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputEmail">อีเมล</label>
			<div class="controls">
				<input type="email" id="inputEmail" name="Email" required="required" placeholder="อีเมล">
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-large btn-block btn-success">ยืนยันการสั่งซื้อ</button>
			</div>
		</div>
	</form>
</div>
