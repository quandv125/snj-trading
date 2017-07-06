// <body ng-app='myApp' binds to the app being created below.
var app = angular.module('myApp', []);

// Register MyController object to this app
 
app.controller("CostCtrl",function($scope){
	// $scope.total = jQuery('#sub-total-inquiries').attr("value");

	// #####  Commission in inquiries/quotations ###### //
	$scope.commission = jQuery('#commission-inquiry').attr("val");
	$scope.r_commission = function() {
		$scope.total = jQuery('#sub-total-inquiries').attr("value");

		var extra_cost = jQuery("#ArrID").attr('cost');
		var price =  ($scope.commission*$scope.total)/100;
		
		return price.format(2, 3, '', '');;
	}
	$('#commission-inquiry').on('change',(function(event) {
		var commission = $scope.commission;
		var inquiry_id = $("#ArrID").attr('inquiry_id');
		jQuery.ajax({
			url: '/inquiries/set_commission_inquiries',
			type: 'POST',
			data: {commission: commission, inquiry_id:inquiry_id},
			// beforeSend: function(){ jQuery("#loader").fadeIn(); },
			// success: function(response){ jQuery("#loader").fadeOut(); } 
		});
	})); // END

	// #####  Add_Commission in inquiries/quotations ###### //
	$scope.add_commission = jQuery('#add-commission-inquiry').attr("val");
	$scope.r_add_commission = function() {
		$scope.total = jQuery('#sub-total-inquiries').attr("value");
		var extra_cost = jQuery("#ArrID").attr('cost');
		var price = ($scope.add_commission*$scope.total)/100;
		
		return price.format(2, 3, '', '');;
	}
	$('#add-commission-inquiry').on('change',(function(event) {
		var add_commission = $scope.add_commission;
		var inquiry_id = $("#ArrID").attr('inquiry_id');
		jQuery.ajax({
			url: '/inquiries/set_add_commission_inquiries',
			type: 'POST',
			data: {add_commission: add_commission, inquiry_id:inquiry_id},
			// beforeSend: function(){ jQuery("#loader").fadeIn(); },
			// success: function(response){ jQuery("#loader").fadeOut(); } 
		});
	})); // END

	// #####  Discount in inquiries/quotations ###### //
	$scope.discount = jQuery('#discount-inquiry').attr("val");
	$scope.r_discount = function() {
		$scope.total = jQuery('#sub-total-inquiries').attr("value");
		var extra_cost = jQuery("#ArrID").attr('cost');
		var price = ($scope.discount*$scope.total)/100;
		
		return price.format(2, 3, '', '');;
	}
	$('#discount-inquiry').on('change',(function(event) {
		var discount = $scope.discount;
		var inquiry_id = $("#ArrID").attr('inquiry_id');
		jQuery.ajax({
			url: '/inquiries/set_discount_inquiries',
			type: 'POST',
			data: {discount: discount, inquiry_id: inquiry_id},
			// beforeSend: function(){ jQuery("#loader").fadeIn(); },
			// success: function(response){ jQuery("#loader").fadeOut(); } 
		});
	})); // END

	$scope.r_grand_total = function() {
		var extra_cost = jQuery("#ArrID").attr('cost');
		var price = parseFloat(extra_cost) + parseFloat($scope.r_commission()) + parseFloat($scope.r_add_commission()) - parseFloat($scope.r_discount());
		var grand_total = parseFloat(price) + parseFloat($scope.total);
		return grand_total.format(2, 3, '', '');
	}

	Number.prototype.format = function(n, x, s, c) {
		 var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
			 num = this.toFixed(Math.max(0, ~~n));
		
		return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ''));
	};
});




