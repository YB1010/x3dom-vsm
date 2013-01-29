/**
	This function is show products list.
*/
function productslist(v_pcid, v_search)
{
	console.log(v_search);
	$('#products').modal('show');
	$('#p_search').val('');
	$('div#products div.modal-body').html('<h3>Loading....</h3>').fadeIn();
	$.get('./ajax.php?p=products&t=page', {
		pcid: v_pcid,
		q: v_search
	}, function(data) {
		$('#products div.modal-body').hide().html(data).fadeIn();
	});
} // End function.

/**
	This function is shoe product detail.
*/
function productsdetail(v_pid, v_pcid)
{
	$('div#products div.modal-body').html('<h3>Loading....</h3>').fadeIn();
	$.get('./ajax.php?p=products.detail&t=page', {
		pid: v_pid,
		pcid: v_pcid
	}, function(data) {
		$('#products div.modal-body').hide().html(data).fadeIn();
	});
} // End function.

function cartlist(v_search)
{
	$('div#cart').modal('show');
	$('#c_search').val('');
	$('div#cart div.modal-body').html('<h3>Loading....</h3>');
	$.post('./ajax.php?p=cart&t=page', {
		q: v_search
	}, function(data) {
		$('#cart > div.modal-body').html(data);
	});
} // End function.

$(document).ready(function() {
	/**
		This processes is add product to cart.
	*/
	$("[proc=addtocart]").live('click', function() {
		var btn = $(this);
		if (btn.prev().children('input.inputQty').val() == '0' 
			|| btn.prev().children('input.inputQty').val() == '') return;
		btn.button('loading');
		$.post('./ajax.php?p=addtocart&t=proc', {
			pid: btn.attr('data-pid'),
			qty: btn.prev().children('input.inputQty').val()
		}, function(data) {
			btn.html('หยิบใส่เรียบร้อย');
			setTimeout(function() {
				btn.button('reset');
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
			if (arr[0] == 0) $('#sumprice').removeClass().addClass('alert');
			$('#qty').text(arr[0]);
			$('#sumprice > h4').text(arr[1]);
		});
	}); // End processes.

	/**
		This processes is search products.
	*/
	$('#hp-search, #p_search').live('keydown', function(e) {
		if (e.keyCode == 13) {
			productslist(null, $(this).val());
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