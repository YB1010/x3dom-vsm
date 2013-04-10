<h3>ยืนยันการชำระเงิน</h3><hr>
<form class="form-horizontal" action="./proc.php?p=confirmpayment" method="post">
	<div class="control-group">
		<label class="control-label" for="inputOrderID">หมายเลขใบสั่งซื้อ</label>
		<div class="controls">
			<input class="span10" type="text" id="inputOrderID" name="orderid" required="required" placeholder="หมายเลขใบสั่งซื้อ">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="inputComment">รายละเอียดการสั่งซื้อ</label>
		<div class="controls">
			<textarea class="span10" id="inputComment" name="comment" style="height: 200px" required="required" placeholder="ตัวอย่างเช่น ผู้ซื้อ นายสมชาย ใจหญิง จำนวนเงินที่โอน 300.01 บาท, วนที่โอน 21/1/51, เวลา 10.15 ที่ ATM กสิกร หรือ จิรายุส 550.12, 15/12/51 16.15น. ธ.กรุงเทพสาขาซีคอน"></textarea>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-large btn-success">ยืนยันการชำระเงิน</button>
		</div>
	</div>
</form>