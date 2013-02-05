<!-- Modal -->
<div id="products" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">รายการสินค้า</h3>
		<div class="input-append">
			<input type="text" id="p_search">
			<button type="button" class="btn" onClick="productslist($('#pcid').val(), $('#p_search').val(), 1)">Search</button>
		</div>
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
		<h3 id="myModalLabel">สินค้าในรถเข็น</h3>
		<div class="input-append">
			<input type="text" id="c_search">
			<button type="button" class="btn" onClick="cartlist($('#c_search').val())">Search</button>
		</div>
	</div>
	
	<div class="modal-body">
	</div>

	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">ปิด</button>
		<a href="home.php?p=checkout" class="btn btn-primary" id="orderbtn">สั่งซื้อ</a>
	</div>
</div>


<!-- Modal -->
<div id="lightbox" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>