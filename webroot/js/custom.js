jQuery( document ).ready(function() {
	jQuery('.summernote').summernote({
		height: 100,
		minHeight: null,
		maxHeight: null, 
		focus: true
	});
	if (jQuery("#editor1").length){
		CKEDITOR.replace( 'editor1' );
	}
	jQuery('.auto').autoNumeric('init', { aSep: ',', aDec: '.', mDec: 0, vMax: '100000000' });
	var str_rand = Math.random().toString(36).substring(7);
	jQuery(".zoom_05").elevateZoom({ tint:true, cursor: 'pointer', tintOpacity:0.5});

	//** Plugin Datepicker **//
	jQuery('.onlydate').datetimepicker({ format: 'YYYY-MM-DD' });
	jQuery('.datetimepicker').datetimepicker({ format: 'YYYY-MM-DD HH:mm' });
	jQuery('.date-picker').datepicker({ orientation: "top auto",  autoclose: true, format: 'yyyy-mm-dd', });
	jQuery(function() {
		var start = moment().subtract(29, 'days');
		var end = moment();
		jQuery('input[name="daterange"]').daterangepicker({
			locale: { format: 'YYYY/MM/DD' },
			startDate: start,
			endDate: end,
			ranges: {
			   'Today': [moment(), moment()], 
			   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			   'This Month': [moment().startOf('month'), moment().endOf('month')],
			   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			},
				"alwaysShowCalendars": true,
				"drops": "up"
		}, function(start, end, label) {
			console.log("New date range selected: " + start.format('YYYY-MM-DD') + " to " + end.format('YYYY-MM-DD') + " (predefined range: " + label + ")");
			delay(function(){
				var keyword = jQuery('input[name="daterange"]').val();
				var tbl = jQuery('input[name="daterange"]').attr('tbl');
				var data = {type: 'created', keyword: keyword, str_rand: str_rand};
				
				if (tbl == 'invoices') {
					search_invoices(data, str_rand);
				} else {
					search_stocks(data, str_rand);
				}
			}, 100 );
		}
	);
	
	jQuery(function(){
		jQuery('#inner-content-div').slimScroll({
			color: '#00f',
			size: '5px',
			height: '350px',
			railVisible: true,
			alwaysVisible: true
	 	});
	});

	// Plugin Fancybox
	jQuery('.fancyboxs').click(function(){
		var id = jQuery(this).attr('id');
		jQuery('.fancybox-thumbs-'+id).fancybox({
			nextClick 	: true,
			openEffect 	: 'elastic',
			openSpeed  	: 250,
			closeEffect : 'elastic',
			closeSpeed  : 250,
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
	// Plugin Chosen
	// var config = {'.chosen-select': {}}
	// for (var selector in config) {
	// 	jQuery(selector).chosen(config[selector]);
	// }
	///

	});
	// Plugin icheck
	jQuery('input.icheck').iCheck({
		checkboxClass: 'icheckbox_square-green',
		radioClass: 'iradio_square-green',
		increaseArea: '20%'
	});

	jQuery('input.CheckboxAll').on('ifChecked', function(event){
		jQuery('input.Checkbox').iCheck('check');
		jQuery('table tbody').find("tr.row-cz").addClass('bg-table-row');
	}).on('ifUnchecked', function(event){
		jQuery('input.Checkbox').iCheck('uncheck');
		jQuery('table tbody').find("tr.row-cz").removeClass('bg-table-row');
	});

	jQuery('input.Checkbox').on('ifChecked', function(event){
		jQuery(this).iCheck('check');
		jQuery(this).parent().parent().parent().parent().parent().addClass('bg-table-row');
	}).on('ifUnchecked', function(event){
		jQuery(this).iCheck('uncheck');
		jQuery(this).parent().parent().parent().parent().parent().removeClass('bg-table-row');
	});

	// End Plugin icheck
	
	if (jQuery('.success, .error').length > 0) {
		setTimeout(function() {
			jQuery('.success, .error').fadeOut();
		}, 7000);
	}

	jQuery(".btn-trash-image").click(function(){
		jQuery('#ProductFile-input').val('');
		jQuery('#list').empty();
	});

	function ShowMyPictures(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			console.log(input);
			for (var i = 0, f; f = input.files[i]; i++) {
				// Only process image files.
				if (!f.type.match('image.*')) {	continue; }
				var reader = new FileReader();
				// Closure to capture the file information.
				reader.onload = (function(theFile) {
					return function(e) {
						// Render thumbnail.
						var span = document.createElement('span');
						span.innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
						jQuery('#list'+input.id).append(span);
						// document.getElementById(id1).insertBefore(span, null);
					};
				})(f);
				// Read in the image file as a data URL.
				reader.readAsDataURL(f);
			}
		}
	}

	jQuery("#imgInp, #ProductFile").change(function(){
		jQuery("#listProductFile").empty();
		ShowMyPictures(this);
	});

	jQuery('.row-cz td.text-center').click(function(){
		jQuery(this).parent().next().toggleClass('hidden');
	});

	//stop jumping to top of page in jQuery
	jQuery('ul.pagination a').click(function(e){
		e.preventDefault();
	});
	
	// ######   default_cz  ###### //

	jQuery('.chbox-actived-controller').click(function(){
		var id = jQuery(this).attr('aco_id');
		var checked = (jQuery(this).is(':checked') == true)? "1": "0";
		jQuery.ajax({
			url: "/Users/ActiveControler",
			type: "POST",
			data: {id: id, checked: checked},
			dataType: "html",
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				alert(response);
			},
			error:function() {
				alert('The will never work');
			}
		}); // end ajax
	});
	
	jQuery('.ChboxPA').click(function(){
		var aco_id  = jQuery(this).attr('aco_id');
		var aro_id  = jQuery(this).attr('aro_id');
		var checked = (jQuery(this).is(':checked') == true)? "1": "-1";
		jQuery.ajax({
			url: "/Users/permission",
			type: "POST",
			data: {aco_id: aco_id, aro_id: aro_id, checked: checked},
			dataType: "html",
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				alert(response);
			},
			error:function() {
				alert('The will never work');
			}
		}); // end ajax
	});

	jQuery('button.btn-add-group').click(function(){
		var name = jQuery('#AddGroupName').val();
		if (name != '') {
			jQuery.ajax({
				url: "/groups/add",
				type: "POST",
				data: {name: name},
				dataType: "html",
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					console.log(response);
					var data = jQuery.parseJSON(response);
					if (data.status == true) {
						jQuery('select#UserGroupId').append("<option value='"+data.id+"'>"+name+"</option>"); 
						toastr.success(data.message);
						jQuery('#myModal2').modal('toggle');
					} else {
						toastr.error(data.message);
					}
				},
				error:function(res) {
					alert('Error!');
				}
			}); // end ajax
		} else {
			toastr.error('Please fill to fields!');
		}
	});

	jQuery('#btn-add-categories').click(function(){
		var name 	  = jQuery('#category-name').val();
		var parent_id = jQuery('#category-parent').val();
		jQuery.ajax({
			url: '/categories/add',
			type: 'POST',
			data: {name: name, parent_id: parent_id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
			success: function(response){
				jQuery("#loader").fadeOut();
				console.log(response);
				var data = jQuery.parseJSON(response);
				if(data.status == true){
					jQuery( '#PCategorie_Id' ).append(new Option(name, data.id));
					jQuery( '#PCategorie_Id' ).val(data.id);
					jQuery('#myModal2').modal('toggle');
					toastr.success(data.message);
				}else {
					toastr.error(data.message);
				}
			}
		});
	});

	jQuery('#btn-add-outlet').click(function(){
		// Add Outlet or Supplier in Product/index 
		var name = jQuery('#outlet-name').val();
		var tel = jQuery('#outlet-tel').val();
		var address = jQuery('#outlet-address').val();
		jQuery.ajax({
			url: '/products/addsomething',
			type: 'POST',
			data: {key: 'outlet', name: name,tel: tel,address: address},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
			success: function(response){
				jQuery("#loader").fadeOut();
				console.log(response);
				var data = jQuery.parseJSON(response);
				if(data.status == true){
					jQuery( '#POutlet_Id' ).append(new Option(name, data.id));
					jQuery( '#POutlet_Id' ).val(data.id);
					jQuery( '#myModalOutlet' ).modal('toggle');
					toastr.success(data.message);
				}else {
					toastr.error(data.message);
				}
			}
		});
	});

	jQuery('#btn-add-supplier').click(function(){
		var name = jQuery('#supplier-name').val();
		var code = jQuery('#supplier-code').val();
		if (code != '') {
			jQuery.ajax({
				url: '/products/addsomething',
				type: 'POST',
				data: {key: 'supplier', code: code, name: name},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					var data = jQuery.parseJSON(response);
					if(data.status == true){
						jQuery( '#PSupplier_Id' ).append(new Option(name, data.id));
						jQuery( '#PSupplier_Id' ).val(data.id);
						jQuery('#myModalSupplier').modal('toggle');
						toastr.success(data.message);
					}else {
						toastr.error(data.message);
					}
				}
			});
		} else {
			alert('code empty');
		}
	});
	
	jQuery("#search-sku").bind('blur keyup',function(e) {  
		if (e.type == 'blur' || e.keyCode == '13')  {
			var sku = jQuery("#search-sku").val();
			var page = 1;
			var data = {type: 'sku', value: sku, str_rand: str_rand, page: page};
			search_product(data, str_rand, page);
		}
	});

	jQuery("#search-product-name").bind('blur keyup',function(e) {  
		if (e.type == 'blur' || e.keyCode == '13')  {
			var sku = jQuery("#search-product-name").val();
			var page = 1;
			var data = {type: 'product_name', value: sku, str_rand: str_rand, page: page};
			search_product(data, str_rand, page);
		}
	});  

	jQuery('input[name="demo-radio"]').on('ifClicked', function (event) {
		var id = jQuery(this).attr('cid');
		var page = 1;
		var data = {type: 'categories', value:'categories' , id: id, str_rand: str_rand, page: page};
		search_product(data, str_rand, page);
	});

	jQuery('input[name="price-radio"]').on('ifClicked', function (event) {
		var price = jQuery('#range_03').val();
		var type = jQuery(this).attr('rel');
		var page = 1;
		var data = {type: type, value:'radio', price: price, str_rand: str_rand, page: page};
		search_product(data, str_rand, page);
	});
	jQuery('#range_03').change(function(){
		//retail_price
		delay(function(){
			var price = jQuery('#range_03').val();
			// var type = 'retail_price';
			var page = 1;
			var data = {type: 'retail_price', value:'radio', price: price, str_rand: str_rand, page: page};
			console.log(data);
			search_product(data, str_rand, page);
		}, 100 );
	});

	jQuery("#search-users").change(function(){
		var user_id = jQuery(this).val();
		var page = 1;
		var data = {type: 'user_id', value:'radio', user_id: user_id, str_rand: str_rand, page: page};
		search_product(data, str_rand, page);
	});

	jQuery("#search-suppliers").change(function(){
		var supplier_id = jQuery(this).val();
		var page = 1;
		var data = {type: 'supplier_id', value:'radio', supplier_id: supplier_id, str_rand: str_rand, page: page};
		search_product(data, str_rand, page);
	});

	jQuery("#search-active").change(function(){

		var actived = jQuery(this).val();
		var page = 1;
		var data = {type: 'actived', value:'actived', actived: actived, str_rand: str_rand, page: page};
		search_product(data, str_rand, page);
	});

	function search_product(data, str_rand) {
		jQuery.ajax({
			url: '/products/search_product',
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
	}

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
				// console.log('response');
				jQuery("#loader").fadeOut();
				jQuery('tbody#products-details').html(response);
				jQuery.getScript('/js/show_action.js',function(){
					show_action(str_rand);
				});
			}
		});
	});

	jQuery('.deletePI').click(function(){
		var id = jQuery(this).attr('id');
		jQuery.ajax({
			url: '/products/delete_image',
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

	jQuery('.deactive-product').click(function(){
		var id = jQuery(this).attr('id');
		var actived = jQuery(this).attr('actived');
		if (actived == 1) {
			jQuery(this).attr('actived',0).removeClass('btn-info').addClass('btn-primary').empty().append('<i class="fa fa-lock" aria-hidden="true"></i> Dective');
			jQuery('.actived-product-'+id).html('<span class="label label-primary">Active</span>');
		} else {
			jQuery(this).attr('actived',1).removeClass('btn-primary').addClass('btn-info').empty().append('<i class="fa fa-unlock" aria-hidden="true"></i> Active');
			jQuery('.actived-product-'+id).html('<span class="label label-danger">Deactive</span>');
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

	

	jQuery(".customer-search").bind('blur keyup',function(e) {  
		if (e.type == 'blur' || e.keyCode == '13')  {
			var tbl = jQuery(this).attr('tbl');
			var key = jQuery(this).val();
			jQuery.ajax({
				url: '/customers/search',
				type: 'POST',
				data: {key: key, tbl: tbl, str_rand: str_rand},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					console.log(response);
					jQuery('tbody#customers-details').html(response);
					jQuery.getScript('/js/show_action.js',function(){
						show_action(str_rand);
					});
				}
			});
		}
	});

	jQuery(".suppliers-search").bind('blur keyup',function(e) {  
		if (e.type == 'blur' || e.keyCode == '13')  {
			var tbl = jQuery(this).attr('tbl');
			var key = jQuery(this).val();
			jQuery.ajax({
				url: '/suppliers/search',
				type: 'POST',
				data: {key: key, tbl: tbl, str_rand: str_rand},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					console.log(response);
					jQuery('tbody#suppliers-details').html(response);
					jQuery.getScript('/js/show_action.js',function(){
						show_action(str_rand);
					});
				}
			});
		}
	});

	jQuery(".partner-delivery-search").bind('blur keyup',function(e) {  
		if (e.type == 'blur' || e.keyCode == '13')  {
			var tbl = jQuery(this).attr('tbl');
			var key = jQuery(this).val();
			jQuery.ajax({
				url: '/PartnerDeliverys/search',
				type: 'POST',
				data: {key: key, tbl: tbl, str_rand: str_rand},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					console.log(response);
					jQuery('tbody#partnerDeliverys-details').html(response);
					jQuery.getScript('/js/show_action.js',function(){
						show_action(str_rand);
					});
				}
			});
		}
	});
	
	jQuery('#date-range').click(function(e) {  
		var keyword = jQuery('input[name="daterange"]').val();
	});

	var delay = (function(){
		var timer = 0;
		return function(callback, ms){
			clearTimeout (timer);
			timer = setTimeout(callback, ms);
		};
	})();

	jQuery('input[name="search-product-stock"]').keyup(function() { 
		var deny = new Array();
		jQuery.each(jQuery('.sku-product-stocks'), function(i, v) {
			var id = jQuery(this).attr('id');
			deny.push(id);
		});
		var keyword = jQuery(this).val();
		delay(function(){
			jQuery.ajax({
				url: '/products/search_stocks',
				type: 'POST',
				data: {keyword: keyword, deny: deny},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
					jQuery('#slimtest1').empty();
					jQuery('.result-search-stock').show();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					jQuery('.result-search-stock').html(response);
					jQuery.getScript('/js/show_action.js',function(){
						stock_products();
					});
				}
			}); // Ajax
		}, 300 );
	});

	jQuery('#DiscountOnOrder').change(function(){
		var discount = jQuery(this).val();
		var viewprice = jQuery('#ViewPrice').html();
		var result = (parseInt(discount) / 100) * parseInt(viewprice);
		var pay_for_supplier = parseInt(viewprice-result);
		jQuery('#PayRefund').html(pay_for_supplier);
	});

	jQuery('#btn-add-product-stock').click(function(){
		var product_name = jQuery('#name-product-stock').val(); 
		var categorie_id = jQuery('#categorie-product-stock').val(); 
		var supply_price = jQuery('#retail-price-product-stock').val(); 
		jQuery.ajax({
			url: '/products/addsomething',
			type: 'POST',
			data: {key: 'products', product_name: product_name, categorie_id: categorie_id,supply_price	: supply_price	},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				console.log(response);
				var data = jQuery.parseJSON(response);
				if (data.status == true) {
					jQuery('#stocks-details').append('<tr class="cursor-pointer product-stock-order" id="'+data.id+'" pid="'+data.pid+'"><td style="width:1px;" class="text-center delete-sp">X</td><td class="text-center"><span class="sku-product-stocks" id="'+data.pid+'">P.'+data.sku+'</td><td class="text-center">'+product_name+'</td><td class="text-center ISKA1"><input type="number" value="'+supply_price+'" id="'+data.id+'" class="form-control price-product price-product-'+data.id+'" name=""></td><td class="text-center ISKA"><input type="number" value="1" id="'+data.id+'" class="form-control quantity-product-'+data.id+' quantity-product" name=""></td><td class="text-center ISKA"><input type="number" value="0" id="'+data.id+'" class="form-control discount-product-'+data.id+' discount-product" name=""></td><td class="text-center width200px"><span class="total-price total-'+data.id+'">'+supply_price+'</td></tr>')
					jQuery.getScript('/js/show_action.js',function(){
						add_product_stocks(data.id);
					});
					jQuery( '#AddSP' ).modal('toggle');
					jQuery('#name-product-stock, #retail-price-product-stock').val('');
					toastr.success(data.message);
				} else {
					toastr.error(data.message);
				}
			}
		});
	});
	
	jQuery('#btn-complete-stock').click(function(){
		var stocks			= new Array();
		var products		= new Array();
		var supplier		= jQuery('#supplier').val();
		var payment 		= jQuery('#payment').val();
		var users			= jQuery('#users').val();
		var create			= jQuery('#create').val();
		var TotalQuantity 	= jQuery("#TotalQuantity").html();
		var ViewPrice		= jQuery("#ViewPrice").html();
		var DiscountOnOrder = jQuery('#DiscountOnOrder').val();
		var TotalPrice		= jQuery("#PayRefund").html();
		jQuery.each(jQuery('.product-stock-order'), function(i, v) {
			var id			= jQuery( this ).attr('id');
			var pid 		= jQuery( this ).attr('pid');
			var price		= jQuery('.price-product-'+id).val();
			var quantity	= jQuery('.quantity-product-'+id).val();
			var discount	= jQuery('.discount-product-'+id).val();
			products.push({'id':pid,'price':price,'quantity':quantity,'discount':discount});
		});
		stocks.push({'supplier_id':supplier, 'payment':payment, 'user_id':users, 'created':create, 'total_quantity':TotalQuantity, 'total_price':ViewPrice, 'discount_stock':DiscountOnOrder, 'final_price':TotalPrice });
		jQuery.ajax({
			url: '/stocks/add_stocks',
			type: 'POST',
			data: {products: products, stocks: stocks},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				// console.log(response);return;
				window.location.href = "/stocks";
			}
		});
	});

	// jQuery('button#btn-date-range').click(function(){
	// 	var keyword = jQuery('input[name="daterange"]').val();
	// 	var data = {type: 'created', keyword: keyword, str_rand: str_rand};
	// 	search_stocks(data, str_rand);
	// });

	jQuery('#saveInvoice').click(function(){
		var invoices		= new Array();
		var products		= new Array();
		var customer_id 	= jQuery('#customers').val();
		var user_id 		= jQuery('#users').val();
		var note 			= jQuery('#note').val();
		var total 			= format_cal(jQuery('#total-bill').html());
		var discount 		= jQuery('.discount-bill').val();
		var customers_paid 	= format_cal(jQuery('#customers-paid').html());
		var return_money 	= format_cal(jQuery('#return-money').html());
		var money 			= format_cal(jQuery('.money').val());
		var radio 			= jQuery('input[name="billradio"]:checked').attr('cid');
		jQuery.each(jQuery('.product-order'), function(i, v) {
			var product_id	= jQuery( this ).attr('id');
			var quantity	= jQuery(this).find('.qty-item').val();
			var price 		= jQuery('.price-item-'+product_id).attr('rel');
			products.push({'product_id':product_id,'quantity': quantity,'price': price});
		});
		invoices.push({'status':1,'customer_id':customer_id,'user_id': user_id,'total': total,'discount':discount,'customers_paid': customers_paid, 'money': money,'return_money': return_money,'radio': radio });
		jQuery.ajax({
			url: '/invoices/add',
			type: 'POST',
			data: {products: products, invoices: invoices},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				window.location.href = "/invoices";
			}
		});
	});
	// ## Search Stock ##//
	jQuery(".stock-search-sl").change(function(){
		var keyword = jQuery(this).val();
		var type = jQuery(this).attr('tbl');
		var data = {type: type, keyword: keyword, str_rand: str_rand};
		search_stocks(data, str_rand);
	});

	jQuery(".stock-search").bind('blur keyup',function(e) {  
		var keyword = jQuery(this).val();
		var type = jQuery(this).attr('tbl');
		if (e.type == 'blur' || e.keyCode == '13') {
			var data = {type: type, keyword: keyword, str_rand: str_rand};
			search_stocks(data, str_rand);
		}
	});

	function search_stocks(data, str_rand) {
		jQuery.ajax({
			url: '/stocks/search_stocks',
			type: 'POST',
			data: data,
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				// console.log(response);
				jQuery('tbody#stocks-details').html(response);
				jQuery.getScript('/js/show_action.js',function(){
					show_action(str_rand);
				});
			}
		});
	}
	// ## End Search Stock ## //
	// ## Search Invoice ## //
	jQuery(".invoice-search-sl").change(function(){
		var keyword = jQuery(this).val();
		var type = jQuery(this).attr('tbl');
		var data = {type: type, keyword: keyword, str_rand: str_rand};
		search_invoices(data, str_rand);
	});

	jQuery(".invoice-search").bind('blur keyup',function(e) {  
		var keyword = jQuery(this).val();
		var type = jQuery(this).attr('tbl');
		if (e.type == 'blur' || e.keyCode == '13') {
			var data = {type: type, keyword: keyword, str_rand: str_rand};
			search_invoices(data, str_rand);
		}
	});

	function search_invoices(data, str_rand) {

		jQuery.ajax({
			url: '/invoices/search_invoices',
			type: 'POST',
			data: data,
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				console.log(response);
				jQuery('tbody#invoices-details').html(response);
				jQuery.getScript('/js/show_action.js',function(){
					show_action(str_rand);
				});
			}
		});
	}
	// ## End Search Invoice ## //

	jQuery("#range_stocks").ionRangeSlider({
		type: "double",
		grid: true,
		min: 0,
		max: 10000000,
		from: 100,
		to: 1000,
		prefix: "$",
		onChange: function ( obj ) {
			delay(function(){
				var str_rand = Math.random().toString(36).substring(7);
				var data = {type: 'final_price', keyword_s: obj.from,keyword_e: obj.to, str_rand: str_rand};
				search_stocks(data, str_rand);
				console.log(data);
			}, 500 );
		}
	});
	jQuery("#range_invoices").ionRangeSlider({
		type: "double",
		grid: true,
		min: 0,
		max: 10000000,
		from: 100,
		to: 1000,
		prefix: "$",
		onChange: function ( obj ) {
			delay(function(){
				var str_rand = Math.random().toString(36).substring(7);
				var data = {type: 'total', keyword_s: obj.from,keyword_e: obj.to, str_rand: str_rand};
				search_invoices(data, str_rand);
				console.log(data);
			}, 500 );
		}
	});

	jQuery('.stocks-detail').click(function() {
		var id = jQuery(this).attr('id');
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
	function format_show(num) {
		var num = num.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		return num;
	}
	
	function format_cal(num) {
		var num = parseInt(num.replace(/\,/g , ""));
		return num;
	}
	function final_money(argument) {
		var price = 0;
		jQuery.each(jQuery('.total-price-item'), function(i, v) {
			price = format_cal(jQuery(this).html())+parseInt(price);
		});
		var dB 	= jQuery('.discount-bill').val();
		var total = parseInt(price - price_discount(dB, price));
		var final_price 	= format_show(price);
		var customers_paid 	= format_show(total);
		jQuery('#customers-paid').html(customers_paid);	
		jQuery('#total-bill').html(final_price);
		jQuery('.money').val(customers_paid);	
		jQuery('#return-money').html('0');
	}

	function price_discount(percent, price) {
		var result = (parseInt(percent) / 100) * parseInt(price);
		return result;
	}
	var myarr = new Array();
	jQuery.each(jQuery('.product-order'), function(i, v) {
		var id	= jQuery( this ).attr('id');
		if (jQuery.inArray(id, myarr) < 0) {
			myarr.push(id);
		}
	});
	function zeroFill( number, width ){
		width -= number.toString().length;
		if ( width > 0 ){
			return new Array( width + (/\./.test( number ) ? 2 : 1) ).join( '0' ) + number;
		}
		return number + "";
	}

	jQuery('li.item-products').click(function(){
		var id 				= jQuery(this).attr('id');
		var sku 			= zeroFill(id,5);
		var price 			= format_cal((jQuery(this).find('.products-price').html()));
		var price_show 		= format_show(price);
		var product_name 	= jQuery(this).find('.title-product-sale span').html();
		if (jQuery.inArray(id, myarr) < 0) {
			myarr.push(id);
			jQuery('#list-items').append('<tr class="product-order" product_name="'+product_name+'" id="'+id+'"><td class="width1 delete-item cursor-pointer">x</td><td class="sku-item">SP.'+sku+'</td><td class="product_name">'+product_name+'</td><td class="width20"><span class="price-item-'+id+'" rel="'+price+'">'+price_show+'</span></td><td class="width10"><input type="number" class="form-control width90 qty-item" id="'+id+'" value="1"></td><td class="width15"><span class="text-center total-price-item total-price-item-'+id+'">'+price_show+'</span></td></tr>');
		}
		final_money();
		jQuery('.qty-item').change(function(){
			var id_item 	= jQuery(this).attr('id');
			var qty 		= jQuery(this).val();
			var price_item 	= format_cal(jQuery('.price-item-'+id_item).html());
			var total 		= format_show(parseInt(price_item*qty));
			jQuery('.total-price-item-'+id_item).html(total);
			final_money();
		});
		jQuery('.delete-item').click(function(){
			jQuery(this).parent().remove().fadeOut();
			final_money();SaveInvoiceInfo();
		});
		SaveInvoiceInfo();
	});

	jQuery('.delete-item').click(function(){
		jQuery(this).parent().remove().fadeOut();
		final_money();SaveInvoiceInfo();
	});

	jQuery('input.discount-bill').change(function(){
		final_money();
		SaveInvoiceInfo();
	});

	function SaveInvoiceInfo(argument) {
		var invoices		= new Array();
		var products		= new Array();
		var customer_id 	= jQuery('#customers').val();
		var user_id 		= jQuery('#users').val();
		var note 			= jQuery('#note').val();
		var total 			= format_cal(jQuery('#total-bill').html());
		var discount 		= jQuery('.discount-bill').val();
		var customers_paid 	= format_cal(jQuery('#customers-paid').html());
		var return_money 	= format_cal(jQuery('#return-money').html());
		var money 			= format_cal(jQuery('.money').val());
		var radio 			= jQuery('input[name="billradio"]:checked').attr('cid');
		jQuery.each(jQuery('.product-order'), function(i, v) {
			var product_id	= jQuery( this ).attr('id');
			var product_name= jQuery( this ).attr('product_name');
			var quantity	= jQuery(this).find('.qty-item').val();
			var price 		= jQuery('.price-item-'+product_id).attr('rel');
			products.push({'product_id':product_id,'product_name':product_name,'quantity': quantity,'price': price});
		});
		invoices.push({'status':1,'customer_id':customer_id,'user_id': user_id,'total': total,'discount':discount,'customers_paid': customers_paid, 'money': money,'return_money': return_money,'radio': radio });
		jQuery.ajax({
			url: '/invoices/save_info_invoices',
			type: 'POST',
			data: {products: products, invoices: invoices},
			dataType: 'html',
			cache: false,
		});
	}
	jQuery(".money").bind('blur keyup',function(e) {  
		if (e.type == 'blur' || e.keyCode == '13')  {
			var pain = format_cal(jQuery('#customers-paid').html());
			var money =  format_cal(jQuery(this).val());
			var rm = format_show(parseInt(pain) - parseInt(money));
			jQuery('#return-money').html(rm);
			SaveInvoiceInfo();
		}
	});

	jQuery("#AddCustomerSales").on('submit',(function(event) {
		event.preventDefault();
 		var name = jQuery("#CustomersName").val();
 		jQuery.ajax({
			url: '/customers/add',
			type: 'POST',
			data: {name: name},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				jQuery( '#customers' ).append(new Option(name, response));
				jQuery( '#customers' ).val(response);
				jQuery( '#myModal2' ).modal('toggle');
				toastr.success(response);
				console.log(response);
			}
		});
	}));

	jQuery('.link').click(function(){
		var id = jQuery(this).attr('id');
		jQuery('.popUpShow-'+id).toggleClass('block');
    });

	jQuery('.del-stockproducts').click(function(){
		var id = jQuery(this).attr('sid');
		var stockproducts = new Array();
		jQuery.each(jQuery('.sp-chbox-'+id), function(i, v) {
			if (jQuery(this).is(':checked') == true) {
				var stock_product_id = jQuery( this ).attr('spid');
				stockproducts.push({'stock_product_id':stock_product_id});
				jQuery('.stock_products_'+stock_product_id).fadeOut().remove();
			}
		});
		jQuery.ajax({
			url: '/stocks/delete_stock_product',
			type: 'POST',
			data: {stockproducts: stockproducts, id: id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				toastr.success('The stock has been deleted.');
				window.location.href = "/stocks";
				console.log(response);
			}
		});
	});
   	
	jQuery('.del-invoice-products').click(function(){
		var invoice_id = jQuery(this).attr('invoice_id');
		var invoice_products = new Array();
		jQuery.each(jQuery('.invoice-product-chbox-'+invoice_id), function(i, v) {
			if (jQuery(this).is(':checked') == true) {
				var invoice_product_id = jQuery( this ).attr('invoice-product-id');
				invoice_products.push({'invoice_product_id':invoice_product_id});
				jQuery('.stock_products_'+invoice_product_id).fadeOut().remove();
			}
		});
		jQuery.ajax({
			url: '/invoices/delete_invoice_product',
			type: 'POST',
			data: {invoice_products: invoice_products, invoice_id: invoice_id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				toastr.success('The Invoices has been deleted.');
				window.location.href = "/invoices";
				console.log(response);
			}
		});
	});
	
	jQuery('.live-search-box').change(function(){
		var key = jQuery(this).val();
		var searchTerm = jQuery(this).val().toLowerCase();
		if (searchTerm == '0') {
			jQuery('.active-categories-0').removeClass('hidden');
			jQuery('.active-categories-1').addClass('hidden');
		} else if(searchTerm == '1') {
			jQuery('.active-categories-1').removeClass('hidden');
			jQuery('.active-categories-0').addClass('hidden');
		} else {
			jQuery('.active-categories-0').removeClass('hidden');
			jQuery('.active-categories-1').removeClass('hidden');
		}
	}); // end class
	$('#search-ignore').hideseek({
		highlight: true,
		ignore: '.ignore'
	});
	// jQuery("#search-menu-name").bind('blur keyup',function(e) {  
	// 	if (e.type == 'blur' || e.keyCode == '13')  {
	// 		var keyword = jQuery(this).val();

	// 		jQuery.ajax({
	// 			url: '/categories/search_categories',
	// 			type: 'POST',
	// 			data: {keyword: keyword},
	// 			dataType: 'html',
	// 			cache: false,
	// 			beforeSend: function(){
	// 				jQuery("#loader").fadeIn();
	// 			},
	// 			success: function(response){
	// 				jQuery("#loader").fadeOut();
	// 				jQuery('#categories-result').html(response);
	// 				// jQuery.getScript('/js/show_action.js',function(){
	// 				// 	stock_products();
	// 				// });
	// 			}
	// 		}); // Ajax
	// 	}
	// });

}); // jQuery document
