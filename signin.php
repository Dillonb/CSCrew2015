<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CS Crew Room Sign-In</title>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="js/signinapp.js"></script>
    <script src="js/signinservice.js"></script>
    <script src="js/signinctrl.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/signin.css">
</head>
<body>
    <div ng-app="cscrewsignin" class="container" ng-controller="MainCtrl">
        <div class="panel panel-default panel-signin">
            <div class="panel-heading">
                <img src="img/logo.png">
            </div>
            <div class="panel-body">
                <p class="subtitle">Welcome to CS Crew!</p>
                <p class="blurb">Please take a moment to sign in. By signing in, we can better keep track of who uses this space and manage the many faces we see every day!</p>
                <form ng-submit="signinNetid()" ng-hide="signin_success || signin_fail || loading">
                    <div class="form-group">
                        <label for="inputNetID">UVM NetID:</label>
                        <input class="form-control" ng-model="netid" id="inputNetID" placeholder="NetID (eg. mkapoodl)">
                    </div>
                    <div class="form-group">
                        <label for="selectReasonHere">Why are you here?</label>
                        <select class="form-control" ng-model="reason" id="selectReasonHere" ng-init="updateReasons()">
                            <option value="" disabled>--PLEASE SELECT--</option>
                            <option ng-repeat="reason in reasons" value="{{ reason.Id }}">{{ reason.Text }}</option>
                        </select>
                    </div>
                    <div class="form-group group-submit">
                        <input type="submit" id="btnSubmit" class="btn btn-default" value="Sign in">
                    </div>
                </form>
                <div ng-show="loading" class="loading-indicator">
                    <i class="fa fa-refresh fa-spin fa-5x"></i>
                </div>
                <div ng-show="signin_success" class="panel panel-default panel-success">
                    <div class="panel-heading">Successfully signed in!</div>
                    <div class="panel-body">
                        {{ signin_message }}
                    </div>
                </div>
                <div class="panel panel-default panel-danger" ng-show="signin_fail">
                    <div class="panel-heading">Error signing in!</div>
                    <div class="panel-body">
                        {{ signin_message }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
