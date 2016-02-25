<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CS Crew TV Dashboard</title>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- build:js -->
    <script src="js/tvdashapp.js"></script>
    <script src="js/signinservice.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/angular-moment.min.js"></script>
    <script src="js/helphourservice.js"></script>
    <script src="js/tvdashctrl.js"></script>
    <!-- endbuild -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment-range/2.0.2/moment-range.min.js"></script>
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
                    <div class="panel panel-default">
                        <div id="usage-chart"></div>
                        <div id="year-chart"></div>
                    </div>
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
                    <ul id="help-hours-list" class="list-unstyled">
                        <li ng-show="!helphours.length">There is currently no one with scheduled Help Hours at the moment. Feel free to ask anyone in the room for assistance!</li>
                        <li ng-repeat="helphour in helphours | orderBy: 'StartTime'">
                            <div class="todays-help-hours-inactive row">
                                <div class="col-md-4">
                                    <img class="hh-pic" alt="User avatar" ng-if="helphour.User.Picture" ng-src="{{ helphour.User.Picture }}">
                                    <img class="hh-pic" alt="No picture available" ng-if="!helphour.User.Picture" ng-src="img/qmark.png">
                                </div>
                                <div class="col-md-8">
                                    <span ng-if="helphour.dateRange.contains(now())">

                                    </span>
                                    <h3>
                                        {{ helphour.User.Name }}
                                        <small>{{ today() + " " + helphour.StartTime | amDateFormat: 'h:mm a' }} - {{ today() + " " + helphour.EndTime | amDateFormat: 'h:mm a' }}</small>
                                        <small ng-if="now().isBefore(helphour.StartTimeMoment)">(Starts <span am-time-ago="helphour.StartTimeMoment"></span>)</small>
                                        <small ng-if="helphour.dateRange.contains(now())">(Ends <span am-time-ago="helphour.EndTimeMoment"></span>)</small>
                                        <small ng-if="helphour.SignedIn" class="text-success">Checked In</small> <!-- If the user has signed in for this help hour -->
                                        <small ng-if="!helphour.SignedIn" class="text-danger">Not Checked In</small> <!-- If the user has NOT signed in for this help hour -->
                                    </h3>
                                    <p><span ng-repeat="skill in helphour.User.Skills">{{ skill.Name}}<span ng-if="!$last">, </span></span></p>
                                    <p><div class="progress"><div class="progress-bar" role="progressbar" ng-style="{{ helphour.style }}"></div></div>
                                </div>
                            </div>
                        </li>
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
