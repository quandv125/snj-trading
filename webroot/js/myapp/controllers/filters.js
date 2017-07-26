(function () {

	"use strict";

	var App = angular.module("App.filters",[]);

	App.filter('cut', function () {
	// Example {{product.product_name | cut: true : 50 :' ...'}}
		return function (value, wordwise, max, tail) {
			if (!value) return '';
			max = parseInt(max, 10);
			if (!max) return value;
			if (value.length <= max) return value;
			value = value.substr(0, max);
			if (wordwise) {
				var lastspace = value.lastIndexOf(' ');
				if (lastspace !== -1) {
				  //Also remove . and , so its gives a cleaner result.
				  if (value.charAt(lastspace-1) === '.' || value.charAt(lastspace-1) === ',') {
					lastspace = lastspace - 1;
				  }
				  value = value.substr(0, lastspace);
				}
			}
			return value + (tail || ' …');
		};
	});
 	
	App.filter('label', function() {
		return function(value){
			if (value == true) {
				var html = 'Actived';
			} else {
				var html = 'Deactived';
			}
			return html;
		};
	});

	App.filter('classlabel', function() {
		return function(value){
			if (value == true) {
				var html = 'primary';
			} else {
				var html = 'danger';
			}
			return html;
		};
	});
}());