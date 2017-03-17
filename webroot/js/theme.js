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
	jQuery('.addcart-link').click(function(){
		var qty 	= parseInt(jQuery('.total-mini-cart-item').html())+1;
		var id 		= jQuery(this).attr('product_id');
		var name 	= jQuery(this).attr('name');
		var price 	= jQuery(this).attr('price');
		var picture 	= jQuery(this).attr('picture');
		// console.log(myproduct);
		jQuery.ajax({
			url: '/products/cart',
			type: 'POST',
			data: {id: id, name: name, price: price, picture: picture},
			dataType: 'html',
			cache: false,
			beforeSend: function(){
				jQuery("#loader").fadeIn();
			},
			success: function(response){
				jQuery("#loader").fadeOut();
				jQuery('.total-mini-cart-item').html(qty);
				console.log(response);
			}
		});
	});

	
	jQuery('.remove-items').click(function(){
		var id = jQuery(this).attr('product_id');
		jQuery('.cart_item_'+id).fadeOut();
		jQuery.ajax({
			url: '/products/remove_items',
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
			}
		});
	});
	jQuery('.close-flash').click(function(){
		jQuery(this).parent().parent().fadeOut();
	});
	

	if ($("#datatable").length){
		$('#datatable').DataTable({
			// "iDisplayLength": 100,
			columnDefs: [ {
				targets: [ 0 ],
				orderData: [ 0, 1 ]
			}, {
				targets: [ 1 ],
				orderData: [ 1, 0 ]
			}, {
				targets: [ 4 ],
				orderData: [ 4, 0 ]
			} ]
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

	jQuery('.products-show .click').click(function(){
		jQuery(this).parent().next().toggleClass('hidden');
	});
	
	jQuery('.sub-menu-search li').click(function(){
		var id = jQuery(this).attr('id');
		var name = jQuery(this).html();
		jQuery('.search-active').html(name);
		jQuery('.type-search').val(id);
		$('.search-active').html(name);
		$('input[name="type-search"]').val(id);
	});

	$('.has-child').on('click',function(){
		$('.sub-menu-toggle').slideToggle();
	});
	// Scroll show menu
	$(window).scroll(function(){
		if($(window).scrollTop() > 200)
			$('#menufix').addClass('active');
		else	
			$('#menufix').removeClass('active');
	});
		
	//Back To Top theme
	$('.back-to-top').on('click',function(event){
		event.preventDefault();
		$('html, body').animate({scrollTop:0}, 'slow');
	});

	//Back To Top
	function backtotop (argument) {
		var scrollTop = jQuery(window).scrollTop();
		if (scrollTop > 50) {
			jQuery('#back-to-top').addClass('show-back-to-top');
		} else {
			jQuery('#back-to-top').removeClass('show-back-to-top');
		}
	}
	if (jQuery('#back-to-top').length) {
		backtotop();
		jQuery(window).on('scroll', function () {
			backtotop();
		});
		jQuery('#back-to-top').on('click', function (e) {
			e.preventDefault();
			jQuery('html,body').animate({ scrollTop: 0 }, 300); //speed
		});
	}

	//Menu Responsive
	if($(window).width()<768){
		$('body').on('click',function(event){
			$('.main-nav>ul').slideUp('slow');
		});
		$('.toggle-mobile-menu').on('click',function(event){
			event.preventDefault();
			event.stopPropagation();
			$('.main-nav>ul').slideToggle('slow');
		});
		$('.main-nav li.menu-item-has-children>a').on('click',function(event){
			event.preventDefault();
			event.stopPropagation();
			$(this).next().slideToggle('slow');
		});
	}
	
	//Accordions
	if($('.accordion-box').length >0){
		$('.accordion-box').each(function(){
			$('.title-accordion').click(function(){
				$(this).parent().parent().find('.item-accordion').removeClass('active');
				$(this).parent().addClass('active');
				$(this).parent().parent().find('.desc-accordion').stop(true,true).slideUp();
				$(this).next().stop(true,true).slideDown();
			});
		});
	}
	//Toggle Filter
	$('body').on('click',function(){
		$('.box-product-filter').slideUp('slow');
	});
	$('.toggle-link-filter').on('click',function(event) {
		event.stopPropagation();
		event.preventDefault();
		$('.box-product-filter').slideToggle('slow');
	});
	//Product Quick View
	$('.quickview-link').each(function(){
		$(this).fancybox();
	});
	$('.team-gallery-thumb').each(function(){
		$(this).fancybox();
	});
	//Faqs Widget
	$('.list-post-faq li h3').on('click',function(event) {
		$('.list-post-faq li').removeClass('active');
		$(this).parent().addClass('active');
	});
	//World Hover Dir
	$('.world-ad-box').each( function() {
		$(this).hoverdir(); 
	});
	//Close Adv
	$('.adv-close-link').on('click',function(event) {
		event.preventDefault();
		$('.adv-close').slideUp('slow');
	});
	//Category Hover
	$('.list-category-hover>li:gt(9)').hide();
	$('.expand-list-link').on('click',function(event) {
		event.preventDefault();
		$(this).toggleClass('expanding');
		$('.list-category-hover>li:gt(9)').slideToggle('slow');
	});
	$('.list-category-hover a').on('mouseover',function() {
		var id_hv = $(this).attr('data-id');
		/* console.log(id_hv); */
		$('.inner-right-category-hover').each(function(){
			if($(this).attr('id')==id_hv){
				$(this).addClass('active');
			}else{
				$(this).removeClass('active');
			}
		})
		
	});
	// $(".category-dropdown-hover").hover(function(){
	// 	$('.wrap-category-hover').css("display", "block");
	// 	}, function(){
	// 	$('.wrap-category-hover').css("display", "none");
	// });
	// $('.title-category-dropdown-hover').hover(function(){
	// 	$('.wrap-category-dropdown-hover').slideToggle();
	// });
	//Category Toggle 
	$('.list-category-dropdown >li:gt(9)').hide();
	$('.expand-category-link').on('click',function(event) {
		event.preventDefault();
		$(this).toggleClass('expanding');
		$('.list-category-dropdown >li:gt(9)').slideToggle('slow');
	});
	//Category Toggle Home 8
	$('.list-category-dropdown8 >li:gt(10)').hide();
	$('.expand-category-link8').on('click',function(event) {
		event.preventDefault();
		$(this).toggleClass('expanding');
		$('.list-category-dropdown8 >li:gt(10)').slideToggle('slow');
	});
	//Outlet mCustom Scrollbar
	if($('.list-outlet-brand').length>0){
		$(".list-outlet-brand").mCustomScrollbar();
	}
	//Deal Count Down
	if($('.super-deal-countdown').length>0){
		$(".super-deal-countdown").TimeCircles({
			fg_width: 0.01,
			bg_width: 1.2,
			text_size: 0.07,
			circle_bg_color: "#ffffff",
			time: {
				Days: {
					show: true,
					text: "Days",
					color: "#f9bc02"
				},
				Hours: {
					show: true,
					text: "Hour",
					color: "#f9bc02"
				},
				Minutes: {
					show: true,
					text: "Mins",
					color: "#f9bc02"
				},
				Seconds: {
					show: true,
					text: "Secs",
					color: "#f9bc02"
				}
			}
		}); 
	}
	if($('.top-toggle-coutdown').length>0){
		$(".top-toggle-coutdown").TimeCircles({
			fg_width: 0.03,
			bg_width: 1.2,
			text_size: 0.07,
			circle_bg_color: "rgba(27,29,31,0.5)",
			time: {
				Days: {
					show: true,
					text: "day",
					color: "#fbb450"
				},
				Hours: {
					show: true,
					text: "hou",
					color: "#fbb450"
				},
				Minutes: {
					show: true,
					text: "min",
					color: "#fbb450"
				},
				Seconds: {
					show: true,
					text: "sec",
					color: "#fbb450"
				}
			}
		}); 
	}
	if($('.hot-deal-tab-countdown').length>0){
		$(".hot-deal-tab-countdown").TimeCircles({
			fg_width: 0,
			bg_width: 1,
			text_size: 0.07,
			time: {
				Days: {
					show: true,
					text: "D",
				},
				Hours: {
					show: true,
					text: "H",
				},
				Minutes: {
					show: true,
					text: "M",
				},
				Seconds: {
					show: true,
					text: "S",
				}
			}
		}); 
	}
	if($('.hotdeal-countdown').length>0){
		$(".hotdeal-countdown").TimeCircles({
			fg_width: 0,
			bg_width: 1,
			text_size: 0.07,
			time: {
				Days: {
					show: true,
					text: "D",
				},
				Hours: {
					show: true,
					text: "H",
				},
				Minutes: {
					show: true,
					text: "M",
				},
				Seconds: {
					show: true,
					text: "S",
				}
			}
		}); 
	}
	if($('.hotdeal-countdown5').length>0){
		$(".hotdeal-countdown5").TimeCircles({
			fg_width: 0,
			bg_width: 1,
			text_size: 0.07,
			circle_bg_color: "#f4f4f4",
			time: {
				Days: {
					show: false,
					text: "Days",
					color: "#e62e04"
				},
				Hours: {
					show: true,
					text: "Hour",
					color: "#e62e04"
				},
				Minutes: {
					show: true,
					text: "Mins",
					color: "#e62e04"
				},
				Seconds: {
					show: true,
					text: "Secs",
					color: "#e62e04"
				}
			}
		}); 
	}
	if($('.dealoff-countdown').length>0){
		$(".dealoff-countdown").TimeCircles({
			fg_width: 0,
			bg_width: 1,
			text_size: 0.07,
			circle_bg_color: "#fff",
			time: {
				Days: {
					show: false,
					text: "d",
				},
				Hours: {
					show: true,
					text: "h",
				},
				Minutes: {
					show: true,
					text: "m",
				},
				Seconds: {
					show: true,
					text: "s",
				}
			}
		}); 
	}
	if($('.great-deal-countdown').length>0){
		$(".great-deal-countdown").TimeCircles({
			fg_width: 0,
			bg_width: 1,
			text_size: 0.07,
			circle_bg_color: "#fff",
			time: {
				Days: {
					show: true,
					text: "d",
				},
				Hours: {
					show: true,
					text: "h",
				},
				Minutes: {
					show: true,
					text: "m",
				},
				Seconds: {
					show: true,
					text: "s",
				}
			}
		}); 
	}
	if($('.deal-countdown8').length>0){
		$(".deal-countdown8").TimeCircles({
			fg_width: 0.01,
			bg_width: 1.2,
			text_size: 0.07,
			circle_bg_color: "#fafafa",
			time: {
				Days: {
					show: true,
					text: "D",
					color: "#e62e04"
				},
				Hours: {
					show: true,
					text: "H",
					color: "#e62e04"
				},
				Minutes: {
					show: true,
					text: "M",
					color: "#e62e04"
				},
				Seconds: {
					show: true,
					text: "S",
					color: "#e62e04"
				}
			}
		}); 
	}
	if($('.supperdeal-countdown').length>0){
		$(".supperdeal-countdown").TimeCircles({
			fg_width: 0.03,
			bg_width: 1.2,
			text_size: 0.07,
			circle_bg_color: "#5f6062",
			time: {
				Days: {
					show: true,
					text: "day",
					color: "#c6d43a"
				},
				Hours: {
					show: true,
					text: "hou",
					color: "#c6d43a"
				},
				Minutes: {
					show: true,
					text: "min",
					color: "#c6d43a"
				},
				Seconds: {
					show: true,
					text: "sec",
					color: "#c6d43a"
				}
			}
		}); 
	}
	//Tab Control
	$('.title-tab-product li a').on('click',function(event) {
		event.preventDefault();
		$('.title-tab-product li').removeClass('active');
		$(this).parent().addClass('active');
		$('.content-tab-product .tab-pane').each(function(){
			if($(this).attr('id')==$('.title-tab-product li.active a').attr('data-id')){
				$(this).slideDown();
			}else{
				$(this).slideUp();
			}
		});
	});
	//Close Service Box
	$('.close-service-box').on('click',function(event) {
		event.preventDefault();
		$('.list-service-box').slideUp('slow');
	});
	//Close Top Toggle
	$('.close-top-toggle').on('click',function(event) {
		event.preventDefault();
		$('.top-toggle').slideUp('slow');
	});
	//Detail Gallery
	if($('.detail-gallery').length>0){
		$(".detail-gallery .carousel").jCarouselLite({
			btnNext: ".gallery-control .next",
			btnPrev: ".gallery-control .prev",
			speed: 800,
			visible:4,
		});
		//Elevate Zoom
		$('.detail-gallery .mid img').elevateZoom({
			zoomType: "inner",
			cursor: "crosshair",
			zoomWindowFadeIn: 500,
			zoomWindowFadeOut: 750
		});
		$(".detail-gallery .carousel a").on('click',function(event) {
			event.preventDefault();
			$(".detail-gallery .carousel a").removeClass('active');
			$(this).addClass('active');
			$(".detail-gallery .mid img").attr("src", $(this).find('img').attr("src"));
			var z_url = $('.detail-gallery .mid img').attr('src');
			$('.zoomWindow').css('background-image','url("'+z_url+'")');
		});
	}
	//Detail Gallery Full Width
	if($('.detail-gallery-fullwidth').length>0){
		$(".detail-gallery-fullwidth .carousel").jCarouselLite({
			btnNext: ".vertical-next",
			btnPrev: ".vertical-prev",
			speed: 800,
			visible:4,
			vertical: true
		});
		//Elevate Zoom
		$('.detail-gallery-fullwidth .mid img').elevateZoom({
			// zoomType: "inner",
			cursor: "crosshair",
			zoomWindowFadeIn: 500,
			zoomWindowFadeOut: 750
		});
		// $('.detail-gallery-fullwidth .mid img').elevateZoom({
		// 	zoomType: "inner",
		// 	cursor: "crosshair",
		// 	zoomWindowFadeIn: 500,
		// 	zoomWindowFadeOut: 750
		// });
		$(".detail-gallery-fullwidth .carousel a").on('click',function(event) {
			event.preventDefault();
			$(".detail-gallery-fullwidth .carousel a").removeClass('active');
			$(this).addClass('active');
			$(".detail-gallery-fullwidth .mid img").attr("src", $(this).find('img').attr("src"));
			var z_url = $('.detail-gallery-fullwidth .mid img').attr('src');
			$('.zoomWindow').css('background-image','url("'+z_url+'")');
		});
	}
	//Sort Pagi Bar
	$('body').on('click',function(){
		$('.product-order-list').slideUp();
		$('.per-page-list').slideUp();
	});
	$('.product-order-toggle').on('click',function(event){
		event.stopPropagation();
		event.preventDefault();
		$('.product-order-list').slideToggle();
	});
	$('.per-page-toggle').on('click',function(event){
		event.stopPropagation();
		event.preventDefault();
		$('.per-page-list').slideToggle();
	});
	//Attr Product
	$('body').on('click',function(){
		$('.list-color').slideUp();
		$('.list-size').slideUp();
	});
	$('.toggle-color').on('click',function(event){
		event.stopPropagation();
		event.preventDefault();
		$('.list-color').slideToggle();
	});
	$('.toggle-size').on('click',function(event){
		event.stopPropagation();
		event.preventDefault();
		$('.list-size').slideToggle();
	});
	$('.list-color a').on('click',function(event){
		event.preventDefault();
		$('.list-color a').removeClass('selected');
		$(this).addClass('selected');
		$('.toggle-color').text($(this).text());
	});
	$('.list-size a').on('click',function(event){
		event.preventDefault();
		$('.list-size a').removeClass('selected');
		$(this).addClass('selected');
		$('.toggle-size').text($(this).text());
	});
	
	//Qty Up-Down
	$('.info-qty').each(function(){
		var qtyval = parseInt($(this).find('.qty-val').text(),10);
		$('.qty-up').on('click',function(event){
			event.preventDefault();
			qtyval=qtyval+1;
			$(this).prev().text(qtyval);
		});
		$('.qty-down').on('click',function(event){
			event.preventDefault();
			qtyval=qtyval-1;
			if(qtyval>0){
				$(this).next().text(qtyval);
			}else{
				qtyval=0;
				$(this).next().text(qtyval);
			}
		});
	});
	//Rev Slider
	if($('.rev-slider').length>0){
		$('.rev-slider').revolution({
			startwidth:1170,
			startheight:410,			 
		});
	}
	$('body').on('click',function(){
		$('.list-category-toggle').slideUp();
	});
	$('.list-category-toggle').on('click',function(event){
		event.preventDefault();
	});
	$('.category-toggle-link').on('click',function(event){
		event.stopPropagation();
		event.preventDefault();
		$('.list-category-toggle').slideToggle();
	});
	$('.title-category-dropdown').on('click',function(){
		$(this).next().slideToggle();
	});
	//Widget Shop
	$('.widget.widget-vote a').on('click',function(event){
		event.preventDefault();
		$(this).toggleClass('active');
	});
	$('.widget-filter .widget-title').on('click',function(event){
		$(this).toggleClass('active');
		$(this).next().slideToggle('slow');
	});
	$('.box-filter li a,.list-color-filter a').on('click',function(event){
		event.preventDefault();
		$(this).toggleClass('active');
	});
	if($('.range-filter').length>0){
		$( ".range-filter #slider-range" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 70, 350 ],
			slide: function( event, ui ) {
			$( "#amount" ).html( "<span>" + ui.values[ 0 ] + "</span>" + " - " + "<span>" + ui.values[ 1 ] + "</span>" );
			}
		});
		$( ".range-filter #amount" ).html( "<span>" + $( "#slider-range" ).slider( "values", 0 )+ "</span>" + " - " + "<span>" + $( "#slider-range" ).slider( "values", 1 ) + "</span>" );
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

	jQuery('input.smart-search').keyup(function(e) { 
		var keyword = jQuery(this).val();
		delay(function(){
			jQuery.ajax({
				url: '/products/quick_search',
				type: 'POST',
				data: {keyword: keyword, id:'slimtest1'},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery("#loader").fadeIn();
				},
				success: function(response){
					jQuery("#loader").fadeOut();
					jQuery('.quick-smart-search').toggleClass('hidden').html(response);
					jQuery(window).click(function(e) {
						jQuery('.quick-smart-search-fixed').addClass('hidden');
						jQuery('.quick-smart-search').addClass('hidden');
						jQuery('.type-search').focus();
					});
				}
			}); // Ajax
		}, 500 );
	});
	
	jQuery('input.smart-search-fixed').keyup(function(e) { 
		var keyword = jQuery(this).val();
		delay(function(){
			jQuery.ajax({
				url: '/products/quick_search',
				type: 'POST',
				data: {keyword: keyword, id:'slimtest2'},
				dataType: 'html',
				cache: false,
				beforeSend: function(){
					jQuery(".loader2").fadeIn();
				},
				success: function(response){
					jQuery(".loader2").fadeOut();
					jQuery('.quick-smart-search-fixed').toggleClass('hidden').html(response);
					jQuery(window).click(function(e) {
						jQuery('.quick-smart-search-fixed').addClass('hidden');
						jQuery('.quick-smart-search').addClass('hidden');
						jQuery('.type-search').focus();
					});
				}
			}); // Ajax
		}, 500 );
	});
	
	

}); // End document
