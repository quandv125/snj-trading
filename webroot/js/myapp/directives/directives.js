(function() {

  "use strict";

  var App = angular.module("App.directives",[]);
// you may add as much directives as you want below

  App.directive("fileInput", function($parse){  
    return{
        link: function($scope, element, attrs){  
          element.on("change", function(event){  
            var files = event.target.files;  
            $parse(attrs.fileInput).assign($scope, element[0].files);  
            $scope.$apply();  
          });
      }
    }
  }); 

}());