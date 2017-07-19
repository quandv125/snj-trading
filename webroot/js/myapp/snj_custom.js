(function($){
"use strict"; // Start of use strict
//Slider Background
function background(){
	$('.bg-slider .item-slider').each(function(){
		var src=$(this).find('.banner-thumb a img').attr('src');
		$(this).css('background-image','url("'+src+'")');
	});	
}
function animated(){
	$('.banner-slider .owl-item').each(function(){
		var check = $(this).hasClass('active');
		if(check==true){
			$(this).find('.animated').each(function(){
				var anime = $(this).attr('data-animated');
				$(this).addClass(anime);
			});
		}else{
			$(this).find('.animated').each(function(){
				var anime = $(this).attr('data-animated');
				$(this).removeClass(anime);
			});
		}
	});
}
//Document Ready
jQuery(document).ready(function(){
	toastr.options = {
		"closeButton": false,
		"debug": false,
		"newestOnTop": false,
		"progressBar": false,
		"positionClass": "toast-top-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}
	$('[data-toggle="tooltip"]').tooltip();
	if ($("#datepicker").length){
		$("#datepicker").kendoDatePicker({format: "yyyy-MM-dd"});
	}
	
	
	// Handsometable
	if ($("#exampleAdd").length){
		var $$ = function(id) { return document.getElementById(id); }, container = $$('exampleAdd'), save = $$('save'), hot;
		hot = new Handsontable(container, {
			// width: 584,
			height: 420, startRows: 5,
						  //Des//REF//P.No//Unit//Qty//Remark
			colWidths: [    250, 250,  160,  70, 80,   365],
			colHeaders: ['Name/ Description', 'Maker/Type Ref', 'PartNo','Unit','Quantity','Remark'],
			columnSorting: true, contextMenu: true, minSpareRows: 1,
			columns: [ {}, {}, {className: "htCenter"}, { className: "htCenter",}, { type: 'numeric', className: "htCenter",}, {}]
		});
		Handsontable.Dom.addEvent(save, 'click', function() {
			

			event.preventDefault();
			jQuery.ajax({
				url: "/inquiries/create_inquiries",
				type: "POST",
				data: new FormData(document.getElementById('InqSuppsInfo')),
				contentType: false,
				cache: false,
				processData:false,
				beforeSend: function(){
					jQuery(".loader3").fadeIn();
				},
				success: function(response){
					var data = jQuery.parseJSON(response);
					if (data.status == true) {
						jQuery.ajax({
							url: '/inquiries/make_inq',
							type: 'POST',
							data: {data: hot.getData(), "inquiry_id": data.inquiry_id},
							dataType: 'html',
							cache: false,
							beforeSend: function(){jQuery(".loader3").fadeIn();},
							success: function(response){
								jQuery(".loader3").fadeOut();
								// console.log(response);return;
								// window.location.href = "../inquiries/index"; 
								window.location.href = "../pages/accounts#/inquiry";
							}
						});
					} else {
						toastr.error(data.message);
					}
				},
				error: function(response, status){
					jQuery("#loader").fadeOut();
				}
			});
			
		});
	}
	////////////////
	if ($("#exampleView").length){
		var getData = jQuery('#datahandtable').data('room');
		var container = document.getElementById('exampleView'),autosaveNotification,hot;
		hot = new Handsontable(container, {
					//Des//REF//P.No//Unit//Qty//Price//Remark
		colWidths: [   30, 240, 210,   155,  80, 80,   130,      220],
		height: 420, data: getData,
		colHeaders: ['#', 'Name/ Description', 'Maker/Type Ref', 'PartNo','Unit','Quantity','Price','Remark'],
		columnSorting: true, contextMenu: true, minSpareRows: 1,
		columns: [{  readOnly: true, className: "htCenter", }, {}, {}, {className: "htCenter"}, { className: "htCenter",}, { type: 'numeric', className: "htCenter",}, { type: 'numeric', format: '$ 0,0.00' }, {}],
		afterChange: function (change, source) {
			console.log(change);
			console.log(source);
			// clearTimeout(autosaveNotification);
			// // ajax('scripts/json/save.json', 'GET', JSON.stringify({data: change}), function (data) {
			// //   exampleConsole.innerText  = 'Autosaved (' + change.length + ' ' + 'cell' + (change.length > 1 ? 's' : '') + ')';
			// autosaveNotification = setTimeout(function() {
			// 	alert('ok123');
			// }, 1000);
			// // });
			}
		});
	}
	// End Handsometable
	$( "#form-add-products" ).submit(function( event ) {
		var price = $('#retail-price').val();
		if (price == '') {
			alert(  'Please supply your price!' );
			event.preventDefault(); return;
		} 
		var myRegxp = /^\d+(?:[.,]\d+)*$/gm;
		if(myRegxp.test(price) != true){
			alert('Incorrect Price Format!');
			event.preventDefault(); return;
		} 
	});

	

	if ($("#datatable").length){
		$('#datatable').DataTable({
			order: [ 4, 'desc' ]
		});
	}
	// 
	$(".reload_captcha").click(function(e){
		e.preventDefault();
		console.log($(".captcha").attr("src"));
		$(".captcha").attr("src", $(".captcha").attr("src"));
	});

	if ($(".onlydate").length){
		jQuery('.onlydate').datetimepicker({ format: 'YYYY-MM-DD' });
	}

	if ($("#editor1").length){
		CKEDITOR.replace( 'editor1' );
	}

	if ($("#editor2").length){
		CKEDITOR.replace( 'editor2' );
	}

	//End Widget Shop



});
//Window Load
jQuery(window).on('load',function(){ 
	//Sticker Slider
	if($('.bxslider-ticker').length>0){
		$('.bxslider-ticker').bxSlider({
			maxSlides: 2,
			minSlides: 1,
			slideWidth: 400,
			slideMargin: 10,
			ticker: true,
			tickerHover:true,
			useCSS:false,
			speed: 50000,
		});
	}
	//Owl Carousel
	if($('.wrap-item').length>0){
		$('.wrap-item').each(function(){
			var data = $(this).data();
			$(this).owlCarousel({
				addClassActive:true,
				stopOnHover:true,
				itemsCustom:data.itemscustom,
				autoPlay:data.autoplay,
				transitionStyle:data.transition, 
				paginationNumbers:data.paginumber,
				beforeInit:background,
				afterAction:animated,
				navigationText:['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			});
		});
	}
	
	//Blog Masonry 
	if($('.masonry-list-post').length>0){
		$('.masonry-list-post').masonry({
			// options
			itemSelector: '.item-post-masonry',
		});
	}
});

	
	
	



})(jQuery); // End of use strict

jQuery(document).ready(function($){
	jQuery('.wishlist-link').click(function(){
		var product_id = jQuery(this).attr('product_id');
		jQuery.ajax({
			url: '/products/add_wishlist',
			type: 'POST',
			data: {product_id: product_id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				// jQuery("#loader").fadeIn();
			},
			success: function(response){
				// jQuery("#loader").fadeOut();
				alert(response);
				console.log(response);
			}
		});
	});

	jQuery('.delete-wishlist').click(function(){
		id = jQuery(this).attr('id');
		jQuery.ajax({
			url: '/products/delete_wishlist',
			type: 'POST',
			data: {id: id},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				// jQuery("#loader").fadeIn();
			},
			success: function(response){
				// jQuery("#loader").fadeOut();
				jQuery('#item-product-'+id).fadeOut();
				jQuery('.item-product-'+id).fadeOut();
				console.log(response);
			}
		});
	});
	// Tab auto change
	// $(function () {
	// 	$(document).off('click.bs.tab.data-api', '[data-hover="tab"]');
	// 	$(document).on('mouseenter.bs.tab.data-api', '[data-toggle="tab"], [data-hover="tab"]', function () {
	// 		$(this).tab('show');
	// 	});
	// }); // End
	

	jQuery('input.custom-control-input').click(function(){
		var allow = new Array();
		jQuery('.supplier-search').hide();
		jQuery.each(jQuery('input.custom-control-input'), function(i, v) {
			if (jQuery(this).is(':checked') == true) {
				var id = jQuery(this).attr('id');
				allow.push({'id':id});
			}
		});
		allow.forEach(function(entry) {
			jQuery('.supplier-search-'+entry.id).show();
		});
		if (allow.length == 0) {
			jQuery('.supplier-search').show();
		}
	});

	$('.live-search-box').change(function(){
		var key = jQuery(this).val();
		// alert(key);
		var searchTerm = $(this).val().toLowerCase();
		if (searchTerm == 'all') {
			$('.live-search-list li').show();
			$('.live-search-list tr').show();
		} else {
			$('.live-search-list li').each(function(){
				if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
					$(this).show();
				} else {
					$(this).hide();
				}
			});
			$('.live-search-list tr.first').each(function(){
				if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
					$(this).show();
				} else {
					$(this).hide();
				}
			});
		}
	}); // end class
	if ($("#contact_form").length){
	
		$('#contact_form').bootstrapValidator({
		// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			fullname: {
				validators: {
					stringLength: {
						min: 4,
						message: 'Please enter at least 4 characters'
					},
						notEmpty: {
						message: 'Please supply your full name'
					}
				}
			},
			username: {
				validators: {
					 stringLength: {
						min: 4,
						message: 'Please enter at least 4 characters'
					},
					notEmpty: {
						message: 'Please supply your username'
					}
				}
			},
			password: {
				validators: {
					 stringLength: {
						min: 4,
						message: 'Please enter at least 4 characters'
					},
					notEmpty: {
						message: 'Please supply your password'
					}
				}
			},
			confirm_password: {
				validators: {
					stringLength: {
						min: 4,
						message: 'Please enter at least 4 characters'
					},
					identical: {
						field: 'password',
						message: 'The password and its confirm are not the same'
					},
					notEmpty: {
						message: 'Please supply your password'
					}
				}
			},
			email: {
				validators: {
					notEmpty: {
						message: 'Please supply your email address'
					},
					emailAddress: {
						message: 'Please supply a valid email address'
					}
				}
			},
			tel: {
				validators: {
					stringLength: {
						min: 10,
						max: 15,
						message: 'Please enter at least 10 characters and no more than 15'
					},
					notEmpty: {
						message: 'Please supply your phone number'
					},
					//phone: {
						// country: 'US',
						//message: 'Please supply a vaild phone number with area code'
				   //}
				}
			},
			address: {
				validators: {
					stringLength: {
						min: 5,
						message: 'Please enter at least 5 characters'
					},
					notEmpty: {
						message: 'Please supply your street address or Please enter at least 8 characters'
					}
				}
			},
			city: {
				validators: {
					 stringLength: {
						min: 4,
					},
					notEmpty: {
						message: 'Please supply your city'
					}
				}
			},
			captcha: {
				validators: {
					notEmpty: {
						message: 'Please select your captcha'
					}
				}
			},
			state: {
				validators: {
					notEmpty: {
						message: 'Please select your state'
					}
				}
			},
			zip: {
				validators: {
					notEmpty: {
						message: 'Please supply your zip code'
					},
					zipCode: {
						country: 'US',
						message: 'Please supply a vaild zip code'
					}
				}
			},
			description: {
				validators: {
					stringLength: {
						min: 10,
						max: 200,
						message:'Please enter at least 10 characters and no more than 200'
					},
					notEmpty: {
						message: 'Please supply a description of your project'
					}
					}
				}
			}
		})
		.on('success.form.bv', function(e) {
			$('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
				$('#contact_form').data('bootstrapValidator').resetForm();

			// Prevent form submission
			e.preventDefault();

			// Get the form instance
			var $form = $(e.target);

			// Get the BootstrapValidator instance
			var bv = $form.data('bootstrapValidator');

			// Use Ajax to submit form data
			$.post($form.attr('action'), $form.serialize(), function(result) {
				console.log(result);
			}, 'json');
		}
	   );
	}// End 

	jQuery('#btn-add-suppliers').click(function(){
		var count = jQuery(this).attr('count');
		var name = jQuery('#supplier-name').val();
		jQuery.ajax({
			url: '/suppliers/add_suppliers',
			type: 'POST',
			data: {name: name},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				var data = jQuery.parseJSON(response);
				if (data.status == true) {
					console.log(data);
					jQuery('#supplier-id').append('<option value='+data.id+'>'+name+'</option>');
					jQuery('ul.dropdown-menu').append('<li data-original-index="'+count+'"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">'+name+'</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>')
					var time = parseInt(jQuery(this).attr('count'))+1;
					jQuery(this).attr('count',time);
					jQuery('#myModal2').modal('toggle');
				} else {

				}
			}
		});
	}); // End

	var delay = (function(){
		var timer = 0;
		return function(callback, ms){
			clearTimeout (timer);
			timer = setTimeout(callback, ms);
		};
	})();

	// jQuery('input.smart-search').keyup(function(e) { 
	// 	var keyword = jQuery(this).val();
	// 	jQuery('.quick-smart-search').removeClass('hidden');
	// 	if (keyword != '') {
	// 		delay(function(){ 
	// 			jQuery.ajax({
	// 				url: '/products/quick_search',
	// 				type: 'POST',
	// 				data: {keyword: keyword, id:'slimtest1'},
	// 				dataType: 'html',
	// 				cache: false,
	// 				beforeSend: function(){
	// 					jQuery("#loader").fadeIn();
	// 				},
	// 				success: function(response){
	// 					jQuery("#loader").fadeOut();
	// 					jQuery('.quick-smart-search').html(response);
	// 					jQuery('#content').click(function(e) {
	// 						jQuery('.quick-smart-search-fixed').addClass('hidden');
	// 						jQuery('.quick-smart-search').addClass('hidden');
	// 						jQuery('.type-search').focus();
	// 					});
	// 					jQuery('.banner-slider').click(function(e) {
	// 						jQuery('.quick-smart-search-fixed').addClass('hidden');
	// 						jQuery('.quick-smart-search').addClass('hidden');
	// 						jQuery('.type-search').focus();
	// 					});

	// 					jQuery('.addcart-link2').click(function(){
	// 						var id = jQuery(this).attr('product_id');
	// 						jQuery.ajax({
	// 							url: '/products/cart',
	// 							type: 'POST',
	// 							data: {id: id},
	// 							dataType: 'html',
	// 							cache: false,
	// 							beforeSend: function(){
	// 								jQuery("#loader").fadeIn();
	// 							},
	// 							success: function(response){
	// 								jQuery("#loader").fadeOut();
	// 								if (response != 0) {
	// 									var qty = parseInt(jQuery('.total-mini-cart-item').html())+1;
	// 									jQuery('.total-mini-cart-item').html(qty);
	// 									jQuery('.my_order tbody').append(response);
	// 									// Remove
	// 									jQuery('.remove-items').click(function(){
	// 										var id = jQuery(this).attr('product_id');
	// 										jQuery('.cart_item_'+id).fadeOut();
	// 										jQuery.ajax({
	// 											url: '/products/remove_items',
	// 											type: 'POST',
	// 											data: {id: id},
	// 											dataType: 'html',
	// 											cache: false,
	// 											beforeSend: function(){
	// 												jQuery("#loader").fadeIn();
	// 											},
	// 											success: function(response){
	// 												jQuery("#loader").fadeOut();
	// 												var qty = parseInt(jQuery('.total-mini-cart-item').html())-1;
	// 												jQuery('.total-mini-cart-item').html(qty);
	// 												console.log(response);
	// 											}
	// 										});
	// 									});
	// 									//Quantity
	// 									$('.info-qty').each(function(){
	// 										var qtyval = parseInt($(this).find('.qty-val').text(),10);
	// 										$('.qty-up-'+id).on('click',function(event){
	// 											event.preventDefault();
	// 											qtyval=qtyval+1;
	// 											$(this).prev().text(qtyval);
	// 										});
	// 										$('.qty-down-'+id).on('click',function(event){
	// 											event.preventDefault();
	// 											qtyval=qtyval-1;
	// 											if(qtyval>0){
	// 												$(this).next().text(qtyval);
	// 											}else{
	// 												qtyval=0;
	// 												$(this).next().text(qtyval);
	// 											}
	// 										});
	// 									});
	// 								};
	// 								console.log(response);
	// 							}
	// 						});
	// 					});
	// 				}
	// 			}); // Ajax
	// 		}, 300 );
	// 	} else {
	// 		jQuery('.quick-smart-search').addClass('hidden');
	// 	}
		
	// });
	
	// jQuery('input.smart-search-fixed').keyup(function(e) { 
	// 	var keyword = jQuery(this).val();
	// 	delay(function(){
	// 		jQuery.ajax({
	// 			url: '/products/quick_search',
	// 			type: 'POST',
	// 			data: {keyword: keyword, id:'slimtest2'},
	// 			dataType: 'html',
	// 			cache: false,
	// 			beforeSend: function(){
	// 				jQuery(".loader2").fadeIn();
	// 			},
	// 			success: function(response){
	// 				jQuery(".loader2").fadeOut();
	// 				jQuery('.quick-smart-search-fixed').toggleClass('hidden').html(response);
	// 				jQuery(window).click(function(e) {
	// 					jQuery('.quick-smart-search-fixed').addClass('hidden');
	// 					jQuery('.quick-smart-search').addClass('hidden');
	// 					jQuery('.type-search').focus();
	// 				});
	// 			}
	// 		}); // Ajax
	// 	}, 500 );
	// });
	
	// jQuery('#add-new-unavailable').click(function(){
	// 	jQuery('.tbody-unavailable').append('<tr class="tr-unavailable"><td><input type="checkbox" class="" name=""></td><td><input type="text" class="form-control product_name" name=""></td><td><input type="text" class="form-control model_serial_no" name=""></td><td><input type="text" class="form-control part_no" name=""></td><td><input type="text" class="form-control unit" name=""></td><td><input type="text" class="form-control quantity" name=""></td><td><textarea class="form-control textarea-available remark"></textarea></td></tr>');
	// });

	// jQuery('#send-inquiry-unavailable').click(function(){
	// 	var unavailables = new Array();
	// 	var vessel_name	 = jQuery( '.vessel_name' ).val();
	// 	var imo_no 	 	 = jQuery( '.imo_no' ).val();
	// 	var maker_type 	 = jQuery( '.maker_type' ).val();
	// 	var note  		 = jQuery( '.note' ).val();
		
	// 	jQuery.each(jQuery('.tr-unavailable'), function(i, v) {
	// 		var part_no 	 = jQuery( this ).find('.part_no').val();
	// 		var product_name = jQuery( this ).find('.product_name').val();
	// 		var model_serial_no	 = jQuery( this ).find('.model_serial_no').val();
	// 		var quantity 	 = jQuery( this ).find('.quantity').val();
	// 		var unit 	 	 = jQuery( this ).find('.unit').val();
	// 		var remark 		 = jQuery( this ).find('.remark').val();
	// 		if (part_no != '' && product_name != '') {
	// 			unavailables.push({'part_no':part_no, 'product_name': product_name,'unit': unit ,'model_serial_no': model_serial_no, 'quantity': quantity, 'remark': remark});
	// 		};
	// 	});
		
	// 	jQuery.ajax({
	// 		url: '/invoices/unavailables',
	// 		type: 'POST',
	// 		data: {unavailables: unavailables,vessel_name: vessel_name,imo_no: imo_no, maker_type:maker_type, note:note },
	// 		dataType: 'html',
	// 		cache: false,
	// 		beforeSend: function(){},
	// 		success: function(response){
	// 			// window.location.href = "../pages/orders";
	// 			console.log(response);
	// 		}
	// 	}); // Ajax
	// });
	
	// jQuery("#save-all").click(function(){
	// 	console.log(handsontable.getData());
	// });

	// jQuery('.remove-file-att').click(function(){
	// 	alert("OK");
	// 	var id = jQuery(this).attr("id");
	// 	jQuery.ajax({
	// 		url: '/inquiries/remove_file_attachment',
	// 		type: 'POST',
	// 		data: {id: id},
	// 		dataType: 'html',
	// 		cache: false,
	// 		beforeSend: function(){
	// 			jQuery(".loader3").fadeIn();
	// 		},
	// 		success: function(response){
	// 			jQuery(".loader3").fadeOut();
	// 			jQuery('#attachments-'+id).remove();
	// 			toastr.success(response);
	// 			console.log(response);
	// 		}
	// 	}); // Ajax
	// });

	// jQuery('#inquiries-info').on('submit',(function(event) {
	// 	event.preventDefault();

	// 	jQuery.ajax({
	// 		url: '/inquiries/edit-inquiries-cus',
	// 		type: "POST",
	// 		data:  new FormData(this),
	// 		contentType: false,
	// 		cache: false,
	// 		processData:false,
	// 		beforeSend: function(){
	// 			jQuery(".loader3").fadeIn();
	// 		},
	// 		success: function(response){
	// 			jQuery(".loader3").fadeOut();
	// 			toastr.success('The inquiry has been saved.');
	// 			if (response != '') {
	// 				jQuery('.file-attachments').append(response);
	// 				jQuery('.remove-file-att').click(function(){
	// 					var id = jQuery(this).attr("id");
	// 					jQuery.ajax({
	// 						url: '/inquiries/remove_file_attachment',
	// 						type: 'POST',
	// 						data: {id: id},
	// 						dataType: 'html',
	// 						cache: false,
	// 						beforeSend: function(){
	// 							jQuery(".loader3").fadeIn();
	// 						},
	// 						success: function(response){
	// 							jQuery(".loader3").fadeOut();
	// 							jQuery('#attachments-'+id).remove();
	// 							toastr.success(response);
	// 							console.log(response);
	// 						}
	// 					}); // Ajax
	// 				});
	// 			};
	// 			jQuery('#file-input').val('');
	// 		},
	// 		error: function(response, status){}
	// 	});
	// }));

	// jQuery('.remove-file-att').click(function(){
	// 	var id = jQuery(this).attr("id");
	// 	jQuery.ajax({
	// 		url: '/inquiries/remove_file_attachment',
	// 		type: 'POST',
	// 		data: {id: id},
	// 		dataType: 'html',
	// 		cache: false,
	// 		beforeSend: function(){
	// 			jQuery(".loader3").fadeIn();
	// 		},
	// 		success: function(response){
	// 			jQuery(".loader3").fadeOut();
	// 			jQuery('#attachments-'+id).remove();
	// 			toastr.success(response);
	// 			console.log(response);
	// 		}
	// 	}); // Ajax
	// });

	jQuery("#FrmAddProducts").on('submit',(function(event) {
		event.preventDefault();
		var form_data = new FormData(this);
		form_data.append('short_description', CKEDITOR.instances['short_description'].getData());  
		form_data.append('description', CKEDITOR.instances['description'].getData());  
		jQuery.ajax({
			url: "/products/supplier_add_product",
			type: "POST",
			data: form_data,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				jQuery(".loader3").fadeIn();
			},
			success: function(response){
				jQuery(".loader3").fadeOut();
				console.log(response);
				window.location.href = "../pages/accounts#/products";
			},
			error: function(response, status){
				jQuery(".loader3").fadeOut();
			}
		});
	}));

	jQuery("#FrmEditProducts").on('submit',(function(event) {
		event.preventDefault();
		var form_data = new FormData(this);
		var categorie_id = jQuery("#categories").val();
		form_data.append('categorie_id', categorie_id);  
		form_data.append('short_description', CKEDITOR.instances['short_description'].getData());  
		form_data.append('description', CKEDITOR.instances['description'].getData());  
		jQuery.ajax({
			url: "/products/supplier_edit_product",
			type: "POST",
			data: form_data,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				jQuery(".loader3").fadeIn();
			},
			success: function(response){
				jQuery(".loader3").fadeOut();
				console.log(response);
				toastr.success('The Product has been saved.');
			},
			error: function(response, status){
				jQuery(".loader3").fadeOut();
			}
		});
	}));

	jQuery("#fx-inquiries-details").on("submit",(function(){
		jQuery.ajax({
			url: '/inquiries/edit-inquiries-cus',
			type: "POST",
			data:  new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				jQuery(".loader3").fadeIn();
			},
			success: function(response){
				
				jQuery(".loader3").fadeOut();
				toastr.success('The inquiry has been saved.');
				if (response != '') {
					jQuery('.file-attachments').append(response);
					jQuery('.remove-file-att').click(function(){
						var id = jQuery(this).attr("id");
						jQuery.ajax({
							url: '/inquiries/remove_file_attachment',
							type: 'POST',
							data: {id: id},
							dataType: 'html',
							cache: false,
							beforeSend: function(){
								jQuery(".loader3").fadeIn();
							},
							success: function(response){
								jQuery(".loader3").fadeOut();
								jQuery('#attachments-'+id).remove();
								toastr.success(response);
								console.log(response);
							}
						}); // Ajax
					});
				};
				jQuery('#file-input').val('');
			},
			error: function(response, status){}
		});
	}));
}); // End document
