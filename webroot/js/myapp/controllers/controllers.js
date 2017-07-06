(function() {

	"use strict";

	var App = angular.module("App.controllers", []);

	// Main User Page
	App.controller('IndexCtrl', function($scope, $routeParams, $http){
		$http.get("/pages/account_info").then(function (response) {
			$scope.users = response.data;
		});
	});

	// Change Password
	App.controller('ChangePasswordCtrl', function($scope, $routeParams, $http){
		$http.get("/pages/account_info").then(function (response) {
			$scope.users = response.data;
		});
	});

	// Personal Infomation
	App.controller('PersonalInfomationCtrl', function($scope, $routeParams, $http){
		$http.get("/pages/account_info").then(function (response) {
			$scope.users = response.data;
		});
	});

	// AddProductsCtrl
	App.controller('AddProductsCtrl', function($scope, $routeParams, $http){
		$.post('/products/addproducts',  function(response){
			console.log(response);
			$scope.categories	= response;
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
			$scope.products	= response.data.products;
			$scope.images	= response.data.products.images;
			$scope.categories = response.data.categories;
			
		}, function errorCallback(response) {
			toastr.error("Error");
		});

	});

	// AddProductsCtrl
	App.controller('AddinquiryCtrl', function($scope, $routeParams, $http){
		// $http.get("/pages/account_info").then(function (response) {
		// 	$scope.users = response.data;
		// });
	});
	

	// View User
	// App.controller('ViewCtrl', function($scope, $routeParams, $http){
	// 	var id = $routeParams.id;
	// 	var table = "users";
	// 	var key = 'View';
	// 	$http.get("/js/myapp/select.php?id=" +id+ "&table=" +table+ "&key=" +key).then(function (response) {
	// 		// console.log(response.data);
	// 		$scope.users = response.data;
	// 	});
	// });

	// Add New User
	// App.controller('AddCtrl', function($scope, $routeParams, $http){
	// 	var table = "users";
	// 	var key = "Add";
	// 	$http.get("/js/myapp/select.php?table=" +table+ "&key=" +key).then(function (response) {
	// 		$scope.groups = response.data.groups;
	// 		$scope.teams = response.data.teams;
	// 	});
	// });

	// Products
	App.controller('ProductsCtrl', function($scope, $routeParams, $http){
		$http.get("/pages/products_info").then(function (response) {
			$scope.products = response.data;
		});
	});
	// Main User Page
	App.controller('InquiryCtrl', function($scope, $routeParams, $http){
		$http.get("/inquiries/inquiry_info").then(function (response) {
			// console.log(response.data);
			$scope.inquiries = response.data;
		});
	});
	// Main User Page
	App.controller('WishlistCtrl', function($scope, $routeParams, $http){
		// $http.get("/pages/account_info").then(function (response) {
		// 	$scope.users = response.data;
		// });
	});

	// App.controller("AddUsersCtrl", function($scope, $http, $location){  
	// 	$scope.uploadFile = function(){  
	// 		var form_data = new FormData();  
	// 		if (jQuery("#files-upload").val() != '') {
	// 			for (var i = 0; i < $scope.files.length; i++) {
	// 				form_data.append('files', $scope.files[i]);  
	// 			};
	// 		}
	// 		form_data.append('username', jQuery('#username').val());
	// 		form_data.append('password', jQuery('#password').val());
	// 		form_data.append('fullname', jQuery('#fullname').val());
	// 		form_data.append('role', jQuery('#role').val());
	// 		form_data.append('group_id', jQuery('#Group').val());
	// 		form_data.append('team_id', jQuery('#Team').val());
	// 		$http.post('/users/add', form_data, {
	// 			transformRequest: angular.identity,
	// 			headers: {'Content-Type': undefined,'Process-Data': false}
	// 		})
	// 		.success(function(response){
	// 			$location.path('/');
	// 			// console.log(response);
	// 		})
	// 		.error(function(){
	// 			console.log("Error");
	// 		});
	// 	}
	// });

	// Edit User
	// App.controller('EditCtrl', function($scope, $routeParams, $http){
	// 	var id = $routeParams.id;
	// 	var table = "users";
	// 	var key = 'Edit';
	// 	$http.get("/js/myapp/select.php?id=" +id+ "&table=" +table+ "&key=" +key).then(function (response) {
	// 		$scope.users = response.data.records;
	// 		$scope.groups = response.data.groups;
	// 		$scope.teams = response.data.teams;
	// 	});
	// });

	// App.controller('EditUsersCtrl', function($scope, $routeParams, $http, $location){
	// 	var id = $routeParams.id;
	// 	var table = "users";
	// 	$scope.EditFromData = function() {
	// 		var username 	= jQuery('.an_username').val();
	// 		var password 	= jQuery('.an_password').val();
	// 		var fullname 	= jQuery('.an_fullname').val();
	// 		var role 		= jQuery('.an_role').val();
	// 		var g = document.getElementById("ddlViewByGroup");
	// 		var group_id = g.options[g.selectedIndex].value;
	// 		var t = document.getElementById("ddlViewByTeam");
	// 		var team_id = t.options[t.selectedIndex].value;
	// 		$scope.info = ({
	// 			'id' 		: id,
	// 			'username'	: username,
	// 			'password'	: password,
	// 			'fullname'	: fullname,
	// 			'role'		: role,
	// 			'group_id'	: group_id,
	// 			'team_id'	: team_id
	// 		});
	// 		$http({
	// 			method	: 'POST',
	// 			url 	: '/js/myapp/edit.php?table='+table,
	// 			data 	: $scope.info,
	// 			headers : {'Content-Type' : 'application/x-www-form-urlencoded'} 
	// 		}).success(function(data){
	// 				$location.path('/'); // working
	// 		});
	// 	}
	// });
	// Delete User
	// App.controller("DeleteCtrl", function($scope, $routeParams, $http, $location){
	// 	var id = $routeParams.id;
	// 	var table = 'users';
	// 	var array = [id, table];
	// 	$http.get("/js/myapp/delete.php?id=" +id+ "&table=" +table).then(function(response){
	// 		$location.path('/');
	// 	});
	// });
	// Delete Product Ctrl
	App.controller("DeleteProductCtrl", function($scope, $routeParams, $http, $location){
		var id = $routeParams.id;
		$http({
			method: 'POST',
			url: '/products/deleteproducts',
			data: {id: id}
		}).then(function successCallback(response) {
			// console.log(response.data);
			if (response.data.status == true) {
				toastr.success(response.data.message);
			} else {
				toastr.error(response.data.message);
			}
		}, function errorCallback(response) {
			toastr.error("Error");
		});
		$location.path('/products');
	});
	// Delete Inquiry Ctrl
	App.controller("DeleteInquiryCtrl", function($scope, $routeParams, $http, $location){
		var id = $routeParams.id;
		$http({
			method: 'POST',
			url: '/inquiries/deleteinquiry',
			data: {id: id}
		}).then(function successCallback(response) {
			// console.log(response.data);
			if (response.data.status == true) {
				toastr.success(response.data.message);
			} else {
				toastr.error(response.data.message);
			}
		}, function errorCallback(response) {
		   toastr.error("Error");
		});
		$location.path('/inquiry');
	});
	// Change Password Action
	App.controller('ChangePasswordAct', function($scope, $http, $location){  
		$scope.sbchange = function(){
			var form_data = new FormData();
			form_data.append('current_password', jQuery('.current_password').val());
			form_data.append('password', jQuery('.password').val());
			form_data.append('confirm_password', jQuery('.confirm_password').val());
			form_data.append('captcha', jQuery('#captcha').val());
			$http.post('/users/Change_password_art', form_data, {
				transformRequest: angular.identity,
				headers: {'Content-Type': undefined,'Process-Data': false}
			})
			.success(function(response){
				if (response.status == true) {
					toastr.success(response.message);
					$location.path('/');
				} else {
					toastr.error(response.message);
				}
			})
			.error(function(){
				console.log("Error");
			});
		}
	});
	

	App.controller('ChangeUserInfoAct', function($scope, $http, $location){  
		$scope.sbuserinfo = function(){
			var form_data = new FormData();
			form_data.append('id', jQuery('.users_id').val());
			form_data.append('username', jQuery('.username').val());
			form_data.append('fullname' , jQuery('.fullname').val());
			form_data.append('email', jQuery('.email').val());
			form_data.append('tel', jQuery('.tel').val());
			form_data.append('address', jQuery('.address').val());
			form_data.append('description', jQuery('.description').val());
			form_data.append('captcha', jQuery('#captcha').val());
			$http.post('/users/change_user_info_art', form_data, {
				transformRequest: angular.identity,
				headers: {'Content-Type': undefined,'Process-Data': false}
			})
			.success(function(response){
				if (response.status == true) {
					toastr.success(response.message);
					$location.path('/');
				} else {
					toastr.error(response.message);
				}
			})
			.error(function(){
				console.log("Error");
			});
		}
	});
	// Delete User
	App.controller('attachmentCtrl',  function($scope, $http, $location){  
		$scope.go = function() {
			var id = jQuery(".remove-file-att").attr('id');
			jQuery('#attachments-'+id).remove();
			$http({
				method: 'POST',
				url: '/inquiries/remove_file_attachment',
				data: {id: id}
			}).then(function successCallback(response) {
				console.log(response);
			});
			toastr.success('The Attachments has been deleted.');
		}
	});


	// Inquiry details Ctrl
	App.controller('InquirydetailsCtrl', function($scope, $routeParams, $http){
		var id = $routeParams.id;
		$http({
			method: 'POST',
			url: '/inquiries/inquiries_details_ctrl',
			data: {id: id}
		}).then(function successCallback(response) {
			$scope.inquiries 		= response.data.inquiries;
			$scope.extras 			= response.data.inquiries.extras;
			$scope.attachments 		= response.data.inquiries.attachments;
			$scope.total 			= response.data.total;
			$scope.commission 		= ($scope.total*$scope.inquiries.commission)/100;
			$scope.add_commission 	= ($scope.total*$scope.inquiries.add_commission)/100;
			$scope.discount 		= ($scope.total*$scope.inquiries.discount)/100;
			$scope.grand_total	 	= ($scope.total+$scope.commission+$scope.add_commission-$scope.discount);
			if ($("#grid").length){
				var sampleData = response.data.data;
				var type = jQuery('#grid').attr('type');
				var sampleDataNextID = sampleData.length + 1;
				function getIndexById(id) {
					var idx,
						l = sampleData.length;

					for (var j=0; j < l; j++) {
						if (sampleData[j].ProductID == id) {
							return j;
						}
					}
					return null;
				}
				var dataSource = new kendo.data.DataSource({
					transport: {
						read: function (e) {e.success(sampleData);
						},
						create: function (e) {
							// e.data.ProductID = sampleDataNextID++;
							// e.success(e.data);	
							// var id = jQuery('.item-unavailable').attr('id');
							// jQuery.ajax({
							// 	url: '/inquiries/create_inq',
							// 	type: 'POST',
							// 	data: {"data":e.data, 'id': id},
							// 	dataType: 'html',
							// 	cache: false,
							// 	beforeSend: function(){jQuery("#loader").fadeIn();},
							// 	success: function(response){
							// 		jQuery("#loader").fadeOut();
							// 	}
							// });
						},
						update: function (e) {
							// sampleData[getIndexById(e.data.ProductID)] = e.data;
							// e.data.final_total = e.data.price*e.data.quantity;
							// e.success();
							// jQuery.ajax({
							// 	url: '/inquiries/update_inq',
							// 	type: 'POST',
							// 	data: {"data":e.data,'type': type},
							// 	dataType: 'html',
							// 	cache: false,
							// 	beforeSend: function(){jQuery(".loader3").fadeIn();},
							// 	success: function(response){
							// 		jQuery(".loader3").fadeOut();
							// 		var data = jQuery.parseJSON(response);
							// 		var grid = $('#grid').data("kendoGrid");
							// 		grid.dataSource.read();
							// 		grid.dataSource.refresh;
							// 		jQuery('#total-price').val(data.Total);
							// 		jQuery('#discount-price').val(data.discount);
							// 	}
							// });
							
						},
						destroy: function (e) {
						}
					},
					error: function (e) {
						// handle data operation error
						alert("Status: " + e.status + "; Error message: " + e.errorThrown);
					},
					pageSize: 30,
					batch: false,
					schema: {
						model: {
							id: "ProductID",
							fields: {
								ProductID: { editable: false, nullable: true },
								// choose: {editable: false},
								no: {editable: false},
								name: {editable: false},
								maker_type_ref: {editable: false},
								partno:  {editable: false},
								unit: {editable: false},
								quantity: {},
								price: {editable: false},
								final_total: {editable: false},
								delivery_time: {editable: false},
								remark: {},
							}
						}
					}
				});

				 var grid = $("#grid").kendoGrid({
					dataSource: dataSource,
					pageable: true,
					navigatable: true,
					// toolbar: ["save", "cancel",{ template: '<button class="k-button" id="btn-delete-kendo"><span class="k-icon k-i-close"></span>Delete</button>'  }],
					columns: [
						// { field: "choose",editable: false, nullable: true, title: "Choose", width: "65px" , template: "<input type='checkbox' class='checkbox' />" },
						{ field: "no",editable: false, nullable: true, title: "S.No", width: "45px" },
						{ field: "name", title: "Description", width: "240px" },
						{ field: "maker_type_ref", title: "Maker/Type Ref", width: "120px" },
						{ field: "partno", title: "PartNo", width: "80px" },
						{ field: "unit", title:"Units", width: "50px" },
						{ field: "quantity",title:"Quantity", width: "70px" },
						{ field: "price",title:"Price(USD)", width: "80px" },
						{ field: "final_total",title:"Total(USD)", width: "80px" },
						{ field: "delivery_time",title:"Delivery Time(day)", width: "130px" },
						{ field: "remark",title:"Remark", width: "150px" },
						// { command: [ "destroy"], title: "&nbsp;", width: "100px" }
					],
					editable: true
				}).data("kendoGrid");

				grid.table.on("click", ".checkbox" , selectRow);

				$("#btn-delete-kendo").bind("click", function () {
					var type = jQuery("#grid").attr("data-type");
					var inquiry_id = jQuery("#grid").attr("inquiry_id");
					var checked = [];
					for(var i in checkedIds){
						if(checkedIds[i]){
							checked.push(i);
						}
					}
					
					jQuery.ajax({
						url: '/inquiries/delete_item_products',
						type: 'POST',
						data: {"data":checked, "type":type,"inquiry_id":inquiry_id,"font_end": '1'},
						dataType: 'json',
						cache: false,
						beforeSend: function(){
							jQuery("#loader").fadeIn();
						},
						success: function(response){
							jQuery("#loader").fadeOut();
							var grid = $('#grid').data("kendoGrid");
							grid.dataSource.data(response);
							grid.dataSource.refresh;
							// console.log(response);
							return false;
						}
					});
				});

				var checkedIds = {};

				//on click of the checkbox:
				function selectRow() {
					var checked = this.checked,
					row = $(this).closest("tr"),
					grid = $("#grid").data("kendoGrid"),
					dataItem = grid.dataItem(row);
					checkedIds[dataItem.id] = checked;
					if (checked) {
						//-select the row
						row.addClass("k-state-selected");
					} else {
						//-remove selection
						row.removeClass("k-state-selected");
					}
				}

				//on dataBound event restore previous selected rows:
				function onDataBound(e) {
					var view = this.dataSource.view();
					for(var i = 0; i < view.length;i++){
						if(checkedIds[view[i].id]){
							this.tbody.find("tr[data-uid='" + view[i].uid + "']")
							.addClass("k-state-selected")
							.find(".checkbox")
							.attr("checked","checked");
						}
					}
				}
			}

		}, function errorCallback(response) {
			toastr.error("Error");
		});
	});
}());