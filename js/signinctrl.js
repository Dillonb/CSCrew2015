app.controller('MainCtrl', function($scope, $interval, $timeout, signinFactory) {
    $scope.signins = [];
    $scope.reasons = [];
    $scope.netid = null;
    $scope.signin_success = false;
    $scope.signin_fail = false;
    $scope.resetPage = function() {
        $scope.reset = $timeout(function() {
            $scope.signin_success = false;
            $scope.signin_fail = false;
            $scope.netid = "";
            $scope.reason = "";
            $scope.loading = false;
        }, 5000);
    };
    $scope.signinNetid = function() {
        var netid = $scope.netid;
        var reason = $scope.reason;
        if ($scope.netid === null || $scope.netid === "") {
            return;
        }
        if ($scope.reason === "" || $scope.reason === null) {
            return;
        }
        $scope.loading = true;
        signinFactory.signinNetid(netid,reason).then(function(data) {
            $scope.loading = false;
            if (data.error) {
                $scope.signin_success = false;
                $scope.signin_fail = true;
            }
            else {
                $scope.signin_success = true;
                $scope.signin_fail = false;
            }
            $scope.signin_message = data.message;
            $scope.resetPage();
        }, function(reason) {
            $scope.loading = false;
            $scope.signin_success = false;
            $scope.signin_fail = true;
            $scope.signin_message = "Remote server error.";
            $scope.resetPage();
        });
    };
    $scope.updateReasons = function() {
        signinFactory.getReasons().then(function(data) {
            $scope.reasons = data;
        });
    };
});
