<div class="span8">
	<h3>สินค้าในรถเข็น</h3><hr>
	<?php include './pages/cart.page.php'; ?>
</div>
<div class="span4">
	<h3>รายละเอียดผู้สั่งซื้อ</h3><hr style="width: 320px">
	<form action="./proc.php?p=checkout" method="post" class="form-horizontal">
		<input type="hidden" name="screenWidth" value="<?php echo $_POST['screenWidth']; ?>">
		<input type="hidden" name="screenHeight" value="<?php echo $_POST['screenHeight']; ?>">
		<input type="hidden" id="fps" name="fps" value="<?php echo $_POST['fps']; ?>">
		<!--
		<input type="hidden" name="windowWidth" value="<?php echo $_POST['windowWidth']; ?>">
		<input type="hidden" name="windowHeight" value="<?php echo $_POST['windowHeight']; ?>">
		-->
		<div class="control-group">
			<label class="control-label" for="inputName" style="width: 80px">ชื่อ - นามสกุล</label>
			<div class="controls" style="margin-left: 90px">
				<input type="text" id="inputName" name="Name" required="required" placeholder="ชื่อ - นามสกุล">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputAddress" style="width: 80px">ที่อยู่</label>
			<div class="controls" style="margin-left: 90px">
				<textarea id="inputAddress" name="Address" required="required" placeholder="ที่อยู่"></textarea>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputEmail" style="width: 80px">อีเมล</label>
			<div class="controls" style="margin-left: 90px">
				<input type="email" id="inputEmail" name="Email" required="required" placeholder="อีเมล">
			</div>
		</div>

		<div class="control-group">
			<div class="controls" style="margin-left: 90px">
				<button type="submit" class="btn btn-large btn-block btn-success">ยืนยันการสั่งซื้อ</button>
			</div>
		</div>
	</form>
	<div class="alert" style="width: 300px;">
		<h4>*หมายเหตุ</h4>
		<p>ใส่ข้อมูลใด ๆ เพื่อทดลองไม่ใช่การสั่งซื้อจริง และเพื่อแสดงลิงค์ไปยังแบบทดสอบ</p>
	</div>
</div>
