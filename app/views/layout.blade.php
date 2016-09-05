<!DOCTYPE html>
<html ng-app="ionicApp">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    
    <title>Toggles</title>

    <link href="//code.ionicframework.com/nightly/css/ionic.css" rel="stylesheet">
    <script src="//code.ionicframework.com/nightly/js/ionic.bundle.js"></script>

    <script>
		var __outletStatuses = {{ json_encode($outlets) }};
    </script>
    
    <script src="//code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="/js/app.js"></script>
  </head>

  <body ng-controller="MainCtrl">
    
    <ion-header-bar class="bar-positive">
      <h1 class="title">CooglePower Controls</h1>
    </ion-header-bar>
             
    <ion-content>
      
      <div class="list">
        
        <ion-toggle ng-repeat="item in settingsList"
                    ng-model="item.checked" 
                    ng-checked="item.checked"
                    ng-change="outletSwitchChanged(item.gpio, item.checked)">
          [[ item.text ]]
        </ion-toggle>
        
      </div>
      
    </ion-content>
    
  </body>
</html>