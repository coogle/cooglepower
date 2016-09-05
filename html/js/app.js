angular.module('ionicApp', ['ionic'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('[[');
	$interpolateProvider.endSymbol(']]');
})

.controller('MainCtrl', function($scope) {

  $scope.settingsList = __outletStatuses;

  $scope.outletSwitchChanged = function(gpio, state) {
	  
	  var outletState = state ? "on" : 'off';
		  
	  // This is a *total* hack, we keep retrying the command
	  // until it works (within reason) because the underlying
	  // wriringPi / wiringPiPHP library is total shit for a web
	  // env. I really need to just write my own.
	  $.ajax({
		    url : '/api/gpio/' + gpio + '/' + outletState,
		    type : 'POST',
		    data :  [],   
		    tryCount : 0,
		    retryLimit : 5,
		    success : function(json) {
		    	if(!json.success) {
		    		alert("There was an error on the server.");
		    	} 
		    },
		    error : function(xhr, textStatus, errorThrown ) {
	            this.tryCount++;
	            if (this.tryCount <= this.retryLimit) {
	                //try again
	                $.ajax(this);
	                return;
	            }

	            alert("An error has occurred");
		    }
		});
		  
  };
  
});