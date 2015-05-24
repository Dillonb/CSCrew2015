<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CS Crew TV Dashboard</title>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="js/tvdashapp.js"></script>
    <script src="js/signinservice.js"></script>
    <script src="js/tvdashctrl.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/tvdash.css">
    <script type="text/javascript">
    google.load('visualization', '1.0', {'packages':['corechart']});
    google.setOnLoadCallback(function() {
        angular.bootstrap(document.body, ['cscrewtvdash']);
    });
    </script>
</head>
<body>
    <div class="panel panel-default main-panel" ng-controller="MainCtrl">
        <div class="panel-heading main-panel-heading">
            <h1><img src="img/logo.png"> CS Crew</h1>
        </div>
        <div class="panel-body">
            <div id="room-stats" class="panel panel-default tiling-panel">
                <div class="panel-heading">
                    <h3>Room Statistics for Today</h3>
                </div>
                <div class="panel-body">
                    <div class="panel panel-default" id="usage-chart"></div>
                    <ul id="signins-list">
                        <li ng-repeat="signin in signins">
                            [{{ signin.CreatedAt | date:'shortTime' }}] {{ signin.user.Name }} ({{ signin.numSignIns }})
                        </li>
                    </ul>
                </div>
            </div>
            <div id="help-hours" class="panel panel-default tiling-panel">
                <div class="panel-heading">
                    <h3>Help Hours Now</h3>
                </div>
                <div class="panel-body">
                    <ul id="help-hours-list">
                        <li ng-show="!helphours.length">There is currently no one with scheduled Help Hours at the moment. Feel free to ask anyone in the room for assistance!</li>
                        <li ng-repeat="helphour in helphours">Once I work out how help hour data is stored, do this.</li>
                    </ul>
                </div>
            </div>
            <div id="calendar" class="panel panel-default tiling-panel">
                <div class="panel-heading">
                    <h3>Upcoming Events</h3>
                </div>
                <div class="panel-body">
                    <iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;mode=AGENDA&amp;height=335&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=uvm.cscrew%40gmail.com&amp;color=%232F6309&amp;ctz=America%2FNew_York" style=" border-width:0 " width="100%" height="335" frameborder="0" scrolling="no"></iframe>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
