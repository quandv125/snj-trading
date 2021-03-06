(function() {

  "use strict";

	var App = angular.module("myapp", [
		"App.controllers",
		"App.services",
		"App.directives",
		"App.filters",
		"ngRoute",
		"ngResource",
		"ngAnimate",
		"ngMaterial",
		"ngMessages",
		"ngProgress",
		"ckeditor"
	]);

  	App.config(function($routeProvider, $locationProvider) {
		$routeProvider
		.when('/', {
			controller: "IndexCtrl",
			templateUrl: "/js/myapp/templates/accounts/index.html"
		})
		.when('/changepassword', {
			controller: "ChangePasswordCtrl",
			templateUrl: "/js/myapp/templates/accounts/changepassword.html"
		})
		.when('/personalinfomation', {
			controller: "PersonalInfomationCtrl",
			templateUrl: "/js/myapp/templates/accounts/personalinfomation.html"
		})
		.when('/view/:id', {
			controller: "ViewCtrl",
			templateUrl: "/js/myapp/templates/accounts/view.html"
		})
		.when('/addusers', {
			controller: "AddCtrl",
			templateUrl: "/js/myapp/templates/accounts/add.html"
		})
		.when('/editusers/:id', {
			controller: "EditCtrl",
			templateUrl: "/js/myapp/templates/accounts/edit.html"
		})
		.when('/deleteusers/:id',{
			controller: "DeleteCtrl",
			templateUrl: "/js/myapp/templates/accounts/delete.html"
		})
		// PRODUCTS
		.when('/products',{
			controller: "ProductsCtrl",
			templateUrl: "/js/myapp/templates/accounts/products.html"
		})
		.when('/addproducts', {
			controller: "AddProductsCtrl",
			templateUrl: "/js/myapp/templates/accounts/addproducts.html"
		})
		.when('/productdetails/:id', {
			controller: "ProductdetailsCtrl",
			templateUrl: "/js/myapp/templates/accounts/productdetails.html"
		})
		.when('/delete-products/:id',{
			controller: "DeleteProductCtrl",
			templateUrl: "/js/myapp/templates/accounts/delete.html"
		})
		// END
		// INQUIRY
		.when('/inquiry',{
			controller: "InquiryCtrl",
			templateUrl: "/js/myapp/templates/accounts/inquiry.html"
		})
		.when('/addinquiry', {
			controller: "AddinquiryCtrl",
			templateUrl: "/js/myapp/templates/accounts/addinquiry.html"
		})
		.when('/inquirydetails/:id', {
			controller: "InquirydetailsCtrl",
			templateUrl: "/js/myapp/templates/accounts/inquirydetails.html"
		})
		.when('/delete-inquiry/:id',{
			controller: "DeleteInquiryCtrl",
			templateUrl: "/js/myapp/templates/accounts/delete.html"
		})
		// End
		.when('/orders',{
			controller: "OrdersCtrl",
			templateUrl: "/js/myapp/templates/accounts/orders.html"
		})
		.when('/wishlist',{
			controller: "WishlistCtrl",
			templateUrl: "/js/myapp/templates/accounts/wishlist.html"
		})
		.when('/viewcart',{
			controller: "ViewCartCtrl",
			templateUrl: "/js/myapp/templates/accounts/viewcart.html"
		})
		.when('/checkout',{
			controller: "CheckoutCtrl",
			templateUrl: "/js/myapp/templates/accounts/checkout.html"
		})
		.when('/process_checkout',{
			controller: "ProcesscheckoutCtrl",
			templateUrl: "/js/myapp/templates/accounts/process_checkout.html"
		})
		.when('/delivery_address',{
			controller: "DeliveryAddressCtrl",
			templateUrl: "/js/myapp/templates/accounts/delivery_address.html"
		})
		.when('/order_received/:id',{
			controller: "OrderReceivedCtrl",
			templateUrl: "/js/myapp/templates/accounts/order_received.html"
		})
		.when('/billing_address',{
			controller: "BillingAddressCtrl",
			templateUrl: "/js/myapp/templates/accounts/billing_address.html"
		})
		.when('/exchange',{
			controller: "ExchangeCtrl",
			templateUrl: "/js/myapp/templates/accounts/exchange.html"
		})
		.otherwise({
			templateUrl: "/js/myapp/templates/404/404.html"
		});
	});
}());
