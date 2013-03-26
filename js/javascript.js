/**
	This function is show products list.
*/
function productslist(v_pcid, v_search, v_shelf, v_page)
{
	$('#products').modal('show');
	$('#products').animate({'top':'320px'}, 500);
	$('#p_search').val('');
	$('div#products div.modal-body').html('<h3>Loading....</h3>').fadeIn();
	$.get('./ajax.php?p=products&t=page', {
		pcid: v_pcid,
		q: v_search,
		shelf: v_shelf,
		page: v_page
	}, function(data) {
		$('#products div.modal-body').hide().html(data).fadeIn();
	});
} // End function.

/**
	This function is show product detail.
*/
function productsdetail(v_pid, v_pcid, v_shelf, v_search)
{
	$('#products').animate({'top':'280px'}, 500);
	$('div#products div.modal-body').html('<h3>Loading....</h3>').fadeIn();
	$.get('./ajax.php?p=products.detail&t=page', {
		pid: v_pid,
		pcid: v_pcid,
		shelf: v_shelf,
		q: v_search
	}, function(data) {
		$('#products div.modal-body').hide().html(data).fadeIn();
	});
} // End function.
/**
	This function is show cart list.
*/
function cartlist(v_search)
{
	$('div#cart').modal('show');
	$('#c_search').val('');
	$('div#cart div.modal-body').html('<h3>Loading....</h3>');
	$.post('./ajax.php?p=cart&t=page', {
		q: v_search
	}, function(data) {
		$('#cart > div.modal-body').html(data);

		if (data.search("alert-error") >= 0) {
			$('#orderbtn').hide();
		}else {
			$('#orderbtn').show();
		} // End if.
	});
} // End function.

/**
	This function is processes to get Screen resolution into input tags.
*/
function checkout()
{
	$('#screenWidth').val($('#x3dom-scene').width());
	$('#screenHeight').val($('#x3dom-scene').height());
	// $('#windowWidth').val($(document).width());
	// $('#windowHeight').val($(document).height());
	document.getElementById('hidedata').submit();
} // End function.

/**
	This function is alert date in modal ID lightbox (It's about alert msg or someting like that.).
*/
function alertLightbox(filepath)
{
	$('div#lightbox').modal('show');
	$('#lightbox').html('Loading.....');
	$.post('./pages/' + filepath + '.page.php', function(data) {
		$('#lightbox').html(data);
	});
}

$(document).ready(function() {

	/**
		This processes is add product to cart.
	*/
	var checkAdd = 0;
	$("[proc=addtocart]").live('click', function() {
		var btn = $(this);
		if (checkAdd == 1) return;
		if (parseInt(btn.prev().children('input.inputQty').val()) <= 0
			|| btn.prev().children('input.inputQty').val() == '') {

			btn.html('ตรวจสอบจำนวนที่ใส่');
			setTimeout(function() {
				btn.html('หยิบใส่ตะกร้า');
				checkAdd = 0;
			}, 1000);

			return;
		}
		
		checkAdd = 1;
		btn.button('loading');
		$.post('./ajax.php?p=addtocart&t=proc', {
			pid: btn.attr('data-pid'),
			pname: btn.attr('data-name'),
			pauthor: btn.attr('data-author'),
			pprice: btn.attr('data-price'),
			pdiscount: btn.attr('data-discount'),
			qty: btn.prev().children('input.inputQty').val()
		}, function(data) {
			btn.html('หยิบใส่เรียบร้อย');
			setTimeout(function() {
				btn.button('reset');
				checkAdd = 0;
			}, 1000);
			$('#qty').text(data);
		});
	}); // End processes.

	/**
		This processes is remove product from cart.
	*/
	$("[proc=rmfromcart]").live('click', function() {
		var btn = $(this);
		$.post('./ajax.php?p=rmfromcart&t=proc', {
			cindex: btn.attr('data-cindex'),
		}, function(data) {
			var arr = data.split(':-:');
			if (arr[0] == 0) {
				$('#sumprice').removeClass().addClass('alert');
				$('#orderbtn').hide();
			} // End if.
			if (arr[2] < 5) {
				if ($('#ckcat').size() == 0) {
					$('<div class="alert alert-error" id="ckcat"><h4>กรุณาซื้อหนังสือไม่ต่ำกว่า 5 หมวด ก่อนชำระเงินที่แคชเชียร์ค่ะ</h4></div>').insertAfter('#sumprice');
				} // End if.
				$('#ckcat').show();
			} else {
				$('#ckcat').hide();
				$('#orderbtn').hide();
			}
			$('#qty').text(arr[0]);
			$('#sumprice > h4').text(arr[1]);
		});
	}); // End processes.

	/**
		This processes is search products.
	*/
	$('#hp-search, #p_search').live('keydown', function(e) {
		if (e.keyCode == 13) {
			productslist(null, $(this).val(), '', 1);
		} // End if.
	}); // End processes.


	/**
		This processes is search products in cart.
	*/
	$('#c_search').live('keydown', function(e) {
		if (e.keyCode == 13) {
			cartlist($(this).val());
		} // End if.
	}); // End processes.
});