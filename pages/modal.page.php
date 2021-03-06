<!-- Modal -->
<div id="products" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">
			รายการสินค้า
		</h3>
	</div>
	
	<div class="modal-body">
	</div>

	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">กลับหน้าหลัก</button>
	</div>
</div>

<!-- Modal -->
<div id="cart" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">
			สินค้าในรถเข็น

			<div class="input-append pull-right">
				<input type="text" id="c_search" class="span2">
				<button type="button" class="btn" onClick="cartlist($('#c_search').val())">ค้นหาในรถเข็น</button>
			</div>
		</h3>
	</div>
	
	<div class="modal-body">
	</div>

	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">ปิด</button>
		<a href="javascript:;" onclick="checkout()" class="btn btn-primary" id="orderbtn">สั่งซื้อ</a>
		<form id="hidedata" action="home.php?p=checkout" method="post">
			<input type="hidden" id="screenWidth" name="screenWidth">
			<input type="hidden" id="screenHeight" name="screenHeight">
			<input type="hidden" id="fps" name="fps">
			<!-- <input type="hidden" id="windowWidth" name="windowWidth">
			<input type="hidden" id="windowHeight" name="windowHeight"> -->
		</form>
	</div>
</div>


<!-- Modal -->
<div id="lightbox" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>