(function() {	"use strict";

	var App = angular.module("App.controllers", []);
	// Create progressbar when app run
	App.run(function ($rootScope, ngProgressFactory) {
		$rootScope.$on("$routeChangeStart", function () {
			$rootScope.progressbar = ngProgressFactory.createInstance();
			$rootScope.progressbar.start();
		});
		$rootScope.$on("$routeChangeSuccess", function () {
			$rootScope.progressbar.complete();
		});
	});
	// End

	// Main User Page
	App.controller('IndexCtrl', function($scope, $routeParams, $http){
		$http.get("/pages/account_info").then(function (response) {
			$scope.users = response.data;
			var billing_address = jQuery.parseJSON(response.data.billing_address);
			$scope.billing_address = billing_address;
			var delivery_address = jQuery.parseJSON(response.data.delivery_address);
			$scope.delivery_address = delivery_address;
		});
	});

	// Change Password
	App.controller('ChangePasswordCtrl', function($scope, $routeParams, $http){
		$http.get("/pages/account_info").then(function (response) {
			$scope.users = response.data;
		});
	});

	//Change Personal Infomation
	App.controller('PersonalInfomationCtrl', function($scope, $routeParams, $http){
		$http.get("/pages/account_info").then(function (response) {
			$scope.users = response.data;
			console.log($scope.users);
		});
	});

	// AddProductsCtrl
	App.controller('AddProductsCtrl', function($scope, $routeParams, $http){
		$.post('/products/addproducts',  function(response){
			$scope.categories 	= response.categories;
			$scope.suppliers 	= response.suppliers;
			$scope.options 		= response.options;
		}, 'json');
	});

	// Product details Ctrl
	App.controller('ProductdetailsCtrl', function($scope, $routeParams, $http){
		var id = $routeParams.id;
		$http({
			method: 'POST',
			url: '/products/fx_edit_products',
			data: {id: id}
		}).then(function successCallback(response) {
			
			$scope.products	  = response.data.products;
			
		}, function errorCallback(response) {
			toastr.error("Error");
		});
		$.post('/products/addproducts',  function(response){
			$scope.conditions 	= response.conditions;
			$scope.categories 	= response.categories;
			$scope.suppliers 	= response.suppliers;
			$scope.options 		= response.options;
		}, 'json');

	});
	// AddProductsCtrl
	App.controller('AddinquiryCtrl', function($scope, $routeParams, $http){
		$scope.date = new Date();
	});

	// Products
	App.controller('ProductsCtrl', function($scope, $routeParams, $http){
		$('#firstDay').daterangepicker({ locale: { format: 'YYYY-MM-DD'  }, singleDatePicker: true});
		$('#lastDay').daterangepicker({ locale: { format: 'YYYY-MM-DD'  }, singleDatePicker: true });
		$scope.delete_product = function (id){
			//Delete Products
			jQuery("#fx_product_"+id).remove();
			$http({
				method: 'POST',
				url: '/products/deleteproducts',
				data: {id: id}
			}).then(function successCallback(response) {
				if (response.data.status == true) {
					toastr.success(response.data.message);
				} else {
					toastr.error(response.data.message);
				}
				$location.path('/products');
			}, function errorCallback(response) {
				toastr.error("Error");
			});
		}
		$http.get("/products/products_info").then(function (response) {
			$scope.products = response.data;
			// console.log($scope.products);
		});
	});

	App.controller('AddProductAct', function($scope, $http, $location){
		$scope.add_mtd = function() {
			jQuery(".menthod-product").append('<div class="mth-prd"><span class="col-md-5"><input type="text" placeholder="Label" name="" class="label123 form-control"></span><span class="col-md-6"><input type="text" placeholder="Value" name="" class="value123 form-control"></span><span class="col-md-1 remove-jtfd"><span class="btn btn-success"><i class="fa fa-trash-o"></i></span></span></div>');
			jQuery('.remove-jtfd').click(function(){
				jQuery(this).parent().remove();
			});
		};
		jQuery('.remove-jtfd').click(function(){
			jQuery(this).parent().remove();
		});
		$scope.btn_options = function(){
			var txt = $("#slt-options option:selected").text();
			var id = $("#slt-options option:selected").val();
			var parent_id = $("#slt-options option:selected").attr('parent_id');
			var parent_name = $("#slt-options option:selected").attr('parent_name');
			if (id != 'NULL') {
				jQuery('#tbody-options').append('<tr><td><input type="checkbox"></td><td><span class="tr_options_1" parant_id="'+parent_id+'" parant_name="'+parent_name+'" chil_name="'+txt+'" chil_id="'+id+'"><b>'+parent_name+'</b>: '+txt+'</span></td><td>None</td><td><span class="trash-option"><i class="fa fa-trash"></i></span></td></tr>')
			};
			jQuery('.trash-option').click(function(){
				jQuery(this).parent().parent().remove();
			});
		}

		$scope.frm_add_products = function(){
			
			var more = new Array();
			jQuery.each(jQuery('.mth-prd'), function(i, v) {
				if (jQuery(this).find('.label123').val() != '') {
					var label123 = jQuery(this).find('.label123').val();
					var value123 = jQuery(this).find('.value123').val();
					more.push({'label':label123,'value':value123});
				}
			});
			var options = new Array();
			jQuery.each(jQuery('.tr_options_1'), function(i, v) {
				var parent_id 	= jQuery(this).attr('parant_id');
				var parent_name = jQuery(this).attr('parant_name');
				var child_id 	= jQuery(this).attr('chil_id');
				var child_name 	= jQuery(this).attr('chil_name');
				options.push({'parent_id':parent_id,'parent_name':parent_name,'child_id':child_id, 'child_name': child_name });
			});

			$http({
				method: 'POST',
				url: '/products/customeradd',
				data: {"products": $scope.products, "options": options, "more": more}
				}).then(function successCallback(response) {
					toastr.success(response.data.message);
					if (response.data.status == true) {
						var id = response.data.id;
						if ($("#product-files").val() != '') {
							var info = new FormData();
							angular.forEach($scope.files, function(file, key){
								info.append('files[]', file);
							}); 
							info.append('id', id);
							$http.post("/products/addproductpics", info, {
								transformRequest: angular.identity,
								headers: {'Content-Type': undefined}
							})
							.success(function(response){
								console.log(response);
							})
							.error(function(){
							});
						}

					$location.path('/products');	
					} else {
						toastr.error(response.data.message);
					}
					
				}, function errorCallback(response) {
			});
		}
	});

	App.controller('EditProductAct', function($scope, $http, $location){
	});

	// Search Products 
	App.controller('SearchFormCtrl', function($scope, $http, $location){
		var date = new Date();
		$http({
			method: 'GET',
			url: '/products/set_product_date_session',
			}).then(function successCallback(response) {
				if (response.data != '') {
					$scope.firstDay = response.data;
				}else{
					$scope.firstDay = date.getFullYear()+'-'+('0' + (date.getMonth() + 1)).slice(-2)+ '-1';;
				}
			}, function errorCallback(response) {
			});
		
		$scope.lastDay = date.getFullYear()+'-'+('0' + (date.getMonth() + 1)).slice(-2)+ '-30';
		$scope.submitSearchForm = function(){
			var firstDay = jQuery("#firstDay").val();
			var lastDay = jQuery("#lastDay").val();
			$.ajax({
				type: "POST",
				url: "/products/set_product_date_session",
				data: {"firstDay": firstDay},
				cache: false,
				success: function(response) {
					console.log(response);
				}
			});
			$http({
				method: 'POST',
				url: '/products/searchproducts',
				data: {"data": $scope.formdata, "firstDay": firstDay, "lastDay": lastDay}
				}).then(function successCallback(response) {
					$scope.products = response.data;
					// console.log(response.data);
				}, function errorCallback(response) {

				});
		}
	});

	// InquiryCtrl
	App.controller('InquiryCtrl', function($scope, $routeParams, $http){
		$('#firstDay1').daterangepicker({ locale: { format: 'YYYY-MM-DD'  }, singleDatePicker: true, });
		$('#lastDay1').daterangepicker({ locale: { format: 'YYYY-MM-DD'  }, singleDatePicker: true, });

		$scope.delete_inq = function (id){
			//Delete Inquiry
			jQuery("#fx_inquiries_"+id).remove();
			$http({
				method: 'POST',
				url: '/inquiries/deleteinquiry',
				data: {id: id}
			}).then(function successCallback(response) {
				if (response.data.status == true) {
					toastr.success(response.data.message);
				} else {
					toastr.error(response.data.message);
				}
			}, function errorCallback(response) {
				toastr.error("Error");
			});
		}
		$http.get("/inquiries/inquiry_info").then(function (response) {
			$scope.inquiries = response.data;
			console.log($scope.inquiries);
		});
	});

	// Search Products 
	App.controller('InquirySearchFormCtrl', function($scope, $http, $location){
		var date = new Date();
		$http({
			method: 'GET',
			url: '/inquiries/set_inquiries_date_session',
			}).then(function successCallback(response) {
				if (response.data != '') {
					$scope.firstDay = response.data;
				}else{
					$scope.firstDay = date.getFullYear()+'-'+('0' + (date.getMonth() + 1)).slice(-2)+ '-01';;
				}
			}, function errorCallback(response) {
			});
		
		$scope.lastDay = date.getFullYear()+'-'+('0' + (date.getMonth() + 1)).slice(-2)+ '-30';
		$scope.InquirySearchForm = function(){
			var firstDay = jQuery("#firstDay1").val();
			var lastDay = jQuery("#lastDay1").val();
			$.ajax({ // set session 
				type: "POST",
				url: "/inquiries/set_inquiries_date_session",
				data: {"firstDay": firstDay},
				cache: false,
				success: function(response) {}
			});
			$http({
				method: 'POST',
				url: '/inquiries/searchinquiries',
				data: {"data": $scope.formdata, "firstDay": firstDay, "lastDay": lastDay}
				}).then(function successCallback(response) {
					$scope.inquiries = response.data;
				}, function errorCallback(response) {

				});
		}
	});
	// Orders details
	App.controller('OrdersCtrl', function($scope, $routeParams, $http){
		$http.get("/inquiries/order_info").then(function (response) {
			$scope.orders = response.data;
			$scope.delete_order = function (id){
				
				jQuery("#orders_obj_"+id).remove();
				$http({
					method: 'POST',
					url: '/inquiries/delete_order',
					data: {id: id}
				}).then(function successCallback(response) {
					toastr.success(response.data);
				}, function errorCallback(response) {
					toastr.error("Error");
				});
			}
		});
	});
	// Main User Page
	App.controller('WishlistCtrl', function($scope, $routeParams, $http){});

	App.controller('ViewCartCtrl', function($scope, $http){
		$http.get("/pages/getcartdata").then(function (response) {

			$scope.cart = response.data.cart;
			$scope.auth = response.data.auth;
			// console.log($scope.auth);
			$scope.date = new Date();
		});
	});

	App.controller('AddMyCartCtrl', function($scope, $http, $location) {
		$scope.removeitems = function(id) {
			jQuery('.cart_item_'+id).fadeOut();
			if (jQuery('.total-mini-cart-item').html() > 0) {
				var qty = parseInt(jQuery('.total-mini-cart-item').html())-1;
				jQuery('.total-mini-cart-item').html(qty);
			}
			$http({
				method: 'POST',
				url: '/products/remove_items',
				data: {id: id}
				}).then(function successCallback(response) {
				}, function errorCallback(response) {
				});
		};
		
		$scope.myfuncdown = function(id) {
			// Down quantity
			var qtyval = parseInt($('.qty-val-'+id).text(),10)-1;
			jQuery(".qty-val-"+id).html(qtyval);
		};

		$scope.myfuncup = function(id) {
			// Up quantity
			var qtyval = parseInt($('.qty-val-'+id).text(),10)+1;
			jQuery(".qty-val-"+id).html(qtyval);
		};

		$scope.update_cart = function (argument) {
			
			var products	= new Array();
			jQuery.each(jQuery('.cart_item_new'), function(i, v) {
				var product_id	= jQuery(this).attr('id');
				var quantity	= jQuery(this).find('.qty-val').html();
				var remark		= jQuery(this).find('.remark-item').val();
				products.push({'product_id':product_id,'quantity':quantity,'remark':remark, 'price': 0});
			});
			jQuery(".loader3").fadeIn();
			$http({
				method: 'POST',
				url: '/products/update_cart',
				data: {products: products}
			}).then(function successCallback(response) {
				jQuery(".loader3").fadeOut();
				toastr.success("Update cart successfully!");
			}, function errorCallback(response) {
				toastr.error("Error");
			});
		}
	});

	App.controller('OrderReceivedCtrl',function($scope, $routeParams, $http){
		var id = $routeParams.id;
		$.ajax({ 
			type: "POST",
			url: "/products/get_info_order",
			data: {"id": id},
			cache: false,
			success: function(response) {
				var data = jQuery.parseJSON(response);
				$scope.info = data;
				console.log($scope.info);
			}
		});
	})

	App.controller('PlaceOrderCtrl',function($scope, $http, $location){
		$scope.order_info = function(){
			// if ($scope.info.$valid) {
				jQuery(".loader3").fadeIn();
				$http({
					method: 'POST',
					url: '/products/place_order',
					data: $scope.user
				}).then(function successCallback(response) {
					// console.log(response.data);return;
					$location.path(response.data);
					jQuery('.total-mini-cart-item').html("0");
					jQuery('table #modal-mycart').html('');
					
				}, function errorCallback(response) {
					toastr.error("Error");
				});
			// }
			jQuery(".loader3").fadeOut();
		}
	})

	App.controller('CheckoutCtrl', function($scope, $http, $location){
		
		$http.get("/pages/getcartdata").then(function (response) {
			$scope.cart_new = response.data.cart;
			$scope.address = jQuery.parseJSON(response.data.billing_address.billing_address);
			$scope.log = jQuery.parseJSON(response.data.address);
			console.log($scope.address);
		});
		jQuery('.bill-information-heading').click(function(){
			jQuery('.bill-information-wrapper').toggleClass('hidden');
		});
		jQuery('#sbm-palce-order').click(function(){
			jQuery(".loader3").fadeIn();
			$http({
				method: 'POST',
				url: '/products/place_order',
			}).then(function successCallback(response) {
				// console.log(response.data);return;
				window.location.href ='/pages/accounts#/order_received/'+response.data;
				jQuery('.total-mini-cart-item').html("0");
				jQuery('table #modal-mycart').html('');
				jQuery(".loader3").fadeOut();
				
			}, function errorCallback(response) {
				toastr.error("Error");
			});
		});
		
	});

	App.controller('ProcesscheckoutCtrl', function($scope, $http){
		$http.get("/pages/getcartdata").then(function (response) {
			$scope.cart_new = response.data.cart;
		});
		
		jQuery('#create-account').click(function(){
			jQuery("#create-password").slideToggle();
		});
	});

	// Change Password Action
	App.controller('ChangePasswordAct', function($scope, $http, $location){  
		$scope.sbchange = function(){
			$http({
				method: 'POST',
				url: '/users/Change_password_art',
				data: $scope.formdata
				}).then(function successCallback(response) {
					if (response.data.status == true) {
						toastr.success(response.data.message);
						$location.path('/');
					} else {
						toastr.error(response.data.message);
					}
				}, function errorCallback(response) {

				});
		}
	});

	App.controller('PersonalInfomationAct', function($scope, $http, $location){
		$scope.form_info = function(){
			if ($scope.frm_info.$valid) {
			jQuery(".loader3").fadeIn();
			$http({
				method: 'POST',
				url: '/users/change_user_info_art',
				data: $scope.users
				}).then(function successCallback(response) {
					if (response.data.status == true) {
						toastr.success(response.data.message);
						$location.path('/');
					} else {
						toastr.error(response.data.message);
					}
				}, function errorCallback(response) {
				});
			jQuery(".loader3").fadeOut();
			}
			return;
		}
	});
	// Delete User
	App.controller('attachmentCtrl',  function($scope, $http, $location){  
		$scope.delete_attachments = function(id) {
			jQuery('#attachments-'+id).remove();
			$http({
				method: 'POST',
				url: '/inquiries/remove_file_attachment',
				data: {id: id}
			}).then(function successCallback(response) {
				toastr.success(response.data);
			});
		}
	});

	// Inquiry details Ctrl
	// App.controller('InquirydetailsCtrl', function($scope, $routeParams, $http){

	// 	var id = $routeParams.id;
	// 	$http({
	// 		method: 'POST',
	// 		url: '/inquiries/inquiries_details_ctrl',
	// 		data: {id: id}
	// 	}).then(function successCallback(response) {
	// 		$scope.inquiries 		= response.data.inquiries;
	// 		$scope.extras 			= response.data.inquiries.extras;
	// 		$scope.attachments 		= response.data.inquiries.attachments;
	// 		$scope.total 			= response.data.total;
	// 		$scope.commission 		= ($scope.total*$scope.inquiries.commission)/100;
	// 		$scope.add_commission 	= ($scope.total*$scope.inquiries.add_commission)/100;
	// 		$scope.discount 		= ($scope.total*$scope.inquiries.discount)/100;
	// 		$scope.grand_total		= ($scope.total+$scope.commission+$scope.add_commission-$scope.discount);
	// 		if ($("#grid").length){
	// 			var sampleData = response.data.data;
	// 			var type = jQuery('#grid').attr('type');
	// 			var sampleDataNextID = sampleData.length + 1;
	// 			function getIndexById(id) {
	// 				var idx,
	// 					l = sampleData.length;

	// 				for (var j=0; j < l; j++) {
	// 					if (sampleData[j].ProductID == id) {
	// 						return j;
	// 					}
	// 				}
	// 				return null;
	// 			}
	// 			var dataSource = new kendo.data.DataSource({
	// 				transport: {
	// 					read: function (e) {e.success(sampleData);
	// 					},
	// 					create: function (e) {
	// 						// e.data.ProductID = sampleDataNextID++;
	// 						// e.success(e.data);	
	// 						// var id = jQuery('.item-unavailable').attr('id');
	// 						// jQuery.ajax({
	// 						// 	url: '/inquiries/create_inq',
	// 						// 	type: 'POST',
	// 						// 	data: {"data":e.data, 'id': id},
	// 						// 	dataType: 'html',
	// 						// 	cache: false,
	// 						// 	beforeSend: function(){jQuery("#loader").fadeIn();},
	// 						// 	success: function(response){
	// 						// 		jQuery("#loader").fadeOut();
	// 						// 	}
	// 						// });
	// 					},
	// 					update: function (e) {
	// 						// sampleData[getIndexById(e.data.ProductID)] = e.data;
	// 						// e.data.final_total = e.data.price*e.data.quantity;
	// 						// e.success();
	// 						// jQuery.ajax({
	// 						// 	url: '/inquiries/update_inq',
	// 						// 	type: 'POST',
	// 						// 	data: {"data":e.data,'type': type},
	// 						// 	dataType: 'html',
	// 						// 	cache: false,
	// 						// 	beforeSend: function(){jQuery(".loader3").fadeIn();},
	// 						// 	success: function(response){
	// 						// 		jQuery(".loader3").fadeOut();
	// 						// 		var data = jQuery.parseJSON(response);
	// 						// 		var grid = $('#grid').data("kendoGrid");
	// 						// 		grid.dataSource.read();
	// 						// 		grid.dataSource.refresh;
	// 						// 		jQuery('#total-price').val(data.Total);
	// 						// 		jQuery('#discount-price').val(data.discount);
	// 						// 	}
	// 						// });
							
	// 					},
	// 					destroy: function (e) {
	// 					}
	// 				},
	// 				error: function (e) {
	// 					// handle data operation error
	// 					alert("Status: " + e.status + "; Error message: " + e.errorThrown);
	// 				},
	// 				pageSize: 30,
	// 				batch: false,
	// 				schema: {
	// 					model: {
	// 						id: "ProductID",
	// 						fields: {
	// 							ProductID: { editable: false, nullable: true },
	// 							// choose: {editable: false},
	// 							no: {editable: false},
	// 							name: {editable: false},
	// 							maker_type_ref: {editable: false},
	// 							partno:  {editable: false},
	// 							unit: {editable: false},
	// 							quantity: {},
	// 							price: {editable: false},
	// 							final_total: {editable: false},
	// 							delivery_time: {editable: false},
	// 							remark: {},
	// 						}
	// 					}
	// 				}
	// 			});

	// 			var grid = $("#grid").kendoGrid({
	// 				dataSource: dataSource,
	// 				pageable: true,
	// 				navigatable: true,
	// 				// toolbar: ["save", "cancel",{ template: '<button class="k-button" id="btn-delete-kendo"><span class="k-icon k-i-close"></span>Delete</button>'  }],
	// 				columns: [
	// 					// { field: "choose",editable: false, nullable: true, title: "Choose", width: "65px" , template: "<input type='checkbox' class='checkbox' />" },
	// 					{ field: "no",editable: false, nullable: true, title: "S.No", width: "45px" },
	// 					{ field: "name", title: "Description", width: "240px" },
	// 					{ field: "maker_type_ref", title: "Maker/Type Ref", width: "120px" },
	// 					{ field: "partno", title: "PartNo", width: "80px" },
	// 					{ field: "unit", title:"Units", width: "50px" },
	// 					{ field: "quantity",title:"Quantity", width: "70px" },
	// 					{ field: "price",title:"Price(USD)", width: "80px" },
	// 					{ field: "final_total",title:"Total(USD)", width: "80px" },
	// 					{ field: "delivery_time",title:"Delivery Time(day)", width: "130px" },
	// 					{ field: "remark",title:"Remark", width: "150px" },
	// 					// { command: [ "destroy"], title: "&nbsp;", width: "100px" }
	// 				],
	// 				editable: true
	// 			}).data("kendoGrid");

	// 			grid.table.on("click", ".checkbox" , selectRow);

	// 			$("#btn-delete-kendo").bind("click", function () {
	// 				var type = jQuery("#grid").attr("data-type");
	// 				var inquiry_id = jQuery("#grid").attr("inquiry_id");
	// 				var checked = [];
	// 				for(var i in checkedIds){
	// 					if(checkedIds[i]){
	// 						checked.push(i);
	// 					}
	// 				}
					
	// 				jQuery.ajax({
	// 					url: '/inquiries/delete_item_products',
	// 					type: 'POST',
	// 					data: {"data":checked, "type":type,"inquiry_id":inquiry_id,"font_end": '1'},
	// 					dataType: 'json',
	// 					cache: false,
	// 					beforeSend: function(){
	// 						jQuery("#loader").fadeIn();
	// 					},
	// 					success: function(response){
	// 						jQuery("#loader").fadeOut();
	// 						var grid = $('#grid').data("kendoGrid");
	// 						grid.dataSource.data(response);
	// 						grid.dataSource.refresh;
	// 						// console.log(response);
	// 						return false;
	// 					}
	// 				});
	// 			});

	// 			var checkedIds = {};

	// 			//on click of the checkbox:
	// 			function selectRow() {
	// 				var checked = this.checked,
	// 				row = $(this).closest("tr"),
	// 				grid = $("#grid").data("kendoGrid"),
	// 				dataItem = grid.dataItem(row);
	// 				checkedIds[dataItem.id] = checked;
	// 				if (checked) {
	// 					//-select the row
	// 					row.addClass("k-state-selected");
	// 				} else {
	// 					//-remove selection
	// 					row.removeClass("k-state-selected");
	// 				}
	// 			}

	// 			//on dataBound event restore previous selected rows:
	// 			function onDataBound(e) {
	// 				var view = this.dataSource.view();
	// 				for(var i = 0; i < view.length;i++){
	// 					if(checkedIds[view[i].id]){
	// 						this.tbody.find("tr[data-uid='" + view[i].uid + "']")
	// 						.addClass("k-state-selected")
	// 						.find(".checkbox")
	// 						.attr("checked","checked");
	// 					}
	// 				}
	// 			}
	// 		}

	// 	}, function errorCallback(response) {
	// 		toastr.error("Error");
	// 	});
	// });

	// DeliveryAddressCtrl
	App.controller('DeliveryAddressCtrl', function($scope, $routeParams, $http){
		$http({
			method: 'GET',
			url: '/users/Delivery_address_ctrl',
			}).then(function successCallback(response) {
				var data = jQuery.parseJSON(response.data.delivery_address);
				$scope.formdata = data;
			}, function errorCallback(response) {
			}
		);
	});

	App.controller("Delivery_Form_Ctrl", function($scope){
		$scope.fr_delivery_address = function(){
			jQuery(".loader3").fadeIn();
			$.ajax({
				type: "POST",
				url: "/users/Delivery_address_ctrl",
				data:  $scope.formdata,
				cache: false,
				success: function(response) {
					toastr.success(response);
				},
				error: function(response){
					toastr.error(response);
				}
			});
			jQuery(".loader3").fadeOut();
		}
	});


	App.controller('BillingAddressCtrl', function($scope, $http, $location){
		$http({
			method: 'GET',
			url: '/users/billing_address_ctrl',
			}).then(function successCallback(response) {
				var data = jQuery.parseJSON(response.data.billing_address);
				$scope.formdata = data;
			}, function errorCallback(response) {
			}
		);
	});

	App.controller("Billing_Form_Ctrl", function($scope, $routeParams, $http){
		$scope.fr_bulling_address = function(){
			jQuery(".loader3").fadeIn();
			$.ajax({
				type: "POST",
				url: "/users/billing_address_ctrl",
				data:  $scope.formdata,
				cache: false,
				success: function(response) {
					toastr.success(response);
				},
				error: function(response){
					toastr.error(response);
				}
			});
			jQuery(".loader3").fadeOut();
		}
	});

}());
