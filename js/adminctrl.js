app.controller('AdminCtrl', function($scope, helpHourFactory) {
    $scope.unapprovedHelpHoursLoaded = false;
    $scope.loadUnapprovedHelpHours = function() {
        $scope.unapprovedHelpHoursLoading = true;
        helpHourFactory.unapprovedHelpHours().then(function(data) {
            $scope.unapprovedHelpHours = data;
            $scope.unapprovedHelpHoursLoaded = true;
            $scope.unapprovedHelpHoursLoading = false;
        });
    };

    $scope.allHelpHoursLoaded = false;
    $scope.loadAllHelpHours = function() {
        $scope.allHelpHoursLoading = true;
        helpHourFactory.allHelpHours().then(function(data) {
            $scope.allHelpHours = data;
            $scope.allHelpHoursLoading = false;
            $scope.allHelpHoursLoaded = true;
        });
    };

    $scope.approveHelpHour = function(id) {
        helpHourFactory.approveHelpHour(id).then(function(data) {
            $scope.loadUnapprovedHelpHours();
            $scope.loadAllHelpHours();
        });
    };

    $scope.denyHelpHour = function(id) {
        helpHourFactory.denyHelpHour(id).then(function(data) {
            $scope.loadUnapprovedHelpHours();
            $scope.loadAllHelpHours();
        });
    };
});
