jQuery.noConflict();
jQuery(document).ready(function() {
	
	show_action = function(str_rand){
		// Plugin Fancybox
		jQuery(".zoom_05").elevateZoom({ tint:true, cursor: 'pointer', tintOpacity:0.5});
		jQuery('.onlydate').datetimepicker({	format: 'YYYY-MM-DD'	});
		jQuery('.datetimepicker').datetimepicker({	format: 'YYYY-MM-DD HH:mm'	});
		jQuery('.date-picker').datepicker({ orientation: "top auto",  autoclose: true, format: 'yyyy-mm-dd' });

		jQuery('.fancyboxs-'+str_rand).click(function(){
			var id = jQuery(this).attr('id');
			jQuery('.fancybox-thumbs-'+id).fancybox({
				nextClick : true,
				openEffect : 'elastic',
				openSpeed  :250,
				closeEffect : 'elastic',
				closeSpeed  :250,
				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					},
					overlay: {
						locked: false
					}
				}
			});
		});
		
		// Plugin icheck
		jQuery('input.icheck-'+str_rand).iCheck({
			checkboxClass: 'icheckbox_square-green',
			radioClass: 'iradio_square-green',
			increaseArea: '20%'
		});

		jQuery('input.CheckboxAll').on('ifChecked', function(event){
			jQuery('input.Checkbox-'+str_rand).iCheck('check');
			jQuery('.row-cz-'+str_rand).addClass('bg-table-row');
		}).on('ifUnchecked', function(event){
			jQuery('input.Checkbox-'+str_rand).iCheck('uncheck');
			jQuery('.row-cz-'+str_rand).removeClass('bg-table-row');
		});

		jQuery('input.Checkbox-'+str_rand).on('ifChecked', function(event){
			jQuery(this).iCheck('check');
			jQuery(this).parent().parent().parent().addClass('bg-table-row');
		}).on('ifUnchecked', function(event){
			jQuery(this).iCheck('uncheck');
			jQuery(this).parent().parent().parent().removeClass('bg-table-row');
		});

		// End Plugin icheck
		
		jQuery('.row-cz-'+str_rand+' td.text-center').click(function(){
			jQuery(this).parent().next().toggleClass('hidden');
		});

		jQuery('.deletePI').click(function(){
			var id = jQuery(this).attr('id');
			jQuery.ajax({
				url: '/products/deleteimage',
				type: 'POST',
				data: {id: id},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
				    jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					console.log(response);
					jQuery('.show-image-'+id).fadeOut();
				}
			});
		});

		jQuery('.deactive-product-'+str_rand).click(function(){
			var id = jQuery(this).attr('id');
			var actived = jQuery(this).attr('actived');
			if (actived == 1) {
				jQuery(this).attr('actived',0).removeClass('btn-info').addClass('btn-primary').empty().append('<i class="fa fa-lock" aria-hidden="true"></i> Dective');
				jQuery('.actived-product-'+id).html('Active');
			} else {
				jQuery(this).attr('actived',1).removeClass('btn-primary').addClass('btn-info').empty().append('<i class="fa fa-unlock" aria-hidden="true"></i> Active');
				jQuery('.actived-product-'+id).html('Deactive');
			}
			jQuery.ajax({
				url: '/products/deactive_product',
				type: 'POST',
				data: {actived: actived, id: id},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					console.log(response);
					var data = jQuery.parseJSON(response);
					if (data.actived == true) {
						toastr.success(data.message);
					} else {
						toastr.error(data.message);
					}
				}
			});
		});
		jQuery('.stocks-detail').click(function() {
			var id  = jQuery(this).attr('id');
			var pid = jQuery(this).attr('pid');
			jQuery.ajax({
				url: '/stocks/stocks_detail',
				type: 'POST',
				data: {id: id, pid: pid},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					jQuery.getScript('/js/assets/plugins/autoNumeric/autoNumeric.js');
					jQuery('.modal-Stocks').html(response);
					jQuery('#modalStocks').modal('show'); 
				}
			});
		});

		jQuery('.products-pagination').click(function(e){
			e.preventDefault();
			var page = jQuery(this).text();
			var limit = jQuery('ul.pagination').attr('limit');
			jQuery('ul.pagination li').removeClass('active');
			jQuery('.pages-'+page).addClass('active');
			var data = {page: page, limit: limit, str_rand: str_rand};
			jQuery.ajax({
				url: '/products/pagination_products',
				type: 'POST',
				data: data,
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					jQuery('tbody#products-details').html(response);
					jQuery.getScript('/js/show_action.js',function(){
						show_action(str_rand);
					});
				}
			});
		});

		jQuery('.pagi-'+str_rand).click(function(e){
			e.preventDefault();
			var page = jQuery(this).text();
			var limit = jQuery('ul.pagination').attr('limit');
			var type = jQuery('ul.pagination').attr('type');
			switch (type) {
			case "sku":
				var sku = jQuery("#search-sku").val();
				var data = {page: page, limit: limit, str_rand: str_rand, type: type, value: sku};
			break;
			case "product_name": 
				var sku = jQuery("#search-product-name").val();
				var data = {page: page, limit: limit, str_rand: str_rand, type: type, value: sku};
			break;
			case "categories":
				var id = null;
				jQuery('input[name="demo-radio"]').each(function(){
				    var $this = jQuery(this);
				    if($this.is(":checked")){
				       	id = jQuery($this).attr('cid');
				    }
				});
				var data = {page: page, limit: limit, str_rand: str_rand, type: type, value:'categories' , id: id};
			break;
			default: 
				var rel = null;
				var price = jQuery('#range_03').val();
				jQuery('input[name="price-radio"]').each(function(){
				    var $this = jQuery(this);
				    if($this.is(":checked")){
				       	rel = jQuery($this).attr('rel');
				    }
				});
				var data = {page: page, limit: limit, str_rand: str_rand, type: rel, value:'price' , price: price};

			}
			jQuery('ul.pagination li').removeClass('active');
			jQuery('.pages-'+page).addClass('active');
			jQuery.ajax({
				url: '/products/pagination_product_search',
				type: 'POST',
				data: data,
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					jQuery('tbody#products-details').html(response);
					jQuery.getScript('/js/show_action.js',function(){
						show_action(str_rand);
					});
				}
			});
		});

		jQuery('.invoices-detail').click(function() {
			var id = jQuery(this).attr('id');
			jQuery.ajax({
				url: '/invoices/invoice_detail',
				type: 'POST',
				data: {id: id},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					jQuery.getScript('/js/assets/plugins/autoNumeric/autoNumeric.js');
					jQuery('.modal-Stocks').html(response);
					jQuery('#modalStocks').modal('show'); 
				}
			});
		});
	} // end function show_action_worker_job

	function price_discount(percent, price) {
		var result = (parseInt(percent) / 100) * parseInt(price);
		return result;
	}

	function stocks_order(id) {
		var price_product 	 = jQuery('.price-product-'+id).val();
		var quantity_product = jQuery('.quantity-product-'+id).val();
		var discount_product = jQuery('.discount-product-'+id).val();
		var total = parseInt( price_product * quantity_product ) - ( price_discount( discount_product, price_product ) * quantity_product );
		jQuery('.total-'+id).html(total);
		final_money();
	}

	function final_money() {
		// Total quantity
		var strquanlity = 0;
		jQuery.each(jQuery('.quantity-product'), function(i, v) {
			strquanlity = parseInt(jQuery(this).val())+parseInt(strquanlity);
			jQuery('#TotalQuantity').html(strquanlity);
		});
		// Total price
		var strprice = 0;
		jQuery.each(jQuery('.total-price'), function(i, v) {
			strprice = parseInt(jQuery(this).html())+parseInt(strprice);
			jQuery('#ViewPrice').html(strprice);
		});
		// Total price after discount
		var final_discount = jQuery('#DiscountOnOrder').val();
		var total_after_discount = jQuery('#ViewPrice').html() - price_discount(final_discount, jQuery('#ViewPrice').html());
		jQuery('#PayRefund').html(total_after_discount);
	}

	stock_products = function(){
		jQuery('#slimtest1').slimScroll({ height: '250px', color: '#00f', alwaysVisible: true });
		jQuery('.add-products').click(function(){
			var id 	= jQuery(this).attr('id');
			var pID = jQuery(this).attr('pid');
			if (jQuery(this).attr('price') != '') var price = jQuery(this).attr('price');
				else var price = 0;
			jQuery('#stocks-details').append('<tr class="cursor-pointer product-stock-order" id="'+id+'" pid="'+pID+'"><td style="width:1px;" class="text-center delete-sp">X</td><td class="text-center"><span class="sku-product-stocks" id="'+pID+'">P.'+jQuery(this).attr('sku')+'</td><td class="text-center">'+jQuery(this).attr('name')+'</td><td class="text-center ISKA1"><input type="number" value="'+price+'" id="'+id+'" class="form-control price-product price-product-'+id+'" name=""></td><td class="text-center ISKA"><input type="number" value="1" id="'+id+'" class="form-control quantity-product-'+id+' quantity-product" name=""></td><td class="text-center ISKA"><input type="number" value="0" id="'+id+'" class="form-control discount-product-'+id+' discount-product" name=""></td><td class="text-center width200px"><span class="total-price total-'+id+'">'+price+'</td></tr>')
			final_money();
			jQuery('.price-product, .quantity-product, .discount-product').change(function(){
				var	id = jQuery(this).attr('id');
				stocks_order(id);
			});
			jQuery('.delete-sp').click(function(){
				jQuery(this).parent().remove();
				final_money();
			});
		});

		jQuery('body').click(function() {
			jQuery('.result-search-stock').hide();
			jQuery('#SPS').val('');
		});
	} // end function stock_products

	add_product_stocks = function(id){
		final_money();
		jQuery('.price-product, .quantity-product, .discount-product').change(function(){
			var	id = jQuery(this).attr('id');
			stocks_order(id);
		});
		
		jQuery('.delete-sp').click(function(){
			jQuery(this).parent().remove();
			final_money();
		});
			
	} // end function stock_products

	jQuery('.auto').autoNumeric('init', { aSep: '.', aDec: ',', mDec: 0, vMax: '100000000' });
});//End jquery